<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Clinibook-Confirmación</title>
</head>

<body class="flex items-center justify-center bg-gray-100">

    <?= view('modulos/navbar.php'); ?>

    <form class=" p-4 w-full bg-white rounded-lg shadow-xl shadow-blue-500 border border-blue-600">
        <div class="flex items-center justify-center h-full">
            <div class="max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 text-center">
                <h5 class="mb-4 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Confirmar asistencia a
                    cita oftalmologica</h5>
                <div class="flex justify-center mb-4 space-x-4">
                    <button id="Confirmar" type="button" class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-800">Confirmar
                        cita</button>
                    <button id="Cancelar" type="button" class="px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-800">Cancelar
                        cita</button>
                </div>
            </div>
        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('js/PAC-confirmarCita.js') ?>"></script>
</body>

</html>