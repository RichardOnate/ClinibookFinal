<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class validarSesion implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = \Config\Services::session();
        $uri = service('uri');
        $currentRoute = $uri->getPath();

        // Excluir las rutas de inicio de sesión, about y contact
        $exclusions = ['login', 'agendar', 'recuperarPass', 'confirmarCita', 'confirm-cita', 'cancel-cita'];
        if (in_array($currentRoute, $exclusions)) {
            return;
        }

        // Verificar si el usuario está autenticado
        if (!$session->has('id_usuario')) {
            // Si no está autenticado, redirige al formulario de inicio de sesión
            return redirect()->to('/login');
        }
    }



    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Lógica después de ejecutar el controlador, si es necesario
    }
}
