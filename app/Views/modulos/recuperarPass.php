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
    <form id="recuperar-form"
        class="max-w-sm w-full bg-white rounded-lg shadow-xl shadow-blue-500 border border-blue-600">
        <div class="p-6 space-y-4">
            <p class="text-2xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Recuperar contraseña
            </p>
            <!-- Rut -->
            <div class="relative">
                <label class="block mb-2 text-lg font-medium text-gray-900">
                    Ingrese Rut
                </label>
                <input placeholder="xxxxxxx-x"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                    id="rut" type="text" />
                <label id="rut-label" class="hidden absolute right-2 top-2 text-[13px] text-red-500"></label>
            </div>
            <!-- correo -->
            <div class="relative">
                <label class="block mb-2 text-lg font-medium text-gray-900">
                    Ingrese Correo
                </label>
                <input placeholder="correo@ejemplo.com"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                    id="email" type="email" />
                <label id="email-label" class="hidden absolute right-2 top-2 text-[13px] text-red-500"></label>
            </div>
            <!-- verificar correo -->
            <div class="relative">
                <label class="block mb-2 text-lg font-medium text-gray-900">
                    Verificar Correo
                </label>
                <input class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg block w-full p-2.5"
                    placeholder="correo@ejemplo.com" id="veri-email" type="email" />
                <label id="veri-email-label" class="hidden absolute right-2 top-2 text-[13px] text-red-500"></label>
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
        function validarCampo(event) {
            const campo = event.target;
            const etiqueta = document.getElementById(`${campo.id}-label`);

            if (campo.value.trim() === '') {
                // Campo vacío, cambia el color del borde a rojo, muestra el label de error y establece el mensaje correspondiente
                campo.style.border = '1px solid #e53e3e';
                etiqueta.innerText = `Complete el campo correctamente`;
                etiqueta.classList.remove('hidden');
                return false; // Datos no validados
            }

            // Validar el RUT
            if (campo.id === 'rut') {
                const rut = campo.value.trim().replace(/[^0-9kK]/g, ''); // Eliminar caracteres no numéricos ni 'k' ni 'K'

                if (rut.length < 9 || rut.length > 10) {
                    // RUT no cumple con el tamaño requerido
                    campo.style.border = '1px solid #e53e3e';
                    etiqueta.innerText = 'Complete el campo correctamente';
                    etiqueta.classList.remove('hidden');
                    return false; // Datos no validados
                } else {
                    // RUT válido, ocultar mensaje de error
                    campo.style.border = '1px solid #48bb78';
                    etiqueta.classList.add('hidden');
                }
            }

            // Validar formato de correo
            if (campo.id === 'email' || campo.id === 'veri-email') {
                const regexCorreo = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (!regexCorreo.test(campo.value.trim())) {
                    // Formato de correo no válido
                    campo.style.border = '1px solid #e53e3e';
                    etiqueta.innerText = '* Formato de correo no válido';
                    etiqueta.classList.remove('hidden');
                    return false; // Datos no validados
                } else {
                    // Formato de correo válido, ocultar mensaje de error
                    campo.style.border = '1px solid #48bb78';
                    etiqueta.classList.add('hidden');
                }
            }

            // Validar que los correos coincidan solo si al menos uno de los campos tiene contenido
            if (campo.id === 'veri-email' && (campo.value.trim() !== '' || document.getElementById('email').value.trim() !== '')) {
                const email = document.getElementById('email');
                const veriEmail = campo;

                const emailLabel = document.getElementById('email-label');
                const veriEmailLabel = etiqueta;

                if (email.value.trim() !== veriEmail.value.trim()) {
                    // Correos no coinciden, mostrar mensaje de error en el campo veri-email
                    veriEmail.style.border = '1px solid #e53e3e';
                    veriEmailLabel.innerText = '* Los correos no coinciden';
                    veriEmailLabel.classList.remove('hidden');
                    return false; // Datos no validados
                } else {
                    // Correos coinciden, ocultar mensaje de error en el campo veri-email
                    veriEmail.style.border = '1px solid #48bb78';
                    veriEmailLabel.classList.add('hidden');
                }
            }

            // Si llegamos hasta aquí, todos los datos han sido validados correctamente
            return true;
        }

        function validarFormulario() {
            // Validar cada campo antes de enviar el formulario
            const campos = document.querySelectorAll('input');
            let datosValidos = true;

            campos.forEach(campo => {
                if (!validarCampo({ target: campo })) {
                    datosValidos = false;
                }
            });

            if (datosValidos) {
                // Si todos los datos son válidos, entonces envía el formulario
                document.getElementById('recuperar-form').submit();
            } else {

                // Si hay datos no válidos, no envía el formulario y muestra un mensaje (puedes personalizar esto según tus necesidades)
                alert('Por favor, complete todos los campos correctamente antes de enviar el formulario.');
            }
        }

        // Agregar el evento blur a todos los campos
        const campos = document.querySelectorAll('input');
        campos.forEach(campo => {
            campo.addEventListener('blur', validarCampo);
        });

        // Agregar el evento click al botón Recuperar
        const botonRecuperar = document.getElementById('recuperar-btn');
        botonRecuperar.addEventListener('click', validarFormulario);
    </script>



</body>

</html>