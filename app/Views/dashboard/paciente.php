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
              <h3 class="text-xl text-blue-700 font-bold md:text-2xl lg:text-5xl"> </h3>
              <span class="text-xl text-blue-700 lg:text-4xl  justify-center text-center">50</span>
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
              <h3 class="text-lg text-red-700 font-bold md:text-2xl lg:text-5xl"> :</h3>
              <span class="text-xl text-red-700 sm:text-4xl  justify-center text-center">50</span>
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
              <h3 class="text-lg text-emerald-700 font-bold md:text-2xl lg:text-5xl"></h3>
              <span class="text-xl text-emerald-700 sm:text-4xl  justify-center text-center">50</span>
            </div>
          </div>
        </div>

        <div class="flex justify-between gap-2 mb-3">
          <h2 class="text-4xl text-gray-100 pl-3 text-center font-bold">Calendario Citas</h2>

          <button id="agendarPaciente" type="button" class="abrirBtnAgendar px-2 py-2 mb-2 md:mb-0 w-full md:w-auto text-sm font-medium text-gray-200 bg-gray-800 rounded-md hover:bg-emerald-600 focus:ring focus:ring-opacity-50">Agendar Nueva Cita</button>
        </div>
        <div class="">
          <div id="calendar" class="w-full mx-auto rounded border-2 bg-gray-100"></div>
        </div>
    </div>

    <!-- Modal agendar------------------------------------------------------------- -->
    <section class="modalAgendar fixed top-0 left-0 w-full h-full flex items-center justify-center z-40 hidden ">
      <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>

      <div class=" h-auto rounded-lg bg-white p-4 relative ">
        <span id="cerrarModalBtn2" class="cerrarModalhisto absolute top-2 right-0 mr-4  text-gray-500 cursor-pointer text-4xl hover:text-red-600 transform hover:scale-110 transition-transform">&times;</span>

        <form action="">
          <div id="form1" class="max-w-4xl p-6 bg-white border border-blue-800 rounded-lg shadow-lg  mt-32 pb-36 sm:mt-16 lg:mt-16">

            <div class="flex mb-4 items-center justify-center">
              <h1 class="text-2xl text-center text-blue-800">Agendar Cita - Ingrese datos</h1>
            </div>

            <div class="flex flex-col sm:flex-row mb-4 gap-2">
              <!-- Rut -->
              <div class="w-full sm:w-1/2 sm:mr-2 mb-2 sm:mb-0">
                <label for="rut" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">RUT</label>
                <input type="text" id="rut" name="rut" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Ingrese su RUT" required="" />
              </div>

              <!-- Nombres -->
              <div class="w-full sm:w-1/2 sm:ml-2">
                <label for="nombres" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Nombres</label>
                <input type="text" id="nombres" name="nombres" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Ingrese sus nombres" required="" />
              </div>
            </div>

            <div class="flex flex-col sm:flex-row mb-4 gap-2">
              <!-- Apellidos -->
              <div class="w-full sm:w-1/2 sm:mr-2 mb-2 sm:mb-0">
                <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Ingrese sus apellidos" required="" />
              </div>

              <!-- Correo -->
              <div class="w-full sm:w-1/2 sm:ml-2">
                <label for="correo" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Correo</label>
                <input type="email" id="correo" name="correo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Ingrese su correo" required="" />
              </div>
            </div>

            <div class="flex flex-col sm:flex-row mb-4 gap-2">
              <!-- Celular -->
              <div class="w-full sm:w-1/2 sm:mr-2 mb-2 sm:mb-0">
                <label for="celular" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Celular</label>
                <input type="tel" id="celular" name="celular" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Ingrese su número de celular" required="" />
              </div>

              <!-- Previsión -->
              <div class="w-full sm:w-1/2 sm:ml-2">
                <label for="prevision" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Previsión</label>
                <select id="prevision" name="prevision" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" required="">
                  <option value="" disabled="" selected="">Seleccione una opción</option>
                  <option value="fonasa">Fonasa</option>
                  <option value="isapre">Isapre</option>
                </select>
              </div>
            </div>

            <div class="flex mb-4">
              <!-- Género -->
              <div class="w-full sm:w-1/2 sm:mr-2">
                <label for="genero" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Género</label>
                <select id="genero" name="genero" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" required="">
                  <option value="" disabled="" selected="">Seleccione su género</option>
                  <option value="masculino">Masculino</option>
                  <option value="femenino">Femenino</option>
                  <option value="otro">Otro</option>
                </select>
              </div>
            </div>

            <button id="siguiente" type="submit" class="w-full py-2.5 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-600">Siguiente</button>

          </div>

          <!-- ------------------------------------------------------------------ -->
          <div id="form2" class=" max-w-3xl p-4 bg-white border border-blue-800 rounded-lg shadow-lg hidden">
            <div>
              <button id="AtrasModal">
                <svg class="w-6 h-6 text-gray-800  hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
              </button>
            </div>

            <div class="max-w-lg pb-4 px-4 block justify-center items-center ">

              <h2 class="mb-4 text-2xl text-center font-bold text-gray-900 dark:text-white">Selecciona Un Horario</h2>

              <!-- Date picker  -->
              <div class="relative w-auto">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                  </svg>
                </div>
                <input datepicker datepicker-format="dd/mm/yyyy" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Seleccione una fecha">
              </div>
              <!-- horario -->
              <div class="flex justify-between mt-4 mb-2 gap-2">
                <div>
                  <h3 class="text-lg text-center font-semibold text-gray-900 dark:text-white">Mañana</h3>
                  <div class="mt-2 space-y-2 gap-1">
                    <div>
                      <input type="radio" id="1" name="hosting" value="1" class="hidden peer w-full" required>
                      <label for="1" class="flex items-center py-1 px-10 text-gray-500  bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        09:00
                      </label>
                    </div>
                    <div>
                      <input type="radio" id="2" name="hosting" value="2" class="hidden peer w-full" required>
                      <label for="2" class="flex items-center py-1 px-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        09:00
                      </label>
                    </div>
                    <div>
                      <input type="radio" id="3" name="hosting" value="3" class="hidden peer w-full" required>
                      <label for="3" class="flex items-center py-1 px-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        09:00
                      </label>
                    </div>
                    <div>
                      <input type="radio" id="4" name="hosting" value="4" class="hidden peer w-full" required>
                      <label for="4" class="flex items-center py-1 px-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        09:00
                      </label>
                    </div>
                    <div>
                      <input type="radio" id="5" name="hosting" value="5" class="hidden peer w-full" required>
                      <label for="5" class="flex items-center py-1 px-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        09:00
                      </label>
                    </div>
                    <div>
                      <input type="radio" id="6" name="hosting" value="6" class="hidden peer w-full" required>
                      <label for="6" class="flex items-center py-1 px-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        09:00
                      </label>
                    </div>
                  </div>
                </div>

                <div>
                  <h3 class="text-lg text-center font-semibold text-gray-900 dark:text-white">Tarde</h3>
                  <div class="mt-2 space-y-2 gap-1">
                    <div class="w-full">
                      <input type="radio" id="7" name="hosting" value="7" class="hidden peer w-full" required>
                      <label for="7" class="flex items-center py-1 px-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        09:00
                      </label>
                    </div>
                    <div>
                      <input type="radio" id="8" name="hosting" value="8" class="hidden peer w-full" required>
                      <label for="8" class="flex items-center py-1 px-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        09:00
                      </label>
                    </div>
                    <div>
                      <input type="radio" id="9" name="hosting" value="9" class="hidden peer w-full" required>
                      <label for="9" class="flex items-center py-1 px-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        09:00
                      </label>
                    </div>
                    <div>
                      <input type="radio" id="10" name="hosting" value="10" class="hidden peer w-full" required>
                      <label for="10" class="flex items-center py-1 px-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        09:00
                      </label>
                    </div>
                    <div>
                      <input type="radio" id="11" name="hosting" value="11" class="hidden peer w-full" required>
                      <label for="11" class="flex items-center py-1 px-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        09:00
                      </label>
                    </div>
                    <div>
                      <input type="radio" id="12" name="hosting" value="12" class="hidden peer w-full" required>
                      <label for="12" class="flex items-center py-1 px-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        09:00
                      </label>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            <!-- select doctor -->
            <div class=" mb-4">
              <label for="underline_select" class="sr-only">Underline select</label>
              <select id="underline_select" class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-blue-600 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option selected>Seleccionar Doctor</option>
                <option value="US">United States</option>
                <option value="CA">Canada</option>
                <option value="FR">France</option>
                <option value="DE">Germany</option>
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
        var calendar = new FullCalendar.Calendar(calendarEl, {
          contentHeight: 500,
          aspectRatio: 2,
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          events: [{
              title: 'Evento de prueba',
              start: '2023-12-08T10:00:00',
              end: '2023-12-08T12:00:00',
              backgroundColor: '#36A2EB',
              borderColor: '#36A2EB',
              timezone: 'UTC' // O ajusta a tu zona horaria específica   // Color del borde personalizado
            }
            // Puedes agregar más eventos si es necesario
          ],
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


</body>

</html>