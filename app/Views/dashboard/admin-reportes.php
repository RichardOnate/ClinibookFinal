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

<body class="bg-blue-500 ">
  <!-- sliderbar -->
  <?= view('sliderbar/sliderbar-admin'); ?>
  <!--  ------------------------------------------------------------ -->
  <div class="p-4 -mt-[18px] sm:ml-64 md:mt-4  relative">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

      <!-- alertas -->
      <div id="alerta" class="hidden absolute left-1/2 transform -translate-x-1/2 w-xl p-4 -mt-5 text-sm text-green-900 rounded-lg bg-green-200  dark:bg-gray-800
        dark:text-green-400 animate__animated animate__fadeIn" role="alert">
        <span class="font-medium">Éxito:</span> Los campos se han habilitado para la edición.
      </div>
      <!-- fin alertas -------------- -->

      <div class="p-4 h-auto  ">

        <div class="flex items-center justify-center w-full ">

          <form class="p-6 w-full bg-white border border-gray-200 rounded-lg shadow-lg ">
            <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Exportar Datos</h2>
            <div class=" grid grid-cols-2 gap-4 ">
              <div class="mb-4">
                <label for="dataType" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Tipo de
                  Datos</label>
                <select id="dataType" name="dataType" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 dark:focus:ring-blue-800 focus:ring-opacity-50">
                  <option value="Todo">Todo</option>
                  <option value="patients">Pacientes</option>
                  <option value="specialists">Especialistas</option>
                  <option value="nurses">Enfermeros</option>
                  <option value="receptionists">Recepcionistas</option>
                </select>
              </div>
              <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Filtrar por
                  nombre</label>
                <input type="text" id="username" name="username" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 dark:focus:ring-blue-800 focus:ring-opacity-50">
              </div>
              <div class="flex items-center justify-between">
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-900">Exportar
                  PDF</button>
              </div>
              <div class="flex items-center justify-between">
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-900">Exportar
                  EXCEL</button>
              </div>
            </div>



            <!-- tabla -->
            <div class="relative border-t-4 border-gray-700 overflow-x-auto mt-4 shadow-md sm:rounded-lg">
              <table class="w-full bg-slate-500 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>

                    <th scope="col" class="px-6 py-3">
                      Rut
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Nombre Completo
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Correo
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Celular
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Rol
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($lista as $usuarios) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600">

                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $usuarios['RUT'] ?>
                      </th>
                      <td class="px-6 py-4">
                        <?= $usuarios['NOMBRE'] ?>
                      </td>
                      <td class="px-6 py-4">
                        <?= $usuarios['CORREO'] ?>
                      </td>
                      <td class="px-6 py-4">
                        <?= $usuarios['CELULAR'] ?>
                      </td>
                      <td class="px-6 py-4">
                        <?= $usuarios['ROL'] ?>
                      </td>

                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4" aria-label="Table navigation">
                <span class="text-sm font-normal text-gray-600 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing
                  <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Anterior</a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                  </li>
                  <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                  </li>
                  <li>
                    <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
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
          </form>





        </div>


      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <script src="<?= base_url('js/retri_usuario.js') ?>"></script>

</body>

</html>