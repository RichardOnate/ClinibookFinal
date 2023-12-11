<?php


namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PacienteModel;
use App\Models\GenerosModel;
use App\Models\PrevisionModel;
use App\Models\TrabajadorModel;
use App\Models\TipoDetalleHistorialModel;
use App\Models\CitasModel;

class DocController extends BaseController

{
    private $trabajadorModel;
    private $pacienteModel;
    private $previsionModel;
    private $generosModel;
    private $detalleHistorialModel;
    //private $session;
    private $citasModel;
    public function __construct()
    {
        $this->pacienteModel = new PacienteModel;
        $this->generosModel = new GenerosModel;
        $this->previsionModel = new PrevisionModel;
        $this->trabajadorModel = new TrabajadorModel;
        $this->detalleHistorialModel = new TipoDetalleHistorialModel;
        $this->citasModel = new CitasModel;
        //$this->session = \Config\Services::session();
    }
    public function index()
    {
        $totalcitas = $this->citasModel->citasHoy();
        $datosCitas = $this->citasModel->datosCitas();

        $data = [
            'active_page' => 'doc',
            'datos' => $datosCitas,
            'conteo' => [
                'citas' => $totalcitas ? $totalcitas->totalCitas : 0,
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
}
