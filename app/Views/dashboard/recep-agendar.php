<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
  <title>CliniVision-RECEPCIONISTA</title>
</head>

<body class="bg-blue-500">
  <!-- sliderbar -->
  <?= view('sliderbar/sliderbar-recep'); ?>
  <!--  ------------------------------------------------------------ -->
  <div class="p-4 sm:ml-64">
    <div class="p-4 border-2  border-white border-dashed rounded-lg ">
      <form action="/agendar-cita" method="post" class="md:mx-80">
        <div id="form1">
          <div class="flex mb-4 items-center justify-center">
            <h1 class="text-3xl text-center font-bold text-blue-900">Agendar Cita Paciente</h1>
          </div>

          <div class="flex flex-col sm:flex-row mb-4 gap-2">
            <input type="hidden" id="id_p" name="id_paciente" value="">
            <div class="w-full sm:w-1/2 sm:mr-2 mb-2 sm:mb-0">
              <label for="rut" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Busqueda</label>
              <input type="search" id="buscarPaciente" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Buscar...." />
            </div>
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
                <option value="">Seleccione una opción</option>
                <?php foreach ($previsiones as $prevision) : ?>
                  <option value="<?= $prevision['id_prevision'] ?>" <?= ($datosPac['IDP'] ?? '') == $prevision['id_prevision'] ? 'selected' : '' ?>>
                    <?= $prevision['prev_nombre'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="flex mb-4">
            <!-- Género -->
            <div class="w-full sm:w-1/2 sm:mr-2">
              <label for="genero" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Género</label>
              <select id="genero" name="genero" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" required="">
                <option value="">Seleccione una opción</option>
                <?php foreach ($generos as $genero) : ?>
                  <option value="<?= $genero['id_genero'] ?>" <?= ($datosPac['IDG'] ?? '') == $genero['id_genero'] ? 'selected' : '' ?>>
                    <?= $genero['tipo_genero'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
        </div>

        <!-- ------------------------------------------------------------------ -->
        <div id="form2">
          <div class="">

            <h2 class="my-4 text-2xl text-center font-bold text-gray-900 dark:text-white">Selecciona Un Horario</h2>

            <!-- Date picker  -->
            <div class="relative w-auto">
              <label for="fecha" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-400">Fecha</label>
              <input type="date" id="fecha" name="fecha" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600" placeholder="Ingrese su número de celular" />
            </div>
            <!-- horario -->
            <div class="flex justify-center mt-4 mb-2 gap-2">
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

          <button id="siguiente" type="submit" class="w-full py-2.5 text-sm font-medium text-white bg-blue-700 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-700 dark:hover:bg-blue-800 dark:focus:ring-blue-600">Guardar
            Cita</button>
        </div>

      </form>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/datepicker.min.js"></script>
  <script src="<?= base_url('js/REC-buscarPaciente.js') ?>"></script>

</body>

</html>