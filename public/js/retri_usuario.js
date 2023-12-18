
// document.addEventListener('DOMContentLoaded', function() {
//     // Verificar si el botón de retroceso ya ha sido desactivado en esta sesión
//     if (!sessionStorage.getItem('backButtonDisabled')) {
//         // Desactivar el botón de retroceso
//         window.location.hash = "no-back-button";
//         window.location.hash = "Again-No-back-button"; // esta línea es necesaria para Chrome
//         window.onhashchange = function() {
//             window.location.hash = "no-back-button";
//         };

//         // Marcar que el botón de retroceso ha sido desactivado en esta sesión
//         sessionStorage.setItem('backButtonDisabled', 'true');
//     }
// });

// window.addEventListener('popstate', function (event) {
//     history.pushState(null, null, window.location.pathname);
//     history.pushState(null, null, window.location.pathname);
// }, false);

// window.location.hash="no-back-button";
// window.location.hash="Again-No-back-button";//esta linea es necesaria para chrome
// window.onhashchange=function(){window.location.hash="no-back-button";}
window.onload = function () {
    window.history.forward();
}

history.pushState(null, null, document.URL);
window.addEventListener('popstate', function () {
    history.pushState(null, null, document.URL);
});

document.addEventListener('keydown', function (e) {
    if (e.key === 'F5' || (e.ctrlKey && e.key === 'r')) {
        e.preventDefault();
        // Puedes mostrar un mensaje de advertencia aquí si lo deseas
    }
});