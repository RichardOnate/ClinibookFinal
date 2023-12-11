<?php

namespace App\Models;

use CodeIgniter\Model;

class FichaMedicaModel extends Model
{
    protected $table = 'tbl_ficha_medica';
    protected $primaryKey = 'id_ficha';

    protected $allowedFields = [
        'id_paciente',
        'fm_ficha',
    ];

    public function existeFichaMedica($idPaciente)
    {
        return $this->where('id_paciente', $idPaciente)->countAllResults() > 0;
    }
    public function insertarFichaMedica($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function obtenerFichaMedica($idPaciente)
    {
        $result = $this->select('id_ficha')
            ->where('id_paciente', $idPaciente)
            ->get()
            ->getRowArray();

        return $result['id_ficha'] ?? null;
    }
}
