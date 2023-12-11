<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
<script>
    //cierre de sesión con sweet alert 2
    document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
            title: "¿Desea salir?",
            icon: "question",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí",
            cancelButtonText: "Cancelar"
        }).then((result) => { // si el cliente confirma, destruimos la sesión y salimos del sistema
            if (result.isConfirmed) {
                window.location.href = "/logout";
            } else { // reiniciamos la sesión
                window.history.back();
            }
        })
    })
</script>