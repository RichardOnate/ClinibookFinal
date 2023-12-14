<?php


namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\CitasModel;

class confirmarCitaController extends Controller
{
    private $citasModel;

    public function __construct()
    {
        // Carga los modelos en el constructor
        $this->citasModel = new CitasModel;
    }
    public function index()
    {
        return view('modulos/confirmarCita');
    }

    public function confirmarCita($id)
    {
        $this->citasModel->confirmarCita($id);
    }

    public function cancelarCita($id)
    {
        $this->citasModel->cancelarCita($id);
    }
}
