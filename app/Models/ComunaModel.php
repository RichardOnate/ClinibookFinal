<?php

namespace App\Models;

use CodeIgniter\Model;

class ComunaModel extends Model
{
    protected $table = 'tbl_comuna';
    protected $primaryKey = 'id_comuna';
    protected $foreignKey = 'id_provincia';
    protected $allowedFields = ['com_nombre'];

    public function listarComunas()
    {
        return $this->findAll();
    }

    public function obtenerComunasPorProvincia($idProvincia)
    {
        $query = $this->db->table('tbl_comuna')
            ->select('id_comuna, com_nombre')
            ->where('id_provincia', $idProvincia)
            ->get()
            ->getResultArray();
        return $query;
    }
}
