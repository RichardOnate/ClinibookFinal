document.addEventListener("DOMContentLoaded", function () {
    // Declarar la variable response en un ámbito más amplio para que esté disponible en ambas funciones
    var response;

    function obtenerDatosPersona() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/rec-graduacion");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseData = xhr.responseText.replace('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>', '');
                    console.log("Respuesta del servidor:", responseData);

                    try {
                        response = JSON.parse(responseData);

                        var fechaSelectorGrad = document.getElementById("fechaSelectorGrad");

                        var optionDefault = document.createElement("option");
                        optionDefault.value = "";
                        optionDefault.text = "Filtrar por fecha";
                        fechaSelectorGrad.appendChild(optionDefault);

                        for (var i = 0; i < response.length; i++) {
                            var fecha = response[i].FECHA;
                            if (!fechaSelectorGrad.querySelector('[value="' + fecha + '"]')) {
                                var option = document.createElement("option");
                                option.value = fecha;
                                option.text = fecha;
                                fechaSelectorGrad.appendChild(option);
                            }
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

    function generarPDF() {
        var fechaSeleccionada = document.getElementById("fechaSelectorGrad").value;

        if (fechaSeleccionada !== "") {
            var datosPaciente = [];
            for (var i = 0; i < response.length; i++) {
                if (response[i].FECHA === fechaSeleccionada) {
                    datosPaciente.push({
                        Rut: response.RUT,
                        Especialista: response.TRABAJADOR,
                        Nombre: response.PACIENTE,
                        LejosDerEsf: response.D1,
                        LejosDerCil: response.D2,
                        LejosDerEje: response.D3,
                        LejosIzqEsf: response.D4,
                        LejosIzqCil: response.D5,
                        LejosIzqEje: response.D6,
                        LejosDp: response.D7,
                        LejosAdd: response.D8,
                        CercaDerEsf: response.D9,
                        CercaDerCil: response.D10,
                        CercaDerEje: response.D11,
                        CercaIzqEsf: response.D12,
                        CercaIzqCil: response.D13,
                        CercaIzqEje: response.D14,
                        CercaDp: response.D15,
                        Comentario: response.COMENTARIOS
                    });
                }
            }

            var docDefinition = {
                content: [
                    { text: 'Informe de Graduación', style: 'header' },
                    { text: 'Fecha seleccionada: ' + fechaSeleccionada, style: 'subheader' },
                    { text: 'Datos del paciente:', style: 'subheader' },
                    {
                        table: {
                            body: [
                                ['Rut', 'Especialista', 'Nombre', 'Lejos Der Esf', 'Lejos Der Cil', 'Lejos Der Eje', 'Lejos Izq Esf', 'Lejos Izq Cil', 'Lejos Izq Eje', 'Lejos Dp', 'Lejos Add', 'Cerca Der Esf', 'Cerca Der Cil', 'Cerca Der Eje', 'Cerca Izq Esf', 'Cerca Izq Cil', 'Cerca Izq Eje', 'Cerca Dp', 'Comentario'],
                                ...datosPaciente.map(paciente => [paciente.Rut, paciente.Especialista, paciente.Nombre, paciente.LejosDerEsf, paciente.LejosDerCil, paciente.LejosDerEje, paciente.LejosIzqEsf, paciente.LejosIzqCil, paciente.LejosIzqEje, paciente.LejosDp, paciente.LejosAdd, paciente.CercaDerEsf, paciente.CercaDerCil, paciente.CercaDerEje, paciente.CercaIzqEsf, paciente.CercaIzqCil, paciente.CercaIzqEje, paciente.CercaDp, paciente.Comentario])
                            ]
                        }
                    }
                ],
                styles: {
                    header: { fontSize: 18, bold: true },
                    subheader: { fontSize: 14, bold: true, margin: [0, 10, 0, 5] }
                }
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
