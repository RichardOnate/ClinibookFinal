
history.pushState(null, null, location.href);
window.onpopstate = function () {
    history.go(1);
};

// Bloquear el botón de adelante
window.addEventListener('beforeunload', function () {
    history.pushState(null, null, location.href);
});
window.onload = function() {
  function bloquearAcciones(...inputs) {
      inputs.forEach(function(input) {
          input.onpaste = function(e) {
              e.preventDefault();
              alert("Esta acción está prohibida");
          }
          
          input.oncopy = function(e) {
              e.preventDefault();
              alert("Esta acción está prohibida");
          }
      });
  }
  
  var rut = document.getElementById("rut");
  var celular = document.getElementById("celular");
  var correo = document.getElementById("correo");

  bloquearAcciones(rut,celular, correo);
}


