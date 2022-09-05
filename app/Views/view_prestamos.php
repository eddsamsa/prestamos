<html>
<head>

</head>
<body>
<div>prueba</div>
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
<input type="button" value="Simular" id="calcular"/>

<div id="divtabla">

</div>
</body>
<footer>
    <script>

        let calcula = document.getElementById("calcular");
        let divtabla = document.getElementById("divtabla");

        calcula.addEventListener("click", function () {
            let monto = document.getElementById("monto").value;
            let tasa = document.getElementById("tasa").value;
            let plazo = document.getElementById("plazo").value;

            let interes = ((tasa / 100) / 360)
            let capital = monto;
            let json =[];
            divtabla.innerHTML="";
            let tabla= document.createElement("table");
            let trh = tabla.insertRow();
            let celda1 = trh.insertCell();
            let celda2 = trh.insertCell();
            let celda3 = trh.insertCell();
            let celda4 = trh.insertCell();

            celda1.innerHTML="NumerodeCuota";
            celda2.innerHTML="MontoCapital";
            celda3.innerHTML="MontoInteres";
            celda4.innerHTML="SaldoInsolutoCredito";
            //let td ="<th></th><th></th><th></th><th></th>";
            tabla.append(trh);
            divtabla.append(tabla);
            for (let i = 1; i <= plazo; i++) {
                let importeInteres = capital * interes * 30;
                capital = capital - monto / plazo;
                let aux=  "{'NumerodeCuota': " + i + ",'MontoCapital': " + monto/plazo + ",'MontoInteres': " + importeInteres + ", 'SaldoInsolutoCredito': "+capital+"}";
                json.push(aux);
                let tr = tabla.insertRow();
                let c1 = tr.insertCell().innerHTML=i;
                let c2 = tr.insertCell().innerHTML=monto/plazo;
                let c3 = tr.insertCell().innerHTML=importeInteres;
                let c4 = tr.insertCell().innerHTML=capital;

            }
            console.log(json);
        });
        //document.addEventListener("DOMContentLoaded", function (){})
    </script>
</footer>
</html>



