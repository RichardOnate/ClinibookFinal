document.addEventListener("DOMContentLoaded", function () {
    var response;

    function obtenerDatosPersona() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/rec-medicamentos");
    
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseData = xhr.responseText.replace(
                        '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>',
                        ""
                    );
                    console.log("Respuesta del servidor:", responseData);
    
                    try {
                        response = JSON.parse(responseData);
    
                        var fechaSelectorGrad = document.getElementById("fechaSelectorMedi");
    
                        // Limpiar el contenido actual del select
                        fechaSelectorGrad.innerHTML = "";
    
                        var fechasUnicas = new Set();
    
                        for (var i = 0; i < response.length; i++) {
                            var fecha = response[i].FECHA;
                            fechasUnicas.add(fecha);
                        }
    
                        var optionDefault = document.createElement("option");
                        optionDefault.value = "";
                        optionDefault.text = "Filtrar por fecha";
                        fechaSelectorGrad.appendChild(optionDefault);
    
                        fechasUnicas.forEach(function (fecha) {
                            var option = document.createElement("option");
                            option.value = fecha;
                            option.text = fecha;
                            fechaSelectorGrad.appendChild(option);
                        });
                    } catch (e) {
                        console.error("Error al parsear JSON:", e);
                    }
                } else {
                    console.error(
                        "Error en la solicitud AJAX:",
                        xhr.status,
                        xhr.statusText
                    );
                }
            }
        };
    
        xhr.send();
    }
    function generarPDF() {
        var fechaSeleccionada = document.getElementById("fechaSelectorMedi").value;

        if (fechaSeleccionada !== "") {
            var datosPaciente = [];
            for (var i = 0; i < response.length; i++) {
                if (response[i].FECHA === fechaSeleccionada) {
                    datosPaciente.push({
                        Rut: response[i].RUT,
                        Especialista: response[i].TRABAJADOR,
                        Nombre: response[i].PACIENTE,
                        Comentario: response[i].COMENTARIOS,
                    });
                }
            }

            var docDefinition = {
                pageSize: "A4",
                content: [
                    { text: "Informe de Medicamentos", style: "header" },
                    {
                        text: "Fecha seleccionada: " + fechaSeleccionada,
                        style: "subheader",
                    },
                    { text: "Datos del paciente:", style: "subheader" },
                    {
                        table: {
                            body: [
                                ["Campo", "Valor"],
                                ["Rut", datosPaciente[0].Rut || ""],
                                ["Especialista", datosPaciente[0].Especialista || ""],
                                ["Nombre", datosPaciente[0].Nombre || ""],
                                ["Comentario", datosPaciente[0].Comentario || ""],
                            ],
                        },
                    },
                ],
                styles: {
                    header: { fontSize: 18, bold: true },
                    subheader: { fontSize: 14, bold: true, margin: [0, 10, 0, 5] },
                },
                pageOrientation: "portrait", // Cambiado a portrait para mostrar los datos verticalmente
            };

            pdfMake.createPdf(docDefinition).download();
        } else {
            console.log("Por favor, selecciona una fecha antes de generar el PDF.");
        }
    }

    obtenerDatosPersona();

    var btnExportarPDF = document.getElementById("Export-Medicamentos");
    if (btnExportarPDF) {
        btnExportarPDF.addEventListener("click", generarPDF);
    }

    obtenerDatosPersona();
});
