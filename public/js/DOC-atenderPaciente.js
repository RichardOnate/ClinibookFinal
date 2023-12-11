document.addEventListener("DOMContentLoaded", function () {
    var editarBtns = document.querySelectorAll("#Atender");

    editarBtns.forEach(function (btn) {
        btn.addEventListener("click", function () {
            var userId = btn.getAttribute("data-id");
            obtenerDatosPersona(userId);
        });
    });

    function obtenerDatosPersona(userId) {
        // Envía el userId al archivo PHP para obtener los datos de la persona
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/doc-atencion/" + userId, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseData = xhr.responseText.replace('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>', '');
                    console.log("Respuesta del servidor:", responseData);

                    try {

                        var response = JSON.parse(responseData);

                        // Rellena los campos del formulario con los datos recibidos
                        document.getElementById("id").value = response.ID;
                        document.getElementById("rut").value = response.RUT;
                        document.getElementById("nombres").value = response.NOMBRES;
                        document.getElementById("apellidos").value = response.APELLIDOS;
                        document.getElementById("celular").value = response.CELULAR;
                        document.getElementById("correo").value = response.CORREO;
                        document.getElementById("prevision").value = response.IDP;
                        document.getElementById("genero").value = response.IDG;
  
                        window.location.href = "/doc-atencion";
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
