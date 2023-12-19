function validarFecha() {
        var fechaInput = document.getElementById('fechar');
        var horaSelect = document.getElementById('horar');
        var fechaSeleccionada = new Date(fechaInput.value + 'T00:00:00');
        var horaActual = new Date();

        // Deshabilitar fechas anteriores a la actual
        if (fechaSeleccionada < horaActual) {
          fechaInput.setCustomValidity('Seleccione una fecha futura');
        } else {
          fechaInput.setCustomValidity('');
        }

        // Deshabilitar opciones anteriores a la hora actual si la fecha seleccionada es hoy
        if (
          fechaSeleccionada.toDateString() === horaActual.toDateString() &&
          horaSelect.options.length > 0
        ) {
          var horaActualFormato = horaActual.getHours() + ':' + horaActual.getMinutes() + ':00';
          for (var i = 0; i < horaSelect.options.length; i++) {
            var opcionHora = horaSelect.options[i].text;
            if (opcionHora < horaActualFormato) {
              horaSelect.options[i].disabled = true;
            }
          }
        } else {
          // Habilitar todas las opciones si la fecha no es hoy
          for (var i = 0; i < horaSelect.options.length; i++) {
            horaSelect.options[i].disabled = false;
          }
        }
      }

      // Llamar a la función al cargar la página
      window.onload = validarFecha;

