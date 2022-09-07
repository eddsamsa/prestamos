<?php

namespace App\Controllers;

use App\Models\pagosModel;

class Front extends BaseController
{
    public function main(){
        return view("view_prestamos");
    }

    public function getByPrestamo($id){
        $pagos= new pagosModel();
        $data = $pagos->getByIdprestamo($id);
        return json_encode($data);
    }

}