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
        <div class=" p-3 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

            <h1 class="text-5xl text-white font-bold text-center mb-6">Documentos</h1>

            <div class="flex flex-col items-center justify-between ">
                <!-- exportar -->
                
                <div class=" bg-white w-full p-4 border rounded-lg mb-4">
                <label for="filtrar-Fecha"
                    class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Graduación Óptica</label>
                    <select name="filtrar-Fecha" id="fechaSelectorGrad"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">

                    </select>
                    <button id="Export-optica" data-id="<?= session('id_usuario') ?>" type="button"
                        class="mb-2 mt-2 md:mb-0 w-full md:w-auto px-6 py-4 text-sm font-medium text-gray-200 bg-blue-700 rounded-md hover:bg-gray-400 focus:ring focus:ring-gray-300 focus:ring-opacity-50">Exportar
                        Recetas Graduación Óptica</button>
                </div>
                <!-- Exportar -->

                <div class=" bg-white w-full p-4 border rounded-lg mb-4 ">
                <label for="filtrar-FechaTrata "
                    class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Tratamientos</label>
                    <select name="filtrar-FechaTrata" id="fechaSelectorTrata"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">

                    </select>
                    <button id="Export-trata" data-id="<?= session('id_usuario') ?>" type="button"
                        class="mb-2 mt-2 md:mb-0 w-full md:w-auto px-6 py-4 text-sm font-medium text-gray-200 bg-blue-700 rounded-md hover:bg-gray-400 focus:ring focus:ring-gray-300 focus:ring-opacity-50">Exportar
                        Recetas Tratamientos</button>
                </div>
                <!-- Exportar -->
                <div class=" bg-white w-full p-4 border rounded-lg">
                    <label for="filtrar-FechaMedi"
                        class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Medicamentos</label>
                    <select name="filtrar-FechaMedi" id="fechaSelectorMedi"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <option value="">Filtrar por fecha</option>
                    </select>
                    <button id="Export-Medicamentos" data-id="<?= session('id_usuario') ?>" type="button"
                        class="mb-2 mt-2 md:mb-0 w-full md:w-auto px-6 py-4 text-sm font-medium text-gray-200 bg-blue-700 rounded-md hover:bg-gray-400 focus:ring focus:ring-gray-300 focus:ring-opacity-50">Exportar
                        Recetas Medicamentos</button>
                </div>


            </div>

        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
        <script src="<?= base_url('js/retri_usuario.js') ?>"></script>
        <script src="<?= base_url('js/PAC-exportarGraduacion.js') ?>"></script>
        <script src="<?= base_url('js/PAC-exportarMedicamentos.js') ?>"></script>
        <script src="<?= base_url('js/PAC-exportarTratamientos.js') ?>"></script>



</body>

</html>