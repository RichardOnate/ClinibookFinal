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
            p.pac_correo as CORREO, p.pac_celular as CELULAR, e.estado_nombre as "ESTADO CITA"')
            ->join('tbl_cita c', 'p.id_paciente = c.id_paciente')
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

    public function atenderPaciente($id)
    {
        $query = $this->db->table('tbl_paciente p')
            ->select('p.id_paciente AS ID, p.pac_nombres AS NOMBRES, p.pac_apellidos AS APELLIDOS, 
            p.pac_celular AS CELULAR, p.pac_correo AS CORREO, pv.id_prevision AS IDP, g.id_genero AS IDG')
            ->join('tbl_prevision pv', 'pv.id_prevision = p.id_prevision')
            ->join('tbl_genero g', 'g.id_genero = p.id_genero')
            ->where('p.id_paciente', $id)
            ->get()
            ->getRowArray();
        return $query;
    }
}
