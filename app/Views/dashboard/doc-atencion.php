<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
  <title>CliniVision-DOCTOR</title>
</head>

<body class="bg-blue-500">
  <!-- sliderbar -->
  <?= view('sliderbar/sliderbar-doc'); ?>
  <!--  ------------------------------------------------------------ -->
  <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
      <div class=" text-center mb-6 ">
        <h1 class=" text-4xl text-white font-bold">
          Registro de pacientes
        </h1>
      </div>
      <!-- btn Receta -->
      <div class=" flex justify-between gap-3 mb-5 px-3 ">
        <input type="search" id="buscarPaciente" class="w-[40%] text-sm text-gray-900 bg-gray-300 rounded border-s-gray-50 border-s-2 border
                  border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Buscar....">







        <a title="Generar nueva Receta" onclick="abrirVentana()" class="abrirModalReceta cursor-pointer w-auto md:w-auto px-6 py-3 text-base font-medium text-white bg-blue-700 rounded-lg hover:bg-white focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">
          <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M.188 5H5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707c-.358.362-.617.81-.753 1.3C.148 5.011.166 5 .188 5ZM14 8a6 6 0 1 0 0 12 6 6 0 0 0 0-12Zm2 7h-1v1a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2Z" />
            <path d="M6 14a7.969 7.969 0 0 1 10-7.737V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H.188A.909.909 0 0 1 0 6.962V18a1.969 1.969 0 0 0 1.933 2h6.793A7.976 7.976 0 0 1 6 14Z" />
          </svg></a>




      </div>
      <!--  -->

      <div class="w-full">
        <form class="w-full max-w-full">
          <div class="flex -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="rut" class="block text-sm font-medium text-gray-700">RUT</label>
              <input id="rut" type="text" value="" class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <div class="w-full md:w-1/2 px-3">
              <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
              <input id="nombre" name="nombre" type="text" value="" class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
          </div>
          <div class="flex -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
              <input id="apellido" name="apellidos" type="text" value="" class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <div class="w-full md:w-1/2 px-3">
              <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
              <input id="fecha" name="fecha" type="date" value="" class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
          </div>
          <div class="flex -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="celular" class="block text-sm font-medium text-gray-700">Celular</label>
              <input id="celular" name="celular" type="text" value="" class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="correo" class="block text-sm font-medium text-gray-700">Correo</label>
              <input id="correo" name="correo" type="email" value="" class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
          </div>
          <div class="flex -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
              <label for="prevision" class="block text-sm font-medium text-gray-700">Previsión</label>
              <select id="prevision" name="prevision" value="" type="text" class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <option value="" disabled="" selected="">Seleccione una opción</option>
                <?php foreach ($previsiones as $prevision) : ?>
                  <option value="<?= $prevision['id_prevision'] ?>"><?= $prevision['prev_nombre'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="w-full md:w-1/2 px-3">
              <label for="genero" class="block text-sm font-medium text-gray-700">Género</label>
              <select id="genero" value="" class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                <<option value="" disabled="" selected="">Seleccione una opción</option>
                  <?php foreach ($generos as $genero) : ?>
                    <option value="<?= $genero['id_genero'] ?>"><?= $genero['tipo_genero'] ?></option>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="flex -mx-3 mb-6">

            <div class="w-[50%] md:w-1/2 px-3 mb-6 md:mb-0">

            </div>
          </div>
          <div class="flex  -mx-3 mb-6">
            <div class="w-full px-3">
              <h2 class="text-lg font-semibold text-gray-700 mb-2">Generar Credenciales</h2>
              <div class="flex flex-col md:flex-row gap-6">
                <input type="text" class="w-full md:w-1/2 mt-1 md:mr-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50" placeholder="Usuario" disabled>
                <input type="password" class="w-full md:w-1/2 mt-1 md:ml-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50" placeholder="Contraseña" disabled>
              </div>
            </div>
          </div>
          <div class="flex flex-col md:flex-row md:justify-between gap-2">

            <label for="file" title="Cargar Documentos" class=" max-w-[3.7rem] text-black p-3 bg-blue-600 rounded-lg cursor-pointer hover:bg-blue-700">
              <svg class=" text-white" xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor">
                <polyline points="16 16 12 12 8 16"></polyline>
                <line y2="21" x2="12" y1="12" x1="12"></line>
                <path d="M20.39 18.39A5 5 0 0 0 18 9h-1.26A8 8 0 1 0 3 16.3"></path>
                <polyline points="16 16 12 12 8 16"></polyline>
              </svg>
            </label>
            <input id="file" name="file" type="file" class="absolute hidden w-auto cursor-pointer">

            <button type="button" class=" abrirModal w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">Agregar
              Historial Médico </button>
            <button type="button" class="abrirModalHistorial w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 mb-2 md:mb-0">Ver
              Historial anterior</button>
            <button type="button" class="w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 mb-2 md:mb-0">Guardar
              Cambios</button>

          </div>
        </form>
      </div>

      <!-- modal 1 -->
      <section class="modal-overlay fixed top-0 left-0 w-full h-full flex items-center justify-center z-50 hidden">
        <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>

        <div class="max-w-lg h-auto mx-auto md:mb-28 rounded-lg bg-white p-4 relative">
          <span id="cerrarModalBtn2" class="cerrarModalBtn absolute top-0 right-0 mr-2  text-gray-500 cursor-pointer text-4xl hover:text-red-600 transform hover:scale-110 transition-transform">&times;</span>

          <div class=" text-center">
            <h1 class="text-4xl py-4 text-black">Agregar nuevo Historial</h1>
          </div>
          <form>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label for="razon-cita" class="block text-sm font-medium text-gray-700">Razón de Cita</label>
                <select id="razon-cita" class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                  <option value="" disabled="" selected="">Seleccione una opción</option>
                  <?php foreach ($listaHistorial as $lista) : ?>
                    <option value="<?= $lista['id_tipo_detalle'] ?>"><?= $lista['tipo_det_nombre'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3">
                <label for="comentario" class="block text-sm font-medium text-gray-700">Comentario</label>
                <textarea id="comentario" class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
              </div>

            </div>
            <button type="button" class="w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 mb-2 md:mb-0">Guardar
            </button>
          </form>
      </section>



      <!-- modal2 -->
      <section class=" modalHisto fixed top-0 left-0 w-full h-full flex items-center justify-center z-50 hidden">
        <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>

        <div class="max-w-lg h-auto mx-auto md:mb-28 rounded-lg bg-white p-4 relative">
          <span id="cerrarModalBtn2" class="cerrarModalhisto absolute top-0 right-0 mr-2  text-gray-500 cursor-pointer text-4xl hover:text-red-600 transform hover:scale-110 transition-transform">&times;</span>

          <div class=" text-center">
            <h1 class="text-4xl py-4 text-black">Ver Historial del Paciente</h1>
          </div>
          <span>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet quaerat est labore rem ea numquam blanditiis
            ipsa dignissimos tempora voluptas quis unde beatae, enim provident impedit voluptates reiciendis praesentium
            perspiciatis!
          </span>

        </div>
      </section>
    </div>
  </div>


  </div>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  <script src="<?= base_url('js/docFuncionalidad.js') ?>"></script>
  <script src="<?= base_url('js/controlVentana.js') ?>"></script>
  <script src="<?= base_url('js/DOC-atenderPaciente.js') ?>"></script>
</body>

</html>