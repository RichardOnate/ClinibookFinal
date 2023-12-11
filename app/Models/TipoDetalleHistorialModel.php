<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoDetalleHistorialModel extends Model
{
    protected $table = 'tbl_tipo_detalle_historial';
    protected $primaryKey = 'id_tipo_detalle';
    protected $allowedFields = ['tipo_det_nombre'];

    public function listarTipoDetalle()
    {
        return $this->findAll();
    }
}
