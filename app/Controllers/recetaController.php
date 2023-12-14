<?php


namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\TipoRecetaModel;
use App\Models\CitasModel;


class recetaController extends Controller
{
    private $session;
    private $tipoRecetaModel;
    private $citasModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->tipoRecetaModel = new TipoRecetaModel;
        $this->citasModel = new CitasModel;
    }
    public function index()
    {
        $tipos = $this->tipoRecetaModel->listartipoReceta();

        $data = ['tipos' => $tipos];

        return view('modulos/receta', $data);
    }

    public function rellenarReceta($idCita)
    {
        $datosCita = $this->citasModel->rellenarReceta($idCita);
        return $this->response->setJSON($datosCita);
    }
}
