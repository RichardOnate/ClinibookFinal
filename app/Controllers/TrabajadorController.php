<?php

namespace App\Controllers;

use App\Models\TrabajadorModel;
use App\Models\LoginModel;


//require_once APPPATH . 'helpers/Alertas.php';

class TrabajadorController extends BaseController
{
    private $trabajadorModel;
    private $loginModel;
    private $session;

    public function __construct()
    {
        $this->trabajadorModel = new TrabajadorModel();
        $this->loginModel = new LoginModel();
        $this->session = \Config\Services::session();
    }

    public function totalTrabajadores()
    {
        $totalTrabajadores = $this->trabajadorModel->totalTrabajadores();
        return $totalTrabajadores;
    }

    public function listarEspecialistas()
    {
        $especialistas = $this->trabajadorModel->listarEspecialistas();
        return $especialistas;
    }

    public function listarTrabajadores()
    {
        $listaTrabajadores = $this->trabajadorModel->listarTrabajadores();
        return $listaTrabajadores;
    }

    public function datosTrabajador()
    {
        $datosTrab = $this->trabajadorModel->datosTrabajador();
        return $datosTrab;
    }

    public function actualizarPerfil()
    {
        // Recuperar los datos del formulario
        $idUsuario = session('id_usuario');
        $rolUsuario = session('rol_usuario');
        $rut = $this->request->getPost('rut');
        $nombres = $this->request->getPost('nombres');
        $apellidos = $this->request->getPost('apellidos');
        $celular = $this->request->getPost('celular');
        $usuario = $this->request->getPost('usuario');
        $pass = $this->request->getPost('pass');
        $repetirpass = $this->request->getPost('repetirpass');

        if ($rolUsuario == 'Administrador') {
            $rutaRedireccion = '/dashboard/admin';
        } elseif ($rolUsuario == 'Especialista') {
            $rutaRedireccion = '/doc';
        } elseif ($rolUsuario == 'Enfermera') {
            $rutaRedireccion = '/dashboard/enfer';
        }

        // Llamar a la función en el modelo
        $this->trabajadorModel->actualizarPerfil($idUsuario, $rut, $nombres, $apellidos, $celular, $usuario, $pass, $repetirpass, $rutaRedireccion);
    }


    public function insertarTrabajador()
    {
        $rut = $this->request->getPost('rut');
        $nombres = $this->request->getPost('nombres');
        $apellidos = $this->request->getPost('apellidos');
        $celular = $this->request->getPost('celular');
        $rol = $this->request->getPost('rol');
        $sucursal = $this->request->getPost('sucursal');

        if ($this->trabajadorModel->trabRegistrado($rut)) {
            Alerta("error", "Error de registro", "El Rut ingresado ya se encuentra registrado", "/admin-trab");
            return redirect()->to('/admin-trab');
        }

        $passwordRut = str_replace("-", "", $rut);
        // Crear datos para el usuario
        $dataUsuario = [
            'usu_nombre' => $rut,
            'usu_pass' => password_hash("$passwordRut", PASSWORD_DEFAULT),
            'id_rol' => $rol,
        ];

        $idUsuarioInsertado = $this->loginModel->insertarUsuario($dataUsuario);

        // Verificar si la inserción del usuario fue exitosa
        if ($idUsuarioInsertado) {
            // Crear datos para el trabajador
            $dataTrabajador = [
                'id_sucursal' => $sucursal,
                'id_usuario' => $idUsuarioInsertado, // Asignar el ID del usuario recién insertado
                'trab_rut' => $rut,
                'trab_nombres' => $nombres,
                'trab_apellidos' => $apellidos,
                'trab_celular' => $celular,
            ];

            // Insertar trabajador
            $this->trabajadorModel->insertarTrabajador($dataTrabajador);
        } else {
            // Manejar el caso en que la inserción del usuario falla
            Alerta("error", "Error de registro", "No se pudo crear el usuario", "/admin-trab");
        }
    }

    public function datosDoc()
    {
        $datosDoc = $this->trabajadorModel->datosDoctor();
        return $datosDoc;
    }
    public function modalEditar($id)
    {
        $datosTrab = $this->trabajadorModel->modalEditar($id);
        return $this->response->setJSON($datosTrab);
    }

    public function actualizarTrabajador()
    {
        // Recuperar los datos del formulario
        $id = $this->request->getPost('id');
        $rolUsuario = session('rol_usuario');
        $rut = $this->request->getPost('rut');
        $nombres = $this->request->getPost('nombres');
        $apellidos = $this->request->getPost('apellidos');
        $celular = $this->request->getPost('celular');
        $rol = $this->request->getPost('rol');

        if ($rolUsuario == 'Administrador') {
            $rutaRedireccion = '/dashboard/admin';
        } elseif ($rolUsuario == 'Especialista') {
            $rutaRedireccion = '/doc';
        } elseif ($rolUsuario == 'Enfermera') {
            $rutaRedireccion = '/dashboard/enfer';
        }

        $this->trabajadorModel->actualizarTrabajador($id, $rut, $nombres, $apellidos, $celular, $rol, $rutaRedireccion);
    }

    public function eliminarTrabajador($id)
    {
        $this->trabajadorModel->eliminarTrabajador($id);
    }
}
