document.addEventListener("DOMContentLoaded", function () {
    var buscarInput = document.getElementById("buscarPaciente");

    buscarInput.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            var searchTerm = buscarInput.value;
            buscarPaciente(searchTerm);
        }
    });

    function buscarPaciente(searchTerm) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/doc-atencion2/" + searchTerm, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseData = xhr.responseText.replace('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>', '');
                    console.log("Respuesta del servidor:", responseData);

                    try {
                        var response = JSON.parse(responseData);

                        if(response == null){
                            var botonFin = document.getElementById("Finalizar")
                            var receta = document.getElementById("Receta");
                            var notificacion = document.getElementById("Notificacion");
                            var botonagHistorial = document.getElementById("agregarHistorial")
                            var guardar = document.getElementById("Guardar");
                            var historial = document.getElementById("Historial");
                            notificacion.classList.remove("hidden");
                            
                            receta.disabled = true;
                            botonFin.disabled = true;
                            guardar.disabled = true;
                            botonagHistorial.disabled = true;
                            historial.disabled = true;                       
                        }
                       

                        // Rellena los campos del formulario con los datos recibidos
                        document.getElementById("id_p").value = response.ID;
                        document.getElementById("rut").value = response.RUT;
                        document.getElementById("nombres").value = response.NOMBRES;
                        document.getElementById("apellidos").value = response.APELLIDOS;
                        document.getElementById("fecha").value = response.FECHA_NAC;
                        document.getElementById("celular").value = response.CELULAR;
                        document.getElementById("correo").value = response.CORREO;
                        document.getElementById("prevision").value = response.IDP;
                        document.getElementById("genero").value = response.IDG;
                        document.getElementById("usuario").value = response.RUT;
                        document.getElementById("pass").value = response.RUT;       
                        document.getElementById("Historial").setAttribute("data-id", response.ID);               
                        document.getElementById("Receta").setAttribute("onclick", "abrirVentana(" + response.IDC + ")");
                        document.getElementById("Finalizar").setAttribute("data-id", response.IDC);   

                  
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

