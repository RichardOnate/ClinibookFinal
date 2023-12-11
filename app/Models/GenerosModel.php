<?php

namespace App\Models;

use CodeIgniter\Model;

class GenerosModel extends Model
{
    protected $table = 'tbl_genero';
    protected $primaryKey = 'id_genero';
    protected $allowedFields = ['tipo_genero'];

    public function listarGeneros()
    {
        return $this->findAll();
    }
}
