<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PacienteModel;
use App\Models\GenerosModel;
use App\Models\PrevisionModel;
use App\Models\HorariosModel;
use App\Models\TrabajadorModel;
use App\Models\CitasModel;

class PacienteController extends BaseController
{
    private $trabajadorModel;
    private $pacienteModel;
    private $previsionModel;
    private $generosModel;
    private $session;
    private $citasModel;
    private $horariosModel;

    public function __construct()
    {
        // Carga los modelos en el constructor
        $this->pacienteModel = new PacienteModel;
        $this->generosModel = new GenerosModel;
        $this->previsionModel = new PrevisionModel;
        $this->horariosModel = new HorariosModel;
        $this->trabajadorModel = new TrabajadorModel;
        $this->citasModel = new CitasModel;
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $datosPac = $this->pacienteModel->perfilPaciente();
        $horarios = $this->horariosModel->listarHorarios();
        $especialista = $this->trabajadorModel->listarEspecialistas();
        $totalCitas = $this->citasModel->misCitasTotales();
        $totalAtendidas = $this->citasModel->misCitasAtendidas();
        $totalCanceladas = $this->citasModel->misCitasCanceladas();
        $datosCitas = $this->citasModel->misCitas();

        $data = [
            'active_page' => 'paciente',
            'datosPac' => $datosPac,
            'horarios' => $horarios,
            'doctores' => $especialista,
            'datos' => $datosCitas,
            'conteo' => [
                'citasT' => $totalCitas ? $totalCitas->totalCitas : 0,
                'citasC' => $totalCanceladas ? $totalCanceladas->totalCitas : 0,
                'citasA' => $totalAtendidas ? $totalAtendidas->totalCitas : 0,
            ],
        ];

        //$data['active_page'] = 'paciente';
        return view('dashboard/paciente', $data);
    }

    public function pacienteHistorial()
    {

        $genero = $this->generosModel->listarGeneros();
        $prevision = $this->previsionModel->listarPrevision();
        $datosPac = $this->pacienteModel->perfilPaciente();

        $data = [
            'active_page' => 'paciente-historial',
            "generos" => $genero,
            'previsiones' => $prevision,
            'datosPac' => $datosPac,
        ];

        // $data['active_page'] = 'paciente-historial';
        return view('dashboard/paciente-historial', $data);
    }
    public function pacienteDocumentos()
    {
        $data['active_page'] = 'paciente-documentos';
        return view('dashboard/paciente-documentos', $data);
    }

    public function modalEditar($id)
    {
        $datosPac = $this->pacienteModel->modalEditar($id);
        return $this->response->setJSON($datosPac);
    }

    public function actualizarPacienteM()
    {
        // Recuperar los datos del formulario
        $id = $this->request->getPost('id');
        $rolUsuario = session('rol_usuario');
        $rut = $this->request->getPost('rut');
        $nombres = $this->request->getPost('nombres');
        $apellidos = $this->request->getPost('apellidos');
        $celular = $this->request->getPost('celular');
        $correo = $this->request->getPost('correo');

        if ($rolUsuario == 'Administrador') {
            $rutaRedireccion = '/dashboard/admin';
        } elseif ($rolUsuario == 'Especialista') {
            $rutaRedireccion = '/doc';
        } elseif ($rolUsuario == 'Enfermera') {
            $rutaRedireccion = '/dashboard/enfer';
        }

        $this->pacienteModel->actualizarPacienteM($id, $rut, $nombres, $apellidos, $celular, $correo, $rutaRedireccion);
    }

    public function eliminarPaciente($id)
    {
        $this->pacienteModel->eliminarPaciente($id);
    }

    public function actualizarPerfil()
    {

        $rut = $this->request->getPost('rut');
        $nombres = $this->request->getPost('nombres');
        $apellidos = $this->request->getPost('apellidos');
        $celular = $this->request->getPost('celular');
        $correo = $this->request->getPost('correo');
        $fechaNac = $this->request->getPost('fecha');
        $genero = $this->request->getPost('genero');
        $prevision = $this->request->getPost('prevision');
        $usuario = $this->request->getPost('usuario');
        $pass = $this->request->getPost('pass');
        $repetirpass = $this->request->getPost('repetirpass');

        $rutaRedireccion = '/paciente-historial';

        $this->pacienteModel->actualizarPerfil($rut, $nombres, $apellidos, $celular, $correo, $fechaNac, $genero, $prevision, $usuario, $pass, $repetirpass, $rutaRedireccion);
    }

    public function confirmarCitaPaciente($id)
    {
        $this->citasModel->confirmarCitaPaciente($id);
    }

    public function cancelarCitaPaciente($id)
    {
        $this->citasModel->cancelarCitaPaciente($id);
    }
}
