<?php

namespace App\Models;

use CodeIgniter\Model;

class TipoRecetaModel extends Model
{
    protected $table = 'tbl_tipo_receta';
    protected $primaryKey = 'id_tipo_receta';
    protected $allowedFields = ['tipo_rec_nombre'];

    public function listartipoReceta()
    {
        return $this->findAll();
    }
}
