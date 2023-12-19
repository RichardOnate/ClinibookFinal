<?php


namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TrabajadorModel;
use App\Models\GenerosModel;
use App\Models\PrevisionModel;
use App\Models\PacienteModel;
use App\Models\CitasModel;

class EnferController extends BaseController
{
    private $trabajadorModel;
    private $previsionModel;
    private $generosModel;
    private $pacienteModel;
    private $citasModel;
    public function __construct()
    {
        $this->trabajadorModel = new TrabajadorModel;
        $this->generosModel = new GenerosModel;
        $this->previsionModel = new PrevisionModel;
        $this->pacienteModel = new PacienteModel;
        $this->citasModel = new CitasModel;
    }
    public function index()
    {

        $totalCitasHoy = $this->citasModel->totalCitasHoy();
        $totalAtendidasHoy = $this->citasModel->totalCitasAtendidas();
        $totalCanceladasHoy = $this->citasModel->totalCitasCanceladas();
        $eventosConf = $this->citasModel->citasCalendarioRecConf();
        $eventosCanc = $this->citasModel->citasCalendarioRecCanc();

        $eventos = [
            'confirm' => $eventosConf,
            'cancel' => $eventosCanc,
        ];

        $data = [
            'active_page' => 'enfer',
            'eventos' => $eventos,
            'conteo' => [
                'citasP' => $totalCitasHoy ? $totalCitasHoy->totalCitas : 0,
                'citasC' => $totalAtendidasHoy ? $totalAtendidasHoy->totalCitas : 0,
                'citasA' => $totalCanceladasHoy ? $totalCanceladasHoy->totalCitas : 0,
            ],
        ];
        //$data['active_page'] = 'enfer';
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

    public function actualizarPacienteE()
    {
        $id = $this->request->getPost('id_paciente');
        $rut = $this->request->getPost('rut');
        $nombres = $this->request->getPost('nombres');
        $apellidos = $this->request->getPost('apellidos');
        $celular = $this->request->getPost('celular');
        $correo = $this->request->getPost('correo');
        $fechaNac = $this->request->getPost('fecha');
        $genero = $this->request->getPost('genero');
        $prevision = $this->request->getPost('prevision');

        $rutaRedireccion = ('/enfer');

        $this->pacienteModel->actualizarPacienteE($id, $rut, $nombres, $apellidos, $fechaNac, $celular, $correo, $genero, $prevision, $rutaRedireccion);
    }
}
