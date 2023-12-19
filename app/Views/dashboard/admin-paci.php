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
  <title>CliniVision-ADMIN</title>
</head>

<body class="bg-blue-500 relative">

  <!-- sliderbar -->
  <?= view('sliderbar/sliderbar-admin'); ?>
  <!--  ------------------------------------------------------------ -->

  <!-- alertas -->
  <div id="alerta" class="hidden absolute left-1/2 transform -translate-x-1/2 w-xl p-4 -mt-5 text-sm text-green-900 rounded-lg bg-green-200  dark:bg-gray-800
        dark:text-green-400 animate__animated animate__fadeIn" role="alert">
    <span class="font-medium">Éxito:</span> Los campos se han habilitado para la edición.
  </div>
  <!-- fin alertas -------------- -->




  <section class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

      <div class="grid grid-cols-1 gap-4 mb-4">
        <!-- ------------------------------------------------------------------------------------------------ -->
        <div class="flex justify-center h-auto mb-4 pb-4 rounded bg-blue-600 dark:bg-gray-800">
          <div class="w-[95%] mt-4 block">
            <form>
              <div class="flex gap-1">

                <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">Todos los Pacientes</button>
                <!-----------------------------------------------------------------------------  -->
                <div class="relative w-full">
                  <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border
                  border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Nombres....">
                  <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                    <span class="sr-only"></span>
                  </button>
                </div>
              </div>

            </form>


            <div class="relative max-h-screen overflow-x-auto mt-4 shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="p-4">
                      <div class="flex items-center">

                      </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Rut
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Nombre Completo
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Especialista
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Celular
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Estado citas
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Acción
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($lista as $paciente) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="w-4 p-4">
                        <div class="flex items-center">

                        </div>
                      </td>
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $paciente['RUT'] ?>
                      </th>
                      <td class="px-6 py-4">
                        <?= $paciente['NOMBRE COMPLETO'] ?>
                      </td>
                      <td class="px-6 py-4">
                        <?= $paciente['ESPECIALISTA'] ?>
                      </td>
                      <td class="px-6 py-4">
                        <?= $paciente['CELULAR'] ?>
                      </td>
                      <td data-id="<?= $paciente['ESTADO CITA'] ?>" class="px-6 py-4 estado ">
                        <?= $paciente['ESTADO CITA'] ?>
                      </td>
                      <td class="flex items-center px-6 py-4">
                        <button id="Editar" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" data-id="<?= $paciente['ID'] ?>">Editar</button>
                        <button id="Eliminar" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3" data-id="<?= $paciente['ID'] ?>">Eliminar</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-200 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Mostrando
                  <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Anterior</a>
                  </li>
                  <li>
                    <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">1</a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">3</a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Siguiente</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- Modales-->
  <section id="modalDatos" class=" modalDatos fixed top-0 left-0 w-full h-full flex items-center justify-center z-50 hidden">
    <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>
    <div class="max-w-lg h-auto mx-auto md:mb-28 rounded-lg bg-white p-4 relative">
      <span id="cerrarModalBtn" class="cerrarModalBtn absolute top-0 right-0 mr-2  text-gray-500 cursor-pointer text-4xl hover:text-red-600 transform hover:scale-110 transition-transform">&times;</span>

      <div class=" text-center">
        <h1 class="text-4xl py-4 text-black">Editar Datos</h1>
      </div>
      <form action="/act-pacm" method="post">
        <div class="mb-4">
          <input type="hidden" id="id_m" name="id" value="">
          <!-- Rut -->
          <label for="rut" class="block text-sm font-medium text-gray-700">Rut</label>
          <input type="text" id="rut_m" name="rut" value="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="mb-4">
            <!-- Nombres -->
            <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
            <input type="text" id="nombres_m" name="nombres" value="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
          <div class="mb-4">
            <!-- Apellidos -->
            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
            <input type="text" id="apellidos_m" name="apellidos" value="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="mb-4">
            <!-- Celular -->
            <label for="celular" class="block text-sm font-medium text-gray-700">Celular</label>
            <input type="text" id="celular_m" name="celular" value="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
          <div class="mb-4">
            <!-- Correo -->
            <label for="correo" class="block text-sm font-medium text-gray-700">Correo</label>
            <input type="email" id="correo_m" name="correo" value="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
        </div>
        <!-- btn Guardar -->
        <div class="flex flex-col md:flex-row md:justify-between">
          <button type="submit" class="w-full md:w-auto px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Guardar
            Cambios</button>
        </div>
      </form>
  </section>


  <!-- modal 2 -->
  <section id="modalDatos2" class=" modalDatos fixed top-0 left-0 w-full h-full flex items-center justify-center z-50 hidden">
    <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>
    <div class="max-w-lg h-auto mx-auto md:mb-28 rounded-lg bg-white p-4 relative">
      <span id="cerrarModalBtn2" class="cerrarModalBtn absolute top-0 right-0 mr-2  text-gray-500 cursor-pointer text-4xl hover:text-red-600 transform hover:scale-110 transition-transform">&times;</span>

      <div class=" text-center">
        <h1 class="text-4xl py-4 text-black">Agregar Nuevo Paciente</h1>
      </div>
      <div class="max-w-xl mx-auto">
        <form>
          <!-- Rut -->
          <div class="mb-4">
            <label for="rut" class="block text-sm font-medium text-gray-700">Rut</label>
            <input type="text" id="rut" name="rut" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
          <div class="grid grid-cols-2 gap-4">
            <!--Nombres  -->
            <div class="mb-4">
              <label for="nombre" class="block text-sm font-medium text-gray-700">Nombres</label>
              <input type="text" id="nombre" name="nombre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <!-- Apellidos -->
            <div class="mb-4">
              <label for="apellido" class="block text-sm font-medium text-gray-700">Apellidos</label>
              <input type="text" id="apellido" name="apellido" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
          </div>
          <!-- Fecha Nacimiento -->
          <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
              <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha de Nacimiento</label>
              <input type="date" id="fecha" name="fecha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <!-- Celular -->
            <div class="mb-4">
              <label for="celular" class="block text-sm font-medium text-gray-700">Celular</label>
              <input type="text" id="celular" name="celular" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
          </div>
          <!-- Direccion -->
          <div class="mb-4">
            <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
            <input type="text" id="direccion" name="direccion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
          <!-- Correo -->
          <div class="mb-4">
            <label for="correo" class="block text-sm font-medium text-gray-700">Correo</label>
            <input type="email" id="correo" name="correo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
          <div class="grid grid-cols-2 gap-4">
            <!-- genero -->
            <div class="mb-4">
              <label for="genero" class="block text-sm font-medium text-gray-700">Género</label>
              <select id="genero" name="genero" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
              </select>
            </div>
            <!-- Prevision -->
            <div class="mb-4">
              <label for="prevision" class="block text-sm font-medium text-gray-700">Previsión</label>
              <select id="prevision" name="prevision" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="fonasa">Fonasa</option>
                <option value="isapre">Isapre</option>
              </select>
            </div>
          </div>
          <button type="submit" class="w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Guardar</button>
        </form>
      </div>
  </section>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('js/trabFuncionalidad.js') ?>"></script>
  <script src="<?= base_url('js/AD-actualizarPaciente.js') ?>"></script>
  <script src="<?= base_url('js/AD-eliminarPaciente.js') ?>"></script>
  <script src="<?= base_url('js/retri_usuario.js') ?>"></script>

<script>
 // Espera a que el documento esté completamente cargado
document.addEventListener("DOMContentLoaded", function() {
    // Obtén todas las celdas <td> con la clase 'estado'
    var celdasEstado = document.querySelectorAll('.estado');

    // Itera sobre cada celda
    celdasEstado.forEach(function(estado) {
        // Obtiene el valor de 'data-id'
        var estadoCita = estado.getAttribute('data-id');

        // Aplica las clases según el valor de 'data-id'
        switch (estadoCita) {
            case 'Agendada':
                estado.classList.add('bg-purple-200');
                break;
            case 'Cancelada':
                estado.classList.add('bg-red-200');
                break;
            case 'Confirmada':
                estado.classList.add('bg-blue-200');
                break;
            case 'Atendiendo':
                estado.classList.add('bg-yellow-200');
                break;
            case 'Atendida':
                estado.classList.add('bg-green-200');
                break;
            // Agrega más casos según sea necesario
            default:
                // Puedes agregar un caso por defecto si es necesario
                break;
        }
    });
});

</script>


  
</body>

</html>