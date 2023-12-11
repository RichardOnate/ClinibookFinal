document.addEventListener("DOMContentLoaded", function () {
    var editarBtns = document.querySelectorAll("#Editar");

    editarBtns.forEach(function (btn) {
        btn.addEventListener("click", function () {
            var sucId = btn.getAttribute("data-id");
            obtenerDatosSucursal(sucId);
        });
    });

    function obtenerDatosSucursal(sucId) {
        // Envía el userId al archivo PHP para obtener los datos de la persona
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/act-modals/" + sucId, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseData = xhr.responseText.replace('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>', '');
                    //console.log("Respuesta del servidor:", responseData);

                    try {

                        var response = JSON.parse(responseData);

                        // Rellena los campos del formulario con los datos recibidos
                        document.getElementById("id_s").value = response.ID;
                        document.getElementById("direccion_s").value = response.DIRECCION;
                        document.getElementById("correo_s").value = response.CORREO;
                        document.getElementById("celular_s").value = response.CELULAR;
                        document.getElementById("region_s").value = response.IDR;
                        document.getElementById("provincia_s").value = response.IDP;
                        document.getElementById("comuna_s").value = response.IDC;
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
