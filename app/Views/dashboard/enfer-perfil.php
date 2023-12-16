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
  <title>CliniVision-ENFERMERA</title>
</head>

<body class="bg-blue-500 ">
  <!-- sliderbar -->
  <?= view('sliderbar/sliderbar-enfer'); ?>
  <!--  ------------------------------------------------------------ -->
  <div class="p-4 -mt-[18px] sm:ml-64 md:mt-4 relative ">

    <!-- alertas -->
    <div id="alerta" class="hidden absolute left-1/2 transform -translate-x-1/2 w-xl p-4 -mt-5 text-sm text-green-900 rounded-lg bg-green-200  dark:bg-gray-800
        dark:text-green-400 animate__animated animate__fadeIn" role="alert">
      <span class="font-medium">Éxito:</span> Los campos se han habilitado para la edición.
    </div>
    <!-- fin alertas -------------- -->

    <div class="p-4 h-auto ">
      <div class="max-w-lg h-auto mx-auto md:mb-28 rounded-lg bg-white  p-4">

        <div class=" text-center">
          <h1 class="text-4xl py-4 text-black">Mi Perfil</h1>
        </div>
        <form action="/act-perfil" method="post">

          <div class="mb-4">
            <label for="rut" class="block text-sm font-medium text-gray-700">Rut</label>
            <input type="text" id="rut" name="rut" value="<?= $lista['RUT'] ?>" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>
          <div class="grid grid-cols-2 gap-4">
            <div class="mb-4">
              <label for="nombres" class="block text-sm font-medium text-gray-700">Nombres</label>
              <input type="text" id="nombres" name="nombres" value="<?= $lista['NOMBRES'] ?>" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
            <div class="mb-4">
              <label for="apellidos" class="block text-sm font-medium text-gray-700">Apellidos</label>
              <input type="text" id="apellidos" name="apellidos" value="<?= $lista['APELLIDOS'] ?>" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>
          </div>

          <div class="mb-4">
            <label for="celular" class="block text-sm font-medium text-gray-700">Celular</label>
            <input type="text" id="celular" name="celular" value="<?= $lista['CELULAR'] ?>" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
          </div>

          <div id="credenciales" class="mb-4 overflow-hidden opacity-0 max-h-0 transition-all duration-500 ease-in-out ">
            <h2 class="text-lg font-medium text-gray-700">Credenciales</h2>
            <div class="grid grid-cols-2 gap-4">
              <div class="mt-2">
                <label for="usuario" class="block text-sm font-medium text-gray-700">Usuario</label>
                <input type="text" id="usuario" name="usuario" value="<?= $lista['USUARIO'] ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" disabled>
              </div>
              <div class="mt-2">
                <label for="contrasena" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="contrasena" name="pass" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" disabled>
              </div>
              <div class="mt-2">
                <label for="repetirContrasena" class="block text-sm font-medium text-gray-700">Repetir
                  Contraseña</label>
                <input type="password" id="repetirpass" name="repetirpass" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" disabled>
              </div>
            </div>
          </div>
          <div class="flex flex-col md:flex-row md:justify-between">
            <button id="editar" type="button" class="mb-2 md:mb-0 w-full md:w-auto px-4 py-2 text-sm font-medium text-gray-700 bg-gray-300 rounded-md hover:bg-gray-400 focus:ring focus:ring-gray-300 focus:ring-opacity-50">Editar</button>
            <button id="mostrarCredenciales" type="button" class="mb-2 md:mb-0 w-full md:w-auto px-4 py-2 text-sm font-medium text-gray-700 bg-gray-300 rounded-md hover:bg-gray-400 focus:ring focus:ring-gray-300 focus:ring-opacity-50">Mostrar
              Credenciales</button>
            <button type="submit" class="w-full md:w-auto px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Guardar
              Cambios</button>
          </div>
        </form>

      </div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
      <script src="<?= base_url('js/perfilFuncionalidad.js') ?>"></script>
</body>

</html>