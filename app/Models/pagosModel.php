<?php

namespace App\Models;
use CodeIgniter\Model;
class pagosModel extends Model{
    protected $table ='tblpagos';
    protected $primaryKey = "idpago";
    protected $returnType = "array";
    protected $allowedFields = ['numeroCuota', 'montoCapital', 'montoInteres', 'saldoInsolutoCredito', 'idprestamo'];

    public function pagosInsert($numeroCuota, $montoCapital, $montoInteres, $saldoInsoluto, $idprestamo){
        $data= [
            'numeroCuota' => $numeroCuota,
            'montoCapital'=>$montoCapital,
            'montoInteres'=>$montoInteres,
            'saldoInsolutoCredito'=>$saldoInsoluto,
            'idprestamo'=>$idprestamo
        ];
        $prestamo = $this->insert($data, true);
        return $prestamo;
    }
}