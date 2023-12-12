<?php


namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\TrabajadorModel;
use App\Models\GenerosModel;
use App\Models\PrevisionModel;

class EnferController extends Controller
{
    private $trabajadorModel;
    private $previsionModel;
    private $generosModel;
    public function __construct()
    {
        $this->trabajadorModel = new TrabajadorModel();
        $this->generosModel = new GenerosModel;
        $this->previsionModel = new PrevisionModel;
    }
    public function index()
    {
        $data['active_page'] = 'enfer';
        return view('dashboard/enfer', $data);
    }
    public function perfilEnfer()
    {
        $datosTrabajador = $this->trabajadorModel->datosTrabajador();

        $data = [
            'active_page' => 'enfer-perfil',
            'lista' => $datosTrabajador,
        ];
        //$data['active_page'] = 'enfer-perfil';
        return view('dashboard/enfer-perfil', $data);
    }
    public function verPacienteEnfer()
    {
        $genero = $this->generosModel->listarGeneros();
        $prevision = $this->previsionModel->listarPrevision();

        $data = [
            'active_page' => 'enfer-verPaciente',
            "generos" => $genero,
            'previsiones' => $prevision,
        ];

        //$data['active_page'] = 'enfer-verPaciente';
        return view('dashboard/enfer-verPaciente', $data);
    }
}
