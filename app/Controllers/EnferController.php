<?php


namespace app\Controllers;

use CodeIgniter\Controller;

class EnferController extends Controller
{
    public function index()
    {
        $data['active_page'] = 'enfer';
        return view('dashboard/enfer', $data);
    }
    public function perfilEnfer()
    {
        $data['active_page'] = 'enfer-perfil';
        return view('dashboard/enfer-perfil', $data);
    }
    public function verPacienteEnfer()
    {
        $data['active_page'] = 'enfer-verPaciente';
        return view('dashboard/enfer-verPaciente', $data);
    }
}
