<?php

namespace App\Models;

require_once APPPATH . 'helpers/Alertas.php';

use CodeIgniter\Model;

class RecetasModel extends Model
{
    protected $table = 'tbl_receta';
    protected $primaryKey = 'id_receta';
    protected $allowedFields = ['rec_fecha_emision', 'id_trabajador', 'id_tipo_receta', 'id_historial'];


    public function crearReceta($idTrabajador, $idTipoReceta, $idHistorial)
    {
        $data = [
            'rec_fecha_emision' => date('Y-m-d'),
            'id_trabajador' => $idTrabajador,
            'id_tipo_receta' => $idTipoReceta,
            'id_historial' => $idHistorial,
        ];

        $this->db->table('tbl_receta')->insert($data);
        $query = $this->db->insertID();

        if (!$query) {
            Alerta("Error", "Error al crear la receta", "", 'window.history.back()');
        } else {
            return $query;
        }
    }

    public function insertarDetallesAnteojos(
        $idReceta,
        $descripcion,
        $lejosDerEsf,
        $lejosDerCil,
        $lejosDerEje,
        $lejosIzqEsf,
        $lejosIzqCil,
        $lejosIzqEje,
        $lejosDp,
        $lejosAdd,
        $cercaDerEsf,
        $cercaDerCil,
        $cercaDerEje,
        $cercaIzqEsf,
        $cercaIzqCil,
        $cercaIzqEje,
        $cercaDp
    ) {
        $data = [
            'id_receta' => $idReceta,
            'rec_descripcion' => $descripcion,
            'det_lejos_der_esf' => $lejosDerEsf,
            'det_lejos_der_cil' => $lejosDerCil,
            'det_lejos_der_eje' => $lejosDerEje,
            'det_lejos_izq_esf' => $lejosIzqEsf,
            'det_lejos_izq_cil' => $lejosIzqCil,
            'det_lejos_izq_eje' => $lejosIzqEje,
            'det_lejos_dp' => $lejosDp,
            'det_lejos_add' => $lejosAdd,
            'det_cerca_der_esf' => $cercaDerEsf,
            'det_cerca_der_cil' => $cercaDerCil,
            'det_cerca_der_eje' => $cercaDerEje,
            'det_cerca_izq_esf' => $cercaIzqEsf,
            'det_cerca_izq_cil' => $cercaIzqCil,
            'det_cerca_izq_eje' => $cercaIzqEje,
            'det_cerca_dp' => $cercaDp,
        ];

        $query = $this->db->table('tbl_detalle_receta')->insert($data);

        if ($query) {
            Alerta("success", "Receta emitida correctamente", "", 'window.history.back()');
        } else {
            Alerta("error", "No se pudo emitir la receta", "", 'window.history.back()');
        }
    }


    public function insertarDetallesTratamientos($idReceta, $descripcionTratamiento)
    {
        $data = [
            'id_receta' => $idReceta,
            'rec_descripcion' => $descripcionTratamiento,
        ];

        $query = $this->db->table('tbl_detalle_receta')->insert($data);
        if ($query) {
            Alerta("success", "Receta emitida correctamente", "", 'window.history.back()');
        } else {
            Alerta("error", "No se pudo emitir la receta", "", 'window.history.back()');
        }
    }

    public function insertarDetallesMedicamentos($idReceta, $descripcionMedicamento)
    {
        $data = [
            'id_receta' => $idReceta,
            'rec_descripcion' => $descripcionMedicamento,
        ];

        $query =  $this->db->table('tbl_detalle_receta')->insert($data);
        if ($query) {
            Alerta("success", "Receta emitida correctamente", "", 'window.history.back()');
        } else {
            Alerta("error", "No se pudo emitir la receta", "", 'window.history.back()');
        }
    }

    public function obtenerDatosRecetaGrad()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_receta r')
            ->select('CONCAT(t.trab_nombres, " ", t.trab_apellidos) AS TRABAJADOR, CONCAT(p.pac_nombres, " ", p.pac_apellidos) AS PACIENTE, tr.tipo_rec_nombre as TIPO_RECETA, r.rec_fecha_emision as FECHA, dr.rec_descripcion as COMENTARIOS, det_lejos_der_esf as D1, det_lejos_der_cil as D2, det_lejos_der_eje as D3, det_lejos_izq_esf as D4, det_lejos_izq_cil as D5, 
            det_lejos_izq_eje as D6, det_lejos_dp as D7, det_lejos_add as D8, det_cerca_der_esf as D9, 
            det_cerca_der_cil as D10, det_cerca_der_eje as D11, det_cerca_izq_esf as D12, 
            det_cerca_izq_cil as D13, det_cerca_izq_eje as D14, det_cerca_dp as D15')
            ->join('tbl_trabajador t', 't.id_trabajador = r.id_trabajador')
            ->join('tbl_tipo_receta tr', 'tr.id_tipo_receta = r.id_tipo_receta')
            ->join('tbl_detalle_receta dr', 'r.id_receta = dr.id_receta')
            ->join('tbl_historial h', 'r.id_historial = h.id_historial')
            ->join('tbl_detalle_historial dh', 'h.id_historial = dh.id_historial')
            ->join('tbl_ficha_medica fm', 'dh.id_ficha = fm.id_ficha')
            ->join('tbl_paciente p', 'fm.id_paciente = p.id_paciente')
            ->join('tbl_usuario u', 'u.id_usuario = p.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->where('tr.id_tipo_receta', 1)
            ->get();

        return $query->getResultArray();
    }

    public function obtenerDatosRecetaTrat()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_receta r')
            ->select('CONCAT(t.trab_nombres, " ", t.trab_apellidos) AS TRABAJADOR, CONCAT(p.pac_nombres, " ", p.pac_apellidos) AS PACIENTE, tr.tipo_rec_nombre as TIPO_RECETA, 
        r.rec_fecha_emision as FECHA, dr.rec_descripcion as COMENTARIOS')
            ->join('tbl_trabajador t', 't.id_trabajador = r.id_trabajador')
            ->join('tbl_tipo_receta tr', 'tr.id_tipo_receta = r.id_tipo_receta')
            ->join('tbl_detalle_receta dr', 'r.id_receta = dr.id_receta')
            ->join('tbl_historial h', 'r.id_historial = h.id_historial')
            ->join('tbl_detalle_historial dh', 'h.id_historial = dh.id_historial')
            ->join('tbl_ficha_medica fm', 'dh.id_ficha = fm.id_ficha')
            ->join('tbl_paciente p', 'fm.id_paciente = p.id_paciente')
            ->join('tbl_usuario u', 'u.id_usuario = p.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->where('tr.id_tipo_receta', 2)
            ->get();

        return $query->getResultArray();
    }

    public function obtenerDatosRecetaMed()
    {
        $idUsuario = session('id_usuario');
        $query = $this->db->table('tbl_receta r')
            ->select('CONCAT(t.trab_nombres, " ", t.trab_apellidos) AS TRABAJADOR, CONCAT(p.pac_nombres, " ", p.pac_apellidos) AS PACIENTE, tr.tipo_rec_nombre as TIPO_RECETA, 
        r.rec_fecha_emision as FECHA, dr.rec_descripcion as COMENTARIOS')
            ->join('tbl_trabajador t', 't.id_trabajador = r.id_trabajador')
            ->join('tbl_tipo_receta tr', 'tr.id_tipo_receta = r.id_tipo_receta')
            ->join('tbl_detalle_receta dr', 'r.id_receta = dr.id_receta')
            ->join('tbl_historial h', 'r.id_historial = h.id_historial')
            ->join('tbl_detalle_historial dh', 'h.id_historial = dh.id_historial')
            ->join('tbl_ficha_medica fm', 'dh.id_ficha = fm.id_ficha')
            ->join('tbl_paciente p', 'fm.id_paciente = p.id_paciente')
            ->join('tbl_usuario u', 'u.id_usuario = p.id_usuario')
            ->where('u.id_usuario', $idUsuario)
            ->where('tr.id_tipo_receta', 3)
            ->get();

        return $query->getResultArray();
    }
}
