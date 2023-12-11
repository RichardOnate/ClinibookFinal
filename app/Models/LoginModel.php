<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'tbl_usuario';
    protected $primaryKey = 'id_usuario';
    protected $allowedFields = ['usu_nombre', 'usu_pass', 'id_rol'];


    public function obtenerUsuario($usuario, $pass)
    {
        $usuarioEncontrado = $this->where('usu_nombre', $usuario)->first();

        if ($usuarioEncontrado && password_verify($pass, $usuarioEncontrado['usu_pass'])) {
            return $usuarioEncontrado;
        } else {
            return null;
        }
    }

    public function obtenerRol($nombreRol)
    {
        $rolModel = new RolModel();
        return $rolModel->find($nombreRol);
    }

    public function insertarUsuario($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function usuarioExiste($usuario)
    {
        $query = $this->db->table($this->table);
        $result = $query->select('id_usuario')
            ->where('usu_nombre', $usuario)
            ->get()
            ->getRowArray();
        return $result ? $result['id_usuario'] : false;
    }
}
