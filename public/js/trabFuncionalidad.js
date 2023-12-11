document.addEventListener("DOMContentLoaded", function () {
  // Obtiene referencias a elementos relevantes
  const modal = document.getElementById("modalDatos");
  const abrirModalBtn = document.getElementById("Editar");
  const cerrarModalBtn = document.getElementById("cerrarModalBtn");

  // Abre el modal al hacer clic en el botón "EditarTrabajador"
  abrirModalBtn.addEventListener("click", function () {
    modal.classList.remove("hidden"); // Asegura que la clase 'hidden' se elimine
  });

  // Cierra el modal al hacer clic en el icono de cierre
  cerrarModalBtn.addEventListener("click", function () {
    modal.classList.add("hidden"); // Oculta el modal
  });

  // Obtiene referencias a elementos relevantes
  const modal2 = document.getElementById("modalDatos2");
  const abrirModalBtn2 = document.getElementById("nuevoTrabajador");
  const cerrarModalBtn2 = document.getElementById("cerrarModalBtn2");

  // Abre el modal al hacer clic en el botón "EditarTrabajador"
  abrirModalBtn2.addEventListener("click", function () {
    modal2.classList.remove("hidden"); // Asegura que la clase 'hidden' se elimine
  });

  // Cierra el modal al hacer clic en el icono de cierre
  cerrarModalBtn2.addEventListener("click", function () {
    modal2.classList.add("hidden"); // Oculta el modal
  });
});