<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <title>CliniVision</title>
</head>

<body class="relative bg-cover bg-center bg-no-repeat" style="background-image: url('/oftalmologia.webp');">

    <?= view('modulos/navbar.php'); ?>

    <!-- Capa de opacidad encima de la imagen -->
    <div class="absolute inset-0 z-0" style="background: black;opacity: 0.4;"></div>

    <section class="relative h-screen flex items-center justify-center text-center text-white z-10">
        <div>
            <h1 class="mb-4 text-5xl font-bold text-blue-600 dark:text-white">
                CliniVision - Cuidando tu salud visual
            </h1>
            <p class="mb-4 text-lg font-normal text-white dark:text-gray-300">
                <span class="text-white">Somos una clínica oftalmológica comprometida con la salud visual de nuestros pacientes,</span> ofreciendo servicios de calidad y tecnología de vanguardia.
            </p>
            <a href="/agendar" class="inline-block px-6 py-3 text-base font-medium bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">Agendar</a>
        </div>
    </section>
    <?= view('modulos/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>
