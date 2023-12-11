document.addEventListener("DOMContentLoaded", function () {
    var editarBtns = document.querySelectorAll("#Editar");

    editarBtns.forEach(function (btn) {
        btn.addEventListener("click", function () {
            var userId = btn.getAttribute("data-id");
            obtenerDatosPersona(userId);
        });
    });

    function obtenerDatosPersona(userId) {
        // Envía el userId al archivo PHP para obtener los datos de la persona
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/act-modalp/" + userId, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseData = xhr.responseText.replace('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>', '');
                    console.log("Respuesta del servidor:", responseData);

                    try {

                        var response = JSON.parse(responseData);

                        // Rellena los campos del formulario con los datos recibidos
                        document.getElementById("id_m").value = response.ID;
                        document.getElementById("rut_m").value = response.RUT;
                        document.getElementById("nombres_m").value = response.NOMBRES;
                        document.getElementById("apellidos_m").value = response.APELLIDOS;
                        document.getElementById("celular_m").value = response.CELULAR;
                        document.getElementById("correo_m").value = response.CORREO;

                        document.getElementById("modalDatos").classList.remove("hidden");
                    } catch (e) {
                        console.error("Error al parsear JSON:", e);
                    }
                } else {
                    console.error("Error en la solicitud AJAX:", xhr.status, xhr.statusText);
                }
            }
        };

        xhr.send();
    }
});
