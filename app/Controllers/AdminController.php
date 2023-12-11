<?php

namespace App\Controllers;

use App\Models\CitasModel;
use App\Models\PacienteModel;
use App\Models\RolModel;
use App\Models\SucursalModel;
use App\Models\TrabajadorModel;
use App\Models\RegionModel;
use App\Models\ProvinciaModel;
use App\Models\ComunaModel;
use App\Models\EmpresaModel;
use CodeIgniter\Controller;

class AdminController extends BaseController
{
    private $trabajadorModel;
    private $citasModel;
    private $pacientesModel;
    private $rolModel;
    private $sucursalModel;
    private $empresaModel;
    private $regionModel;
    private $provinciaModel;
    private $comunaModel;


    public function __construct()
    {
        $this->trabajadorModel = new TrabajadorModel();
        $this->citasModel = new CitasModel();
        $this->pacientesModel = new PacienteModel();
        $this->rolModel = new RolModel();
        $this->sucursalModel = new SucursalModel();
        $this->regionModel = new RegionModel();
        $this->provinciaModel = new ProvinciaModel();
        $this->comunaModel = new ComunaModel();
        $this->empresaModel = new EmpresaModel();
    }

    public function index()
    {
        $totalPacientes = $this->pacientesModel->totalPacientes();
        $totalTrabajadores = $this->trabajadorModel->totalTrabajadores();
        $totalCitas = $this->citasModel->totalCitas();
        $regiones = $this->regionModel->listarRegiones();
        $provincias = $this->provinciaModel->listarProvincias();
        $comunas = $this->comunaModel->listarComunas();
        $empresa = $this->empresaModel->listarEmpresa();
        $sucursal = $this->sucursalModel->mostrarSucursales();

        $data = [
            'active_page' => 'admin',
            'conteo' => [
                'pacientes' => $totalPacientes,
                'trabajadores' => $totalTrabajadores,
                'citas' => $totalCitas,
            ],
            'regiones' => $regiones,
            'provincias' => $provincias,
            'comunas' => $comunas,
            'empresas' => $empresa,
            'sucursales' => $sucursal,
        ];

        return view('dashboard/admin', $data);
    }

    public function obtenerProvincias($idRegion)
    {
        //$idRegion = $this->request->getGet('id_region');
        $provincias = $this->provinciaModel->obtenerProvinciasPorRegion($idRegion);
        return $this->response->setJSON($provincias);
    }

    public function obtenerComunas($idProvincia)
    {
        //$idProvincia = $this->request->getGet('id_provincia');
        $comunas = $this->comunaModel->obtenerComunasPorProvincia($idProvincia);
        return $this->response->setJSON($comunas);
    }


    public function perfilAdmin()
    {
        $datosTrabajador = $this->trabajadorModel->datosTrabajador();

        $data = [
            'active_page' => 'admin-perfil',
            'lista' => $datosTrabajador,
        ];

        return view('dashboard/admin-perfil', $data);
    }

    public function trabAdmin()
    {
        $datosTrabajadores = $this->trabajadorModel->listarTrabajadores();
        $datosRol = $this->rolModel->listarRoles();
        $datosSucursal = $this->sucursalModel->listarSucursal();

        $data = [
            'active_page' => 'admin-trab',
            'lista' => $datosTrabajadores,
            'roles' => $datosRol,
            'sucursales' => $datosSucursal,
        ];

        return view('dashboard/admin-trab', $data);
    }

    public function paciAdmin()
    {

        $listaPacientes = $this->pacientesModel->listarPacientes();

        $data = [
            'active_page' => 'admin-paci',
            'lista' => $listaPacientes,
        ];

        return view('dashboard/admin-paci', $data);
    }

    public function reportesAdmin()
    {
        $data['active_page'] = 'admin-reportes';
        return view('dashboard/admin-reportes', $data);
    }


    public function insertarSucursal()
    {
        $empresa = $this->request->getPost('empresa');
        $direccion = $this->request->getPost('direccion');
        $correo = $this->request->getPost('correo');
        $celular = $this->request->getPost('celular');
        $region = $this->request->getPost('region');
        $provincia = $this->request->getPost('provincia');
        $comuna = $this->request->getPost('comuna');

        $datos = [
            'id_empresa' => $empresa,
            'suc_direccion' => $direccion,
            'suc_mail' => $correo,
            'suc_celular' => $celular,
            'id_region' => $region,
            'id_provincia' => $provincia,
            'id_comuna' => $comuna
        ];

        $this->sucursalModel->insertarSucursal($datos);
    }

    public function modalEditarS($id)
    {
        $datosSuc = $this->sucursalModel->modalEditarS($id);
        return $this->response->setJSON($datosSuc);
    }

    public function actualizarSucursal()
    {
        $id = $this->request->getPost('id');
        $direccion = $this->request->getPost('direccion');
        $correo =  $this->request->getPost('correo');
        $celular = $this->request->getPost('celular');
        $region = $this->request->getPost('region');
        $provincia = $this->request->getPost('provincia');
        $comuna = $this->request->getPost('comuna');
        $this->sucursalModel->actualizarSucursal($id, $direccion, $correo, $celular, $region, $provincia, $comuna);
    }

    public function eliminarSucursal($id)
    {
        $this->sucursalModel->eliminarSucursal($id);
    }
}
