<?php

namespace App\Controllers;

use App\Models\GenerosModel;
use App\Models\PrevisionModel;
use CodeIgniter\I18n\Time;
use App\Models\HorariosModel;
use App\Models\PacienteModel;
use App\Models\TrabajadorModel;
use App\Models\CitasModel;

// En tus controladores
require_once APPPATH . 'helpers/Alertas.php';



class CitasController extends BaseController
{

    private $horariosModel;
    private $trabajadorModel;
    private $pacienteModel;
    private $previsionModel;
    private $generosModel;
    private $citasModel;
    public function __construct()
    {
        // Carga los modelos en el constructor
        $this->horariosModel = new HorariosModel();
        $this->trabajadorModel = new TrabajadorModel();
        $this->pacienteModel = new PacienteModel();
        $this->generosModel = new GenerosModel;
        $this->previsionModel = new PrevisionModel;
        $this->citasModel = new CitasModel;
    }

    public function index()
    {
        $horarios = $this->horariosModel->listarHorarios();
        $generos = $this->generosModel->listarGeneros();
        $previsiones = $this->previsionModel->listarPrevision();
        $especialista = $this->trabajadorModel->listarEspecialistas();

        $horario = $horarios;
        $genero = $generos;
        $prevision = $previsiones;
        $doctores = $especialista;

        $data = [
            "generos" => $genero,
            'horarios' => $horario,
            'previsiones' => $prevision,
            'doctores' => $doctores,
        ];

        return view('modulos/agendar', $data);
    }

    public function guardarDatos()
    {
        //$citasModel = new CitasModel();
        $rolUsuario = session('rol_usuario');
        $rut = $this->request->getPost('rut');
        $correo = (string) $this->request->getPost('correo');
        $doctor = $this->request->getPost('doctor');
        $horario = $this->request->getPost('horario');
        $fecha = $this->request->getPost("fecha");


        $rutaRedireccion = 'window.history.back()';

        if ($this->citasModel->disponibilidadCitas($doctor, $horario, $rutaRedireccion)) {
            return;
        }

        if ($this->pacienteModel->pacienteExiste($rut, $correo)) {
            Alerta("error", "Error de registro", "El Rut o correo ingresado ya se encuentra registrado", $rutaRedireccion);
            return;
        } else {

            $dataPaciente = [
                'id_genero' => $this->request->getPost('genero'),
                'id_sucursal' => 1,
                'id_prevision' => $this->request->getPost('prevision'),
                'id_usuario' => null,
                'pac_rut' => $rut,
                'pac_nombres' => $this->request->getPost('nombres'),
                'pac_apellidos' => $this->request->getPost('apellidos'),
                'pac_fecha_nac' => null,
                'pac_celular' => $this->request->getPost('celular'),
                'pac_correo' => $correo,
            ];

            // Insertar paciente
            $idPaciente = $this->pacienteModel->insertPaciente($dataPaciente);

            if ($idPaciente) {
                $dataCita = [
                    'id_paciente' => $idPaciente,
                    'id_trabajador' => $doctor,
                    'id_horario' => $horario,
                    'cita_fecha' => $fecha,
                ];

                // Insertar cita
                $idCita = $this->citasModel->insertCita($dataCita);

                if ($idCita) {
                    $dataConfirmacion = [
                        'id_cita' => $idCita,
                        'id_estado_cita' => $this->citasModel->db->table('tbl_estado_cita')
                            ->select('id_estado_cita')
                            ->where('estado_nombre', 'Agendada')
                            ->get()
                            ->getRow()
                            ->id_estado_cita,
                        'info_confirmacion' => date('Y-m-d H:i:s'), // Fecha y hora actuales
                    ];

                    // Insertar confirmación de cita
                    $this->citasModel->insertConfirmacionCita($dataConfirmacion);

                    $db = \Config\Database::connect();
                    $horamedica = $this->horariosModel->select('hor_hora_medica')
                        ->where('id_horario', $this->request->getPost('horario'))
                        ->get();
                    $resulthora = $horamedica->getRowArray();
                    $hora_medica = $resulthora['hor_hora_medica'];

                    $doc = $db->table('tbl_trabajador')
                        ->select('CONCAT(trab_nombres, " ", trab_apellidos) as NOMBRE')
                        ->where('id_trabajador', $this->request->getPost('doctor'))
                        ->get();
                    $resultdoctor = $doc->getRowArray();
                    $especialista = $resultdoctor['NOMBRE'];

                    $linkConfirmacion = "http://localhost:8080/confirmarCita/" . $idCita;
                    // Envío de correo
                    $subject1 = "Reservación Exitosa";
                    $message1 = "¡Hola!\n\nTu cita oftalmológica fue reservada.\n\nDía de la cita: " . $fecha .
                        "\nHorario de la cita: " . $hora_medica . " horas
                \nEspecialista a cargo: " . $especialista .
                        "\n\n\n\n\n\n\n\ncorreo generado automáticamente por: reservaciones.clinivision@clinibook.cl";

                    $subject2 = "Confirmación Cita";
                    $message2 = "¡Hola!\n\nTu cita agendada para el día" . $fecha .
                        " a las " . $hora_medica . " horas con el especialista " . $especialista .
                        " está a la espera de confirmación. Por favor ingresa al siguiente enlace y confirma tu asistencia: " . $linkConfirmacion;
                    "\n\n\n\n\n\n\n\ncorreo generado automáticamente por: reservaciones.clinivision@clinibook.cl";

                    // Configuración de los encabezados
                    $headers = "From: reservaciones.clinivision@clinibook.cl\r\n";
                    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                    $headers .= "Content-Transfer-Encoding: 8bit\r\n";

                    $envioAgenda = mail($correo, '=?UTF-8?B?' . base64_encode($subject1) . '?=', $message1, $headers);
                    $envioConfirmacion = mail($correo, '=?UTF-8?B?' . base64_encode($subject2) . '?=', $message2, $headers);

                    if ($envioAgenda) {
                        // Correo enviado con éxito
                        $envioConfirmacion;
                        Alerta("success", "La cita fue registrada correctamente y se ha enviado un correo con los detalles.", "", '/');
                    } else {
                        // Error al enviar el correo, pero registro exitoso
                        Alerta("info", "La cita fue registrada correctamente, pero hubo un error al enviar el correo de confirmación.", "", '/');
                    }
                } else {
                    Alerta("error", "Error de registro", "No se pudo registrar la cita", '/agendar');
                }
            }
        }
    }

    public function recepAgendar()
    {
        //var_dump($this->request->getPost('id_paciente'));

        //$rolUsuario = session('rol_usuario');
        $idPaciente = $this->request->getPost('id_paciente');
        $correo = (string) $this->request->getPost('correo');
        $doctor = $this->request->getPost('doctor');
        $horario = $this->request->getPost('horario');
        $fecha = $this->request->getPost("fecha");

        $rutaRedireccion = 'window.history.back()';


        if ($this->citasModel->disponibilidadCitas($doctor, $horario, $rutaRedireccion)) {
            return;
        }

        if (empty($idPaciente)) {
            $this->guardarDatos();
        } else {
            $dataCita = [
                'id_paciente' => $idPaciente,
                'id_trabajador' => $doctor,
                'id_horario' => $horario,
                'cita_fecha' => $fecha,
            ];

            $idCita = $this->citasModel->insertCita($dataCita);

            if ($idCita) {
                $dataConfirmacion = [
                    'id_cita' => $idCita,
                    'id_estado_cita' => $this->citasModel->db->table('tbl_estado_cita')
                        ->select('id_estado_cita')
                        ->where('estado_nombre', 'Agendada')
                        ->get()
                        ->getRow()
                        ->id_estado_cita,
                    'info_confirmacion' => date('Y-m-d H:i:s'), // Fecha y hora actuales
                ];

                // Insertar confirmación de cita
                $this->citasModel->insertConfirmacionCita($dataConfirmacion);

                $db = \Config\Database::connect();
                $horamedica = $this->horariosModel->select('hor_hora_medica')
                    ->where('id_horario', $this->request->getPost('horario'))
                    ->get();
                $resulthora = $horamedica->getRowArray();
                $hora_medica = $resulthora['hor_hora_medica'];

                $doc = $db->table('tbl_trabajador')
                    ->select('CONCAT(trab_nombres, " ", trab_apellidos) as NOMBRE')
                    ->where('id_trabajador', $this->request->getPost('doctor'))
                    ->get();
                $resultdoctor = $doc->getRowArray();
                $especialista = $resultdoctor['NOMBRE'];

                $linkConfirmacion = "http://localhost:8080/confirmarCita/" . $idCita;
                // Envío de correo
                $subject1 = "Reservación Exitosa";
                $message1 = "¡Hola!\n\nTu cita oftalmológica fue reservada.\n\nDía de la cita: " . $fecha .
                    "\nHorario de la cita: " . $hora_medica . " horas
                \nEspecialista a cargo: " . $especialista .
                    "\n\n\n\n\n\n\n\ncorreo generado automáticamente por: reservaciones.clinivision@clinibook.cl";

                $subject2 = "Confirmación Cita";
                $message2 = "¡Hola!\n\nTu cita agendada para el día " . $fecha .
                    " a las " . $hora_medica . " horas con el especialista " . $especialista .
                    " está a la espera de confirmación. Por favor ingresa al siguiente enlace y confirma tu asistencia: " . $linkConfirmacion;
                "\n\n\n\n\n\n\n\ncorreo generado automáticamente por: reservaciones.clinivision@clinibook.cl";

                // Configuración de los encabezados
                $headers = "From: reservaciones.clinivision@clinibook.cl\r\n";
                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
                $headers .= "Content-Transfer-Encoding: 8bit\r\n";

                $envioAgenda = mail($correo, '=?UTF-8?B?' . base64_encode($subject1) . '?=', $message1, $headers);
                $envioConfirmacion = mail($correo, '=?UTF-8?B?' . base64_encode($subject2) . '?=', $message2, $headers);

                if ($envioAgenda) {
                    // Correo enviado con éxito
                    $envioConfirmacion;
                    Alerta("success", "La cita fue registrada correctamente y se ha enviado un correo con los detalles.", "", '/recep-agendar');
                } else {
                    // Error al enviar el correo, pero registro exitoso
                    Alerta("info", "La cita fue registrada correctamente, pero hubo un error al enviar el correo de confirmación.", "", '/recep-agendar');
                }
            } else {
                Alerta("error", "Error de registro", "No se pudo registrar la cita", '/recep-agendar');
            }
        }
    }

    public function atenderPaciente($id)
    {
        $this->citasModel->atenderPaciente($id);
    }

    public function finalizarAtencion($id)
    {
        $this->citasModel->finalizarAtencion($id);
    }
}
