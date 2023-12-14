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
}
