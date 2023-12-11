<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <title>Clinibook-login</title>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">

    <?= view('modulos/navbar.php'); ?>

    <form role="form" class="form-login" name="login" action="/login" method="post">
        <form class="max-w-md w-full bg-white rounded-lg shadow-xl shadow-blue-500 border border-blue-600">
            <div class="p-6 space-y-4">
                <p class="text-2xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    Inicio de Sesión
                </p>
                <div>
                    <label class="block mb-2 text-lg font-medium text-gray-900">
                        Usuario
                    </label>
                    <input placeholder="xxxxxxx-x" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" id="username" name="usuario" type="text" />
                </div>
                <div>
                    <label class="block mb-2 text-lg font-medium text-gray-900">
                        Contraseña
                    </label>
                    <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5" placeholder="••••••••" id="password" name="pass" type="password" />
                </div>



                <button class="w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center focus:ring-blue-800 text-white" type="submit">
                    Ingresar
                </button>
            </div>
        </form>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>