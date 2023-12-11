document.addEventListener("DOMContentLoaded", function () {
    // Asignar evento onchange al combobox de regiones
    document.querySelector("#region").addEventListener("change", function () {
        cargarProvincias();
    });

    // Asignar evento onchange al combobox de provincias
    document.querySelector("#provincia").addEventListener("change", function () {
        cargarComunas();
    });

    function cargarProvincias() {
        var regionId = document.querySelector("#region").value;

        // Realizar una petición AJAX para obtener las provincias asociadas a la región seleccionada
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/obtener-provincias/" + regionId, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseData = xhr.responseText.replace('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>', '');
                    //console.log("Respuesta del servidor:", responseData);
                    try {
                        var provincias = JSON.parse(responseData);

                        // Actualizar el contenido del combobox de provincias
                        var provinciaSelect = document.querySelector("#provincia");
                        provinciaSelect.innerHTML = "<option value=''>Selecciona una provincia</option>";

                        for (var i = 0; i < provincias.length; i++) {
                            provinciaSelect.innerHTML += "<option value='" + provincias[i].id_provincia + "'>" + provincias[i].prov_nombre + "</option>";
                        }

                        // Limpiar y deshabilitar el combobox de comunas
                        document.querySelector("#comuna").innerHTML = "<option value=''>Selecciona una comuna</option>";
                        document.querySelector("#comuna").disabled = true;
                    } catch (e) {
                        console.error("Error al parsear JSON de provincias:", e);
                    }
                } else {
                    console.error("Error en la solicitud AJAX para obtener provincias:", xhr.status, xhr.statusText);
                }
            }
        };

        xhr.send();
    }

    function cargarComunas() {
        var provinciaId = document.querySelector("#provincia").value;

        // Realizar una petición AJAX para obtener las comunas asociadas a la provincia seleccionada
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/obtener-comunas/" + provinciaId, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var responseData = xhr.responseText.replace('<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>', '');
                    //console.log("Respuesta del servidor:", responseData);
                    try {
                        var comunas = JSON.parse(responseData);

                        // Actualizar el contenido del combobox de comunas
                        var comunaSelect = document.querySelector("#comuna");
                        comunaSelect.innerHTML = "<option value=''>Selecciona una comuna</option>";

                        for (var i = 0; i < comunas.length; i++) {
                            comunaSelect.innerHTML += "<option value='" + comunas[i].id_comuna + "'>" + comunas[i].com_nombre + "</option>";
                        }

                        // Habilitar el combobox de comunas
                        document.querySelector("#comuna").disabled = false;
                    } catch (e) {
                        console.error("Error al parsear JSON de comunas:", e);
                    }
                } else {
                    console.error("Error en la solicitud AJAX para obtener comunas:", xhr.status, xhr.statusText);
                }
            }
        };

        xhr.send();
    }
});
