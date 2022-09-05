<?php

namespace App\Controllers;

class Front extends BaseController
{
    public function main(){
        return view("view_prestamos");
    }
}