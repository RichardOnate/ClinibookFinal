<?php

namespace App\Models;

use CodeIgniter\Model;

class RolModel extends Model
{
    protected $table = 'tbl_roles';
    protected $primaryKey = 'id_rol';
    protected $allowedFields = ['rol_nombre'];

    public function listarRoles()
    {
        return $this->findAll();
    }
}
