<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


  <title>CliniVision-receta</title>
</head>

<body class="bg-blue-500">
  <!--  ------------------------------------------------------------ -->
  <div class="p-4">
    <div class="max-w-6xl h-auto mx-auto rounded-lg bg-white p-4 relative">
      <div class=" text-center">
        <h3 class="text-4xl py-4 m-2 text-black">Generar receta</h1>
          <div class=" ">

            <select name="tipos-receta" id="secciones" onchange="mostrarSeccion()"
              class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
              <option value="" disabled="" selected="">Seleccione una opción</option>
              <?php foreach ($tipos as $tipo): ?>
                <option value="<?= $tipo['id_tipo_receta'] ?>">
                  <?= $tipo['tipo_rec_nombre'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
      </div>
      <!-- graduacion Oftalmologica -->
      <form>
        <div class="mt-5 hidden  seccion " id="1">
          <h2 class="text-2xl font-bold mb-4">Receta para anteojos</h2>
          <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
            <div>
              <label for="especialista" class="block text-sm font-medium text-gray-700">Especialista</label>
              <input type="text" id="especialista1" name="especialista"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="rut" class="block text-sm font-medium text-gray-700">RUT Paciente</label>
              <input type="text" id="rut1" name="rut"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Paciente</label>
              <input type="text" id="nombre1" name="nombre"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div>
              <label for="od" class="block text-sm font-medium text-gray-700">OD: Ojo derecho</label>
              <input type="text" id="od" name="od"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="oi" class="block text-sm font-medium text-gray-700">OI: Ojo izquierdo</label>
              <input type="text" id="oi" name="oi"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="ao" class="block text-sm font-medium text-gray-700">AO: Ambos ojos</label>
              <input type="text" id="ao" name="ao"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="ad-add" class="block text-sm font-medium text-gray-700">AD/ADD: Adición</label>
              <input type="text" id="ad-add" name="ad-add"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="osf" class="block text-sm font-medium text-gray-700">ESF/SPH: Esfera</label>
              <input type="text" id="osf" name="osf"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="cil" class="block text-sm font-medium text-gray-700">CIL: Cilindro</label>
              <input type="text" id="cil" name="cil"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="av" class="block text-sm font-medium text-gray-700">AV: Agudeza visual</label>
              <input type="text" id="av" name="av"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="vl" class="block text-sm font-medium text-gray-700">VL: Visión lejana</label>
              <input type="text" id="vl" name="vl"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="vp" class="block text-sm font-medium text-gray-700">VP: próxima</label>
              <input type="text" id="vp" name="vp"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="vi" class="block text-sm font-medium text-gray-700">VI: Visión intermedia</label>
              <input type="text" id="vi" name="vi"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="dp" class="block text-sm font-medium text-gray-700">DP: Distancia pupilar</label>
              <input type="text" id="dp" name="dp"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

          </div>
          <div class="w-full my-4 ">
            <label for="comentario" class="block text-sm font-medium text-gray-700">Comentario</label>
            <textarea id="comentario"
              class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
          </div>
          <div class="m-4 md:flex md:justify-between">
            <button type="button"
              class="abrirModalHistorial w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 mb-2 md:mb-0">
              Guardar</button>
            <a href="<?= base_url('recetaController/generarPDF') ?>" id="generarPDFLink" onclick="generarPDF()"
              class=" w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">Generar
              PDF </button>
          </div>
        </div>
      </form>
      <!-- Tratamientos -->
      <form action="">
        <div class="mt-5 hidden seccion" id="2">
          <h2 class="text-2xl font-bold mb-4">Receta para Tratamientos</h2>
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="especialista" class="block text-sm font-medium text-gray-700">Especialista</label>
              <input type="text" id="especialista2" name="especialista"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="rut" class="block text-sm font-medium text-gray-700">RUT Paciente</label>
              <input type="text" id="rut2" name="rut"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="w-full">
              <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Paciente</label>
              <input type="text" id="nombre2" name="nombre"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
          </div>
          <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="3"
              class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
          </div>
          <div class="m-4 md:flex md:justify-between">
            <button type="button"
              class="abrirModalHistorial w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 mb-2 md:mb-0">
              Guardar</button>
            <button type="button"
              class=" abrirModal w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">Generar
              PDF </button>
          </div>
        </div>
      </form>
      <!-- Medicamentos -->
      <form action="">
        <div class="mt-5 hidden  seccion" id="3">
          <h2 class="text-2xl font-bold mb-4">Receta para Medicamentos</h2>
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="especialista" class="block text-sm font-medium text-gray-700">Especialista</label>
              <input type="text" id="especialista3" name="especialista"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="rut" class="block text-sm font-medium text-gray-700">RUT Paciente</label>
              <input type="text" id="rut3" name="rut"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="w-full">
              <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Paciente</label>
              <input type="text" id="nombre3" name="nombre"
                class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
          </div>
          <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcion" name="descripcion" rows="3"
              class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
          </div>
          <div class="m-4 md:flex md:justify-between">
            <button type="button"
              class="abrirModalHistorial w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 mb-2 md:mb-0">
              Guardar</button>
            <button type="button"
              class=" w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">Generar
              PDF </button>
          </div>
        </div>
      </form>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="<?= base_url('js/mostrarRecetas.js') ?>"></script>
</body>

</html>