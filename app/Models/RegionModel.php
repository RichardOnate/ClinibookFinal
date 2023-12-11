<?php

namespace App\Models;

use CodeIgniter\Model;

class RegionModel extends Model
{
    protected $table = 'tbl_region';
    protected $primaryKey = 'id_region';
    protected $allowedFields = ['reg_nombre'];

    public function listarRegiones()
    {
        return $this->findAll();
    }
}
