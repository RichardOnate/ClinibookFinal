<?php


namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\TrabajadorModel;
use App\Models\GenerosModel;
use App\Models\PrevisionModel;
use App\Models\PacienteModel;

class EnferController extends Controller
{
    private $trabajadorModel;
    private $previsionModel;
    private $generosModel;
    private $pacienteModel;
    public function __construct()
    {
        $this->trabajadorModel = new TrabajadorModel();
        $this->generosModel = new GenerosModel;
        $this->previsionModel = new PrevisionModel;
        $this->pacienteModel = new PacienteModel;
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

    public function verPacienteRut($rut)
    {
        $datosPac = $this->pacienteModel->verPacienteRut($rut);
        return $this->response->setJSON($datosPac);
    }
}
