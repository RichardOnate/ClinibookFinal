<?php


namespace app\Controllers;

use CodeIgniter\Controller;
use App\Models\PacienteModel;
use App\Models\GenerosModel;
use App\Models\PrevisionModel;
use App\Models\TrabajadorModel;
use App\Models\TipoDetalleHistorialModel;
use App\Models\CitasModel;

class DocController extends Controller

{
    private $trabajadorModel;
    private $pacienteModel;
    private $previsionModel;
    private $generosModel;
    private $detalleHistorialModel;
    private $session;
    private $citasModel;
    public function __construct()
    {
        $this->pacienteModel = new PacienteModel;
        $this->generosModel = new GenerosModel;
        $this->previsionModel = new PrevisionModel;
        $this->trabajadorModel = new TrabajadorModel;
        $this->detalleHistorialModel = new TipoDetalleHistorialModel;
        $this->citasModel = new CitasModel;
        $this->session = \Config\Services::session();
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

        $data['active_page'] = 'doc-atencion';
        return view('dashboard/doc-atencion', $data);
    }


    public function atenderPaciente($id)
    {
        $datosPac = $this->pacienteModel->atenderPaciente($id);
        return $this->response->setJSON($datosPac);
    }
}
