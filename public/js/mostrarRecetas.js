function mostrarSeccion() {
  var select = document.getElementById("secciones");
  var selectedValue = select.options[select.selectedIndex].value;

  // Oculta todas las secciones
  var secciones = document.querySelectorAll(".seccion");
  secciones.forEach(function(seccion) {
    seccion.classList.add("hidden");
  });

  // Muestra la sección seleccionada
  var seccionSeleccionada = document.getElementById(selectedValue);
  seccionSeleccionada.classList.remove("hidden");
}
