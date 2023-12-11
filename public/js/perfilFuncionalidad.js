document.getElementById('mostrarCredenciales').addEventListener('click', function() {
    var credencialesDiv = document.getElementById('credenciales');
    var buttonText = document.getElementById('mostrarCredenciales');
  
    credencialesDiv.classList.toggle('opacity-0');
    credencialesDiv.classList.toggle('max-h-0');
    credencialesDiv.classList.toggle('max-h-screen');
    buttonText.textContent = credencialesDiv.classList.contains('opacity-0') ? 'Mostrar Credenciales' : 'Ocultar Credenciales';
  });
  
  
  document.getElementById('editar').addEventListener('click', function() {
    var campos = document.querySelectorAll('input, select');
  
    campos.forEach(function(campo) {
        campo.removeAttribute('disabled');
    });
  
  // Mostrar la alerta con animación
  var alerta = document.getElementById('alerta');
  alerta.classList.remove('hidden', 'animate__fadeOut');
  alerta.classList.add('animate__fadeIn');
  
  // Ocultar la alerta después de 3 segundos (3000 milisegundos)
  setTimeout(function() {
      // Ocultar la alerta con animación
      alerta.classList.remove('animate__fadeIn');
      alerta.classList.add('animate__fadeOut');
  
      // Agregar la clase hidden después de la duración de la animación (1 segundo)
      setTimeout(function() {
          alerta.classList.add('hidden');
      }, 1000);
  }, 3000);
  });
