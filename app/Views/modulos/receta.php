<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url() ?>css/styles.css?v=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.68/vfs_fonts.js"></script>

  <title>CliniVision-receta</title>
</head>

<body class="bg-blue-500">
  <!--  ------------------------------------------------------------ -->
  <div class="p-4">
    <div class="max-w-6xl h-auto mx-auto rounded-lg bg-white p-4 relative">
      <div class=" text-center">
        <h3 class="text-4xl py-4 m-2 text-black">Generar receta</h1>
          <div class=" ">

            <select name="tipos-receta" id="secciones" onchange="mostrarSeccion()" class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
              <option value="" disabled="" selected="">Seleccione una opción</option>
              <?php foreach ($tipos as $tipo) : ?>
                <option value="<?= $tipo['id_tipo_receta'] ?>">
                  <?= $tipo['tipo_rec_nombre'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
      </div>
      <!-- graduacion Oftalmologica -->
      <form action="/insert-receta" method="post">
        <div class="mt-5 hidden seccion" id="1">
          <h2 class="text-2xl font-bold mb-4">Receta para anteojos</h2>
          <input type="hidden" id="idt_1" name="idt" value="">
          <input type="hidden" id="idh_1" name="idh" value="">
          <input type="hidden" id="tipos-receta" name="tipos-receta" value="1">
          <div class="grid grid-cols-1 gap-2 md:grid-cols-3">
            <!-- Campos existentes -->
            <div>
              <label for="especialista" class="block text-sm font-medium text-gray-700">Especialista</label>
              <input type="text" id="especialista_1" name="especialista" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="rut" class="block text-sm font-medium text-gray-700">RUT Paciente</label>
              <input type="text" id="rut_1" name="rut" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Paciente</label>
              <input type="text" id="nombre_1" name="nombre" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <!-- Campos adicionales -->
            <div>
              <label for="lejosDerEsf" class="block text-sm font-medium text-gray-700">Lejos Ojo Derecho Esfera</label>
              <input type="text" id="lejosDerEsf" name="lejosDerEsf" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="lejosDerCil" class="block text-sm font-medium text-gray-700">Lejos Ojo Derecho Cilindro</label>
              <input type="text" id="lejosDerCil" name="lejosDerCil" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="lejosDerEje" class="block text-sm font-medium text-gray-700">Lejos Ojo Derecho Eje</label>
              <input type="text" id="lejosDerEje" name="lejosDerEje" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div>
              <label for="lejosIzqEsf" class="block text-sm font-medium text-gray-700">Lejos Ojo Izquierdo Esfera</label>
              <input type="text" id="lejosIzqEsf" name="lejosIzqEsf" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="lejosIzqCil" class="block text-sm font-medium text-gray-700">Lejos Ojo Izquierdo Cilindro</label>
              <input type="text" id="lejosIzqCil" name="lejosIzqCil" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="lejosIzqEje" class="block text-sm font-medium text-gray-700">Lejos Ojo Izquierdo Eje</label>
              <input type="text" id="lejosIzqEje" name="lejosIzqEje" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div>
              <label for="lejosDp" class="block text-sm font-medium text-gray-700">Lejos Distancia Pupilar</label>
              <input type="text" id="lejosDp" name="lejosDp" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div>
              <label for="lejosAdd" class="block text-sm font-medium text-gray-700">Lejos Adición</label>
              <input type="text" id="lejosAdd" name="lejosAdd" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div>
              <label for="cercaDerEsf" class="block text-sm font-medium text-gray-700">Cerca Ojo Derecho Esfera</label>
              <input type="text" id="cercaDerEsf" name="cercaDerEsf" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="cercaDerCil" class="block text-sm font-medium text-gray-700">Cerca Ojo Derecho Cilindro</label>
              <input type="text" id="cercaDerCil" name="cercaDerCil" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="cercaDerEje" class="block text-sm font-medium text-gray-700">Cerca Ojo Derecho Eje</label>
              <input type="text" id="cercaDerEje" name="cercaDerEje" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div>
              <label for="cercaIzqEsf" class="block text-sm font-medium text-gray-700">Cerca Ojo Izquierdo Esfera</label>
              <input type="text" id="cercaIzqEsf" name="cercaIzqEsf" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="cercaIzqCil" class="block text-sm font-medium text-gray-700">Cerca Ojo Izquierdo Cilindro</label>
              <input type="text" id="cercaIzqCil" name="cercaIzqCil" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="cercaIzqEje" class="block text-sm font-medium text-gray-700">Cerca Ojo Izquierdo Eje</label>
              <input type="text" id="cercaIzqEje" name="cercaIzqEje" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div>
              <label for="cercaDp" class="block text-sm font-medium text-gray-700">Cerca Distancia Pupilar</label>
              <input type="text" id="cercaDp" name="cercaDp" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

          </div>
          <div class="w-full my-4">
            <label for="comentario" class="block text-sm font-medium text-gray-700">Comentario</label>
            <textarea id="comentario" name="descripcion" class="w-full mt-1 text-sm rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
          </div>
          <div class="m-4 md:flex md:justify-between">
            <button type="submit" class="abrirModalHistorial w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 mb-2 md:mb-0">
              Guardar
            </button>
            <button type="button" id="btn-export-RL-pdf" class="abrirModal w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">
              Generar PDF
            </button>
          </div>
        </div>
      </form>

      <!-- Tratamientos -->
      <form action="/insert-receta" method="post">
        <div class="mt-5 hidden seccion" id="2">
          <h2 class="text-2xl font-bold mb-4">Receta para Tratamientos</h2>
          <input type="hidden" id="idt_2" name="idt" value="">
          <input type="hidden" id="idh_2" name="idh" value="">
          <input type="hidden" id="tipos-receta" name="tipos-receta" value="2">
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="especialista" class="block text-sm font-medium text-gray-700">Especialista</label>
              <input type="text" id="especialista_2" name="especialista" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="rut" class="block text-sm font-medium text-gray-700">RUT Paciente</label>
              <input type="text" id="rut_2" name="rut" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="w-full">
              <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Paciente</label>
              <input type="text" id="nombre_2" name="nombre" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
          </div>
          <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcion2" name="descripcion" rows="3" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
          </div>
          <div class="m-4 md:flex md:justify-between">
            <button type="submit" class="abrirModalHistorial w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 mb-2 md:mb-0">
              Guardar</button>
            <button type="button" id="btn-export-trata-pdf" class=" abrirModal w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">Generar
              PDF </button>
          </div>
        </div>
      </form>
      <!-- Medicamentos -->
      <form action="/insert-receta" method="post">
        <div class="mt-5 hidden  seccion" id="3">
          <h2 class="text-2xl font-bold mb-4">Receta para Medicamentos</h2>
          <input type="hidden" id="idt_3" name="idt" value="">
          <input type="hidden" id="idh_3" name="idh" value="">
          <input type="hidden" id="tipos-receta" name="tipos-receta" value="3">
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
              <label for="especialista" class="block text-sm font-medium text-gray-700">Especialista</label>
              <input type="text" id="especialista_3" name="especialista" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div>
              <label for="rut" class="block text-sm font-medium text-gray-700">RUT Paciente</label>
              <input type="text" id="rut_3" name="rut" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="w-full">
              <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre Paciente</label>
              <input type="text" id="nombre_3" name="nombre" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>
          </div>
          <div>
            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
            <textarea id="descripcion3" name="descripcion" rows="3" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
          </div>
          <div class="m-4 md:flex md:justify-between">
            <button type="submit" class="abrirModalHistorial w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50 mb-2 md:mb-0">
              Guardar</button>
            <button type="button" id="btn-export-pdf" class=" w-full md:w-auto px-6 py-3 text-base font-medium text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 focus:ring-opacity-50">Generar
              PDF </button>
          </div>
        </div>
      </form>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="<?= base_url('js/mostrarRecetas.js') ?>"></script>
    <script src="<?= base_url('js/export_R_M.js') ?>"></script>
    <script src="<?= base_url('js/export_R_T.js') ?>"></script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('btn-export-RL-pdf').addEventListener('click', function () {
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
            content: [
                {
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
                    margin: [0, 0, 0, 10],
                    table: {
                        widths: ['auto', '*'],
                        body: [
                            [
                                {
                                    text: 'Lejos Ojo Derecho Esfera:',
                                    style: 'label'
                                },
                                {
                                    text: lejosDerEsf,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Lejos Ojo Derecho Cilindro:',
                                    style: 'label'
                                },
                                {
                                    text: lejosDerCil,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Lejos Ojo Derecho Eje:',
                                    style: 'label'
                                },
                                {
                                    text: lejosDerEje,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Lejos Ojo Izquierdo Esfera:',
                                    style: 'label'
                                },
                                {
                                    text: lejosIzqEsf,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Lejos Ojo Izquierdo Cilindro:',
                                    style: 'label'
                                },
                                {
                                    text: lejosIzqCil,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Lejos Ojo Izquierdo Eje:',
                                    style: 'label'
                                },
                                {
                                    text: lejosIzqEje,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Lejos Distancia Pupilar:',
                                    style: 'label'
                                },
                                {
                                    text: lejosDp,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Lejos Adición:',
                                    style: 'label'
                                },
                                {
                                    text: lejosAdd,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Cerca Ojo Derecho Esfera:',
                                    style: 'label'
                                },
                                {
                                    text: cercaDerEsf,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Cerca Ojo Derecho Cilindro:',
                                    style: 'label'
                                },
                                {
                                    text: cercaDerCil,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Cerca Ojo Derecho Eje:',
                                    style: 'label'
                                },
                                {
                                    text: cercaDerEje,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Cerca Ojo Izquierdo Esfera:',
                                    style: 'label'
                                },
                                {
                                    text: cercaIzqEsf,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Cerca Ojo Izquierdo Cilindro:',
                                    style: 'label'
                                },
                                {
                                    text: cercaIzqCil,
                                    style: 'field'
                                }
                            ],
                            [
                                {
                                    text: 'Cerca Ojo Izquierdo Eje:',
                                    style: 'label'
                                },
                                {
                                    text: cercaIzqEje,
                                    style: 'field'
                                }
                            ],
                            [
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
                    margin: [0, 400, 0, 5],
                },
                {
                    text: "Datos Adicionales:",
                    style: "subheader",
                    margin: [0, 20, 0, 5],
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

    </script>

</body>

</html>