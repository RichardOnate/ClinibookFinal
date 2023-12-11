<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <title>CliniVision-Agendar</title>
</head>

<body class="bg-gray-100">

  <?= view('modulos/navbar.php'); ?>

  <div class=" flex items-center justify-center h-screen mb-32 md:mb-0 relative">
    <!-- alertas -->
    <div id="alerta" class="hidden absolute left-1/2 transform -translate-x-1/2 w-xl p-4 -mt-[30.5rem] text-sm text-green-900 rounded-lg bg-green-200  dark:bg-gray-800
        dark:text-green-400 animate__animated animate__fadeIn" role="alert">
      <span class="font-medium">Todos los campos correctos!!</span>
    </div>
    <div id="alertaError" class="hidden absolute left-1/2 transform -translate-x-1/2 w-xl p-4 -mt-[30.5rem] text-sm text-red-900 rounded-lg bg-red-200  animate__animated animate__fadeIn" role="alert">
      <span class="font-medium">Por favor, complete todos los campos correctamente!!.</span>
    </div>


    <!-- fin alertas -------------- -->
    <form name="agendar" action="/agendar" method="post">
      <div id="form1" class="max-w-4xl p-6 bg-gray-200 border border-blue-800 rounded-lg shadow-lg  mt-32 pb-36 sm:mt-16 lg:mt-16">

        <div class="flex mb-4 items-center justify-center">
          <h1 class="text-2xl text-center text-blue-800">Agendar Cita - Ingrese datos</h1>
        </div>

        <div class="flex flex-col sm:flex-row mb-4 gap-2">
          <!-- Rut -->
          <div class="w-full sm:w-1/2 sm:mr-2 mb-2 sm:mb-0">
            <label for="rut" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">RUT</label>
            <input type="text" id="rut" name="rut" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Ingrese su RUT" />

          </div>

          <!-- Nombres -->
          <div class="w-full sm:w-1/2 sm:ml-2">
            <label for="nombres" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Nombres</label>
            <input type="text" id="nombres" name="nombres" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Ingrese sus nombres" />
          </div>
        </div>

        <div class="flex flex-col sm:flex-row mb-4 gap-2">
          <!-- Apellidos -->
          <div class="w-full sm:w-1/2 sm:mr-2 mb-2 sm:mb-0">
            <label for="apellidos" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Ingrese sus apellidos" />
          </div>

          <!-- Correo -->
          <div class="w-full sm:w-1/2 sm:ml-2">
            <label for="correo" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Correo</label>
            <input type="email" id="correo" name="correo" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Ingrese su correo" />
          </div>
        </div>

        <div class="flex flex-col sm:flex-row mb-4 gap-2">
          <!-- Celular -->
          <div class="w-full sm:w-1/2 sm:mr-2 mb-2 sm:mb-0">
            <label for="celular" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Celular</label>
            <input type="tel" id="celular" name="celular" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Ingrese su número de celular" />
          </div>

          <!-- Previsión -->
          <div class="w-full sm:w-1/2 sm:ml-2">
            <label for="prevision" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Previsión</label>
            <select id="prevision" name="prevision" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600">
              <option value="" disabled="" selected="">Seleccione una opción</option>
              <?php foreach ($previsiones as $prevision) : ?>
                <option value="<?= $prevision['id_prevision'] ?>"><?= $prevision['prev_nombre'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="flex mb-4">
          <!-- Género -->
          <div class="w-full sm:w-1/2 sm:mr-2">
            <label for="genero" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Género</label>
            <select id="genero" name="genero" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600">
              <option value="" disabled="" selected="">Seleccione su género</option>
              <?php foreach ($generos as $genero) : ?>
                <option value="<?= $genero['id_genero'] ?>"><?= $genero['tipo_genero'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <button id="siguiente" type="button" class="w-full py-2.5 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-600">Siguiente</button>

      </div>

      <!-- ------------------------------------------------------------------ -->
      <div id="form2" class=" max-w-3xl p-4 bg-white border border-blue-800 rounded-lg shadow-lg hidden">
        <div>
          <button id="AtrasModal" type="button">
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
            <input datepicker datepicker-format="dd/mm/yyyy" name="fecha" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Seleccione una fecha">
          </div>
          <!-- horario -->
          <div class="flex justify-between mt-4 mb-2 gap-2">
            <div>
              <h3 class="text-lg text-center font-semibold text-gray-900 dark:text-white">Mañana</h3>
              <div class="mt-2 space-y-2 gap-1">
                <?php $count = 1; ?>
                <?php foreach ($horarios as $horario) : ?>
                  <?php if ($count <= 6) : ?>
                    <div>
                      <input type="radio" id="<?= $horario['id_horario'] ?>" name="horario" value="<?= $horario['id_horario'] ?>" class="hidden peer w-full">
                      <label for="<?= $horario['id_horario'] ?>" class="flex items-center py-1 px-10 text-gray-500  bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        <?= $horario['hor_hora_medica'] ?>
                      </label>
                    </div>
                  <?php endif; ?>
                  <?php $count++; ?>
                <?php endforeach; ?>
              </div>
            </div>

            <div>
              <h3 class="text-lg text-center font-semibold text-gray-900 dark:text-white">Tarde</h3>
              <div class="mt-2 space-y-2 gap-1">
                <?php $count1 = 6; ?>
                <?php foreach ($horarios as $horario) : ?>
                  <?php if ($count1 >= 12) : ?>
                    <div class="w-full">
                      <input type="radio" id="<?= $horario['id_horario'] ?>" name="horario" value="<?= $horario['id_horario'] ?>" class="hidden peer w-full">
                      <label for="<?= $horario['id_horario'] ?>" class="flex items-center py-1 px-10 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400">
                        <?= $horario['hor_hora_medica'] ?>
                      </label>
                    </div>
                  <?php endif; ?>
                  <?php $count1++; ?>
                <?php endforeach; ?>
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

        <button id="guardar" type="submit" class="w-full py-2.5 text-sm font-medium text-white bg-blue-500 rounded-md border-2 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-600">Guardar
          Cita</button>
      </div>

    </form>
  </div>



  <?= view('modulos/footer.php'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
  <script src="<?= base_url('js/modalAgendar.js') ?>"></script>
</body>




</html>