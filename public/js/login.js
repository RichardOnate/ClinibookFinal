document.addEventListener("DOMContentLoaded", function () {
  // Agrega el evento de clic al botón usando addEventListener
  document.querySelector("form").addEventListener("submit", function () {
    // event.preventDefault();
    validarInicioSesion();
  });

  function validarInicioSesion() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // Reiniciar colores de borde
    cambiarColorBorde(document.getElementById("username"), "");
    cambiarColorBorde(document.getElementById("password"), "");

    // Validar usuario
    if (!username || !validarUsername(username)) {
      cambiarColorBorde(document.getElementById("username"), "red");
    } else {
      cambiarColorBorde(document.getElementById("username"), "green");
    }

    // Validar contraseña
    if (!password || !validarPassword(password)) {
      cambiarColorBorde(document.getElementById("password"), "red");
    } else {
      cambiarColorBorde(document.getElementById("password"), "green");
    }
    // Verificar si hay algún campo marcado en rojo
    if (
      document.getElementById("username").classList.contains("error") ||
      document.getElementById("password").classList.contains("error")
    ) {
      mostrarAlertaError();
      return;
    }

    // Si todos los campos están completos, mostrar alerta de éxito
    mostrarAlertaExito();
  }

  function cambiarColorBorde(elemento, color) {
    elemento.style.border = "1.4px solid " + color;
    if (color === "red") {
      elemento.classList.add("error");
    } else {
      elemento.classList.remove("error");
    }
  }

  function validarUsername(username) {
    // Verificar que el campo no esté vacío y tenga entre 1 y 10 caracteres
    return /^.{4,}$/.test(username);
  }

  function validarPassword(password) {
    // Puedes ajustar la validación de la contraseña según tus necesidades
    // Aquí, se requiere al menos 5 caracteres, incluyendo al menos un número y una letra
    return /^.{4,}$/.test(password);
  }

  function mostrarAlertaExito() {
    // Muestra la alerta de éxito
    var alertaExito = document.getElementById("alerta");
    alertaExito.classList.remove("hidden", "animate__fadeOut");
    alertaExito.classList.add("animate__fadeIn");

    // Ocultar la alerta después de 3 segundos (3000 milisegundos)
    setTimeout(function () {
      // Ocultar la alerta con animación
      alertaExito.classList.remove("animate__fadeIn");
      alertaExito.classList.add("animate__fadeOut");

      // Agregar la clase hidden después de la duración de la animación (1 segundo)
      setTimeout(function () {
        alertaExito.classList.add("hidden");
      }, 1000);
    }, 3000);
  }

  function mostrarAlertaError() {
    // Muestra la alerta de error
    var alertaError = document.getElementById("alertaError");
    alertaError.classList.remove("hidden", "animate__fadeOut");
    alertaError.classList.add("animate__fadeIn");

    // Ocultar la alerta después de 3 segundos (3000 milisegundos)
    setTimeout(function () {
      // Ocultar la alerta con animación
      alertaError.classList.remove("animate__fadeIn");
      alertaError.classList.add("animate__fadeOut");

      // Agregar la clase hidden después de la duración de la animación (1 segundo)
      setTimeout(function () {
        alertaError.classList.add("hidden");
      }, 1000);
    }, 3000);
  }
});
