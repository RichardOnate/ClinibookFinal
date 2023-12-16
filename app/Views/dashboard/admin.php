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

<body class="bg-blue-500">
  <!-- sliderbar -->
  <?= view('sliderbar/sliderbar-admin'); ?>
  <!--  ------------------------------------------------------------ -->
  <div class="p-4 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

      <div class="grid grid-cols-3 gap-4 mb-4">
        <!-- ------------------------------------------------------------------------------------------------ -->
        <div class="flex flex-col sm:flex-row items-center justify-center h-auto w-auto rounded bg-white dark:bg-blue-700 text-white">
          <svg class="w-6 h-6 text-blue-700 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
            <path d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
          </svg>
          <div class="flex flex-col sm:flex-row items-center ">
            <h3 class="text-lg text-blue-700 font-bold md:text-2xl lg:text-5xl">Pacientes= </h3>
            <span class="text-xl text-blue-700 lg:text-4xl  justify-center text-center"><?= esc($conteo['pacientes']) ?></span>
          </div>
        </div>

        <!-- ------------------------------------------------------------------------------------------------------------ -->
        <div class="flex flex-col sm:flex-row items-center justify-center h-24 rounded bg-white dark:bg-blue-700 text-white">
          <svg class="w-6 h-6 text-red-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
            <path d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
            <path d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
          </svg>
          <div class="flex flex-col sm:flex-row items-center ">
            <h3 class="text-lg text-red-700 font-bold md:text-2xl lg:text-5xl">Trabajadores= </h3>
            <span class="text-xl text-red-700 sm:text-4xl  justify-center text-center"><?= esc($conteo['trabajadores']) ?></span>
          </div>
        </div>
        <!-- ----------------------------------------------------------------------------------------------- -->
        <div class="flex flex-col sm:flex-row items-center justify-center h-24 rounded bg-white dark:bg-blue-700 text-white">
          <svg class="w-6 h-6 text-emerald-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
            <path d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
            <path d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
          </svg>
          <div class="flex flex-col sm:flex-row items-center ">
            <h3 class="text-lg text-emerald-700 font-bold md:text-2xl lg:text-5xl">Total Citas= </h3>
            <span class="text-xl text-emerald-700 sm:text-4xl  justify-center text-center"><?= esc($conteo['citas']) ?></span>
          </div>
        </div>


      </div>



      <!-- -------------------------- -->
      <div class="flex justify-center h-auto mb-4 pb-4 rounded  dark:bg-gray-800">
        <div class="w-[95%] mt-4 block">
          <form>
            <div class="flex gap-2">

              <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">Todos los usuarios <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg></button>
              <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                  <li>
                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Pacientes</button>
                  </li>
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
                  border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Nombres...." required>
                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                  </svg>
                  <span class="sr-only">Search</span>
                </button>
              </div>


              <button title="Agregar Sucursal" type="button" class=" abrirSucursal cursor-pointer w-auto md:w-auto px-6 py-3 text-base font-medium text-white bg-blue-700 rounded-lg hover:bg-white focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M.188 5H5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707c-.358.362-.617.81-.753 1.3C.148 5.011.166 5 .188 5ZM14 8a6 6 0 1 0 0 12 6 6 0 0 0 0-12Zm2 7h-1v1a1 1 0 0 1-2 0v-1h-1a1 1 0 0 1 0-2h1v-1a1 1 0 0 1 2 0v1h1a1 1 0 0 1 0 2Z" />
                  <path d="M6 14a7.969 7.969 0 0 1 10-7.737V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H.188A.909.909 0 0 1 0 6.962V18a1.969 1.969 0 0 0 1.933 2h6.793A7.976 7.976 0 0 1 6 14Z" />
                </svg></button>

            </div>
          </form>




          <div class="relative overflow-x-auto mt-4 shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Empresa
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Casa Matriz
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Sucursal
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Direccion
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Correo
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Celular
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Acción
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($sucursales as $sucursal) : ?>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      <?= $sucursal['EMPRESA'] ?>
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      <?= $sucursal['CASA MATRIZ'] ?>
                    </th>
                    <td class="px-6 py-4">
                      <?= $sucursal['SUCURSAL'] ?>
                    </td>
                    <td class="px-6 py-4">
                      <?= $sucursal['DIRECCION'] ?>
                    </td>
                    <td class="px-6 py-4">
                      <?= $sucursal['CORREO'] ?>
                    </td>
                    <td class="px-6 py-4">
                      <?= $sucursal['CELULAR'] ?>
                    </td>
                    <td class="flex items-center px-6 py-4">
                      <button id="Editar" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" data-id="<?= $sucursal['ID'] ?>">Editar</button>
                      <button id="Eliminar" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3" data-id="<?= $sucursal['ID'] ?>">Eliminar</button>
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
  </div>

  <!-- modal add sucursal -->
  <section id="modalDatos2" class=" modalDatos fixed top-0 left-0 w-full h-full flex items-center justify-center z-50 hidden">
    <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>
    <div class="max-w-lg h-auto mx-auto gap-2 md:mb-28 rounded-lg bg-white p-4 relative">
      <span id="cerrarModalBtn2" class="cerrarModalBtn absolute top-0 right-0 mr-2  text-gray-500 cursor-pointer text-4xl hover:text-red-600 transform hover:scale-110 transition-transform">&times;</span>

      <div class=" text-center">
        <h1 class="text-4xl py-4 text-black">Agregar sucursal</h1>
      </div>
      <form action="/insert-suc" method="post">

        <div class="mb-4">
          <!-- Comuna -->
          <label for="empresa" class="block text-sm font-medium text-gray-700">Empresa</label>
          <select id="empresa" name="empresa" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            <?php foreach ($empresas as $empresa) : ?>
              <option value="<?= $empresa['id_empresa'] ?>"><?= $empresa['emp_nombre'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-4">
          <!-- Direccion -->
          <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección </label>
          <input type="text" id="direccion" name="direccion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="mb-4">
            <!-- Nombres -->
            <label for="correo" class="block text-sm font-medium text-gray-700">Correo</label>
            <input type="email" id="correo" name="correo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
          <div class="mb-4">
            <!-- Celular -->
            <label for="celular" class="block text-sm font-medium text-gray-700">Celular</label>
            <input type="text" id="celular" name="celular" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
        </div>
        <div class="grid grid-cols-2 gap-4">


        </div>
        <div class="mb-4">
          <!-- Región -->
          <label for="region" class="block text-sm font-medium text-gray-700">Región</label>
          <select id="region" onchange="cargarProvincias()" name="region" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            <option value="">Selecciona una región</option>
            <?php foreach ($regiones as $region) : ?>
              <option value="<?= $region['id_region'] ?>"><?= $region['reg_nombre'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-4">
          <!-- Provincia -->
          <label for="provincia" class="block text-sm font-medium text-gray-700">Provincia</label>
          <select id="provincia" onchange="cargarComunas()" name="provincia" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            <option value="">Selecciona una provincia</option>
          </select>
        </div>

        <div class="mb-4">
          <!-- Comuna -->
          <label for="comuna" class="block text-sm font-medium text-gray-700">Comuna</label>
          <select id="comuna" name="comuna" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            <option value="">Selecciona una comuna</option>
          </select>
        </div>

        <div class="flex flex-col mt-5 md:flex-row md:justify-between">
          <button type="submit" class="w-full md:w-auto px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Guardar</button>
        </div>

    </div>

    </form>
  </section>

  <!-- modal edit sucursal -->
  <section id="modalDatos" class=" modalDatos fixed top-0 left-0 w-full h-full flex items-center justify-center z-50 hidden">
    <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>
    <div class="max-w-lg h-auto mx-auto gap-2 md:mb-28 rounded-lg bg-white p-4 relative">
      <span id="cerrarModalBtn" class="cerrarModalBtn absolute top-0 right-0 mr-2  text-gray-500 cursor-pointer text-4xl hover:text-red-600 transform hover:scale-110 transition-transform">&times;</span>

      <div class=" text-center">
        <h1 class="text-4xl py-4 text-black">Editar sucursal</h1>
      </div>
      <form action="/act-suc" method="post">
        <input type="hidden" id="id_s" name="id" value="">
        <div class="mb-4">
          <!-- Direccion -->
          <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección </label>
          <input type="text" id="direccion_s" value="" name="direccion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
        </div>
        <div class="grid grid-cols-2 gap-4">
          <div class="mb-4">
            <!-- Nombres -->
            <label for="correo" class="block text-sm font-medium text-gray-700">Correo</label>
            <input type="email" id="correo_s" value="" name="correo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
          <div class="mb-4">
            <!-- Celular -->
            <label for="celular" class="block text-sm font-medium text-gray-700">Celular</label>
            <input type="text" id="celular_s" value="" name="celular" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
        </div>
        <div class="grid grid-cols-2 gap-4">


        </div>
        <div class="mb-4">
          <!-- Región -->
          <label for="region" class="block text-sm font-medium text-gray-700">Región</label>
          <select id="region_s" value="" onchange="cargarProvinciasM()" name="region" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            <option value="">Selecciona una región</option>
            <?php foreach ($regiones as $region) : ?>
              <option value="<?= $region['id_region'] ?>"><?= $region['reg_nombre'] ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-4">
          <!-- Provincia -->
          <label for="provincia" class="block text-sm font-medium text-gray-700">Provincia</label>
          <select id="provincia_s" value="" onchange="cargarComunasM()" name="provincia" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            <option value="">Selecciona una provincia</option>
            <?php foreach ($provincias as $provincia) : ?>
              <option value="<?= $provincia['id_provincia'] ?>"><?= $provincia['prov_nombre'] ?></option>
            <?php endforeach; ?>
          </select>
          </select>
        </div>

        <div class="mb-4">
          <!-- Comuna -->
          <label for="comuna" class="block text-sm font-medium text-gray-700">Comuna</label>
          <select id="comuna_s" value="" name="comuna" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            <option value="">Selecciona una comuna</option>
            <?php foreach ($comunas as $comuna) : ?>
              <option value="<?= $comuna['id_comuna'] ?>"><?= $comuna['com_nombre'] ?></option>
            <?php endforeach; ?>
          </select>
          </select>
        </div>

        <div class="flex flex-col mt-5 md:flex-row md:justify-between">
          <button type="submit" class="w-full md:w-auto px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Guardar</button>
        </div>

    </div>
    </form>
  </section>




  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('js/AD-eliminarSucursal.js') ?>"></script>
  <script src="<?= base_url('js/trabFuncionalidad.js') ?>"></script>
  <script defer src="<?= base_url('js/llenarCombos.js') ?>"></script>
  <script defer src="<?= base_url('js/llenarCombosModal.js') ?>"></script>
  <script src="<?= base_url('js/AD-actualizarSucursal.js') ?>"></script>

</body>

</html>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Obtiene referencias a elementos relevantes
    const modal2 = document.getElementById("modalDatos2");
    const abrirModalBtn2 = document.querySelector(".abrirSucursal");
    const cerrarModalBtn2 = document.getElementById("cerrarModalBtn2");

    // Abre el modal al hacer clic en el botón "EditarTrabajador"
    abrirModalBtn2.addEventListener("click", function() {
      modal2.classList.remove("hidden"); // Asegura que la clase 'hidden' se elimine
    });

    // Cierra el modal al hacer clic en el icono de cierre
    cerrarModalBtn2.addEventListener("click", function() {
      modal2.classList.add("hidden"); // Oculta el modal
    });
  });
</script>