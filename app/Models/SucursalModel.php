<?php

namespace App\Models;

use CodeIgniter\Model;

class SucursalModel extends Model
{
    protected $table = 'tbl_sucursal';
    protected $primaryKey = 'id_sucursal';
    protected $allowedFields = [
        'id_empresa', 'id_region', 'id_provincia', 'id_comuna',
        'suc_direccion', 'suc_celular', 'suc_mail', 'eliminado'
    ];

    protected $validationRules = [
        'id_empresa' => 'required|integer',
        'id_region' => 'required|integer',
        'id_provincia' => 'required|integer',
        'id_comuna' => 'required|integer',
        'suc_direccion' => 'required|max_length[50]',
        'suc_celular' => 'required|integer|exact_length[9]',
        'suc_mail' => 'required|max_length[50]',

    ];

    protected $useSoftDeletes = true;
    protected $deletedField = 'eliminado';

    public function listarSucursal()
    {
        $query = $this->db->table('tbl_sucursal s')
            ->select('s.id_sucursal AS ID, CONCAT("Sucursal ", c.com_nombre) AS SUCURSAL')
            ->join('tbl_comuna c', 'c.id_comuna = s.id_comuna')
            ->where('s.eliminado', 0)
            ->get()
            ->getResultArray();
        return $query;
    }

    public function mostrarSucursales()
    {
        $query = $this->db->table('tbl_sucursal s')
            ->select('s.id_sucursal as ID, e.emp_nombre AS EMPRESA, CONCAT(e.emp_direccion, \', \', c_empresa.com_nombre) AS "CASA MATRIZ", c_sucursal.com_nombre AS SUCURSAL, s.suc_direccion AS DIRECCION, s.suc_mail AS CORREO, s.suc_celular AS CELULAR')
            ->join('tbl_empresa e', 'e.id_empresa = s.id_empresa')
            ->join('tbl_comuna c_sucursal', 's.id_comuna = c_sucursal.id_comuna')
            ->join('tbl_comuna c_empresa', 'e.id_comuna = c_empresa.id_comuna')
            ->where('s.eliminado', 0)
            ->get()
            ->getResultArray();
        return $query;
    }

    public function insertarSucursal($data)
    {
        $query = $this->db->table('tbl_sucursal')->insert($data);
        if ($query) {
            Alerta("success", "Sucursal agregada correctamente", "", "/dashboard/admin");
        } else {
            Alerta("error", "Error al agregar sucursal", "", "/dashboard/admin");
        }
    }

    public function modalEditarS($id)
    {
        $query = $this->db->table('tbl_sucursal s')
            ->select('s.id_sucursal AS ID, s.suc_direccion AS DIRECCION, s.suc_mail AS CORREO, 
            s.suc_celular AS CELULAR, r.id_region AS IDR, p.id_provincia AS IDP, c.id_comuna AS IDC')
            ->join('tbl_region r', 'r.id_region = s.id_region')
            ->join('tbl_provincia p', 'p.id_provincia = s.id_provincia')
            ->join('tbl_comuna c', 'c.id_comuna = s.id_comuna')
            ->where('s.id_sucursal', $id)->get()
            ->getRowArray();
        return $query;
    }

    public function actualizarSucursal($id, $direccion, $correo, $celular, $region, $provincia, $comuna)
    {
        $datosSucursal = [
            'suc_direccion' => $direccion,
            'suc_mail' => $correo,
            'suc_celular' => $celular,
            'id_region' => $region,
            'id_provincia' => $provincia,
            'id_comuna' => $comuna
        ];

        $actualizarSucursal = $this->db->table('tbl_sucursal')
            ->where('id_sucursal', $id)
            ->update($datosSucursal);

        if ($actualizarSucursal) {
            Alerta("success", "Sucursal actualizada correctamente", "", "/dashboard/admin");
        } else {
            Alerta("error", "Error al actualizar sucursal", "", "/dashboard/admin");
        }
    }

    public function eliminarSucursal($id)
    {
        $query = $this->update($id, ['eliminado' => 1]);

        if ($query) {
            Alerta("success", "Se ha eliminado la sucursal", " ", "/dashboard/admin");
        } else {
            Alerta("error", "No se pudo eliminar la sucursal.", " ", "/dashboard/admin");
        }
    }
}
