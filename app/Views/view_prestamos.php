<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Calculadora de intereses </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>
</nav>
<div class="row">
<div id="datos" class="card text-center">
    <div class="card-body">
        <div>
            <div>monto</div>
            <div><input type="number" value="12000" id="monto"/></div>
        </div>
        <div>
            <div>tasa</div>
            <div><input type="number" value="18" id="tasa"/></div>
        </div>
        <div>
            <div>plazo</div>
            <div><input type="number" value="24" id="plazo"/></div>
        </div>
    </div>
    <div>
    <input type="button" value="Simular" id="calcular" class="btn btn-info"/>
    <input type="button" value="Guardar" id="guardar" class="btn btn-primary"/>
    </div>
</div>
</div>


<div class="container">
    <div class="row">
        <div id="divtabla" class="col-md-6" ></div>
        <div id="divtabla2" class="col-md-6"></div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

    <footer class="bd-footer py-4 py-md-5 mt-5 bg-light">
        <div class="container py-4 py-md-5 px-4 px-md-3">
            <div class="row">
                <div class="col-lg-4 mb-4">

                    <ul class="list-unstyled small text-muted">
                        <li class="mb-2">Proramado por Edgar de los Santos Espinosa</li>

                    </ul>
                </div>
                <div class="col-6 col-lg-2 offset-lg-1 mb-4">
                    <h5>Tecnologias</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">CodeIgniter</li>
                        <li class="mb-2">APIRest</li>
                        <li class="mb-2">Mysql</li>
                        <li class="mb-2">Javascript</li>
                        <li class="mb-2">PHP</li>
                        <li class="mb-2">GitHub</li>

                    </ul>
                </div>
                <div class="col-6 col-lg-2 mb-4">
                    <h5>Contacto</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">Tel.- 9612621469</li>
                        <li class="mb-2">email: Edgard.delossantos@outlook.com</li>

                    </ul>
                </div>

            </div>
        </div>

    <script>

        let calcula = document.getElementById("calcular");
        let divtabla = document.getElementById("divtabla");

        calcula.addEventListener("click", function () {
            let monto = document.getElementById("monto").value;
            let tasa = document.getElementById("tasa").value;
            let plazo = document.getElementById("plazo").value;

            let interes = ((tasa / 100) / 360)
            let capital = monto;
            let json = [];
            divtabla.innerHTML = "";
            let tabla = document.createElement("table");
            tabla.setAttribute("class", "table table-striped")
            let th = tabla.createTHead();
            let tr = th.insertRow();
            let celda1 = tr.insertCell();
            let celda2 = tr.insertCell();
            let celda3 = tr.insertCell();
            let celda4 = tr.insertCell();

            celda1.innerHTML = "NumerodeCuota";
            celda2.innerHTML = "MontoCapital";
            celda3.innerHTML = "MontoInteres";
            celda4.innerHTML = "SaldoInsolutoCredito";
            //let td ="<th></th><th></th><th></th><th></th>";
            tabla.append(tr);
            divtabla.append(tabla);
            let tbody = tabla.createTBody();
            for (let i = 1; i <= plazo; i++) {
                let importeInteres = capital * interes * 30;
                capital = capital - monto / plazo;
                let aux = "{'NumerodeCuota': " + i + ",'MontoCapital': " + monto / plazo + ",'MontoInteres': " + importeInteres + ", 'SaldoInsolutoCredito': " + capital + "}";
                json.push(aux);
                let tr = tbody.insertRow();
                let c1 = tr.insertCell().innerHTML = i;
                let c2 = tr.insertCell().innerHTML = monto / plazo;
                let c3 = tr.insertCell().innerHTML = importeInteres;
                let c4 = tr.insertCell().innerHTML = capital;

            }
            //console.log(json);
        });

        const save = document.getElementById("guardar");
        save.addEventListener("click", function () {
            let form = new FormData();
            form.append("monto", document.getElementById("monto").value);
            form.append("tasa", document.getElementById("tasa").value);
            form.append("plazo", document.getElementById("plazo").value);

            fetch(
                "/prestamos", {
                    method: 'POST',
                    body: form
                }).then(response => response.json()).then(
                data => {
                    let aux = data.data.idprestamo;
                    let aux2 =1;
                    let interes = ((document.getElementById("tasa").value / 100) / 360)
                    let capital = document.getElementById("monto").value;
                    for (let i = 1; i <= document.getElementById("plazo").value; i++) {
                        let importeInteres = capital * interes * 30;
                        capital = capital - document.getElementById("monto").value / document.getElementById("plazo").value;

                        let form1 = new FormData();
                        form1.append("numeroCuota", i);
                        form1.append("montoCapital", document.getElementById("monto").value / document.getElementById("plazo").value);
                        form1.append("montoInteres", importeInteres);
                        form1.append("saldoInsolutoCredito", capital);
                        form1.append("idprestamo", data.data.idprestamo);
                        fetch("/pagos", {
                            method: 'POST',
                            body: form1
                        }).then(response => response.json().then(
                            data => {
                                console.log(data);
                                aux2++;
                                if(aux2 == document.getElementById("plazo").value ){
                                    fetch('/getPagosPrestamo/'+aux)
                                        .then((resp) => resp.json())
                                        .then(function (data) {
                                            console.log(data);
                                            printTable(data);
                                        })
                                        .catch(function (error) {
                                            console.log(error);
                                        });
                                }
                            }
                        ));
                    }




                }
            )
        });


        function printTable(json) {
            //divtabla.innerHTML = "";
            let tabla = document.createElement("table");
            tabla.setAttribute("class", "table table-striped table-dark")
            let trh = tabla.insertRow();
            let celda1 = trh.insertCell().innerHTML = "NumerodeCuota";
            let celda2 = trh.insertCell().innerHTML = "MontoCapital";
            let celda3 = trh.insertCell().innerHTML = "MontoInteres";
            let celda4 = trh.insertCell().innerHTML = "SaldoInsolutoCredito";
            let celda5 = trh.insertCell().innerHTML = "idpago";

            for (let i = 0; i < json.length; i++) {
                let tr = tabla.insertRow();
                let c1 = tr.insertCell().innerHTML = json[i].numeroCuota;
                let c2 = tr.insertCell().innerHTML = json[i].montoCapital;
                let c3 = tr.insertCell().innerHTML = json[i].montoInteres;
                let c4 = tr.insertCell().innerHTML = json[i].saldoInsolutoCredito;
                let c5 = tr.insertCell().innerHTML = json[i].idpago;

            }
            let divt = document.getElementById("divtabla2");
            divt.innerHTML = "";
            divt.append(tabla);
        }

        //document.addEventListener("DOMContentLoaded", function (){})
    </script>
</footer>
</html>



