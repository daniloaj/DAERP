<!-- estilos -->
<link rel="stylesheet" href="publico/css/sidebar.css">

<!-- sidebar -->
<nav class="main-menu">
  <ul>

    <li style="margin-top: -5px">
      <a href="<?php echo URL ?>tablero">
        <img class="imagen-logo" src="publico/images/logo_nombre_blanco.png" alt="">
      </a>
    </li>

    <hr>

    <li>
      <a href="<?php echo URL ?>supertablero">
        <em>
          <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
          <lord-icon src="https://cdn.lordicon.com/osuxyevn.json" trigger="loop" delay="2000" colors="primary:#ffffff"
            style="width: 45px;height:45px; margin-left:5px">
          </lord-icon>
          <span class="nav-text">
            Inicio
          </span>

        </em>
      </a>
    </li>

    <li  >
      <a href="<?php echo URL ?>inventario">
        <em>
          <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
          <lord-icon src="https://cdn.lordicon.com/isugonwi.json" trigger="loop" delay="2000" colors="primary:#ffffff"
            style="width: 45px;height:45px; margin-left:5px">
          </lord-icon>
          <span class="nav-text">
            Inventario
          </span>
        </em>
      </a>
    </li>

    <li  >
      <a href="#3"><em>
          <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
          <lord-icon src="https://cdn.lordicon.com/bhfjfgqz.json" trigger="loop" delay="2000" colors="primary:#ffffff"
            style="width: 45px;height:45px; margin-left:5px">
          </lord-icon>
          <span class="nav-text">
            Proveedores
          </span>

        </em>
      </a>
    </li>

    <li  >
      <a href="#4"><em>
          <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
          <lord-icon src="https://cdn.lordicon.com/fbdgkenc.json" trigger="loop" delay="2000" colors="primary:#ffffff"
            style="width: 45px;height:45px; margin-left:5px">
          </lord-icon>
          <span class="nav-text">

            Usuarios
          </span>

        </em>
      </a>
    </li>

    <li  >
      <a href="#5"><em>
          <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
          <lord-icon src="https://cdn.lordicon.com/qjuahhae.json" trigger="loop" delay="2000" colors="primary:#ffffff"
            style="width: 45px;height:45px; margin-left:5px">
          </lord-icon>
          <span class="nav-text">

            Agenda
          </span>

        </em>
      </a>
    </li>

  </ul>
  <ul class="logout">
    <li  >
      <a href="<?php echo URL; ?>login/cerrar">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="none">
          <style>
            @keyframes slide-4 {
              to {
                transform: translateX(2px)
              }
            }

            .prefix__slide-4 {
              animation: slide-4 2s infinite alternate both cubic-bezier(1, -.01, 0, .98)
            }
          </style>
          <g class="prefix__slide-4">
            <path class="prefix__slide-4" fill="#ffffff" fill-rule="evenodd"
              d="M11.891 7.166a.714.714 0 00-1.006.091l-3.564 4.277a.71.71 0 00-.102.777.71.71 0 00.102.155l3.564 4.277a.714.714 0 001.098-.915L9.417 12.75h7.731a.75.75 0 100-1.5h-7.73l2.565-3.078a.714.714 0 00-.092-1.006z"
              clip-rule="evenodd" />
          </g>
        </svg>
        <span class="nav-text">
          Salir
        </span>
      </a>
    </li>
  </ul>
</nav>

<!-- <a class="salir" href="<?php echo URL; ?>login/cerrar">
  Cerrar Sesión
  
</a> -->