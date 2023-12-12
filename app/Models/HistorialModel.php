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

    public function obtenerHistorial($id)
    {
        $query = $this->db->table('tbl_detalle_historial dh')
            ->select('DATE_FORMAT(h.historial_fecha, "%d-%m-%Y") as FECHA, d.tipo_det_nombre as DIAGNOSTICO, dh.historial_detalle as OBSERVACIONES')
            ->join('tbl_historial h', 'h.id_historial = dh.id_historial')
            ->join('tbl_tipo_detalle_historial d', 'd.id_tipo_detalle = dh.id_tipo_detalle')
            ->join('tbl_ficha_medica f', 'f.id_ficha = dh.id_ficha')
            ->where('f.id_paciente', $id)
            ->orderBy('h.historial_fecha', 'desc')
            ->get()
            ->getResultArray();

        return $query;
    }
}
