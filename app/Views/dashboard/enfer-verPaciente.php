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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <title>CliniVision-ENFERMERA</title>
</head>

<body class="bg-blue-500 ">
  <!-- sliderbar -->
  <?= view('sliderbar/sliderbar-enfer'); ?>
  <!--  ------------------------------------------------------------ -->


  <div class="p-4 sm:ml-64 relative">
    <!-- alertas -->
    <div id="alerta" class="hidden absolute left-1/2 transform -translate-x-1/2 p-4 text-sm text-green-900 rounded-lg bg-green-200  dark:bg-gray-800
        dark:text-green-400 animate__animated animate__fadeIn" role="alert">
      <span class="font-medium">Éxito:</span> Los campos se han habilitado para la edición.
    </div>
    <!-- fin alertas -------------- -->
    <div class=" p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
      <div>
        <div class="w-full">
          <div class="mb-3">
            <h2 class="text-4xl text-white text-center font-bold">Buscar Paciente</h2>
          </div>
          <div class="relative w-full mb-3">
            <input type="search" id="buscarPaciente" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border
                  border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Buscar....">
            <button type="submit" id="btnbuscarPaciente" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
              <span class="sr-only"></span>
            </button>
          </div>
          <!-- formulario -->
          <form action="/act-pacienteEnf" method="post">
            <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
              <input type="hidden" id="id_p" name="id_paciente" value="">
              <!-- rut -->
              <div>
                <label for="rut" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">RUT</label>
                <input type="text" id="rut" name="rut" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled="">
              </div>
              <!-- nombre -->
              <div>
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                <input type="text" id="nombres" name="nombres" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled="">
              </div>
              <!-- apellidos -->
              <div>
                <label for="apellido" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Apellido</label>
                <input type="text" id="apellidos" name="apellidos" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled="">
              </div>
              <!-- fecha nacimiento -->
              <div>
                <label for="fecha" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled="">
              </div>
              <!-- celular -->
              <div>
                <label for="celular" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Celular</label>
                <input type="text" id="celular" name="celular" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled="">
              </div>
              <!-- correo electronico -->
              <div>
                <label for="correo" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Correo</label>
                <input type="text" id="correo" name="correo" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled="">
              </div>
              <!-- genero -->
              <div>
                <label for="genero" class="block text-sm font-medium text-gray-700"">Género</label>
                <select disabled name=" genero" class=" mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" id="genero" name="genero">
                  <option selected>Seleccione una opción</option>
                  <?php foreach ($generos as $genero) : ?>
                    <option value="<?= $genero['id_genero'] ?>"><?= $genero['tipo_genero'] ?></option>
                  <?php endforeach; ?>
                  </select>
              </div>
              <!-- prevision -->
              <div>
                <label for="prevision" class="block text-sm font-medium text-gray-700">Previsión</label>
                <select id="prevision" disabled name="prevision" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                  <option selected>Seleccione una opción</option>
                  <?php foreach ($previsiones as $prevision) : ?>
                    <option value="<?= $prevision['id_prevision'] ?>"><?= $prevision['prev_nombre'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- historial -->
            <div class="mt-4">
              <h3 class="text-lg font-bold text-gray-900 dark:text-white">Historial paciente</h3>
              <textarea id="historial" class="w-full h-[30rem] px-4 py-2 mt-2 border border-gray-300 rounded-lg bg-gray-100" disabled></textarea>
            </div>
            <div class="mt-4">
              <button id="editar" type="button" class="mb-2 md:mb-0 w-full md:w-auto px-6 py-4 text-sm font-medium text-gray-700 bg-gray-300 rounded-md hover:bg-gray-400 focus:ring focus:ring-gray-300 focus:ring-opacity-50">Editar</button>
              <button type="submit" class="w-full md:w-auto px-6 py-4 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Guardar
                Cambios</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  <script src="<?= base_url('js/ENF-verPaciente.js') ?>"></script>
  <script>
    document.getElementById('editar').addEventListener('click', function() {
      var campos = document.querySelectorAll('input, select');

      campos.forEach(function(campo) {
        campo.removeAttribute('disabled');
      });

      // Mostrar la alerta con animación
      var alerta = document.getElementById('alerta');
      alerta.classList.remove('hidden', 'animate__fadeOut');
      alerta.classList.add('animate__fadeIn');

      // Ocultar la alerta después de 3 segundos (3000 milisegundos)
      setTimeout(function() {
        // Ocultar la alerta con animación
        alerta.classList.remove('animate__fadeIn');
        alerta.classList.add('animate__fadeOut');

        // Agregar la clase hidden después de la duración de la animación (1 segundo)
        setTimeout(function() {
          alerta.classList.add('hidden');
        }, 1000);
      }, 3000);
    });
  </script>
</body>

</html>