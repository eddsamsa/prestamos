<?php

namespace App\Controllers;
use App\Models\pagosModel;
use CodeIgniter\RESTful\ResourceController;

class pagos extends ResourceController{
    protected $modelName= 'App\Models\pagosModel';
    protected $format= 'json';

    public function index(){
        return $this->gResponse($this->model->findAll(), "",200);
    }
    public function show($id = null){
        $pago= $this->model->find($id);
        if($pago){
            return $this->gResponse($pago,"",200);
        }else{
            return $this->gResponse("","Eror",500);
        }
    }

    public function create(){
        $pagos = new pagosModel();
        $numeroCuota = $this->request->getPost('numeroCuota');
        $montoCapital = $this->request->getPost('montoCapital');
        $montoInteres = $this->request->getPost('montoInteres');
        $saldoInsolutoCredito = $this->request->getPost('saldoInsolutoCredito');
        $idprestamo = $this->request->getPost('idprestamo');
        $id = $pagos->insert([
            'numeroCuota'=>$numeroCuota,
            'montoCapital'=>$montoCapital,
            'montoInteres'=>$montoInteres,
            'saldoInsolutoCredito'=>$saldoInsolutoCredito,
            'idprestamo'=>$idprestamo]);
         return $this->gResponse($this->model->find($id), "", 200);

    }

    private function gResponse($data, $mensaje, $code){
        if($code==200){
            return $this->respond(array(
                'data'=>$data,
                'code'=>$code
            ));
        }else{
            return $this->respond(array(
                'msj'=>$mensaje,
                'code'=>$code
            ));
        }
    }
}