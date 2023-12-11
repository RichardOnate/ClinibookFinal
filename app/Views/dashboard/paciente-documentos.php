<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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

            <div class="flex flex-col items-center justify-center h-full">
                <div class="w-full mb-4">
                    <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h2 class="px-4 py-2 text-lg font-semibold text-gray-900 dark:text-white">Recetas</h2>
                        <div class="px-4 py-2">
                            <a href="#" class="block text-blue-500 hover:underline dark:text-blue-400">Descargar Receta 1</a>
                            <a href="#" class="block text-blue-500 hover:underline dark:text-blue-400">Descargar Receta 2</a>
                        </div>
                    </div>
                </div>
                <div class="w-full mb-4">
                    <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h2 class="px-4 py-2 text-lg font-semibold text-gray-900 dark:text-white">Medicamentos</h2>
                        <div class="px-4 py-2">
                            <a href="#" class="block text-blue-500 hover:underline dark:text-blue-400">Descargar Medicamento 1</a>
                            <a href="#" class="block text-blue-500 hover:underline dark:text-blue-400">Descargar Medicamento 2</a>
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                        <h2 class="px-4 py-2 text-lg font-semibold text-gray-900 dark:text-white">Historial</h2>
                        <div class="px-4 py-2">
                            <a href="#" class="block text-blue-500 hover:underline dark:text-blue-400">Descargar Historial 1</a>
                            <a href="#" class="block text-blue-500 hover:underline dark:text-blue-400">Descargar Historial 2</a>
                        </div>
                    </div>
                </div>
            </div>










        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>