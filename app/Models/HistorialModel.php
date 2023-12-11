<?php

namespace App\Models;

use CodeIgniter\Model;

class HistorialModel extends Model
{
    protected $table = 'tbl_historial';
    protected $primaryKey = 'id_historial';

    protected $allowedFields = [
        'historial_fecha',
    ];



    public function insertarHistorial()
    {
        $fecha = date('Y-m-d H:i:s');

        $data = [
            'historial_fecha' => $fecha,
        ];

        $this->db->table($this->table)->insert($data);
        return $this->db->insertID();
    }
}
