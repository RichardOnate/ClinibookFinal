document.addEventListener("DOMContentLoaded", function () {
  var navbar = document.getElementById("nav");
  var footer = document.getElementById("footer");

  window.addEventListener("scroll", function () {
    // Cambia el color del fondo del nav al hacer scroll
    if (window.scrollY > 50) {
      navbar.style.backgroundColor = "#D7D8DA"; // Nuevo color de fondo del nav
    } else {
      navbar.style.backgroundColor = "transparent"; // Restaura el color de fondo original del nav
    }

    // Cambia el color del fondo del footer al hacer scroll
    if (window.scrollY > 50) {
      footer.style.backgroundColor = "#D7D8DA"; // Nuevo color de fondo del footer
    } else {
      footer.style.backgroundColor = "transparent"; // Restaura el color de fondo original del footer
    }
  });
});