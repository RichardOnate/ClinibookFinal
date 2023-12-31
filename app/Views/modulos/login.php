<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Clinibook-login</title>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">

    <?= view('modulos/navbar.php'); ?>
    <!-- alertas -->
    <!-- <div id="alerta" class="hidden absolute left-1/2 transform -translate-x-1/2 w-xl p-4 -mt-[30.5rem] text-sm text-green-900 rounded-lg bg-green-200  dark:bg-gray-800
        dark:text-green-400 animate__animated animate__fadeIn" role="alert">
        <span class="font-medium">Todos los campos correctos!!</span>
    </div>
    <div id="alertaError"
        class="hidden absolute left-1/2 transform -translate-x-1/2 w-xl p-4 -mt-[30.5rem] text-sm text-red-900 rounded-lg bg-red-200  animate__animated animate__fadeIn"
        role="alert">
        <span class="font-medium">Por favor, complete todos los campos correctamente!!.</span>
    </div> -->


    <!-- fin alertas -------------- -->
    <form action="/login" method="post"
        class="max-w-sm w-full bg-white rounded-lg shadow-xl shadow-blue-500 border border-blue-600">
        <div class="p-6 space-y-4">
            <p class="text-2xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Inicio de Sesión
            </p>
            <div>
                <label class="block mb-2 text-lg font-medium text-gray-900">
                    Usuario
                </label>
                <input placeholder="" name="usuario"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                    id="username" type="text"  />
            </div>
            <div>
                <label class="block mb-2 text-lg font-medium text-gray-900">
                    Contraseña
                </label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                    name="pass" placeholder="••••••••" id="password" type="password" />
                    
            </div>


            <button
                class="w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center focus:ring-blue-800 text-white"
                type="submit">
                Ingresar
            </button>

            
            <div class="my-6">
                <a href="/recuperarPass"
                    class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Recuperar
                    Contraseña</a>
            </div>

        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="<?= base_url('js/login.js') ?>"></script>
</body>

</html>