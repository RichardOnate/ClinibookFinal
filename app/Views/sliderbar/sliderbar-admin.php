<?php
$nombre = session('nombre_usuario');
$rol = session('rol_usuario');
?>


<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button"
  class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-white rounded-lg sm:hidden hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">

  <span class="sr-only">Open sidebar</span>

  <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd"
      d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
    </path>
  </svg>
</button>

<aside id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
  aria-label="Sidebar">

  <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800">
    <a href="/" class="flex items-center ps-2.5 mb-5">
      <img src="#" class="h-6 me-3 sm:h-7" alt="" />
      <span class="self-center text-3xl text-blue-700 text-center font-semibold whitespace-nowrap  ">CliniVision</span>
    </a>
    <ul class="space-y-2 font-medium">
      <li class="max-w-xs p-4 bg-blue-700 border border-gray-200 rounded-lg shadow">
        <h2 class="text-xl font-bold text-gray-200 dark:text-white">Bienvenido:</h2>
        <span class="text-xl text-white">
          <?= $nombre ?>
        </span>
        <p class="text-gray-300">
          <?= $rol ?>
        </p>
        <p id="hora" class="text-gray-100  text-xl"></p>
        <p id="fecha" class="text-gray-100  text-md"></p>
      </li>
      <!--  inicio -->
      <li>
        <a href="/dashboard/admin"
          class=" flex items-center p-2 text-gray-900 rounded-lg <?php echo ($active_page == 'admin') ? 'bg-blue-700 text-white' : ''; ?> dark:text-white hover:bg-gray-400 dark:hover:bg-gray-700 group">
          <svg
            class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
            <path
              d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
          </svg>
          <span class="ms-3">Inicio</span>
        </a>
      </li>
      <!--Fin inicio-->
      <!-- Perfil -->
      <li>
        <a href="/admin-perfil"
          class="flex items-center p-2 text-gray-900 rounded-lg <?php echo ($active_page == 'admin-perfil') ? 'bg-blue-700 text-white' : ''; ?> dark:text-white hover:bg-gray-400 dark:hover:bg-gray-700 group">
          <svg
            class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path
              d="M18 7.5h-.423l-.452-1.09.3-.3a1.5 1.5 0 0 0 0-2.121L16.01 2.575a1.5 1.5 0 0 0-2.121 0l-.3.3-1.089-.452V2A1.5 1.5 0 0 0 11 .5H9A1.5 1.5 0 0 0 7.5 2v.423l-1.09.452-.3-.3a1.5 1.5 0 0 0-2.121 0L2.576 3.99a1.5 1.5 0 0 0 0 2.121l.3.3L2.423 7.5H2A1.5 1.5 0 0 0 .5 9v2A1.5 1.5 0 0 0 2 12.5h.423l.452 1.09-.3.3a1.5 1.5 0 0 0 0 2.121l1.415 1.413a1.5 1.5 0 0 0 2.121 0l.3-.3 1.09.452V18A1.5 1.5 0 0 0 9 19.5h2a1.5 1.5 0 0 0 1.5-1.5v-.423l1.09-.452.3.3a1.5 1.5 0 0 0 2.121 0l1.415-1.414a1.5 1.5 0 0 0 0-2.121l-.3-.3.452-1.09H18a1.5 1.5 0 0 0 1.5-1.5V9A1.5 1.5 0 0 0 18 7.5Zm-8 6a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7Z" />
          </svg>
          <span class="flex-1 ms-3 whitespace-nowrap">Mi Perfil</span>
        </a>
      </li>
      <!-- Fin Perfil -->
      <!-- Trabajadores -->
      <li>
        <a href="/admin-trab"
          class="flex items-center p-2 text-gray-900 rounded-lg <?php echo ($active_page == 'admin-trab') ? 'bg-blue-700 text-white' : ''; ?> dark:text-white hover:bg-gray-400 dark:hover:bg-gray-700 group">
          <svg
            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
            <path
              d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
          </svg>
          <span class="flex-1 ms-3 whitespace-nowrap">Trabajadores</span>
        </a>
      </li>
      <!-- Fin trabajadores -->

      <!-- Pacientes -->
      <li>
        <a href="/admin-paci"
          class="flex items-center p-2 text-gray-900 rounded-lg <?php echo ($active_page == 'admin-paci') ? 'bg-blue-700 text-white' : ''; ?> dark:text-white hover:bg-gray-400 dark:hover:bg-gray-700 group">
          <svg
            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
            <path
              d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
          </svg>
          <span class="flex-1 ms-3 whitespace-nowrap">Pacientes</span>
        </a>
      </li>
      <!-- Fin pacientes -->

      <!-- Reportes -->
      <li>
        <a href="/admin-reportes"
          class="flex items-center p-2 text-gray-900 rounded-lg <?php echo ($active_page == 'admin-reportes') ? 'bg-blue-700 text-white' : ''; ?> dark:text-white hover:bg-gray-400 dark:hover:bg-gray-700 group">
          <svg
            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
            <path
              d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z" />
          </svg>
          <span class="flex-1 ms-3 whitespace-nowrap">Reportes</span>
        </a>
      </li>
      <!-- Fin Reportes -->

      <!--Desconectar  -->
      <li>
        <a href="/cerrar-sesion"
          class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-red-700 dark:hover:bg-gray-700 group">
          <svg
            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
            <path
              d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
            <path
              d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
          </svg>
          <span class="flex-1 ms-3 whitespace-nowrap">Desconectar</span>
        </a>
      </li>
      <!-- Fin desconectar -->
    </ul>
  </div>

</aside>

<script>



  function obtenerHora() {
    var fecha = new Date();
    var horas = fecha.getHours();
    var minutos = fecha.getMinutes();
    var ampm = horas >= 12 ? 'PM' : 'AM';

    // Formatear las horas para que estén en el formato de 12 horas
    horas = horas % 12;
    horas = horas ? horas : 12; // Si es 0, cambiar a 12 en formato de 12 horas

    // Añadir ceros a la izquierda si los minutos son menores que 10
    minutos = minutos < 10 ? '0' + minutos : minutos;

    // Mostrar la hora en el formato deseado
    var horaActual = horas + ':' + minutos + ' ' + ampm;

    // Actualizar el contenido del elemento con id "hora"
    document.getElementById('hora').textContent = horaActual;
  }

  // Llamar a la función una vez para mostrar la hora inicial
  obtenerHora();

  // Llamar a la función cada segundo para actualizar la hora en tiempo real
  setInterval(obtenerHora, 1000);

  function obtenerFecha() {
    var opcionesFecha = {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    };
    var fecha = new Date();
    var fechaActual = fecha.toLocaleDateString('es-ES', opcionesFecha);

    // Actualizar el contenido del elemento con id "fecha"
    document.getElementById('fecha').textContent = fechaActual;
  }

  // Llamar a la función una vez para mostrar la fecha inicial
  obtenerFecha();

  // Llamar a la función cada segundo para actualizar la fecha en tiempo real
  setInterval(obtenerFecha, 1000);

</script>