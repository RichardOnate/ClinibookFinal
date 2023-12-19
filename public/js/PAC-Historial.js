document.addEventListener("DOMContentLoaded", function () {
    var editarBtns = document.querySelectorAll("#Historial");

    editarBtns.forEach(function (btn) {
        btn.addEventListener("click", function () {
            var userId = btn.getAttribute("data-id");
            obtenerDatosPersona(userId);
        });
    });

    function obtenerDatosPersona(userId) {
        // Envía el userId al archivo PHP para obtener los datos de la persona
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/export-historial/" + userId, true);
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseData = xhr.responseText.replace('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>', '');
                    console.log("Respuesta del servidor:", responseData);
                    
                    try {
                        var response = JSON.parse(responseData);
                    
                        // Limpiar contenido anterior
                        document.getElementById("historialContainer").innerHTML = "";
                    
                        if (response.length > 0) {
                            response.forEach(function (historial, index) {
                                var historialElement = document.createElement("div");
                                historialElement.classList.add("historial-item");
                    
                                // Rellena los campos del historial con los datos recibidos
                                historialElement.innerHTML = `
                                    <p>Fecha: ${historial.FECHA}</p>
                                    <p>Diagnóstico: ${historial.DIAGNOSTICO}</p>
                                    <p>Observaciones: ${historial.OBSERVACIONES}</p>
                                `;
                    
                                document.getElementById("historialContainer").appendChild(historialElement);
                    
                                if (index < response.length - 1) {
                                    var separator = document.createElement("br");
                                    document.getElementById("historialContainer").appendChild(separator);
                                }
                            });
                        } else {
                            var mensajeSinHistoriales = document.createElement("p");
                            mensajeSinHistoriales.innerText = "Paciente sin historial ni ficha médica. Actualice los datos personales y guarde los cambios.";
                            document.getElementById("historialContainer").appendChild(mensajeSinHistoriales);
                        }
                
                        //document.querySelector(".modalHisto").classList.remove("hidden");
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
