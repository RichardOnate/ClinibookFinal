<?php

namespace App\Controllers;

use App\Models\EstadosCitaModel;

class EstadosCitaController extends BaseController
{
    public function index()
    {
        $estadoModel = new EstadosCitaModel();

        $estadoCita = $estadoModel->findAll();

        $data['horarios'] = $estadoCita;
    
        return view('selects/estadoCita', $data);

    }
}
