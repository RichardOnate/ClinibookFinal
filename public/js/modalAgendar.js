
document.addEventListener("DOMContentLoaded", function () {
  // Agrega el evento de clic al botón usando addEventListener
  document.getElementById("siguiente").addEventListener("click", function () {
    validarFormulario();
  });

  document.getElementById("AtrasModal").addEventListener("click", function () {
    mostrarFormulario1();
  });

  document.getElementById("guardar").addEventListener("click", function () {
    event.preventDefault();
    validarFormulario2();
  });

  // Obtener todos los elementos de entrada
  var inputElements = document.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"], select');

  // Agregar eventos onblur a cada campo de entrada
  inputElements.forEach(function (input) {
    input.addEventListener("blur", function () {
      validarCampo(input);
    });
  });



  function validarFormulario() {
    // Obtener los valores de los campos
    var rut = document.getElementById("rut").value;
    var nombres = document.getElementById("nombres").value;
    var apellidos = document.getElementById("apellidos").value;
    var correo = document.getElementById("correo").value;
    var celular = document.getElementById("celular").value;
    var prevision = document.getElementById("prevision").value;
    var genero = document.getElementById("genero").value;

    console.log("Rut:", rut);
    console.log("Nombres:", nombres);
    console.log("Apellidos:", apellidos);
    console.log("Correo:", correo);
    console.log("Celular:", celular);
    console.log("Previsión:", prevision);
    console.log("Género:", genero);

    // Realizar la validación
    if (
      !Fn.validaRut(rut) ||
      !validarNombreApellido(nombres) ||
      !validarNombreApellido(apellidos) ||
      !validarCelular(celular) ||
      !validarCorreo(correo) ||
      prevision === "" ||
      genero === ""
    ) {
      // Mostrar alerta de error
      mostrarAlertaError();
    } else {
      // Mostrar alerta de éxito
  
      mostrarAlertaExito();
      document.getElementById("form1").style.display = "none";
      document.getElementById("form2").style.display = "block";

      // Puedes agregar aquí el código para enviar el formulario o realizar otras acciones después de la validación
    }
  }


  function validarFormulario2() {
    var selectDoctor = document.getElementById("underline_select");
    var fechaInput = document.querySelector('input[type="text"][datepicker]');
    var horarioSeleccionado = document.querySelector('input[name="hosting"]:checked');
  
    // Reiniciar colores de borde
    cambiarColorBorde(selectDoctor, "");
    cambiarColorBorde(fechaInput, "");
  
    // Validar selectDoctor
    if (selectDoctor.value === "Seleccionar Doctor") {
      cambiarColorBorde(selectDoctor, "red");
    }
  
    // Validar fecha
    if (!fechaInput.value) {
      cambiarColorBorde(fechaInput, "red");
    }
  
    // Validar horarioSeleccionado
    if (!horarioSeleccionado) {
      // Puedes manejar la validación del horario seleccionado según tus necesidades
      // Aquí puedes cambiar el color de borde del elemento asociado al horario, por ejemplo
    }
  
    // Verificar si hay algún campo marcado en rojo
    if (selectDoctor.style.border === "1.4px solid red" || fechaInput.style.border === "1.4px solid red") {
      // Mostrar alerta de error
      mostrarAlertaError();
      return;
    }
  
    // Si todos los campos están completos, mostrar alerta de éxito
    mostrarAlertaExito();
  }
  


  
  var rutInput = document.getElementById("rut");
  rutInput.addEventListener("input", function () {
    validarCampo(rutInput);
  });

  
  var Fn = {
    // Valida el rut con su cadena completa "XXXXXXXX-X"
    validaRut : function (rutCompleto) {
      if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test(rutCompleto) || rutCompleto.length < 9 || rutCompleto.length > 10)
        return false;
      var tmp 	= rutCompleto.split('-');
      var digv	= tmp[1]; 
      var rut 	= tmp[0];
      if ( digv == 'K' ) digv = 'k' ;
      return (Fn.dv(rut) == digv );
    },
    dv : function(T){
      var M=0,S=1;
      for(;T;T=Math.floor(T/10))
        S=(S+T%10*(9-M++%6))%11;
      return S?S-1:'k';
    }
  }


  function mostrarFormulario1() {
    // Muestra el primer formulario y oculta el segundo
    document.getElementById("form1").style.display = "block";
    document.getElementById("form2").style.display = "none";
  }

  function validarCampo(input) {
    switch (input.id) {
      case "nombres":
      case "apellidos":
        if (!validarNombreApellido(input.value)) {
          cambiarColorBorde(input, "red");
        } else {
          cambiarColorBorde(input, "green");
        }
        break;
      case "celular":
        if (!validarCelular(input.value)) {
          cambiarColorBorde(input, "red");
        } else {
          cambiarColorBorde(input, "green");
        }
        break;
      case "correo":
        if (!validarCorreo(input.value)) {
          cambiarColorBorde(input, "red");
        } else {
          cambiarColorBorde(input, "green");
        }
        break;
      case "prevision":
      case "genero":
        // Cuando se trata de campos select y rut, cambiar el color del borde si está vacío
        if (input.value.trim() === "") {
          cambiarColorBorde(input, "red");
        } else {
          cambiarColorBorde(input, "green");
        }
        break;
        case "rut":
          var valor = input.value;
          cambiarColorBorde(input, Fn.validaRut(valor) ? "green" : "red");
          break;
      // Puedes agregar más casos según tus necesidades
    }
  }

  function cambiarColorBorde(elemento, color) {
    elemento.style.border = "1.4px solid " + color;
  }

function validarNombreApellido(valor) {
  const regex = /^[a-zA-ZÀ-ÿ\s]{3,25}$/;
  console.log(`Validar Nombre/Apellido "${valor}":`, regex.test(valor));
  return regex.test(valor);
}

  function validarCelular(valor) {
    return /^\d{9}$/.test(valor);
  }

  function validarCorreo(valor) {
    return /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/.test(valor);
  }


  function mostrarAlertaExito() {
    // Muestra la alerta de éxito
    var alertaExito = document.getElementById('alerta');
    alertaExito.classList.remove('hidden', 'animate__fadeOut');
    alertaExito.classList.add('animate__fadeIn');

    // Ocultar la alerta después de 3 segundos (3000 milisegundos)
    setTimeout(function() {
      // Ocultar la alerta con animación
      alertaExito.classList.remove('animate__fadeIn');
      alertaExito.classList.add('animate__fadeOut');

      // Agregar la clase hidden después de la duración de la animación (1 segundo)
      setTimeout(function() {
        alertaExito.classList.add('hidden');
      }, 1000);
    }, 3000);
  }

  function mostrarAlertaError() {
    // Muestra la alerta de error
    var alertaError = document.getElementById('alertaError');
    alertaError.classList.remove('hidden', 'animate__fadeOut');
    alertaError.classList.add('animate__fadeIn');

    // Ocultar la alerta después de 3 segundos (3000 milisegundos)
    setTimeout(function() {
      // Ocultar la alerta con animación
      alertaError.classList.remove('animate__fadeIn');
      alertaError.classList.add('animate__fadeOut');

      // Agregar la clase hidden después de la duración de la animación (1 segundo)
      setTimeout(function() {
        alertaError.classList.add('hidden');
      }, 1000);
    }, 3000);
  }

 





});