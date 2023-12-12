<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <title>Clinibook-Recuperar pass</title>
</head>

<body class="flex items-center justify-center h-screen bg-gray-100">

    <?= view('modulos/navbar.php'); ?>
    <!-- alertas -->
    <div id="alerta" class="hidden absolute left-1/2 transform -translate-x-1/2 w-xl p-4 -mt-[30.5rem] text-sm text-green-900 rounded-lg bg-green-200  dark:bg-gray-800
        dark:text-green-400 animate__animated animate__fadeIn" role="alert">
        <span class="font-medium">Todos los campos correctos!!</span>
    </div>
    <div id="alertaError"
        class="hidden absolute left-1/2 transform -translate-x-1/2 w-xl p-4 -mt-[30.5rem] text-sm text-red-900 rounded-lg bg-red-200  animate__animated animate__fadeIn"
        role="alert">
        <span class="font-medium">Por favor, complete todos los campos correctamente!!.</span>
    </div>


    <!-- fin alertas -------------- -->
    <form class="max-w-sm w-full bg-white rounded-lg shadow-xl shadow-blue-500 border border-blue-600">
        <div class="p-6 space-y-4">
            <p class="text-2xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Recuperar contraseña
            </p>
            <!-- Rut -->
            <div>
                <label class="block mb-2 text-lg font-medium text-gray-900">
                    Ingrese Rut
                </label>
                <input placeholder=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                    id="rut" type="text" />
            </div>
            <!-- correo -->
            <div>
                <label class="block mb-2 text-lg font-medium text-gray-900">
                    Ingrese Correo
                </label>
                <input placeholder=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                    id="email" type="email" />
            </div>
            <!-- verificar correo -->
            <div class="relative">
                <label class="block mb-2 text-lg font-medium text-gray-900">
                    Verificar Correo
                </label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                    placeholder="" id="veri-email" type="email" />
                <label id="veri-email-label" class="hidden absolute right-2 top-2 text-red-500">Los correos no
                    coinciden</label>
            </div>



            <button
                class="w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center focus:ring-blue-800 text-white"
                type="submit" id="recuperar-btn">
                Recuperar
            </button>

        </div>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            // Agrega el evento de clic al botón usando addEventListener
            document.querySelector("form").addEventListener("submit", function (event) {
                event.preventDefault();
                validarRecuperacion();
            });

            var Fn = {
                // Valida el rut con su cadena completa "XXXXXXXX-X"
                validaRut: function (rutCompleto) {
                    if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto) || rutCompleto.length < 9 || rutCompleto.length > 10)
                        return false;
                    var tmp = rutCompleto.split('-');
                    var digv = tmp[1];
                    var rut = tmp[0];
                    if (digv == 'K') digv = 'k';
                    return (Fn.dv(rut) == digv);
                },
                dv: function (T) {
                    var M = 0, S = 1;
                    for (; T; T = Math.floor(T / 10))
                        S = (S + T % 10 * (9 - M++ % 6)) % 11;
                    return S ? S - 1 : 'k';
                }
            }

            var rutInput = document.getElementById("rut");

            // Agregar un evento de escucha al input del rut
            rutInput.addEventListener("input", function () {
                validarCampo(rutInput);
            });

            function validarRecuperacion() {
                var rut = document.getElementById("rut").value;
                var correo = document.getElementById("email").value;
                var veriCorreo = document.getElementById("veri-email").value;

                // Reiniciar colores de borde
                cambiarColorBorde(document.getElementById("rut"), "");
                cambiarColorBorde(document.getElementById("email"), "");
                cambiarColorBorde(document.getElementById("veri-email"), "");

                // Validar Rut
                if (!rut || !validarCampo(rut)) {
                    cambiarColorBorde(document.getElementById("rut"), "red");
                }

                // Validar Correo
                if (!correo || !validarCorreo(correo)) {
                    cambiarColorBorde(document.getElementById("email"), "red");

                }

                // Validar Verificación de Correo
                if (!veriCorreo || correo !== veriCorreo) {
                    cambiarColorBorde(document.getElementById("veri-email"), "red");

                    mostrarAlertaCorreos();
                }

                // Verificar si hay algún campo marcado en rojo
                if (
                    document.getElementById("rut").style.border === "1.4px solid red" ||
                    document.getElementById("email").style.border === "1.4px solid red" ||
                    document.getElementById("veri-email").style.border === "1.4px solid red"
                ) {
                    // Mostrar alerta de error
                    mostrarAlertaError();
                    return;
                }

                // Si todos los campos están completos, mostrar alerta de éxito
                mostrarAlertaExito();
            }

            function cambiarColorBorde(elemento, color) {
                elemento.style.border = "1.4px solid " + color;
            }

            function validarCampo(input) {
                switch (input.id) {
                    case "rut":

                        if (Fn.validaRut(input.value)) {
                            cambiarColorBorde(input, "green");
                        } else {
                            cambiarColorBorde(input, "red");
                        }
                        break;

                }
            }

            function validarCorreo(valor) {
                return /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/.test(valor);
            }

            function mostrarAlertaExito() {
                // Muestra la alerta de éxito
                var alertaExito = document.getElementById("alerta");
                alertaExito.classList.remove("hidden", "animate__fadeOut");
                alertaExito.classList.add("animate__fadeIn");

                // Ocultar la alerta después de 3 segundos (3000 milisegundos)
                setTimeout(function () {
                    // Ocultar la alerta con animación
                    alertaExito.classList.remove("animate__fadeIn");
                    alertaExito.classList.add("animate__fadeOut");

                    // Agregar la clase hidden después de la duración de la animación (1 segundo)
                    setTimeout(function () {
                        alertaExito.classList.add("hidden");
                    }, 1000);
                }, 3000);
            }

            function mostrarAlertaError() {
                // Muestra la alerta de error
                var alertaError = document.getElementById("alertaError");
                alertaError.classList.remove("hidden", "animate__fadeOut");
                alertaError.classList.add("animate__fadeIn");

                // Ocultar la alerta después de 3 segundos (3000 milisegundos)
                setTimeout(function () {
                    // Ocultar la alerta con animación
                    alertaError.classList.remove("animate__fadeIn");
                    alertaError.classList.add("animate__fadeOut");

                    // Agregar la clase hidden después de la duración de la animación (1 segundo)
                    setTimeout(function () {
                        alertaError.classList.add("hidden");
                    }, 1000);
                }, 3000);
            }
            function mostrarAlertaCorreos() {
                // Muestra la alerta de error
                var alertaError = document.getElementById("alertaCorreos");
                alertaError.classList.remove("hidden", "animate__fadeOut");
                alertaError.classList.add("animate__fadeIn");

                // Ocultar la alerta después de 3 segundos (3000 milisegundos)
                setTimeout(function () {
                    // Ocultar la alerta con animación
                    alertaError.classList.remove("animate__fadeIn");
                    alertaError.classList.add("animate__fadeOut");

                    // Agregar la clase hidden después de la duración de la animación (1 segundo)
                    setTimeout(function () {
                        alertaError.classList.add("hidden");
                    }, 1000);
                }, 3000);
            }
        });


    </script>
</body>

</html>