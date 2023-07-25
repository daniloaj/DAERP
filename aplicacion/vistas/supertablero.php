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
  <!-- sidebar -->
  <?php require_once "aplicacion/vistas/partes/supertablero_partes/sidebar_supertablero.php"; ?>

  <!--Cuerpo-->
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

    <!-- slides que se llaman con el panel lateral -->
    
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
    <?php include_once "aplicacion/vistas/partes/javascript.php"; ?>

</body>

</html>