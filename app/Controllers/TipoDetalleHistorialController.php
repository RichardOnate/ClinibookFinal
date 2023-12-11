<?php

namespace App\Controllers;

use App\Models\TipoDetalleHistorialModel;
use CodeIgniter\API\ResponseTrait;

class TipoDetalleHistorialController extends BaseController
{
    use ResponseTrait;

    public function listarTipoDetalleHis()
    {
        $tipoDetalleHis = new TipoDetalleHistorialModel();

        $detalleHis = $tipoDetalleHis->findAll();

        if (!empty($detalleHis)) {
            return $this->response->setJSON($detalleHis);
        } else {
            return $this->response->setStatusCode(204);
        }
    }
}
