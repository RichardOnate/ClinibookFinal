const abrirModalBtn = document.querySelector(".abrirModal");
const cerrarModalBtn = document.querySelector(".cerrarModalBtn");
const modal = document.querySelector(".modal-overlay");
// 
const abrirModalHisto = document.querySelector(".abrirModalHistorial");
const cerrarModalHisto = document.querySelector(".cerrarModalhisto");
const modalHisto = document.querySelector(".modalHisto");

document.addEventListener("DOMContentLoaded", function () {

  abrirModalBtn.addEventListener("click", function () {
    modal.classList.remove("hidden");
  });

  cerrarModalBtn.addEventListener("click", function () {
    modal.classList.add("hidden");
  });



  abrirModalHisto.addEventListener("click", function () {
    modalHisto.classList.remove("hidden");
  });

  cerrarModalHisto.addEventListener("click", function () {
    modalHisto.classList.add("hidden");
  });
});