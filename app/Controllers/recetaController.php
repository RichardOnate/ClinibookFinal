<?php


namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\TipoRecetaModel;


class recetaController extends Controller
{
    private $session;
    private $tipoRecetaModel;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->tipoRecetaModel = new TipoRecetaModel;
    }
    public function index()
    {
        $tipos = $this->tipoRecetaModel->listartipoReceta();

        $data = ['tipos' => $tipos];

        return view('modulos/receta', $data);
    }
}
