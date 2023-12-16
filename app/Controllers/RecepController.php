<?php


namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\TrabajadorModel;
use App\Models\GenerosModel;
use App\Models\PrevisionModel;
use App\Models\HorariosModel;
use App\Models\PacienteModel;


class RecepController extends Controller
{
    private $trabajadorModel;
    private $previsionModel;
    private $generosModel;
    private $horariosModel;
    private $pacienteModel;

    public function __construct()
    {
        $this->trabajadorModel = new TrabajadorModel;
        $this->generosModel = new GenerosModel;
        $this->previsionModel = new PrevisionModel;
        $this->horariosModel = new HorariosModel;
        $this->pacienteModel = new PacienteModel;
    }
    public function index()
    {
        $data['active_page'] = 'recep';
        return view('dashboard/recep', $data);
    }
    public function recepAgendar()
    {
        $generos = $this->generosModel->listarGeneros();
        $previsiones = $this->previsionModel->listarPrevision();
        $horarios = $this->horariosModel->listarHorarios();
        $especialista = $this->trabajadorModel->listarEspecialistas();

        $data = [
            'active_page' => 'recep-agendar',
            "generos" => $generos,
            'previsiones' => $previsiones,
            'horarios' => $horarios,
            'doctores' => $especialista,
        ];
        //$data['active_page'] = 'recep-agendar';
        return view('dashboard/recep-agendar', $data);
    }
    public function recepPerfil()
    {
        $datosTrabajador = $this->trabajadorModel->datosTrabajador();

        $data = [
            'active_page' => 'recep-perfil',
            'lista' => $datosTrabajador,
        ];

        // $data['active_page'] = 'recep-perfil';
        return view('dashboard/recep-perfil', $data);
    }

    public function buscarPacienteRut($rut)
    {
        $datosPac = $this->pacienteModel->buscarPacienteRut($rut);
        return $this->response->setJSON($datosPac);
    }
}
