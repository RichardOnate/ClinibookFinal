<?php

namespace App\Models;


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

    public function citasHoy()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_cita c')
            ->select('COUNT(*) as totalCitas')
            ->join('tbl_trabajador t', 't.id_trabajador = c.id_trabajador')
            ->join('tbl_usuario u', 'u.id_usuario = t.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->get();

        return $query->getRow();
    }

    public function datosCitas()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_cita c')
            ->select("p.id_paciente as ID, DATE_FORMAT(c.cita_fecha, '%d/%m/%y') as FECHA, CONCAT(p.pac_nombres, ' ', p.pac_apellidos) AS 'NOMBRE PACIENTE', 
            CONCAT(TIME_FORMAT(h.hor_hora_medica, '%H:%i'), ' HORAS') as HORARIO")
            ->join('tbl_paciente p', 'p.id_paciente = c.id_paciente')
            ->join('tbl_horarios h', 'h.id_horario = c.id_horario')
            ->join('tbl_trabajador t', 't.id_trabajador = c.id_trabajador')
            ->join('tbl_usuario u', 'u.id_usuario = t.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->where('DATE(c.cita_fecha)', date('Y-m-d'))
            ->get()
            ->getResultArray();
        return $query;
    }
}
