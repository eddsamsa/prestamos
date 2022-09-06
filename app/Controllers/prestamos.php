<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\prestamoModel;
use App\Models\pagosModel;

class prestamos extends BaseController{
    public function savePrestamo(){
        $prestamo= new prestamoModel();

        $monto = $this->request->getPost('monto');
        $tasa = $this->request->getPost('tasa');
        $plazo = $this->request->getPost('plazo');
        //echo "$monto, $tasa, $plazo";

        $inserta = $prestamo->prestamosInsert($monto, $tasa, $plazo);
        if($inserta!=""){
            $pagos = new pagosModel();
            $capital = $monto;
            $montoCapital= $monto/$plazo;
            $interes = (($tasa/100)/360);
            for($i = 1; $i<= $plazo; $i++){
                $importeInteres = $capital * $interes * 30;
                $capital = $capital - $monto / $plazo;
                $insertpago= $pagos->pagosInsert($i, $montoCapital, $importeInteres, $capital, $inserta);
                //echo $insertpago;
            }
            $resp = ['status'=> true, 'resp'=>$inserta];
            //return $this->response->setStatusCode(200)->setJSON($resp);
        }else{
            $resp = ['status' => false, 'responseText' => 'No se ha podido guardar los datos'];
            return $this->response->setStatusCode(200)->setJSON($resp);
            exit;
        }

    }
}