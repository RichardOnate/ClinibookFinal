<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleHistorialModel extends Model
{
    protected $table = 'tbl_detalle_historial';
    protected $primaryKey = 'id_detalle_historial';

    protected $allowedFields = [
        'id_ficha',
        'id_historial',
        'id_tipo_detalle',
        'historial_detalle',
    ];

    public function insertarDetalleHistorial($data)
    {
        $this->db->table('tbl_detalle_historial')
            ->insert($data);
        return $this->db->insertID();
    }
}
