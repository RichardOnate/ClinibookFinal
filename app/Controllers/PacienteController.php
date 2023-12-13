<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PacienteModel;
use App\Models\GenerosModel;
use App\Models\PrevisionModel;

class PacienteController extends BaseController
{
    private $pacienteModel;
    private $previsionModel;
    private $generosModel;
    private $session;
    public function __construct()
    {
        // Carga los modelos en el constructor
        $this->pacienteModel = new PacienteModel;
        $this->generosModel = new GenerosModel;
        $this->previsionModel = new PrevisionModel;
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $data['active_page'] = 'paciente';
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

        $rolUsuario = session('rol_usuario');
        $rut = $this->request->getPost('rut');
        $nombres = $this->request->getPost('nombres');
        $apellidos = $this->request->getPost('apellidos');
        $celular = $this->request->getPost('celular');
        $correo = $this->request->getPost('correo');
        $fechaNac = $this->request->getPost('fecha');
        $genero = $this->request->getPost('genero');
        $prevision = $this->request->getPost('prevision');


        if ($rolUsuario == 'Paciente') {
            $rutaRedireccion = '/paciente-historial';
        }

        $this->pacienteModel->actualizarPerfil($rut, $nombres, $apellidos, $celular, $correo, $fechaNac, $genero, $prevision, $rutaRedireccion);
    }
}
