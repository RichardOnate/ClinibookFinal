document.addEventListener("DOMContentLoaded", function () {
    // Agregar un event listener para los botones de atender cita
    const btnsAtenderCita = document.querySelectorAll("#Atender");

    btnsAtenderCita.forEach((btn) => {
        btn.addEventListener("click", function (event) {
            event.preventDefault(); 

            const citaId = btn.getAttribute("data-id");
            const hrefCitaId = btn.getAttribute("href").split("/").pop(); // Obtener el ID del href

            Swal.fire({
                title: "¿Desea iniciar la atención del paciente?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    actualizarEstadoCita(citaId, hrefCitaId);
                }
            });
        });
    });

    // Función para actualizar el estado de la cita mediante AJAX
    function actualizarEstadoCita(citaId, hrefCitaId) {
        // Realizar una solicitud AJAX para actualizar el estado de la cita
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/atender-pac/" + citaId, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Después de actualizar el estado, redirigir a la ventana de atención
                    window.location.href = "/doc-atencion/" + hrefCitaId;
                } else {
                    console.error("Error en la solicitud AJAX:", xhr.status, xhr.statusText);
                }
            }
        };

        xhr.send();
    }
});
