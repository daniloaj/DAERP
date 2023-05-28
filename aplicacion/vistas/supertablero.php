<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Tooplate">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
  <title>DAERP</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Archivos adicionales CSS -->
  <link rel="stylesheet" href="publico/css/super.css">

</head>

<body>
  <!--Simbolo de secuencia de carga-->
  <div class="sequence">

    <div class="seq-preloader">
      <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator">
        <g fill="#F96D38">
          <path class="seq-preload-circle seq-preload-circle-1"
            d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z" />
          <path class="seq-preload-circle seq-preload-circle-2"
            d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z" />
          <path class="seq-preload-circle seq-preload-circle-3"
            d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z" />
        </g>
      </svg>
    </div>

  </div>
  <!--Fin del simbolo de secuencia de carga-->

  <!--Logo de cbues-->
  <div class="logo">
    <img style="width: 100%; margin-top: 25px;" src="publico/images/logo_nombre.png">
  </div>
  <!--Fin de logo de cbues-->

  <!-- sidebar -->
  <?php require_once "aplicacion/vistas/partes/supertablero_partes/sidebar_supertablero.php"; ?>

  <!--Slides de inicio para ver los manuales de compras y agenda-->
  <div class="slides">
    <div class="slide" id="1">
      <div id="slider-wrapper">

        <!--Imagenes del pie de la pagina de inicio-->
        <div id="thumbnail">
          <ul>
            <li style="color: white;">Departamento de <br> "Contabilidad"<img src="publico/images/contabilidad.jpg" /></li>
            <li style="color: white;">Departamento de <br> "Recursos humanos"<img src="publico/images/rh.png" /></li>
            <li style="color: white;">Departamento de<br> "Marketing"<img src="publico/images/marketing.jpg" /></li>
            <li style="color: white;">Departamento de<br> "Comercial"<img src="publico/images/comercio.png" /></li>
            <li style="color: white;">Departamento de<br> "Compras"<img src="publico/images/compras.jpg" /></li>
            <li style="color: white;">Departamento de<br> "Logistica"<img src="publico/images/logistica.png" /></li>
            <li style="color: white;">Departamento de<br> "Control de gestión"<img src="publico/images/gestion.jpg" /></li>
            <li style="color: white;">Departamento de<br> "Dirección general"<img src="publico/images/direccion.jpg" /></li>
            <li style="color: white;">Comité de<br> "Dirección"<img src="publico/images/jefazos.jpg" /></li>
          </ul>
        </div>
      </div>
    </div>
    <!--Inventario-->
    <div class="slide" id="2">
      <?php require_once "aplicacion/vistas/partes/supertablero_partes/inventario.php"; ?>
    </div>

    <!--proveedores-->
    <div class="slide" id="3">
      <?php require_once "aplicacion/vistas/partes/supertablero_partes/proveedores.php"; ?>
    </div>

    <!--Usuarios-->
    <div class="slide" id="4">
      <?php require_once "aplicacion/vistas/partes/supertablero_partes/usuarios.php"; ?>
    </div>

    <!--Agenda-->
    <div class="slide" id="5">
      <?php require_once "aplicacion/vistas/partes/supertablero_partes/agenda.php"; ?>
    </div>

    <!--Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!--Additional Scripts -->
    <script src="publico/js/owl.js"></script>
    <script src="publico/js/main.js"></script>
    <?php include_once "aplicacion/vistas/partes/javascript.php"; ?>

</body>

</html>