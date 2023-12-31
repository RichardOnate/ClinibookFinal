<?php
$session = session('id_usuario');
if (!$session) {
  echo '<script>window.location.href = "/login";</script>';
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
  <title>CliniVision-paciente</title>
</head>

<body class="bg-blue-500">
  <!-- sliderbar -->
  <?= view('sliderbar/sliderbar-paciente'); ?>
  <!--  ------------------------------------------------------------ -->
  <div class="p-2 sm:ml-64">
    <div class="p-4   border-gray-200 border-2 border-dashed rounded-lg">
      <h1 class="text-5xl text-gray-100 m-4 text-center font-bold">Informaciones</h2>
        <div class="grid grid-cols-1 md:grid-cols-3  gap-4 mb-6">
          <!-- ------------------------------------------------------------------------------------------------ -->
          <div class=" flex items-center justify-center rounded p-5 border-blue-600 border-2 bg-white text-white ">
            <div>
              <svg class="w-10 h-10 text-blue-700 dark:text-white " fill="currentColor" viewBox="0 0 20 18">
                <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
              </svg>
            </div>
            <div class="flex">
              <h3 class="text-xl text-blue-700 font-bold md:text-2xl lg:text-5xl">Mis citas totales: </h3>
              <span class="text-xl text-blue-700 lg:text-4xl  justify-center text-center"><?= esc($conteo['citasT']) ?></span>
            </div>
          </div>

          <!-- ------------------------------------------------------------------------------------------------------------ -->
          <div class=" flex items-center justify-center  rounded border-red-700 border-2 p-5 bg-white text-white ">
            <div>
              <svg class="w-10 h-10 text-red-700" fill="currentColor" viewBox="0 0 20 19">
                <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
              </svg>
            </div>

            <div class="flex">
              <h3 class="text-lg text-red-700 font-bold md:text-2xl lg:text-5xl">Mis citas canceladas: </h3>
              <span class="text-xl text-red-700 sm:text-4xl  justify-center text-center"><?= esc($conteo['citasC']) ?></span>
            </div>
          </div>
          <!-- ----------------------------------------------------------------------------------------------- -->
          <div class=" flex items-center justify-center rounded p-5 border-2 border-emerald-700 bg-white text-white ">
            <div>
              <svg class="w-10 h-10 text-emerald-700 " fill="currentColor" viewBox="0 0 20 20">
                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
              </svg>
            </div>

            <div class="flex">
              <h3 class="text-lg text-emerald-700 font-bold md:text-2xl lg:text-5xl">Mis citas atendidas: </h3>
              <span class="text-xl text-emerald-700 sm:text-4xl  justify-center text-center"><?= esc($conteo['citasA']) ?></span>
            </div>
          </div>
        </div>

        <!-- cartas de atencion -- -->
        <div>
          <h2 class=" text-white text-3xl font-bold p-3">Mis Citas</h2>
          <div class="flex items-center justify-center overflow-x-auto p-4 max-w-full">
            <?php foreach ($datos as $cita) : ?>
              <div class="max-w-md w-full bg-white shadow-lg rounded-lg overflow-hidden mx-2">
                <div class="px-4 py-2">
                  <p class="text-sm text-gray-600 dark:text-gray-400">Fecha: <?= esc($cita['FECHA']) ?></p>
                  <h3 class="mt-2 text-xl font-semibold text-gray-800 dark:text-white">Especialista: <?= esc($cita['ESPECIALISTA']) ?></h3>
                  <p class="mt-2 text-gray-600 dark:text-gray-400">Hora de la cita: <?= esc($cita['HORARIO']) ?></p>
                  <p class="mt-2 text-gray-600 dark:text-gray-400">Estado de la cita: <?= esc($cita['ESTADO CITA']) ?></p>
                  <div class="py-5 flex gap-2">
                    <button type="button" id="Confirmar" data-id="<?= esc($cita['IDC']) ?>" class="mt-6 bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-blue-300 text-white font-medium rounded-lg px-4 py-2 focus:outline-none">Confirmar</button>
                    <button type="button" id="Cancelar" data-id="<?= esc($cita['IDC']) ?>" class="mt-6 bg-red-500 hover:bg-red-600 focus:ring-4 focus:ring-red-300 text-white font-medium rounded-lg px-4 py-2 focus:outline-none">Cancelar</button>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <div class="flex justify-between gap-2 mb-3">
            <h2 class="text-4xl text-gray-100 pl-3 text-center font-bold">Calendario Citas</h2>

            <button id="agendarPaciente" type="button" class="abrirBtnAgendar px-2 py-2 mb-2 md:mb-0 w-full md:w-auto text-sm font-medium text-gray-200 bg-gray-800 rounded-md hover:bg-emerald-600 focus:ring focus:ring-opacity-50">Agendar Nueva Cita</button>
          </div>

          <div class="">
            <div id="calendar" class="w-full mx-auto rounded border-2 bg-gray-100"></div>
          </div>



        </div>

        <!--<div class="flex justify-between gap-2 mb-3">
          <h2 class="text-4xl text-gray-100 pl-3 text-center font-bold">Calendario Citas</h2>

          <button id="agendarPaciente" type="button" class="abrirBtnAgendar px-2 py-2 mb-2 md:mb-0 w-full md:w-auto text-sm font-medium text-gray-200 bg-gray-800 rounded-md hover:bg-emerald-600 focus:ring focus:ring-opacity-50">Agendar Nueva Cita</button>
        </div>
        <div class="">
          <div id="calendar" class="w-full mx-auto rounded border-2 bg-gray-100"></div>
        </div>-->
    </div>

    <!-- Modal agendar------------------------------------------------------------- -->
    <section class="modalAgendar fixed top-0 left-0 w-full h-full flex items-center justify-center z-40 hidden ">
      <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>

      <div class=" h-auto rounded-lg bg-white p-4 relative ">
        <span id="cerrarModalBtn2" class="cerrarModalhisto absolute top-2 right-2 mr-4  text-gray-500 cursor-pointer text-4xl hover:text-red-600 transform hover:scale-110 transition-transform">&times;</span>

        <form action="/agendar-pac" method="post">

          <input type="hidden" id="id_p" name="id_paciente" value="<?= $datosPac['ID'] ?>">
          <input type="hidden" id="correo" name="correo" value="<?= $datosPac['CORREO'] ?>">
          <div id="form2" class=" max-w-3xl p-4 bg-white border border-blue-800 rounded-lg shadow-lg">

            <div class="max-w-lg pb-4 px-4 block justify-center items-center ">

              <h2 class="mb-4 text-2xl text-center font-bold text-gray-900 dark:text-white">Selecciona Un Horario</h2>

              <!-- Date picker  -->

              <div class="relative w-auto">
                <label for="fecha" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Fecha</label>
                <input type="date" id="fechap" name="fecha" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Ingrese su número de celular" onchange="validarFecha()" />
              </div>

              <!-- horario -->
              <div class="flex mt-4 mb-2">
                <div class="w-auto">
                  <label for="hora" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Seleccione una
                    Hora</label>
                  <div class="flex items-center justify-between h-full">
                    <div>
                      <select id="horap" name="horario" class="block w-36 px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none dark:border-gray-600 dark:focus:ring-blue-600 dark:text-gray-300 dark:bg-gray-800">
                        <option>Seleccionar Hora </option>
                        <?php foreach ($horarios as $horario) : ?>
                          <option value="<?= $horario['id_horario'] ?>">
                            <?= $horario['hor_hora_medica'] ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div>
                      <button type="button" id="limpiar" onclick="habilitarHorario()" class="ml-8 px-4 py-2 text-[12px] font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-600 dark:bg-blue-700">Borrar
                        Selección</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- select doctor -->
            <div class=" mb-4">
              <label for="underline_select" class="sr-only">Underline select</label>
              <select id="underline_select" name="doctor" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-blue-600 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option selected>Seleccionar Doctor</option>
                <?php foreach ($doctores as $doctor) : ?>
                  <option value="<?= $doctor['ID'] ?>"><?= $doctor['NOMBRE'] ?></option>
                <?php endforeach; ?>
              </select>

            </div>

            <button id="siguiente" type="submit" class="w-full py-2.5 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-600">Guardar
              Cita</button>
          </div>

        </form>

      </div>
    </section>
    <script src="<?= base_url('js/modalAgendar.js') ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js" integrity="sha384-1z39Pl0VH8aB+DIEJT8uzMlBGO11AJJeUFSQsnrEz4gjgLEg3NUbIG4rUJGU2z6L" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/locales/es.min.js" integrity="sha384-AbUj+CrZTOrEWHZOpZ/IMDHSCp/Z7mLaD/mclK5XEYAJvA3GOoF0MwgsMEmIcVEj" crossorigin="anonymous"></script>
    <script src="<?= base_url('js/PAC-confirmaciones.js') ?>"></script>
    <script src="
  https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js
    "></script>

    <script>
      const abrirModalAgendar = document.querySelector(".abrirBtnAgendar");
      const cerrarModalAgendar = document.querySelector(".cerrarModalhisto");
      const modalAgendar = document.querySelector(".modalAgendar");
      document.addEventListener("DOMContentLoaded", function() {

        abrirModalAgendar.addEventListener("click", function() {
          modalAgendar.classList.remove("hidden");
        });

        cerrarModalAgendar.addEventListener("click", function() {
          modalAgendar.classList.add("hidden");
        });
      });



      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var eventos = <?php echo json_encode($eventos); ?>; // Convierte el array PHP a JSON

        var calendar = new FullCalendar.Calendar(calendarEl, {
          contentHeight: 500,
          aspectRatio: 2,
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          events: eventos.map(function(evento) {
            var start = evento['FECHA'] + 'T' + evento['HORARIO'] + ':00';
            var title = 'Doctor: ' + evento['DOCTOR'];

            return {
              title: title,
              start: start,
              end: "",
              backgroundColor: '#36A2EB',
              borderColor: '#36A2EB',
              timezone: 'UTC'
            };
          }),
          editable: true,
          dayMaxEvents: true,
          locale: 'es',
          buttonText: {
            today: 'Hoy',
            month: 'Mes',
            week: 'Semana',
            day: 'Día',
          },
          views: {
            dayGridMonth: { // name of view
              titleFormat: {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
              }
              // other view-specific options here
            }
          }
        });

        calendar.render();
      });
    </script>
    <script src="<?= base_url('js/retri_usuario.js') ?>"></script>
    <script src="<?= base_url('js/PAC-validacionHora.js') ?>"></script>
</body>

</html>