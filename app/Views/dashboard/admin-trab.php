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

<body class="bg-blue-500 overflow-hidden relative">

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
                <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                  <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                    <li>
                      <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Doctores</button>
                    </li>
                    <li>
                      <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Recepcionistas</button>
                    </li>
                    <li>
                      <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Enfermeras/os</button>
                    </li>
                  </ul>
                </div>
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

                <div>
                  <!-- Nuevo Trabajador -->
                  <button type="button" id="nuevoTrabajador" title="Nuevo Trabajador" class="editarTrabajador w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center focus:ring-blue-800 text-white">
                    <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                      <path d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Zm11-3h-2V5a1 1 0 0 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 0 0 2 0V9h2a1 1 0 1 0 0-2Z" />
                    </svg>
                  </button>
                </div>

              </div>

            </form>


            <div class="relative overflow-x-auto mt-4 shadow-md sm:rounded-lg">
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
                      Celular
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Rol
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Acción
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($lista as $trabajador) : ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="w-4 p-4">
                        <div class="flex items-center">

                        </div>
                      </td>
                      <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $trabajador['RUT'] ?>
                      </td>
                      <td class="px-6 py-4">
                        <?= $trabajador['NOMBRE COMPLETO'] ?>
                      </td>
                      <td class="px-6 py-4">
                        <?= $trabajador['CELULAR'] ?>
                      </td>
                      <td class="px-6 py-4">
                        <?= $trabajador['ROL'] ?>
                      </td>
                      <!--<td class="px-6 py-4">
                                                Yes
                                            </td>-->
                      <td class="flex items-center px-6 py-4">
                        <button id="Editar" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" data-id="<?= $trabajador['ID'] ?>">Editar</button>
                        <button id="Eliminar" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3" data-id="<?= $trabajador['ID'] ?>">Eliminar</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- Modales-->
  <section id="modalDatos" class="modalDatos fixed top-0 left-0 w-full h-full flex items-center justify-center z-50 hidden">
    <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>
    <div class="max-w-lg h-auto mx-auto md:mb-28 rounded-lg bg-white p-4 relative">
      <span id="cerrarModalBtn" class="cerrarModalBtn absolute top-0 right-0 mr-2  text-gray-500 cursor-pointer text-4xl hover:text-red-600 transform hover:scale-110 transition-transform">&times;</span>

      <div class=" text-center">
        <h1 class="text-4xl py-4 text-black">Editar Datos</h1>
      </div>
      <form action="/act-trab" method="post">
        <input type="hidden" id="id_m" name="id" value="">
        <div class="mb-4">
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
            <!-- Rol -->
            <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
            <select id="rol_m" name="rol" value="" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
              <option value=""></option>
              <?php foreach ($roles as $rol) : ?>
                <option value="<?= $rol['id_rol'] ?>"><?= $rol['rol_nombre'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
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
        <h1 class="text-4xl py-4 text-black">Agregar Nuevo Trabajador</h1>
      </div>
      <form action="/insert-trab" method="post">

        <div class="mb-4">
          <!-- Rut -->
          <label for="rut" class="block text-sm font-medium text-gray-700">Rut</label>
          <input type="text" id="rut" name="rut" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="mb-4">
            <!-- Nombres -->
            <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
            <input type="text" id="nombres" name="nombres" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
          <div class="mb-4">
            <!-- Apellidos -->
            <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="mb-4">
            <!-- Celular -->
            <label for="celular" class="block text-sm font-medium text-gray-700">Celular</label>
            <input type="text" id="celular" name="celular" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
          <div class="mb-4">
            <!-- Rol -->
            <label for="rol" class="block text-sm font-medium text-gray-700">Rol</label>
            <select id="rol" name="rol" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
              <option value="" disabled="" selected="">Seleccione un rol</option>
              <?php foreach ($roles as $rol) : ?>
                <option value="<?= $rol['id_rol'] ?>"><?= $rol['rol_nombre'] ?></option>
              <?php endforeach; ?>
            </select>
            </select>
          </div>
          <div class="mb-4">
            <!-- Sucursal -->
            <label for="sucursal" class="block text-sm font-medium text-gray-700">Sucursal</label>
            <select id="sucursal" name="sucursal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
              <option value="" disabled="" selected="">Seleccione una opción</option>
              <?php foreach ($sucursales as $sucursal) : ?>
                <option value="<?= $sucursal['ID'] ?>"><?= $sucursal['SUCURSAL'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="flex flex-col md:flex-row md:justify-between">
          <button type="submit" class="w-full md:w-auto px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Guardar
            Cambios</button>
        </div>
      </form>
  </section>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('js/trabFuncionalidad.js') ?>"></script>
  <script src="<?= base_url('js/AD-actualizarTrabajador.js') ?>"></script>
  <script src="<?= base_url('js/AD-eliminarTrabajador.js') ?>"></script>
  <script src="<?= base_url('js/retri_usuario.js') ?>"></script>
</body>

</html>