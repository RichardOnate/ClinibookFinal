document.addEventListener("DOMContentLoaded", function () {

    // Usamos el objeto window.location para obtener la URL actual
var url = new URL(window.location.href);

// Usamos el método pathname para obtener la parte de la ruta de la URL
var pathname = url.pathname;

// Dividimos el pathname en segmentos
var segments = pathname.split("/");

// Obtenemos el último segmento
var id = segments[segments.length - 1];

//console.log(id);  // Esto imprimirá el ID de la URL actual

    const btnsEliminarUsuario = document.querySelectorAll("#Confirmar");  
    btnsEliminarUsuario.forEach((btn) => {
        btn.addEventListener("click", function () {
            const citaID = id;
            
            // Mostrar el mensaje de confirmación con SweetAlert2
            Swal.fire({
                title: "Desea confirmar la cita?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Finalizar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviar el ID del usuario al archivo PHP para eliminar
                    window.location.href = "/confirm-cita/"+ citaID;
                }
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {

    // Usamos el objeto window.location para obtener la URL actual
var url = new URL(window.location.href);

// Usamos el método pathname para obtener la parte de la ruta de la URL
var pathname = url.pathname;

// Dividimos el pathname en segmentos
var segments = pathname.split("/");

// Obtenemos el último segmento
var id = segments[segments.length - 1];

//console.log(id);  // Esto imprimirá el ID de la URL actual

    const btnsEliminarUsuario = document.querySelectorAll("#Cancelar");  
    btnsEliminarUsuario.forEach((btn) => {
        btn.addEventListener("click", function () {
            const citaID = id;
            
            // Mostrar el mensaje de confirmación con SweetAlert2
            Swal.fire({
                title: "Desea cancelar la cita?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Finalizar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviar el ID del usuario al archivo PHP para eliminar
                    window.location.href = "/cancel-cita/"+ citaID;
                }
            });
        });
    });
});

