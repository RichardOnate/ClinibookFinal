document.addEventListener("DOMContentLoaded", function () {
    // Declarar la variable response en un ámbito más amplio para que esté disponible en ambas funciones
    var response;

    function obtenerDatosPersona() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/rec-graduacion");

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

                        var fechaSelectorTrata =
                            document.getElementById("fechaSelectorGrad");

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
        var fechaSeleccionada = document.getElementById("fechaSelectorGrad").value;

        if (fechaSeleccionada !== "") {
            var datosPaciente = [];
            for (var i = 0; i < response.length; i++) {
                if (response[i].FECHA === fechaSeleccionada) {
                    datosPaciente.push({
                        Rut: response[i].RUT,
                        Especialista: response[i].TRABAJADOR,
                        Nombre: response[i].PACIENTE,
                        LejosDerEsf: response[i].D1,
                        LejosDerCil: response[i].D2,
                        LejosDerEje: response[i].D3,
                        LejosIzqEsf: response[i].D4,
                        LejosIzqCil: response[i].D5,
                        LejosIzqEje: response[i].D6,
                        LejosDp: response[i].D7,
                        LejosAdd: response[i].D8,
                        CercaDerEsf: response[i].D9,
                        CercaDerCil: response[i].D10,
                        CercaDerEje: response[i].D11,
                        CercaIzqEsf: response[i].D12,
                        CercaIzqCil: response[i].D13,
                        CercaIzqEje: response[i].D14,
                        CercaDp: response[i].D15,
                        Comentario: response[i].COMENTARIOS,
                    });
                }
            }

            var docDefinition = {
                pageSize: "A4",
                content: [
                    { text: "Informe de Graduación", style: "header" },
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
                                ["Lejos Der Esf", datosPaciente[0].LejosDerEsf || ""],
                                ["Lejos Der Cil", datosPaciente[0].LejosDerCil || ""],
                                ["Lejos Der Eje", datosPaciente[0].LejosDerEje || ""],
                                ["Lejos Izq Esf", datosPaciente[0].LejosIzqEsf || ""],
                                ["Lejos Izq Cil", datosPaciente[0].LejosIzqCil || ""],
                                ["Lejos Izq Eje", datosPaciente[0].LejosIzqEje || ""],
                                ["Lejos Dp", datosPaciente[0].LejosDp || ""],
                                ["Lejos Add", datosPaciente[0].LejosAdd || ""],
                                ["Cerca Der Esf", datosPaciente[0].CercaDerEsf || ""],
                                ["Cerca Der Cil", datosPaciente[0].CercaDerCil || ""],
                                ["Cerca Der Eje", datosPaciente[0].CercaDerEje || ""],
                                ["Cerca Izq Esf", datosPaciente[0].CercaIzqEsf || ""],
                                ["Cerca Izq Cil", datosPaciente[0].CercaIzqCil || ""],
                                ["Cerca Izq Eje", datosPaciente[0].CercaIzqEje || ""],
                                ["Cerca Dp", datosPaciente[0].CercaDp || ""],
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

    var btnExportarPDF = document.getElementById("Export-optica");
    if (btnExportarPDF) {
        btnExportarPDF.addEventListener("click", generarPDF);
    }
});
