document.addEventListener("DOMContentLoaded", function () {
    // Agregar un event listener para los botones de eliminar
    const btnsEliminarUsuario = document.querySelectorAll("#Finalizar");
    
    btnsEliminarUsuario.forEach((btn) => {
        btn.addEventListener("click", function () {
            const userId = btn.getAttribute("data-id");
            
            // Mostrar el mensaje de confirmación con SweetAlert2
            Swal.fire({
                title: "Desea finalizar la atención?",
                text: "",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Finalizar",
                cancelButtonText: "Cancelar",
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, enviar el ID del usuario al archivo PHP para eliminar
                    window.location.href = "/finalizar-aten/" + userId;
                }
            });
        });
    });
});