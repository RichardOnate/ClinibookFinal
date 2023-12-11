<?php

namespace App\Models;

use CodeIgniter\Model;

class PrevisionModel extends Model
{
    protected $table = 'tbl_prevision';
    protected $primaryKey = 'id_prevision';
    protected $allowedFields = ['prev_nombre'];


    public function listarPrevision()
    {
        return $this->findAll();
    }
}
