<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvinciaModel extends Model
{
    protected $table = 'tbl_provincia';
    protected $primaryKey = 'id_provincia';
    protected $foreignKey = 'id_region';
    protected $allowedFields = ['prov_nombre'];

    public function listarProvincias()
    {
        return $this->findAll();
    }

    public function obtenerProvinciasPorRegion($idRegion)
    {
        $query = $this->db->table('tbl_provincia')
            ->select('id_provincia, prov_nombre')
            ->where('id_region', $idRegion)
            ->get()
            ->getResultArray();
        return $query;
    }
}
