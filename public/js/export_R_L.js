document.addEventListener('DOMContentLoaded', function() {
  document.getElementById('btn-export-RL-pdf').addEventListener('click', function() {
    // Obtener los datos del formulario
    var especialista = document.getElementById('especialista_1').value;
    var rut = document.getElementById('rut_1').value;
    var nombre = document.getElementById('nombre_1').value;
    var lejosDerEsf = document.getElementById('lejosDerEsf').value;
    var lejosDerCil = document.getElementById('lejosDerCil').value;
    var lejosDerEje = document.getElementById('lejosDerEje').value;
    var lejosIzqEsf = document.getElementById('lejosIzqEsf').value;
    var lejosIzqCil = document.getElementById('lejosIzqCil').value;
    var lejosIzqEje = document.getElementById('lejosIzqEje').value;
    var lejosDp = document.getElementById('lejosDp').value;
    var lejosAdd = document.getElementById('lejosAdd').value;
    var cercaDerEsf = document.getElementById('cercaDerEsf').value;
    var cercaDerCil = document.getElementById('cercaDerCil').value;
    var cercaDerEje = document.getElementById('cercaDerEje').value;
    var cercaIzqEsf = document.getElementById('cercaIzqEsf').value;
    var cercaIzqCil = document.getElementById('cercaIzqCil').value;
    var cercaIzqEje = document.getElementById('cercaIzqEje').value;
    var cercaDp = document.getElementById('cercaDp').value;
    var comentario = document.getElementById('comentario').value;

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
            widths: ['auto', '*','auto', '*'],
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