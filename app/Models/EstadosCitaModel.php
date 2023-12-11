<?php

namespace App\Models;

use CodeIgniter\Model;

class EstadosCitaModel extends Model
{
    protected $table = 'tbl_estado_cita';
    protected $primaryKey = 'id_estado_cita';
    protected $allowedFields = ['estado_nombre'];
}
