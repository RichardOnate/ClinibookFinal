document.addEventListener("DOMContentLoaded", function () {
    var editarBtns = document.querySelectorAll("#Historial");

    editarBtns.forEach(function (btn) {
        btn.addEventListener("click", function () {
            var userId = btn.getAttribute("data-id");
            obtenerDatosPersona(userId);
        });
    });

    document
        .getElementById("Export-Historial")
        .addEventListener("click", function () {
            var nombre =
                document.getElementById("nombre").value +
                " " +
                document.getElementById("apellido").value;
            var rut = document.getElementById("rut").value;
            exportarHistorialPDF(nombre, rut);
        });

    function obtenerDatosPersona(userId) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/traer-historial/" + userId, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseData = xhr.responseText.replace(
                        '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>',
                        ""
                    );
                    console.log("Respuesta del servidor:", responseData);

                    try {
                        var response = JSON.parse(responseData);

                        document.getElementById("historialContainer").innerHTML = "";

                        if (response.length > 0) {
                            var fechas = response.map(function (historial) {
                                return historial.FECHA;
                            });
                            var fechasUnicas = [...new Set(fechas)];

                            var fechaSelector = document.getElementById("fechaSelector");
                            fechaSelector.innerHTML = ""; // Limpiar opciones anteriores

                            fechasUnicas.forEach(function (fecha) {
                                var option = document.createElement("option");
                                option.value = fecha;
                                option.text = fecha;
                                fechaSelector.appendChild(option);
                            });
                            // Agregar una opción adicional para mostrar todos los registros
                            var optionTodos = document.createElement("option");
                            optionTodos.value = "todos";
                            optionTodos.text = "Mostrar Todos";
                            fechaSelector.appendChild(optionTodos);

                            fechaSelector.addEventListener("change", function () {
                                var fechaSeleccionada = fechaSelector.value;
                            
                                if (fechaSeleccionada === "todos") {
                                    // Mostrar todos los historiales
                                    mostrarHistoriales(response);
                                } else {
                                    // Filtrar historiales por fecha seleccionada
                                    var historialesFiltrados = response.filter(function (historial) {
                                        return historial.FECHA === fechaSeleccionada;
                                    });
                            
                                    // Mostrar historiales filtrados
                                    mostrarHistoriales(historialesFiltrados);
                                }
                            });
                            // Mostrar todos los historiales al cargar la página
                            mostrarHistoriales(response);
                        } else {
                            var mensajeSinHistoriales = document.createElement("p");
                            mensajeSinHistoriales.innerText =
                                "Paciente sin historial ni ficha médica. Actualice los datos personales y guarde los cambios.";
                            document
                                .getElementById("historialContainer")
                                .appendChild(mensajeSinHistoriales);
                        }
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

    function mostrarHistoriales(historiales) {
        var historialContainer = document.getElementById("historialContainer");

        // Limpiar contenido anterior
        historialContainer.innerHTML = "";

        historiales.forEach(function (historial, index) {
            var historialElement = document.createElement("div");
            historialElement.classList.add("historial-item");
            historialElement.innerHTML = `
                <p>Fecha: ${historial.FECHA}</p>
                <p>Diagnóstico: ${historial.DIAGNOSTICO}</p>
                <p>Observaciones: ${historial.OBSERVACIONES}</p>
            `;
            historialContainer.appendChild(historialElement);

            if (index < historiales.length - 1) {
                var separator = document.createElement("br");
                historialContainer.appendChild(separator);
            }
        });
    }

    function exportarHistorialPDF(nombre, rut) {
        // Definir los estilos
        var styles = {
            header: {
                fontSize: 12,
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
                    margin: [0, 3, 0, 0],
                },
                {
                    text: "Historial Médico",
                    style: "subheader",
                    margin: [0, 20, 10, 10], // Ajuste del espacio
                },
                {
                    margin: [0, 0, 0, 10],
                    table: {
                        widths: ["auto", "*"], // Ancho de las columnas
                        body: [
                            [
                                {
                                    text: "Fecha:",
                                    style: "label",
                                },
                                {
                                    text: new Date().toLocaleDateString(),
                                    margin: [0, 0, 0, 10],
                                },
                            ],
                            [
                                {
                                    text: "Nombre del Paciente:",
                                    style: "label",
                                },
                                {
                                    text: nombre,
                                    style: "field",
                                },
                            ],
                            [
                                {
                                    text: "RUT Paciente:",
                                    style: "label",
                                },
                                {
                                    text: rut,
                                    style: "field",
                                },
                            ],
                        ],
                    },
                },
                {
                    text: "Historial:",
                    style: "subheader",
                    margin: [0, 10, 0, 5],
                },
                {
                    text: obtenerHistorialFormateado(),
                    style: "label",
                    margin: [0, 10, 0, 5],
                },
            ],
            styles: styles,
        };

        // Generar el PDF
        var pdfDoc = pdfMake.createPdf(documentDefinition);
        var nombreArchivo = obtenerNombreArchivo(nombre, rut);
        pdfDoc.download(nombreArchivo);
    }

    function obtenerNombreArchivo(nombre, rut) {
        var parteNombre = nombre.substring(0, 4);
        var parteRut = rut.substring(0, 4);
        return parteNombre + "_" + parteRut + "_historial.pdf";
    }

    function obtenerHistorialFormateado() {
        // Obtener los elementos del historial
        var historialItems = document.querySelectorAll(".historial-item");
        var historialFormateado = [];

        historialItems.forEach(function (historialItem) {
            var fecha = historialItem
                .querySelector("p:nth-child(1)")
                .innerText.replace("Fecha: ", "");
            var diagnostico = historialItem
                .querySelector("p:nth-child(2)")
                .innerText.replace("Diagnóstico: ", "");
            var observaciones = historialItem
                .querySelector("p:nth-child(3)")
                .innerText.replace("Observaciones: ", "");

            var historialEntry = {
                text: [
                    { text: "Fecha: " + fecha + "\n", bold: true },
                    { text: "Diagnóstico: " + diagnostico + "\n" },
                    { text: "Observaciones: " + observaciones + "\n" },
                    { text: "\n" },
                ],
            };

            historialFormateado.push(historialEntry);
        });

        return historialFormateado;
    }
});
