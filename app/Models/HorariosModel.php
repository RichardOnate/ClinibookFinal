<?php

namespace App\Models;

use CodeIgniter\Model;

class HorariosModel extends Model
{
    protected $table = 'tbl_horarios';
    protected $primaryKey = 'id_horario';
    protected $allowedFields = ['hor_hora_medica'];

    public function listarHorarios()
    {
        return $this->findAll();
    }
}
