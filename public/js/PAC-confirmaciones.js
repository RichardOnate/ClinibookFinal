document.addEventListener("DOMContentLoaded", function () {
    // Agregar un event listener para los botones de eliminar
    const btnsEliminarUsuario = document.querySelectorAll("#Confirmar");
    
    btnsEliminarUsuario.forEach((btn) => {
        btn.addEventListener("click", function () {
            const userId = btn.getAttribute("data-id");
            
            // Mostrar el mensaje de confirmación con SweetAlert2
            Swal.fire({
                title: "Desea confirmar la cita?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Aceptar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviar el ID del usuario al archivo PHP para eliminar
                    window.location.href = "/conf-pac/" + userId;
                }
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Agregar un event listener para los botones de eliminar
    const btnsEliminarUsuario = document.querySelectorAll("#Cancelar");
    
    btnsEliminarUsuario.forEach((btn) => {
        btn.addEventListener("click", function () {
            const userId = btn.getAttribute("data-id");
            
            // Mostrar el mensaje de confirmación con SweetAlert2
            Swal.fire({
                title: "Desea cancelar la cita?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Aceptar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviar el ID del usuario al archivo PHP para eliminar
                    window.location.href = "/cancel-pac/" + userId;
                }
            });
        });
    });
});