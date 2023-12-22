<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// ruta login
$routes->get('/login', 'LoginController::index');
$routes->get('/cerrar-sesion', 'LoginController::modalSalir');
$routes->post('/login', 'LoginController::iniciarSesion');
$routes->get('/logout', 'LoginController::logout');
// ruta agendar
$routes->get('/agendar', 'CitasController::index');
$routes->post('/agendar', 'CitasController::guardarDatos');
// ruta admin
$routes->get('dashboard/admin', 'AdminController::index');
$routes->get('/admin-perfil', 'AdminController::perfilAdmin');
$routes->get('/admin-trab', 'AdminController::trabAdmin');
$routes->get('/admin-paci', 'AdminController::paciAdmin');
$routes->get('/admin-reportes', 'AdminController::reportesAdmin');
$routes->get('/act-modalt/(:num)', 'TrabajadorController::modalEditar/$1');
$routes->get('/act-modalp/(:num)', 'PacienteController::modalEditar/$1');
$routes->get('/del-trab/(:num)', 'TrabajadorController::eliminarTrabajador/$1');
$routes->post('/act-perfil', 'TrabajadorController::actualizarPerfil');
$routes->post('/act-trab', 'TrabajadorController::actualizarTrabajador');
$routes->post('/insert-trab', 'TrabajadorController::insertarTrabajador');
$routes->post('/insert-suc', 'AdminController::insertarSucursal');
$routes->post('/act-suc', 'AdminController::actualizarSucursal');
$routes->get('/act-modals/(:num)', 'AdminController::modalEditarS/$1');
$routes->get('/del-suc/(:num)', 'AdminController::eliminarSucursal/$1');
$routes->get('/obtener-provincias/(:num)', 'AdminController::obtenerProvincias/$1');
$routes->get('/obtener-comunas/(:num)', 'AdminController::obtenerComunas/$1');


// ruta doctor
$routes->get('/doc', 'DocController::index');
$routes->get('/doc-perfil', 'DocController::perfilDoc');
$routes->get('/doc-atencion', 'DocController::atencionDoc');
//$routes->post('/act-perfil', 'TrabajadorController::actualizarPerfil');
$routes->get('/doc-atencion/(:any)', 'DocController::atenderPaciente/$1');
$routes->get('/doc-atencion2/(:any)', 'DocController::atenderPacienteRut/$1');
$routes->post('/act-paciente', 'DocController::actualizarPacienteD');
$routes->post('/insert-historial', 'DocController::añadirHistorial');
$routes->get('/traer-historial/(:num)', 'DocController::obtenerHistorial/$1');
$routes->get('/atender-pac/(:num)', 'CitasController::atenderPaciente/$1');
$routes->get('/finalizar-aten/(:num)', 'CitasController::finalizarAtencion/$1');
$routes->post('/insert-receta', 'DocController::guardarReceta');
$routes->get('/cancel-citaD/(:num)', 'DocController::cancelarCitaDoc/$1');




//ruta enfermera
$routes->get('/enfer', 'EnferController::index');
$routes->get('/enfer-perfil', 'EnferController::perfilEnfer');
$routes->get('/enfer-verPaciente', 'EnferController::verPacienteEnfer');
$routes->get('/verPaciente/(:any)', 'EnferController::verPacienteRut/$1');
$routes->post('/act-pacienteEnf', 'EnferController::actualizarPacienteE');

// Ruta Paciente
$routes->get('/paciente', 'PacienteController::index');
$routes->get('/paciente-historial', 'PacienteController::pacienteHistorial');
$routes->get('/paciente-documentos', 'PacienteController::pacienteDocumentos');
$routes->post('/act-pacm', 'PacienteController::actualizarPacienteM');
$routes->post('/pac-perfil', 'PacienteController::actualizarPerfil');
$routes->get('/del-pac/(:num)', 'PacienteController::eliminarPaciente/$1');
$routes->post('/agendar-pac', 'CitasController::pacienteAgendar');
$routes->get('/conf-pac/(:num)', 'PacienteController::confirmarCitaPaciente/$1');
$routes->get('/cancel-pac/(:num)', 'PacienteController::cancelarCitaPaciente/$1');
$routes->get('/export-historial/(:num)', 'PacienteController::historialPDF/$1');
$routes->get('/rec-graduacion', 'PacienteController::graduacionPDF');
$routes->get('/rec-tratamiento', 'PacienteController::tratamientoPDF');
$routes->get('/rec-medicamentos', 'PacienteController::medicamentosPDF');
// Ruta Recepcionista
$routes->get('/recep', 'RecepController::index');
$routes->get('/recep-agendar', 'RecepController::recepAgendar');
$routes->get('/recep-perfil', 'RecepController::recepPerfil');
$routes->post('/agendar-cita', 'CitasController::recepAgendar');
$routes->get('/buscar-paciente/(:any)', 'RecepController::buscarPacienteRut/$1');
$routes->get('/confirm-cita/(:num)', 'RecepController::confirmarCitaPaciente/$1');
$routes->get('/cancel-cita/(:num)', 'RecepController::cancelarCitaPaciente/$1');

// receta
$routes->get('/receta', 'recetaController::index');



$routes->get('/rellenar-receta/(:num)', 'recetaController::rellenarReceta/$1');
// recuperar pass
$routes->get('/recuperarPass', 'recuPassController::index');

// confirmar cita
$routes->get('/confirmarCita/(:num)', 'confirmarCitaController::index/$1');
$routes->get('/confirm-cita/(:num)', 'confirmarCitaController::confirmarCita/$1');
$routes->get('/cancel-cita/(:num)', 'confirmarCitaController::cancelarCita/$1');
