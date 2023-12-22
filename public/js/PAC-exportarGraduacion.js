document.addEventListener("DOMContentLoaded", function () {

    function obtenerDatosPersona() {
        // Envía el userId al archivo PHP para obtener los datos de la persona
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/rec-graduacion");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseData = xhr.responseText.replace('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>', '');
                    console.log("Respuesta del servidor:", responseData);

                    try {
                        var response = JSON.parse(responseData);

                        // Obtener el elemento select
                        var fechaSelectorGrad = document.getElementById("fechaSelectorGrad");

                        // Limpiar opciones existentes
                        // fechaSelectorGrad.innerHTML = "";

                        // Agregar la opción por defecto
                        var optionDefault = document.createElement("option");
                        optionDefault.value = "";
                        optionDefault.text = "Filtrar por fecha";
                        fechaSelectorGrad.appendChild(optionDefault);

                        // Recorrer los datos y agregar las fechas como opciones
                        for (var i = 0; i < response.length; i++) {
                            var fecha = response[i].FECHA;

                            // Evitar duplicados
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

    obtenerDatosPersona();

    document.getElementById("Export-optica").addEventListener("click", function () {
        // Variables adicionales para el documento PDF
        var especialista = response.TRABAJADOR;
        var rut = response.RUT;
        var nombre = response.PACIENTE;
        var lejosDerEsf = response.D1;
        var lejosDerCil = response.D2;
        var lejosDerEje = response.D3;
        var lejosIzqEsf = response.D4;
        var lejosIzqCil = response.D5;
        var lejosIzqEje = response.D6;
        var lejosDp = response.D7;
        var lejosAdd = response.D8;
        var cercaDerEsf = response.D9;
        var cercaDerCil = response.D10;
        var cercaDerEje = response.D11;
        var cercaIzqEsf = response.D12;
        var cercaIzqCil = response.D13;
        var cercaIzqEje = response.D14;
        var cercaDp = response.D15;
        var comentario = response.COMENTARIOS;
        // Definir los estilos y la estructura del documento PDF (mantener los estilos actuales)
        var styles = {
            header: {
                fontSize: 14,
                bold: true,
                alignment: "start",
                color: "#3498db",
                margin: [0, 10, 0, 10],
            },
            subheader: {
                fontSize: 18,
                bold: true,
                alignment: "center",
                margin: [0, 5, 0, 5],
                color: "#3498db",
                decoration: "underline",
                decorationColor: "#3498db",
            },
            label: {
                bold: true,
                color: "#2c3e50",
                margin: [0, 0, 0, 5],
            },
            field: {
                margin: [0, 0, 0, 5],
                color: "#34495e",
            },
            separator: {
                margin: [0, 10, 0, 10],
                color: "#666",
                lineColor: "#666",
            },

        };

        var documentDefinition = {
            pageSize: "letter",
            content: [{
                text: "CliniVision",
                style: "header",
                margin: [0, 5, 0, 0],
            },
            {
                text: "Receta De Lentes",
                style: "subheader",
                margin: [0, 20, 10, 10],
            },
            {
                margin: [0, 0, 0, 10],
                table: {
                    widths: ['auto', '*'],
                    body: [
                        [{
                            text: 'Fecha:',
                            style: 'label'
                        },
                        {
                            text: new Date().toLocaleDateString(),
                            margin: [0, 0, 0, 10]
                        }
                        ],
                        [{
                            text: 'Nombre del Paciente:',
                            style: 'label'
                        },
                        {
                            text: nombre,
                            style: 'field'
                        }
                        ],
                        [{
                            text: 'RUT Paciente:',
                            style: 'label'
                        },
                        {
                            text: rut,
                            style: 'field'
                        }
                        ],
                        [{
                            text: 'Especialista:',
                            style: 'label'
                        },
                        {
                            text: especialista,
                            style: 'field'
                        }
                        ]
                    ]
                }
            },

            {
                margin: [0, 0, 0, 10],
                table: {
                    widths: ['auto', '*', 'auto', '*'],
                    body: [
                        [{
                            text: 'Lejos Ojo Derecho Esfera:',
                            style: 'label'
                        },
                        {
                            text: lejosDerEsf,
                            style: 'field'
                        },
                        {
                            text: 'Lejos Ojo Derecho Cilindro:',
                            style: 'label'
                        },
                        {
                            text: lejosDerCil,
                            style: 'field'
                        }
                        ],
                        [{
                            text: 'Lejos Ojo Derecho Eje:',
                            style: 'label'
                        },
                        {
                            text: lejosDerEje,
                            style: 'field'
                        },
                        {
                            text: 'Lejos Ojo Izquierdo Esfera:',
                            style: 'label'
                        },
                        {
                            text: lejosIzqEsf,
                            style: 'field'
                        }
                        ],
                        [{
                            text: 'Lejos Ojo Izquierdo Cilindro:',
                            style: 'label'
                        },
                        {
                            text: lejosIzqCil,
                            style: 'field'
                        },
                        {
                            text: 'Lejos Ojo Izquierdo Eje:',
                            style: 'label'
                        },
                        {
                            text: lejosIzqEje,
                            style: 'field'
                        },
                        ],
                        [
                            {
                                text: 'Lejos Distancia Pupilar:',
                                style: 'label'
                            },
                            {
                                text: lejosDp,
                                style: 'field'
                            },
                            {
                                text: 'Lejos Adición:',
                                style: 'label'
                            },
                            {
                                text: lejosAdd,
                                style: 'field'
                            },
                        ],
                        [{
                            text: 'Lejos Adición:',
                            style: 'label'
                        },
                        {
                            text: lejosAdd,
                            style: 'field'
                        },
                        {
                            text: 'Cerca Ojo Derecho Esfera:',
                            style: 'label'
                        },
                        {
                            text: cercaDerEsf,
                            style: 'field'
                        }
                        ],
                        [{
                            text: 'Cerca Ojo Derecho Cilindro:',
                            style: 'label'
                        },
                        {
                            text: cercaDerCil,
                            style: 'field'
                        },
                        {
                            text: 'Cerca Ojo Derecho Eje:',
                            style: 'label'
                        },
                        {
                            text: cercaDerEje,
                            style: 'field'
                        }
                        ],
                        [{
                            text: 'Cerca Ojo Izquierdo Esfera:',
                            style: 'label'
                        },
                        {
                            text: cercaIzqEsf,
                            style: 'field'
                        },
                        {
                            text: 'Cerca Ojo Izquierdo Cilindro:',
                            style: 'label'
                        },
                        {
                            text: cercaIzqCil,
                            style: 'field'
                        }
                        ],
                        [{
                            text: 'Cerca Ojo Izquierdo Eje:',
                            style: 'label'
                        },
                        {
                            text: cercaIzqEje,
                            style: 'field'
                        },
                        {
                            text: 'Cerca Distancia Pupilar:',
                            style: 'label'
                        },
                        {
                            text: cercaDp,
                            style: 'field'
                        }
                        ]
                    ]
                }
            },
            {
                text: "Comentarios:",
                style: "subheader",
                margin: [0, 10, 0, 5],
            },
            {
                text: comentario,
                style: "label",
                margin: [0, 10, 0, 5]
            },
            {
                text: "Firma Especialista: _________________________",
                style: "label",
                margin: [0, 190, 0, 5],
            },
            ],
            styles: styles
        };

        // Generar el PDF
        var pdfDoc = pdfMake.createPdf(documentDefinition);
        var nombreArchivo = obtenerNombreArchivo(nombre, rut);
        pdfDoc.download(nombreArchivo);
    });
});

function obtenerNombreArchivo(nombre, rut) {
    var parteNombre = nombre.substring(0, 4);
    var parteRut = rut.substring(0, 4);
    return parteNombre + '_' + parteRut + '_RL.pdf';
}
