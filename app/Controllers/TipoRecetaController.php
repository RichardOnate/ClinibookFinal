<?php

namespace App\Controllers;

use App\Models\TipoRecetaModel;
use CodeIgniter\Controller;
use CodeIgniter\API\ResponseTrait;

class TipoRecetaController extends Controller
{
    use ResponseTrait;

    public function listarTipoRecetas()
    {
        $tipoReceta = new TipoRecetaModel();

        $recetas = $tipoReceta->findAll();

        if (!empty($recetas)) {
            return $this->response->setJSON($recetas);
        } else {
            return $this->response->setStatusCode(204);
        }
    }
}
