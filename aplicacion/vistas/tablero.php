<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <title>Asociación Consorcio de Bibliotecas Universitarias de El Salvador</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Archivos adicionales CSS -->
    <link rel="stylesheet" href="publico/css/st-tablero.css">

  </head>

  <body>
<!--Simbolo de secuencia de carga-->
    <div class="sequence">
  
      <div class="seq-preloader">
        <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator"><g fill="#F96D38"><path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"/><path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"/><path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"/></g></svg>
      </div>
      
    </div>

<!--Logo de cbues-->
        <div class="logo">
            <img style="width: 100%;	margin-top: -10px; " src="publico/images/LOGO TRANSPARENTE CBUES.png" alt="">
        </div>

<!--agenda-->
        <div class="slides">
          <div class="slide" >
            <div class="content second-content">
              <h1>Sistema de Agenda OT-CBUES</h1>
              <br>

              <div class="col-md-12 float-center">
                <div  class="input-group">

                    <a style="margin-right: 20%" href="reporteagendatablero"><button class="btn btn-success float-left">
                    Ver Reporte
                    </button></a>

                    <input placeholder="Buscar registro" type="search" class="form-control" aria-describedby="basic-addon2" id="txtSearchagenda">
                    <span class="input-group-text" id="basic-addon2">
                    <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                    <lord-icon
                          src="https://cdn.lordicon.com/xfftupfv.json"
                          trigger="loop"
                          style="width:25px;height:25px">
                    </lord-icon></span>

                    <a style="margin-left: 20%" href="<?php echo URL;?>login/cerrar"><button class="btn btn-danger float-right">
                    Cerrar sesión
                    </button></a>
                </div>
              </div><br>

            
              <div id="contentTableagenda">
                <table class="table table-hover" id="myTableAgenda">
                  <thead>
                      <th>Id <img onclick="sortTableActividades(0, 'int')" src="publico/images/flecha.png"></th>
                      <th>Responsable <img onclick="sortTableActividades(1, 'str')" src="publico/images/flecha.png"></i></th>
                      <th>Actividad <img onclick="sortTableActividades(2, 'str')" src="publico/images/flecha.png"></th>
                      <th>Fecha Prevista <img onclick="sortTableActividades(3, 'str')" src="publico/images/flecha.png"></th>
                      <th>Fecha Final<img onclick="sortTableActividades(4, 'str')" src="publico/images/flecha.png"></th>
                      <th>Estado <img onclick="sortTableActividades(5, 'str')" src="publico/images/flecha.png"></th>
                  </thead>
                  <tbody>
                      <td>1</td>
                      <td>OT-CBUES</td>
                      <td>Celebrar Navidad</td>
                      <td>2022-12-25</td>
                      <td>2022-12-31</td>
                      <td>Por iniciar</td>
                      <td>
                          <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                      </td>
                  </tbody>
                </table>
                <div>
                  <ul id="paginaagenda" class="pagination float-right">
                      <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                  </ul>
                </div>
              </div>

        </div>
        </div>
<!--Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!--Additional Scripts -->
    <script src="publico/js/owl.js"></script>
    <script src="publico/js/main.js"></script>
    <?php include_once "aplicacion/vistas/partes/javascript.php";?>

<!--Scripts de agenda-->
    <script src="<?php echo URL?>publico/customjs/actividades.js"></script>
    <script>
              function sortTableActividades(n,type) {
              var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
              
              table = document.getElementById("myTableAgenda");
              switching = true;
              dir = "asc";
              
              while (switching) {
                  switching = false;
                  rows = table.rows;
                  for (i = 1; i < (rows.length - 1); i++) {
                  shouldSwitch = false;
                  x = rows[i].getElementsByTagName("TD")[n];
                  y = rows[i + 1].getElementsByTagName("TD")[n];
                  if (dir == "asc") {
                      if ((type=="str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
                      shouldSwitch= true;
                      break;
                      }
                  } else if (dir == "desc") {
                      if ((type=="str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
                      shouldSwitch = true;
                      break;
                      }
                  }
                  }
                  if (shouldSwitch) {
                  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                  switching = true;
                  switchcount ++;
                  } else {
                  if (switchcount == 0 && dir == "asc") {
                      dir = "desc";
                      switching = true;
                  }
                  }
              }
              }
            </script>
</body>
</html>