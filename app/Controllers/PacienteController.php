<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PacienteModel;

class PacienteController extends BaseController
{
    private $pacienteModel;
    public function __construct()
    {
        // Carga los modelos en el constructor
        $this->pacienteModel = new PacienteModel;
    }
    public function index()
    {
        $data['active_page'] = 'paciente';
        return view('dashboard/paciente', $data);
    }


    public function pacienteHistorial()
    {
        $data['active_page'] = 'paciente-historial';
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
}
