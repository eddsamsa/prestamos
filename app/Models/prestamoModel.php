<?php

namespace App\Models;
use CodeIgniter\Model;
class prestamoModel extends Model{
    protected $table ='tblprestamos';
    protected $primaryKey = "idprestamo";
    protected $returnType = "array";
    protected $allowedFields = ['monto', 'tasa', 'plazo', 'fecha'];

    public function prestamosInsert($monto, $tasa, $plazo){
        $fecha = date('Y-m-d h:i:s');
        $data= [
            'monto' => $monto,
            'tasa'=>$tasa,
            'plazo'=>$plazo,
            'fecha'=>$fecha
        ];
        $prestamo = $this->insert($data, true);
        return $prestamo;
    }

}