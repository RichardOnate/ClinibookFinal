<?php

namespace App\Models;

require_once APPPATH . 'helpers/Alertas.php';

use CodeIgniter\Model;

class CitasModel extends Model
{
    private $session;
    protected $table = 'tbl_cita';
    protected $primaryKey = 'id_cita';
    protected $allowedFields = ['id_paciente', 'id_trabajador', 'id_horario', 'cita_fecha'];

    public function __construct()
    {
        parent::__construct();
        $this->session = \Config\Services::session();
    }
    public function totalCitas()
    {
        return $this->countAll();
    }


    public function insertCita($data)
    {
        $this->db->table('tbl_cita')->insert($data);
        return $this->db->insertID();
    }

    public function insertConfirmacionCita($data)
    {
        $this->db->table('tbl_confirmaciones_citas')->insert($data);
    }

    public function totalCitasHoy()
    {
        $query = $this->db->table('tbl_cita c')
            ->select('COUNT(*) as totalCitas')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita ec', 'ec.id_estado_cita = cc.id_estado_cita')
            ->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->where('ec.estado_nombre', 'Confirmada')
            ->get();

        return $query->getRow();
    }

    public function totalCitasAtendidas()
    {
        $query = $this->db->table('tbl_cita c')
            ->select('COUNT(*) as totalCitas')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita ec', 'ec.id_estado_cita = cc.id_estado_cita')
            ->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->where('ec.estado_nombre', 'Atendida')
            ->get();

        return $query->getRow();
    }

    public function totalCitasCanceladas()
    {
        $query = $this->db->table('tbl_cita c')
            ->select('COUNT(*) as totalCitas')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita ec', 'ec.id_estado_cita = cc.id_estado_cita')
            ->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->where('ec.estado_nombre', 'Cancelada')
            ->get();

        return $query->getRow();
    }

    ////////////////////////////////////////////////////////////////

    public function misCitasTotales()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_cita c')
            ->select('COUNT(*) as totalCitas')
            ->join('tbl_paciente p', 'p.id_paciente = c.id_paciente')
            ->join('tbl_usuario u', 'u.id_usuario = p.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->get();

        return $query->getRow();
    }
    public function misCitasAtendidas()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_cita c')
            ->select('COUNT(*) as totalCitas')
            ->join('tbl_paciente p', 'p.id_paciente = c.id_paciente')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita ec', 'ec.id_estado_cita = cc.id_estado_cita')
            ->join('tbl_usuario u', 'u.id_usuario = p.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->where('ec.estado_nombre', 'Atendida')
            ->get();

        return $query->getRow();
    }

    public function misCitasCanceladas()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_cita c')
            ->select('COUNT(*) as totalCitas')
            ->join('tbl_paciente p', 'p.id_paciente = c.id_paciente')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita ec', 'ec.id_estado_cita = cc.id_estado_cita')
            ->join('tbl_usuario u', 'u.id_usuario = p.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->where('ec.estado_nombre', 'Cancelada')
            ->get();

        return $query->getRow();
    }

    public function misCitas()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_cita c')
            ->select("p.id_paciente as ID, c.id_cita as IDC, DATE_FORMAT(c.cita_fecha, '%d/%m/%y') as FECHA, CONCAT(t.trab_nombres, ' ', t.trab_apellidos) AS 'ESPECIALISTA', 
            CONCAT(TIME_FORMAT(h.hor_hora_medica, '%H:%i'), ' HORAS') as HORARIO, ec.estado_nombre as ESTADO CITA")
            ->join('tbl_paciente p', 'p.id_paciente = c.id_paciente')
            ->join('tbl_horarios h', 'h.id_horario = c.id_horario')
            ->join('tbl_trabajador t', 't.id_trabajador = c.id_trabajador')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita ec', 'ec.id_estado_cita = cc.id_estado_cita')
            ->join('tbl_usuario u', 'u.id_usuario = p.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->where('ec.estado_nombre', 'Agendada')
            ->orderBy('HORARIO', 'ASC')
            ->orderBy('FECHA', 'ASC')
            ->get()
            ->getResultArray();
        return $query;
    }

    ////////////////////////////////////////////////////////////
    public function citasHoy()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_cita c')
            ->select('COUNT(*) as totalCitas')
            ->join('tbl_paciente p', 'p.id_paciente = c.id_paciente')
            ->join('tbl_horarios h', 'h.id_horario = c.id_horario')
            ->join('tbl_trabajador t', 't.id_trabajador = c.id_trabajador')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita ec', 'ec.id_estado_cita = cc.id_estado_cita')
            ->join('tbl_usuario u', 'u.id_usuario = t.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->where('ec.estado_nombre', 'Confirmada')
            ->get();

        return $query->getRow();
    }

    public function datosCitas()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_cita c')
            ->select("p.id_paciente as ID, c.id_cita as IDC, DATE_FORMAT(c.cita_fecha, '%d/%m/%y') as FECHA, CONCAT(p.pac_nombres, ' ', p.pac_apellidos) AS 'NOMBRE PACIENTE', 
            CONCAT(TIME_FORMAT(h.hor_hora_medica, '%H:%i'), ' HORAS') as HORARIO")
            ->join('tbl_paciente p', 'p.id_paciente = c.id_paciente')
            ->join('tbl_horarios h', 'h.id_horario = c.id_horario')
            ->join('tbl_trabajador t', 't.id_trabajador = c.id_trabajador')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita ec', 'ec.id_estado_cita = cc.id_estado_cita')
            ->join('tbl_usuario u', 'u.id_usuario = t.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->where('ec.estado_nombre', 'Confirmada')
            ->orderBy('HORARIO', 'ASC')
            ->get()
            ->getResultArray();
        return $query;
    }

    public function citasCanceladasHoy()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_cita c')
            ->select('COUNT(*) as totalCancel')
            ->join('tbl_paciente p', 'p.id_paciente = c.id_paciente')
            ->join('tbl_horarios h', 'h.id_horario = c.id_horario')
            ->join('tbl_trabajador t', 't.id_trabajador = c.id_trabajador')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita ec', 'ec.id_estado_cita = cc.id_estado_cita')
            ->join('tbl_usuario u', 'u.id_usuario = t.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->where('ec.estado_nombre', 'Cancelada')
            ->get();

        return $query->getRow();
    }

    public function citasAtendidasHoy()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_cita c')
            ->select('COUNT(*) as totalAtend')
            ->join('tbl_paciente p', 'p.id_paciente = c.id_paciente')
            ->join('tbl_horarios h', 'h.id_horario = c.id_horario')
            ->join('tbl_trabajador t', 't.id_trabajador = c.id_trabajador')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita ec', 'ec.id_estado_cita = cc.id_estado_cita')
            ->join('tbl_usuario u', 'u.id_usuario = t.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->where('ec.estado_nombre', 'Atendida')
            ->get();
        return $query->getRow();
    }

    public function disponibilidadCitas($idTrabajador, $idHorario, $rutaRedireccion)
    {
        $query = $this->db->table('tbl_cita c')
            ->select('COUNT(*) as count')
            ->join('tbl_trabajador t', 't.id_trabajador = c.id_trabajador')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita ec', 'ec.id_estado_cita = cc.id_estado_cita')
            ->join('tbl_horarios h', 'h.id_horario = c.id_horario')
            ->where('t.id_trabajador', $idTrabajador)
            ->where('ec.estado_nombre', 'Agendada')
            ->where('c.id_horario', $idHorario)
            ->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->get();

        $resultado = $query->getRow();

        if ($resultado->count == 1) {
            Alerta("error", "Cita no disponible.", "Ingrese otro horario o seleccione otro especialista ", $rutaRedireccion);
        }
    }

    public function rellenarReceta($idCita)
    {
        $query = $this->db->table('tbl_cita c')
            ->select('t.id_trabajador as IDT, h.id_historial as IDH, CONCAT(t.trab_nombres, " ", t.trab_apellidos) as ESPECIALISTA, 
            CONCAT(p.pac_nombres, " ", p.pac_apellidos) as NOMBRES, p.pac_rut as RUT')
            ->join('tbl_trabajador t', 't.id_trabajador = c.id_trabajador')
            ->join('tbl_paciente p', 'p.id_paciente = c.id_paciente')
            ->join('tbl_ficha_medica fm', 'p.id_paciente = fm.id_paciente')
            ->join('tbl_detalle_historial dh', 'fm.id_ficha = dh.id_ficha')
            ->join('tbl_historial h', 'h.id_historial = dh.id_ficha')
            ->where('c.id_cita', $idCita)
            ->get()
            ->getRowArray();

        return $query;
    }

    public function atenderPaciente($id)
    {
        $query = $this->db->table('tbl_estado_cita')
            ->select('id_estado_cita')
            ->where('estado_nombre', 'Atendiendo')
            ->get();
        $data = ['id_estado_cita' => $query->getRow()->id_estado_cita,];
        $this->db->table('tbl_confirmaciones_citas')
            ->where('id_cita', $id)
            ->update($data);
    }

    public function finalizarAtencion($id)
    {
        $query = $this->db->table('tbl_estado_cita')
            ->select('id_estado_cita')
            ->where('estado_nombre', 'Atendida')
            ->get();

        $data = ['id_estado_cita' => $query->getRow()->id_estado_cita,];
        $finalizada = $this->db->table('tbl_confirmaciones_citas')
            ->where('id_cita', $id)
            ->update($data);

        if ($finalizada) {
            Alerta("success", "Cita finalizada correctamente", "", '/doc');
        } else {
            Alerta("error", "No se pudo finalizar la cita", "", '/doc-atencion');
        }
    }

    public function confirmarCita($id)
    {
        $query = $this->db->table('tbl_estado_cita')
            ->select('id_estado_cita')
            ->where('estado_nombre', 'Confirmada')
            ->get();
        $data = ['id_estado_cita' => $query->getRow()->id_estado_cita,];
        $confirmada = $this->db->table('tbl_confirmaciones_citas')
            ->where('id_cita', $id)
            ->update($data);

        if ($confirmada) {
            Alerta("success", "Cita confirmada correctamente", "", '/');
        } else {
            Alerta("error", "No se pudo confirmar la cita", "", '/');
        }
    }

    public function cancelarCita($id)
    {
        $query = $this->db->table('tbl_estado_cita')
            ->select('id_estado_cita')
            ->where('estado_nombre', 'Cancelada')
            ->get();
        $data = ['id_estado_cita' => $query->getRow()->id_estado_cita,];
        $cancelada = $this->db->table('tbl_confirmaciones_citas')
            ->where('id_cita', $id)
            ->update($data);

        if ($cancelada) {
            Alerta("success", "Cita cancelada correctamente", "", '/');
        } else {
            Alerta("error", "No se pudo cancelar la cita", "", '/');
        }
    }

    public function cancelarCitaDoc($id)
    {
        $query = $this->db->table('tbl_estado_cita')
            ->select('id_estado_cita')
            ->where('estado_nombre', 'Cancelada')
            ->get();
        $data = ['id_estado_cita' => $query->getRow()->id_estado_cita,];
        $cancelada = $this->db->table('tbl_confirmaciones_citas')
            ->where('id_cita', $id)
            ->update($data);

        if ($cancelada) {
            Alerta("success", "Cita cancelada correctamente", "", '/doc');
        } else {
            Alerta("error", "No se pudo cancelar la cita", "", '/doc');
        }
    }

    public function confirmarCitaPaciente($id)
    {
        $query = $this->db->table('tbl_estado_cita')
            ->select('id_estado_cita')
            ->where('estado_nombre', 'Confirmada')
            ->get();
        $data = ['id_estado_cita' => $query->getRow()->id_estado_cita,];
        $confirmada = $this->db->table('tbl_confirmaciones_citas')
            ->where('id_cita', $id)
            ->update($data);

        if ($confirmada) {
            Alerta("success", "Cita confirmada correctamente", "", '/paciente');
        } else {
            Alerta("error", "No se pudo confirmar la cita", "", '/paciente');
        }
    }

    public function cancelarCitaPaciente($id)
    {
        $query = $this->db->table('tbl_estado_cita')
            ->select('id_estado_cita')
            ->where('estado_nombre', 'Cancelada')
            ->get();
        $data = ['id_estado_cita' => $query->getRow()->id_estado_cita,];
        $cancelada = $this->db->table('tbl_confirmaciones_citas')
            ->where('id_cita', $id)
            ->update($data);

        if ($cancelada) {
            Alerta("success", "Cita cancelada correctamente", "", '/paciente');
        } else {
            Alerta("error", "No se pudo cancelar la cita", "", '/paciente');
        }
    }

    public function citasHoyCalendario()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_cita c')
            ->select("c.cita_fecha as FECHA, CONCAT(p.pac_nombres, ' ', p.pac_apellidos) AS 'PACIENTE', 
            TIME_FORMAT(h.hor_hora_medica, '%H:%i') as HORARIO")
            ->join('tbl_paciente p', 'p.id_paciente = c.id_paciente')
            ->join('tbl_horarios h', 'h.id_horario = c.id_horario')
            ->join('tbl_trabajador t', 't.id_trabajador = c.id_trabajador')
            ->join('tbl_confirmaciones_citas cc', 'c.id_cita = cc.id_cita')
            ->join('tbl_estado_cita ec', 'ec.id_estado_cita = cc.id_estado_cita')
            ->join('tbl_usuario u', 'u.id_usuario = t.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            //->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->where('ec.estado_nombre', 'Confirmada')
            ->orderBy('HORARIO', 'ASC')
            ->get()
            ->getResultArray();
        return $query;
    }
}
