document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btn-export-pdf').addEventListener('click', function () {
        // Obtener los datos del formulario
        var especialista = document.getElementById('especialista_3').value;
        var rut = document.getElementById('rut_3').value;
        var nombre = document.getElementById('nombre_3').value;
        var descripcion = document.getElementById('descripcion3').value;

        // Definir los estilos
        var styles = {
            header: {
                fontSize: 14,
                bold: true,
                alignment: "start",
                color: "#3498db", // Azul
                margin: [0, 10, 0, 10], // Modificado para ajustar el espacio
            },
            subheader: {
                fontSize: 18,
                bold: true,
                alignment: "center",
                margin: [0, 5, 0, 5],
                color: "#3498db", // Azul
                decoration: "underline", // Subrayado
                decorationColor: "#3498db", // Color del subrayado
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

        // Definir la estructura del documento PDF
        var documentDefinition = {
            pageSize: "letter", // Tamaño de la hoja carta
            // pageMargins: [40, 60, 40, 60], // Margen izquierdo, superior, derecho, inferior
            content: [
                {
                    text: "CliniVision", // Logo
                    style: "header",
                    margin: [0, 5, 0, 0],
                },
                {
                    text: "Receta Médica",
                    style: "subheader",
                    margin: [0, 20, 10, 10], // Ajuste del espacio
                },
                {
                    margin: [0, 0, 0, 10],
                    table: {
                        widths: ['auto', '*'], // Ancho de las columnas
                        body: [
                            [
                                {
                                    text: 'Fecha:',
                                    style: 'label'
                                },
                                {
                                    text: new Date().toLocaleDateString(),
                                    margin: [0, 0, 0, 10]
                                }
                            ],
                            [
                                {
                                    text: 'Nombre del Paciente:',
                                    style: 'label'
                                },
                                {
                                    text: nombre,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'RUT Paciente:',
                                    style: 'label'
                                },
                                {
                                    text: rut,
                                    style: 'field'
                                }
                            ],
                            [
                                {
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
                    text: "Medicamento:",
                    style: "subheader",
                    margin: [0, 10, 0, 5],
                },
                {
                    text: descripcion,
                    style: "label",
                    margin: [0, 10, 0, 5]
                },
                {
                    text: "Firma Especialista: _________________________",
                    style: "label",
                    margin: [0, 400, 0, 5],
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
    l
    var parteNombre = nombre.substring(0, 4);
    var parteRut = rut.substring(0, 4);
    return parteNombre + '_' + parteRut + '_RM.pdf';
}

