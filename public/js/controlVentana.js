/*function abrirVentana() {
    // Configuración de la ventana
    var opciones = "width=800, height=800, top=100, left=100, scrollbars=yes, resizable=yes";
  
    // Abre la nueva ventana
    window.open("/receta", "_blank", opciones);
  }*/

  function abrirVentana(citaID) {
    var opciones = "width=800, height=800, top=100, left=100, scrollbars=yes, resizable=yes";

    var nuevaVentana = window.open("/receta", "_blank", opciones);

    // Espera a que la nueva ventana haya terminado de cargar
    nuevaVentana.onload = function () {
        // Llama a la función que obtiene los datos de la cita y los llena en la ventana
        obtenerDatosReceta(citaID, nuevaVentana);
    };
}

function obtenerDatosReceta(citaID, ventana) {
    // Realiza una solicitud AJAX para obtener los datos de la cita
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/rellenar-receta/" + citaID, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
              var responseData = xhr.responseText.replace('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>', '');
                    console.log("Respuesta del servidor:", responseData);

                try {
                    var response = JSON.parse(responseData);

                    // Llena los campos del formulario con los datos recibidos
                    for (let i = 1; i <= 3; i++) {
                    ventana.document.getElementById("idt_" + i).value = response.IDT;
                    ventana.document.getElementById("idh_" + i).value = response.IDH;
                    ventana.document.getElementById("rut_" + i).value = response.RUT;
                    ventana.document.getElementById("especialista_" + i).value = response.ESPECIALISTA;
                    ventana.document.getElementById("nombre_" + i).value = response.NOMBRES;
                  }
                  

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
