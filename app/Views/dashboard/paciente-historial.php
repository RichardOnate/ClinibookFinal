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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>
    <title>CliniVision-PACIENTE</title>
</head>

<body class="bg-blue-500 ">
    <!-- sliderbar -->
    <?= view('sliderbar/sliderbar-paciente'); ?>
    <!--  ------------------------------------------------------------ -->


    <div class="p-4 sm:ml-64 relative">
        <!-- alertas -->
        <div id="alerta" class="hidden absolute left-1/2 transform -translate-x-1/2 p-4 text-sm text-green-900 rounded-lg bg-green-200  dark:bg-gray-800
        dark:text-green-400 animate__animated animate__fadeIn" role="alert">
            <span class="font-medium">Éxito:</span> Los campos se han habilitado para la edición.
        </div>
        <!-- fin alertas -------------- -->


        <div class=" p-2 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            <div>
                <div class="w-full">
                    <div class="mb-2">
                        <h2 class="text-2xl text-white text-center font-bold">Mis Datos</h2>
                    </div>
                    <!-- formulario -->
                    <form action="/pac-perfil" method="post">
                        <input type="hidden" id="id_p" name="id" value="<?= $datosPac['ID'] ?>">
                        <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                            <!-- rut -->
                            <div>
                                <label for="rut" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">RUT</label>
                                <input type="text" id="rut" name="rut" value="<?= $datosPac['RUT'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled="">
                            </div>
                            <!-- nombre -->
                            <div>
                                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nombre</label>
                                <input type="text" id="nombre" name="nombres" value="<?= $datosPac['NOMBRES'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled="">
                            </div>
                            <!-- apellidos -->
                            <div>
                                <label for="apellido" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Apellido</label>
                                <input type="text" id="apellido" name="apellidos" value="<?= $datosPac['APELLIDOS'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled="">
                            </div>
                            <!-- fecha nacimiento -->
                            <div>
                                <label for="fecha" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Fecha de
                                    Nacimiento</label>
                                <input type="date" id="fecha" name="fecha" value="<?= $datosPac['FECHA_NAC'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled="">
                            </div>
                            <!-- celular -->
                            <div>
                                <label for="celular" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Celular</label>
                                <input type="text" id="celular" name="celular" value="<?= $datosPac['CELULAR'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled="">
                            </div>

                            <!-- correo electronico -->
                            <div>
                                <label for="correo" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Correo</label>
                                <input type="text" name="correo" id="correo" value="<?= $datosPac['CORREO'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" disabled="">
                            </div>
                            <!-- genero -->
                            <div>
                                <label for="genero" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Género</label>
                                <select id="genero" name="genero" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" disabled="">
                                    <option value="">Seleccione una opción</option>
                                    <?php foreach ($generos as $genero) : ?>
                                        <option value="<?= $genero['id_genero'] ?>" <?= ($datosPac['IDG'] ?? '') == $genero['id_genero'] ? 'selected' : '' ?>>
                                            <?= $genero['tipo_genero'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <!-- prevision -->
                            <div>
                                <label for="prevision" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Previsión</label>
                                <select id="prevision" name="prevision" disabled class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                    <option value="">Seleccione una opción</option>
                                    <?php foreach ($previsiones as $prevision) : ?>
                                        <option value="<?= $prevision['id_prevision'] ?>" <?= ($datosPac['IDP'] ?? '') == $prevision['id_prevision'] ? 'selected' : '' ?>>
                                            <?= $prevision['prev_nombre'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="mt-1">
                                <label for="usuario" class="block text-sm font-medium text-gray-700">Usuario</label>
                                <input type="text" id="usuario" name="usuario" value="<?= $datosPac['USUARIO'] ?? '' ?>" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" disabled>
                            </div>
                            <div class="mt-1">
                                <label for="contrasena" class="block text-sm font-medium text-gray-700">Contraseña</label>
                                <input type="password" id="contrasena" name="pass" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" disabled>
                            </div>
                            <div class="mt-1">
                                <label for="repetirContrasena" class="block text-sm font-medium text-gray-700">Repetir
                                    Contraseña</label>
                                <input type="password" id="repetirContrasena" name="repetirpass" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50" disabled>
                            </div>

                        </div>

                        <div class="mt-3 flex justify-around gap-2">
                            <button id="Historial" data-id="<?= $datosPac['ID'] ?? '' ?>" type="button" class="abrirModalHistorial mb-2 md:mb-0 w-full md:w-auto px-6 py-4 text-sm font-medium text-gray-200 bg-gray-700 rounded-md hover:bg-gray-800 focus:ring focus:ring-gray-300 focus:ring-opacity-50">Ver
                                mi Historial</button>
                            <button id="editar" type="button" class="mb-2 md:mb-0 w-full md:w-auto px-6 py-4 text-sm font-medium text-gray-700 bg-gray-300 rounded-md hover:bg-gray-400 focus:ring focus:ring-gray-300 focus:ring-opacity-50">Editar
                                información</button>
                            <button type="submit" class="w-full md:w-auto px-6 py-4 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700 focus:ring focus:ring-blue-300 focus:ring-opacity-50">Guardar
                                Cambios</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

<!-- modal historial paciente------------------------------------------------------------ -->

    <section class=" modalHisto fixed top-0 left-0 w-full h-full flex items-center justify-center z-50 hidden">
        <div class="fixed top-0 left-0 w-full h-full bg-black opacity-50"></div>

        <div class="max-w-lg max-h-[622px] mx-auto mt-28 md:mb-28 rounded-lg bg-white p-4 relative ">
            <span id="cerrarModalBtn2" class="cerrarModalhisto absolute top-0 right-0 mr-2  text-gray-500 cursor-pointer text-4xl hover:text-red-600 transform hover:scale-110 transition-transform">&times;</span>

            <div class=" text-center">
                <h1 class="text-2xl font-bold py-4 text-black">Mi historial de atención</h1>
            </div>
            <div class="mb-3">
                <select name="filtrar-Fecha" id="filtrar-Fecha" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <option value="">Filtrar por fecha</option>
                </select>
            </div>
            <div id="historialContainer" class="p-4 border border-black rounded-xl overflow-y-scroll" ></div>
            
            <button id="Export-Historial" data-id="" type="button" class="mb-2 mt-2 md:mb-0 w-full md:w-auto px-6 py-4 text-sm font-medium text-gray-200 bg-blue-700 rounded-md hover:bg-gray-400 focus:ring focus:ring-gray-300 focus:ring-opacity-50">Exportar historial</button>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="<?= base_url('js/PAC-Historial.js') ?>"></script>
    <script>
        const abrirModalHisto = document.querySelector(".abrirModalHistorial");
        const cerrarModalHisto = document.querySelector(".cerrarModalhisto");
        const modalHisto = document.querySelector(".modalHisto");
        document.addEventListener("DOMContentLoaded", function() {

            abrirModalHisto.addEventListener("click", function() {
                modalHisto.classList.remove("hidden");
            });

            cerrarModalHisto.addEventListener("click", function() {
                modalHisto.classList.add("hidden");
            });
        });


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
    <script src="<?= base_url('js/retri_usuario.js') ?>"></script>

</body>

</html>