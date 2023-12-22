document.addEventListener("DOMContentLoaded", function () {

    function obtenerDatosPersona() {
        // Envía el userId al archivo PHP para obtener los datos de la persona
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/rec-medicamentos");
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseData = xhr.responseText.replace('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>', '');
                    console.log("Respuesta del servidor:", responseData);
                    
                    try {
                        

                        var response = JSON.parse(responseData);
        
                        // Rellena los campos del formulario con los datos recibidos
                        //document.getElementById("id_m").value = response.TRABAJADOR;
                        //document.getElementById("rut_m").value = response.PACIENTE;
                        //document.getElementById("nombres_m").value = response.TIPO_RECETA;
                        document.getElementById("fechaSelectorGrad").value = response.FECHA;
                        //document.getElementById("celular_m").value = response.COMENTARIOS;
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

    obtenerDatosPersona();
});
