<?php


namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\TrabajadorModel;
use App\Models\GenerosModel;
use App\Models\PrevisionModel;
use App\Models\HorariosModel;
use App\Models\PacienteModel;
use App\Models\CitasModel;


class RecepController extends Controller
{
    private $trabajadorModel;
    private $previsionModel;
    private $generosModel;
    private $horariosModel;
    private $pacienteModel;
    private $citasModel;

    public function __construct()
    {
        $this->trabajadorModel = new TrabajadorModel;
        $this->generosModel = new GenerosModel;
        $this->previsionModel = new PrevisionModel;
        $this->horariosModel = new HorariosModel;
        $this->pacienteModel = new PacienteModel;
        $this->citasModel = new CitasModel;
    }
    public function index()
    {
        $totalCitasHoy = $this->citasModel->totalCitasHoy();
        $totalAtendidasHoy = $this->citasModel->totalCitasAtendidas();
        $totalCanceladasHoy = $this->citasModel->totalCitasCanceladas();

        $data = [
            'active_page' => 'recep',
            'conteo' => [
                'citasP' => $totalCitasHoy ? $totalCitasHoy->totalCitas : 0,
                'citasC' => $totalAtendidasHoy ? $totalAtendidasHoy->totalCitas : 0,
                'citasA' => $totalCanceladasHoy ? $totalCanceladasHoy->totalCitas : 0,
            ],
        ];

        //$data['active_page'] = 'recep';
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
