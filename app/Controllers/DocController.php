<?php


namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PacienteModel;
use App\Models\GenerosModel;
use App\Models\PrevisionModel;
use App\Models\TrabajadorModel;
use App\Models\TipoDetalleHistorialModel;
use App\Models\CitasModel;
use App\Models\HistorialModel;
use App\Models\RecetasModel;

class DocController extends BaseController

{
    private $trabajadorModel;
    private $pacienteModel;
    private $previsionModel;
    private $generosModel;
    private $detalleHistorialModel;
    //private $session;
    private $citasModel;
    private $historialModel;
    private $recetasModel;
    public function __construct()
    {
        $this->pacienteModel = new PacienteModel;
        $this->generosModel = new GenerosModel;
        $this->previsionModel = new PrevisionModel;
        $this->trabajadorModel = new TrabajadorModel;
        $this->detalleHistorialModel = new TipoDetalleHistorialModel;
        $this->citasModel = new CitasModel;
        $this->historialModel = new HistorialModel;
        $this->recetasModel = new RecetasModel;
        //$this->session = \Config\Services::session();
    }
    public function index()
    {
        $totalcitas = $this->citasModel->citasHoy();
        $datosCitas = $this->citasModel->datosCitas();
        $totalcancel = $this->citasModel->citasCanceladasHoy();
        $totalatend = $this->citasModel->citasAtendidasHoy();

        $data = [
            'active_page' => 'doc',
            'datos' => $datosCitas,
            'conteo' => [
                'citasP' => $totalcitas ? $totalcitas->totalCitas : 0,
                'citasC' => $totalcancel ? $totalcancel->totalCancel : 0,
                'citasA' => $totalatend ? $totalatend->totalAtend : 0,
            ],
        ];

        return view('dashboard/doc', $data);
    }



    public function perfilDoc()
    {
        $datosDoc = $this->trabajadorModel->datosTrabajador();

        $data = [
            'active_page' => 'doc-perfil',
            'lista' => $datosDoc,
        ];
        //$data['active_page'] = 'doc-perfil';
        return view('dashboard/doc-perfil', $data);
    }
    public function atencionDoc()
    {
        $generos = $this->generosModel->listarGeneros();
        $previsiones = $this->previsionModel->listarPrevision();
        $tipoHistorial = $this->detalleHistorialModel->listarTipoDetalle();

        $data = [
            'active_page' => 'doc-atencion',
            "generos" => $generos,
            'previsiones' => $previsiones,
            'listaHistorial' => $tipoHistorial,
        ];

        //$data['active_page'] = 'doc-atencion';
        return view('dashboard/doc-atencion', $data);
    }


    public function atenderPaciente($id)
    {

        if ($id === null) {
            $datosPac = [
                'ID' => null,
                'NOMBRES' => '',
                'APELLIDOS' => '',
                'CELULAR' => '',
                'CORREO' => '',
                'IDP' => null,
                'IDG' => null,
            ];
        } else {

            $datosPac = $this->pacienteModel->atenderPaciente($id);
        }
        $generos = $this->generosModel->listarGeneros();
        $previsiones = $this->previsionModel->listarPrevision();
        $tipoHistorial = $this->detalleHistorialModel->listarTipoDetalle();

        $data = [
            'active_page' => 'doc-atencion',
            "generos" => $generos,
            'previsiones' => $previsiones,
            'listaHistorial' => $tipoHistorial,
            'datosPac' => $datosPac,
        ];

        return view('dashboard/doc-atencion', $data);
    }

    public function actualizarPacienteD()
    {
        $id = $this->request->getPost('id');
        $rut = $this->request->getPost('rut');
        $nombres = $this->request->getPost('nombres');
        $apellidos = $this->request->getPost('apellidos');
        $celular = $this->request->getPost('celular');
        $correo = $this->request->getPost('correo');
        $fechaNac = $this->request->getPost('fecha');
        $genero = $this->request->getPost('genero');
        $prevision = $this->request->getPost('prevision');
        $this->pacienteModel->actualizarPacienteD($id, $rut, $nombres, $apellidos, $celular, $correo, $fechaNac, $genero, $prevision);
    }

    public function atenderPacienteRut($rut)
    {
        $datosPac = $this->pacienteModel->atenderPacienteRut($rut);
        return $this->response->setJSON($datosPac);
    }

    public function añadirHistorial()
    {
        $id = $this->request->getPost('id');
        $tipoDetalle = $this->request->getPost('razon-cita');
        $detalleCita = $this->request->getPost('detalle_cita');

        $this->pacienteModel->detalleHistorial($id, $tipoDetalle, $detalleCita);
    }

    public function obtenerHistorial($id)
    {
        $historial = $this->historialModel->obtenerHistorial($id);
        return $this->response->setJSON($historial);
    }

    public function guardarReceta()
    {
        $idTrabajador = $this->request->getPost('idt');
        $idTipoReceta = $this->request->getPost('tipos-receta');
        $idHistorial = $this->request->getPost('idh');

        $idReceta = $this->recetasModel->crearReceta($idTrabajador, $idTipoReceta, $idHistorial);

        if ($idReceta) {
            if ($idTipoReceta == 1) {
                $descripcion = $this->request->getPost('descripcion');
                $lejosDerEsf = $this->request->getPost('lejosDerEsf');
                $lejosDerCil = $this->request->getPost('lejosDerCil');
                $lejosDerEje = $this->request->getPost('lejosDerEje');
                $lejosIzqEsf = $this->request->getPost('lejosIzqEsf');
                $lejosIzqCil = $this->request->getPost('lejosIzqCil');
                $lejosIzqEje = $this->request->getPost('lejosIzqEje');
                $lejosDp = $this->request->getPost('lejosDp');
                $lejosAdd = $this->request->getPost('lejosAdd');
                $cercaDerEsf = $this->request->getPost('cercaDerEsf');
                $cercaDerCil = $this->request->getPost('cercaDerCil');
                $cercaDerEje = $this->request->getPost('cercaDerEje');
                $cercaIzqEsf = $this->request->getPost('cercaIzqEsf');
                $cercaIzqCil = $this->request->getPost('cercaIzqCil');
                $cercaIzqEje = $this->request->getPost('cercaIzqEje');
                $cercaDp = $this->request->getPost('cercaDp');

                $this->recetasModel->insertarDetallesAnteojos(
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
                );
            } elseif ($idTipoReceta == 2) {
                $descripcionTratamiento = $this->request->getPost('descripcion');
                $this->recetasModel->insertarDetallesTratamientos($idReceta, $descripcionTratamiento);
            } elseif ($idTipoReceta == 3) {
                $descripcionMedicamento = $this->request->getPost('descripcion');
                $this->recetasModel->insertarDetallesMedicamentos($idReceta, $descripcionMedicamento);
            }
        } else {
            // Manejar el error
            Alerta("Error", "Error al crear la receta", "", 'window.history.back()');
        }
    }

    /*public function nombre()
    {
        $nombreTrab = $this->trabajadorModel->nombreTrabajador();

        $data = [
            'nombreTrab' => $nombreTrab,
        ];
        print_r($nombreTrab);
        return view('sliderbar/sliderbar-doc', $data);
    }*/
}
