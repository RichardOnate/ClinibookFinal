<?php
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>';

function Alerta($icono, $titulo, $msg, $pagina)
{
    $script = "
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        position: 'center',
                        icon: '$icono',
                        title: '$titulo',
                        text: '$msg',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        if ('$pagina' !== '') {
                            // Manejar la redirección con JavaScript
                            if ('$pagina' === 'window.history.back()') {
                                window.history.back();
                            } else {
                                window.location = '$pagina';
                            }
                        }
                    });
                });
            </script>";
    echo $script;
    exit();
}
