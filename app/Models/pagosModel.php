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

    public function getByIdprestamo($id){
        $db = \Config\Database::connect();
        $query   = $db->query("SELECT numeroCuota AS NumeroDeCuota, montoCapital AS MontoCapital, montoInteres AS MontoInteres,
                                saldoInsolutoCredito AS SaldoInsolutoCredito, idpago FROM tblpagos WHERE idprestamo=$id ORDER BY numeroCuota ASC");
        $results = $query->getResult();
        return $results;

    }

}