<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpresaModel extends Model
{
    protected $table = 'tbl_empresa';
    protected $primaryKey = 'id_empresa';
    protected $allowedFields = [
        'id_region', 'id_provincia', 'id_comuna', 'emp_nombre',
        'emp_direccion', 'emp_telefono', 'emp_mail', 'emp_web', 'eliminado',
    ];

    protected $useSoftDeletes = false;

    protected $useTimestamps = false;

    public function listarEmpresa()
    {
        $query = $this->db->table('tbl_empresa')
            ->select('id_empresa, emp_nombre')
            ->get()
            ->getResultArray();
        return $query;
    }
}
