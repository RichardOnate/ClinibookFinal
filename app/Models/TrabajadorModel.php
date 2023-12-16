<?php

namespace App\Models;

use CodeIgniter\Model;

require_once APPPATH . 'helpers/Alertas.php';


class TrabajadorModel extends Model
{
    private $session;
    public function __construct()
    {
        parent::__construct();
        $this->session = \Config\Services::session();
    }
    protected $table = 'tbl_trabajador';
    protected $primaryKey = 'id_trabajador';
    protected $allowedFields = [
        'id_sucursal', 'id_usuario',
        'trab_rut', 'trab_nombres', 'trab_apellidos', 'trab_celular', 'eliminado'
    ];

    protected $validationRules = [
        'id_sucursal' => 'required|integer',
        'id_usuario' => 'required|integer',
        'trab_rut' => 'required|max_length[10]',
        'trab_nombres' => 'required|max_length[25]',
        'trab_apellidos' => 'required|max_length[25]',
        'trab_celular' => 'required|integer|exact_length[9]',
    ];

    protected $MensajesValidacion = [
        'trab_rut' => ['valid_rut' => 'Favor ingrese un RUT válido'],
        'trab_celular' => ['valid_celular' => 'Favor ingrese un teléfono válido'],
    ];

    protected $skipValidaciones = false;
    protected $useSoftDeletes = true;
    protected $deletedField = 'eliminado';

    public function totalTrabajadores()
    {
        return $this->countAll();
    }
    public function listarEspecialistas()
    {
        $query = $this->db->table('tbl_trabajador t')
            ->select('t.id_trabajador AS ID, CONCAT(t.trab_nombres, " ", t.trab_apellidos) AS NOMBRE')
            ->join('tbl_usuario u', 'u.id_usuario = t.id_usuario')
            ->join('tbl_roles r', 'r.id_rol = u.id_rol')
            ->where('r.rol_nombre', 'Especialista')
            //->whereNotIn('t.id_trabajador', [1])
            ->get()
            ->getResultArray();
        return $query;
    }

    public function listarTrabajadores()
    {
        $query = $this->db->table('tbl_trabajador t')
            ->select('t.id_trabajador as ID, t.trab_rut as RUT, CONCAT(t.trab_nombres, " ", t.trab_apellidos) as "NOMBRE COMPLETO", 
            t.trab_celular as CELULAR, r.rol_nombre as ROL')
            ->join('tbl_usuario u', 'u.id_usuario = t.id_usuario')
            ->join('tbl_roles r', 'r.id_rol = u.id_rol')
            ->where('t.eliminado', 0)
            ->whereNotIn('t.id_trabajador', [1])
            ->get()
            ->getResultArray();

        return $query;
    }


    public function datosTrabajador()
    {
        $idUsuario = session('id_usuario');

        $query = $this->db->table('tbl_trabajador t')
            ->select('t.trab_rut as RUT, t.trab_nombres as NOMBRES, t.trab_apellidos as APELLIDOS, t.trab_celular as CELULAR,
            u.usu_nombre as USUARIO ')
            ->join('tbl_usuario u', 'u.id_usuario = t.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->get()
            ->getRowArray();

        return $query;
    }

    public function actualizarPerfil($idUsuario, $rut, $nombres, $apellidos, $celular, $usuario, $pass, $repetirpass, $rutaRedireccion)
    {
        if ($pass != $repetirpass) {
            Alerta("error", "Las contraseñas deben ser iguales.", "", $rutaRedireccion);
            return;
        }

        $dataTrab = [
            'trab_rut' => $rut,
            'trab_nombres' => $nombres,
            'trab_apellidos' => $apellidos,
            'trab_celular' => $celular,
        ];

        $actualizacionTrabajador = $this->set($dataTrab)
            ->where('id_usuario', $idUsuario)
            ->update();

        if (!empty($pass)) {
            $dataUsuario = [
                'usu_nombre' => $usuario,
                'usu_pass' => password_hash($pass, PASSWORD_DEFAULT),
            ];

            $actualizacionUsuario = $this->db->table('tbl_usuario')
                ->set($dataUsuario)
                ->where('id_usuario', $idUsuario)
                ->update();

            if ($actualizacionUsuario) {
                Alerta("success", "Datos de usuario actualizados correctamente.", "", $rutaRedireccion);
            } else {
                Alerta("error", "Error al actualizar datos de usuario.", "", $rutaRedireccion);
            }
        }

        if ($actualizacionTrabajador) {
            Alerta("success", "Datos personales actualizados correctamente.", "", $rutaRedireccion);
        } else {
            Alerta("error", "Error al actualizar datos personales.", "", $rutaRedireccion);
        }
    }

    public function actualizarTrabajador($id, $rut, $nombres, $apellidos, $celular, $rol, $rutaRedireccion)
    {

        $data_trabajador = [
            'trab_rut' => $rut,
            'trab_nombres' => $nombres,
            'trab_apellidos' => $apellidos,
            'trab_celular' => $celular
        ];

        $actualizacionTrabajador = $this->db->table('tbl_trabajador')
            ->where('id_trabajador', $id)
            ->update($data_trabajador);


        $id_usuario = $this->db->table('tbl_trabajador')
            ->where('id_trabajador', $id)
            ->get()
            ->getRow()
            ->id_usuario;

        $data_usuario = ['id_rol' => $rol];

        $actualizarRol = $this->db->table('tbl_usuario')
            ->where('id_usuario', $id_usuario)
            ->update($data_usuario);

        if ($actualizacionTrabajador && $actualizarRol) {
            Alerta("success", "Información actualizada correctamente.", "", $rutaRedireccion);
        } else {
            Alerta("error", "Error al actualizar la información.", "", $rutaRedireccion);
        }
    }


    public function trabRegistrado($rut)
    {
        $query = $this->db->table($this->table);
        return $query->where('trab_rut', $rut)->countAllResults() > 0;
    }
    public function insertarTrabajador($data)
    {

        $query = $this->db->table('tbl_trabajador')->insert($data);

        if ($query) {
            $mensaje = 'Los datos se han insertado correctamente junto con las credenciales por defecto.';
            Alerta("success", "Éxito", $mensaje, "/admin-trab");
        } else {
            $mensaje = 'Error al insertar los datos.';
            Alerta("error", "Error", $mensaje, "/admin-trab");
        }
    }
    public function modalEditar($id)
    {
        $query = $this->db->table('tbl_trabajador t')
            ->select('t.id_trabajador as ID, t.trab_rut as RUT, t.trab_nombres as NOMBRES, t.trab_apellidos as APELLIDOS,
            t.trab_celular as CELULAR, r.id_rol as IDR')
            ->join('tbl_usuario u', 'u.id_usuario = t.id_usuario')
            ->join('tbl_roles r', 'r.id_rol = u.id_rol')
            ->where('t.id_trabajador', $id)
            ->get()
            ->getRowArray();
        return $query;
    }

    public function nombreTrabajador($idUsuario)
    {
        //$idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_trabajador t')
            ->select("CONCAT(t.trab_nombres, ' ', t.trab_apellidos) as nombre")
            ->join('tbl_usuario u', 'u.id_usuario = t.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->get()
            ->getRowArray();
        return $query;
    }

    public function eliminarTrabajador($id)
    {
        $query = $this->update($id, ['eliminado' => 1]);

        if ($query) {
            Alerta("success", "Se ha eliminado el trabajador", " ", "/admin-trab");
        } else {
            Alerta("error", "No se pudo eliminar el trabajadador.", " ", "/admin-trab");
        }
    }
}
