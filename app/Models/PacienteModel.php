<?php

namespace App\Models;

use CodeIgniter\Model;

require_once APPPATH . 'helpers/Alertas.php';
class PacienteModel extends Model
{
    protected $table = 'tbl_paciente';
    protected $primaryKey = 'id_paciente';
    protected $allowedFields = [
        'id_genero', 'id_sucursal', 'id_prevision', 'id_usuario',
        'pac_rut', 'pac_nombres', 'pac_apellidos', 'pac_fecha_nac',
        'pac_celular', 'pac_correo', 'eliminado'
    ];

    protected $validationRules = [
        'id_genero' => 'required|integer',
        'id_sucursal' => 'permit_empty|integer',
        'id_prevision' => 'required|integer',
        'id_usuario' => 'permit_empty|integer',
        'pac_rut' => 'required|max_length[10]',
        'pac_nombres' => 'required|max_length[25]',
        'pac_apellidos' => 'required|max_length[25]',
        'pac_fecha_nac' => 'permit_empty|date',
        'pac_celular' => 'required|integer|exact_length[9]',
        'pac_correo' => 'required|valid_email|max_length[30]',
    ];

    protected $skipValidaciones = false;
    protected $useSoftDeletes = true;
    protected $deletedField  = 'eliminado';

    private $session;
    public function __construct()
    {
        parent::__construct();
        $this->session = \Config\Services::session();
    }
    public function totalPacientes()
    {
        return $this->countAll();
    }

    public function pacienteExiste($rut, $correo)
    {
        $query = $this->db->table($this->table);
        return $query->where('pac_rut', $rut)->orWhere('pac_correo', $correo)->countAllResults() > 0;
    }


    public function insertPaciente($data)
    {
        $this->db->table($this->table)->insert($data);
        return $this->db->insertID();
    }


    public function listarPacientes()
    {
        $query = $this->db->table('tbl_paciente p')
            ->select('p.id_paciente as ID, p.pac_rut as RUT, concat(p.pac_nombres, " ", p.pac_apellidos) as "NOMBRE COMPLETO", 
            concat(t.trab_nombres, " ", t.trab_apellidos) as ESPECIALISTA, p.pac_celular as CELULAR, e.estado_nombre as "ESTADO CITA"')
            ->join('tbl_cita c', 'p.id_paciente = c.id_paciente')
            ->join('tbl_trabajador t', 't.id_trabajador = c.id_trabajador')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita e', 'cc.id_estado_cita = e.id_estado_cita')
            ->where('p.eliminado', 0)
            ->get()
            ->getResultArray();
        return $query;
    }


    public function modalEditar($id)
    {
        $query = $this->db->table('tbl_paciente p')
            ->select('p.id_paciente as ID, p.pac_rut as RUT, p.pac_nombres as NOMBRES, p.pac_apellidos as APELLIDOS,
            p.pac_celular as CELULAR, p.pac_correo as CORREO')
            ->where('p.id_paciente', $id)
            ->get()
            ->getRowArray();
        return $query;
    }

    public function actualizarPacienteM($id, $rut, $nombres, $apellidos, $celular, $correo, $rutaRedireccion)
    {

        $data_paciente = [
            'pac_rut' => $rut,
            'pac_nombres' => $nombres,
            'pac_apellidos' => $apellidos,
            'pac_celular' => $celular,
            'pac_correo' => $correo
        ];

        $actualizacionPaciente = $this->db->table('tbl_paciente')
            ->where('id_paciente', $id)
            ->update($data_paciente);

        if ($actualizacionPaciente) {
            Alerta("success", "Información actualizada correctamente.", "", $rutaRedireccion);
        } else {
            Alerta("error", "Error al actualizar la información.", "", $rutaRedireccion);
        }
    }

    public function eliminarPaciente($id)
    {
        $query = $this->update($id, ['eliminado' => 1]);

        if ($query) {
            Alerta("success", "Se ha eliminado el paciente", " ", "/admin-paci");
        } else {
            Alerta("error", "No se pudo eliminar el paciente.", " ", "/admin-paci");
        }
    }


    public function actualizarPacienteD($id, $rut, $nombres, $apellidos, $celular, $correo, $fechaNac, $genero, $prevision)
    {
        $loginModel = new LoginModel();
        $fichaMedicaModel = new FichaMedicaModel(); // Agrega la instancia del modelo de ficha médica

        $idRol = 5;
        $passwordRut = str_replace("-", "", $rut);
        $idUsuarioExistente = $loginModel->usuarioExiste($rut);

        if (!$idUsuarioExistente) {
            $dataUsuario = [
                'usu_nombre' => $rut,
                'usu_pass' => password_hash($passwordRut, PASSWORD_DEFAULT),
                'id_rol' => $idRol
            ];

            $idUsuario = $loginModel->insertarUsuario($dataUsuario);

            if (!$idUsuario) {
                // Mostrar una alerta de error
                Alerta("error", "Error al insertar el usuario", "", "");
                return;
            }
        } else {
            $idUsuario = $idUsuarioExistente;
        }

        // Paso 2: Actualizar datos del paciente con el ID del usuario insertado
        $data_paciente = [
            'pac_rut' => $rut,
            'pac_nombres' => $nombres,
            'pac_apellidos' => $apellidos,
            'pac_celular' => $celular,
            'pac_correo' => $correo,
            'pac_fecha_nac' => $fechaNac,
            'id_genero' => $genero,
            'id_prevision' => $prevision,
            'id_usuario' => $idUsuario, // Usar el ID del usuario insertado
        ];

        $this->db->transStart();

        $resultActualizacion = $this->db->table('tbl_paciente')->where('id_paciente', $id)->update($data_paciente);

        if ($resultActualizacion) {
            // Validar si ya existe una ficha médica para este paciente
            if (!$fichaMedicaModel->existeFichaMedica($id)) {
                // Insertar ficha médica solo si no existe
                $dataFichaMedica = [
                    'id_paciente' => $id,
                    'fm_ficha' => null,
                ];

                $fichaMedicaModel->insertarFichaMedica($dataFichaMedica);
            }

            $this->db->transComplete();

            if ($this->db->transStatus()) {
                Alerta("success", "Se ha actualizado el paciente correctamente", "", "/doc-atencion/$id");
            } else {
                Alerta("error", "Error al actualizar el paciente", "", "/doc-atencion/$id");
            }
        } else {
            $this->db->transRollback();
            Alerta("error", "Error al actualizar el paciente", "", "/doc-atencion/$id");
        }
    }

    public function atenderPaciente($id)
    {
        $query = $this->db->table('tbl_paciente p')
            ->select('p.id_paciente AS ID, p.pac_rut as RUT, p.pac_nombres AS NOMBRES, p.pac_apellidos AS APELLIDOS, 
            p.pac_fecha_nac as FECHA_NAC, p.pac_celular AS CELULAR, p.pac_correo AS CORREO, pv.id_prevision AS IDP, g.id_genero AS IDG, c.id_cita as IDC')
            ->join('tbl_prevision pv', 'pv.id_prevision = p.id_prevision')
            ->join('tbl_genero g', 'g.id_genero = p.id_genero')
            ->join('tbl_cita c', 'p.id_paciente = c.id_paciente')
            ->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->where('p.id_paciente', $id)
            ->get()
            ->getRowArray();
        return $query;
    }
    public function atenderPacienteRut($rut)
    {
        $query = $this->db->table('tbl_paciente p')
            ->select('p.id_paciente AS ID, p.pac_rut as RUT, p.pac_nombres AS NOMBRES, p.pac_apellidos AS APELLIDOS, 
            p.pac_fecha_nac as FECHA_NAC, p.pac_celular AS CELULAR, p.pac_correo AS CORREO, 
        pv.id_prevision AS IDP, g.id_genero AS IDG, c.id_cita as IDC')
            ->join('tbl_prevision pv', 'pv.id_prevision = p.id_prevision')
            ->join('tbl_genero g', 'g.id_genero = p.id_genero')
            ->join('tbl_cita c', 'p.id_paciente = c.id_paciente')
            ->where('p.pac_rut', $rut)
            ->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->get()
            ->getRowArray();
        return $query;
    }
    //DATE_FORMAT(p.pac_fecha_nac, "%d/%m/%Y")
    public function detalleHistorial($idPaciente, $tipodetalle, $detalleCita)
    {

        $fichaModel = new FichaMedicaModel();
        $idFicha = $fichaModel->obtenerFichaMedica($idPaciente);

        if (empty($idFicha)) {
            Alerta("error", "Error al obtener la ficha médica", "", "/doc-atencion/$idPaciente");
            return;
        } else {

            $historialModel = new HistorialModel();
            $idHistorial = $historialModel->insertarHistorial();

            if (!$idHistorial) {
                Alerta("error", "Error al insertar el historial", "", "/doc-atencion/$idPaciente");
                return;
            } else {

                $detalleHistorialModel = new DetalleHistorialModel();
                $dataDetalleHistorial = [
                    'id_ficha' => $idFicha,
                    'id_historial' => $idHistorial,
                    'id_tipo_detalle' => $tipodetalle,
                    'historial_detalle' => $detalleCita,
                ];

                $query = $detalleHistorialModel->insertarDetalleHistorial($dataDetalleHistorial);

                if ($query) {
                    Alerta("success", "Se ha insertado el detalle del historial correctamente", "", "/doc-atencion/$idPaciente");
                } else {
                    Alerta("error", "Error al insertar el detalle del historial", "", "/doc-atencion/$idPaciente");
                }
            }
        }
    }

    public function perfilPaciente()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_paciente p')
            ->select('p.id_paciente AS ID, p.pac_rut as RUT, p.pac_nombres AS NOMBRES, p.pac_apellidos AS APELLIDOS, 
            p.pac_fecha_nac as FECHA_NAC, p.pac_celular AS CELULAR, p.pac_correo AS CORREO, pv.id_prevision AS IDP, g.id_genero AS IDG, u.usu_nombre as USUARIO')
            ->join('tbl_prevision pv', 'pv.id_prevision = p.id_prevision')
            ->join('tbl_genero g', 'g.id_genero = p.id_genero')
            ->join('tbl_usuario u', 'u.id_usuario = p.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->get()
            ->getRowArray();
        return $query;
    }

    public function actualizarPerfil($rut, $nombres, $apellidos, $celular, $correo, $fechaNac, $genero, $prevision, $usuario, $pass, $repetirpass, $rutaRedireccion)
    {
        if ($pass != $repetirpass) {
            Alerta("error", "Las contraseñas deben ser iguales.", "", $rutaRedireccion);
            return;
        }

        $idUsuario = session('id_usuario');
        $data_paciente = [
            'pac_rut' => $rut,
            'pac_nombres' => $nombres,
            'pac_apellidos' => $apellidos,
            'pac_celular' => $celular,
            'pac_fecha_nac' => $fechaNac,
            'pac_correo' => $correo,
            'id_genero' => $genero,
            'id_prevision' => $prevision,

        ];

        $actualizacionPaciente = $this->db->table('tbl_paciente')
            ->where('id_usuario', $idUsuario)
            ->update($data_paciente);

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

        if ($actualizacionPaciente) {
            Alerta("success", "Información actualizada correctamente.", "", $rutaRedireccion);
        } else {
            Alerta("error", "Error al actualizar la información.", "", $rutaRedireccion);
        }
    }

    public function verPacienteRut($rut)
    {
        $query = $this->db->table('tbl_paciente p')
            ->select('p.id_paciente AS ID, p.pac_rut as RUT, p.pac_nombres AS NOMBRES, p.pac_apellidos AS APELLIDOS, 
            p.pac_fecha_nac as FECHA_NAC, p.pac_celular AS CELULAR, p.pac_correo AS CORREO, 
        pv.id_prevision AS IDP, g.id_genero AS IDG, DATE_FORMAT(h.historial_fecha, "%d/%m/%Y") as FECHA, 
        td.tipo_det_nombre as DIAGNOSTICO, dh.historial_detalle as DETALLE')
            ->join('tbl_prevision pv', 'pv.id_prevision = p.id_prevision')
            ->join('tbl_genero g', 'g.id_genero = p.id_genero')
            ->join('tbl_ficha_medica fm', 'p.id_paciente = fm.id_paciente')
            ->join('tbl_detalle_historial dh', 'fm.id_ficha = dh.id_ficha')
            ->join('tbl_tipo_detalle_historial td', 'td.id_tipo_detalle = dh.id_tipo_detalle')
            ->join('tbl_historial h', 'h.id_historial = dh.id_ficha')
            ->where('p.pac_rut', $rut)
            ->get()
            ->getRowArray();
        return $query;
    }

    public function nombrePaciente($idUsuario)
    {
        $query = $this->db->table('tbl_paciente p')
            ->select("CONCAT(p.pac_nombres, ' ', p.pac_apellidos) as nombre")
            ->join('tbl_usuario u', 'u.id_usuario = p.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->get()
            ->getRowArray();
        return $query;
    }

    public function buscarPacienteRut($rut)
    {
        $query = $this->db->table('tbl_paciente p')
            ->select('p.id_paciente AS ID, p.pac_rut as RUT, p.pac_nombres AS NOMBRES, p.pac_apellidos AS APELLIDOS, 
            p.pac_fecha_nac as FECHA_NAC, p.pac_celular AS CELULAR, p.pac_correo AS CORREO, 
        pv.id_prevision AS IDP, g.id_genero AS IDG')
            ->join('tbl_prevision pv', 'pv.id_prevision = p.id_prevision')
            ->join('tbl_genero g', 'g.id_genero = p.id_genero')
            ->where('p.pac_rut', $rut)
            ->get()
            ->getRowArray();
        return $query;
    }

    public function actualizarPacienteE($id, $rut, $nombres, $apellidos, $fechaNac, $celular, $correo, $genero, $prevision, $rutaRedireccion)
    {

        $data_paciente = [
            'pac_rut' => $rut,
            'pac_nombres' => $nombres,
            'pac_apellidos' => $apellidos,
            'pac_fecha_nac' => $fechaNac,
            'pac_celular' => $celular,
            'pac_correo' => $correo,
            'id_prevision' => $prevision,
            'id_genero' => $genero,
        ];

        $actualizacionPaciente = $this->db->table('tbl_paciente')
            ->where('id_paciente', $id)
            ->update($data_paciente);

        if ($actualizacionPaciente) {
            Alerta("success", "Información actualizada correctamente.", "", $rutaRedireccion);
        } else {
            Alerta("error", "Error al actualizar la información.", "", $rutaRedireccion);
        }
    }
}
