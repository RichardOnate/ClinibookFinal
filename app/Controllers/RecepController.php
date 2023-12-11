<?php


namespace app\Controllers;

use CodeIgniter\Controller;

class RecepController extends Controller
{
    public function index()
    {
        $data['active_page'] = 'recep'; 
        return view('dashboard/recep', $data);
    }
    public function recepAgendar()
    {
        $data['active_page'] = 'recep-agendar'; 
        return view('dashboard/recep-agendar', $data);
    }
    public function recepPerfil()
    {
        $data['active_page'] = 'recep-perfil'; 
        return view('dashboard/recep-perfil', $data);
    }
} 