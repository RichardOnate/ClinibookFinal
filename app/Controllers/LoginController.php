<?php


namespace app\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;
use App\Models\TrabajadorModel;
use App\Models\PacienteModel;

require_once APPPATH . 'helpers/Alertas.php';
class LoginController extends BaseController
{
    private $session;
    private $trabajadorModel;
    private $loginModel;
    private $pacienteModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->trabajadorModel = new TrabajadorModel();
        $this->loginModel = new LoginModel();
        $this->pacienteModel = new PacienteModel();
    }
    public function index()
    {
        return view('modulos/login');
    }

    public function iniciarSesion()
    {

        $usuario = $this->request->getPost('usuario');
        $pass = $this->request->getPost('pass');

        $usuarioEncontrado = $this->loginModel->obtenerUsuario($usuario, $pass);

        if ($usuarioEncontrado) {
            $idUsuario = $usuarioEncontrado['id_usuario'];
            $Rolusuario = $usuarioEncontrado['id_rol'];
            $nombreRol = $this->loginModel->obtenerRol($Rolusuario);

            if ($Rolusuario == '5') {
                $nombreUsuario = $this->pacienteModel->nombrePaciente($idUsuario);
            } else {
                $nombreUsuario = $this->trabajadorModel->nombreTrabajador($idUsuario);
            }

            $this->session->set('id_usuario', $idUsuario);
            $this->session->set('rol_usuario', $nombreRol['rol_nombre']);
            $this->session->set('nombre_usuario', $nombreUsuario['nombre']);

            // Definimos las rutas de redirección según el rol
            $redirectRoutes = [
                'Administrador' => 'dashboard/admin',
                'Especialista' => '/doc',
                'Enfermera' => '/enfer',
                'Recepcionista' => '/recep',
                'Paciente' => '/paciente'
            ];

            if (isset($redirectRoutes[$nombreRol['rol_nombre']])) {

                return redirect()->to($redirectRoutes[$nombreRol['rol_nombre']]);
            } else {
                return redirect()->to('/inicio');
            }
        } else {
            Alerta("error", "Datos Incorrectos", "Verifique sus credenciales de acceso", "/login");
            return redirect()->to('/')->with('error', 'Nombre de usuario o contraseña incorrectos');
        }
    }

    public function modalSalir()
    {
        return view('modulos/cerrar-sesion');
    }

    public function logout()
    {

        $this->session->remove('logeado'); // O clave de tu array.
        session_destroy();

        return view('modulos/login');
    }
}
