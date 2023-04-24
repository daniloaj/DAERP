<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="publico/images/favicon.ico">
    <title>Consorcio de Bibliotecas Universitarias de El Salvador</title>
    <?php include_once "aplicacion/vistas/partes/css.php";?>
</head>
<body>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="reportesadministrador">Regresar a la selección de reportes</a>
                    <img width=200px style=" margin-top:-20px"  src="publico\images\LOGO TRANSPARENTE CBUES.png" alt="">
                    <a class="navbar-brand" href="tableroadministrador">Regresar a la pagina principal </a>
                </div>
            </nav>

            <div style = "margin-left: 20%"><section id="contenido">

            <form class="row gy-2 gx-3 align-items-center mt-2 mb-5">

                <div class="col-auto d-flex">
                    <label style="margin-top: 5px" for="desde">Desde:</label>
                    <input type="date" id="desde" name="desde">
                </div>

                <div class="col-auto d-flex">
                    <label style="margin-top: 5px" for="hasta">Hasta:</label>
                    <input type="date" id="hasta" name="hasta">
                </div>

                <div class="col-auto d-flex">
                    <label style="margin-top: 5px" for="proyecto">Proyecto:</label>
                    <select name="proyecto" id="proyecto" class="form-select">

                    </select>
                </div>

                <div class="col-auto">
                    <button type="button" class="btn btn-primary" id="btnViewReport">Ver Reporte</button>
                </div>

            </form>
            </div>
            <div class="row">
                <iframe src="" frameborder="0" width="100%" height="500" id="framereporte"></iframe>
            </div>
    <?php include_once "aplicacion/vistas/partes/javascript.php";?>
    <script src="<?php echo URL?>publico/customjs/reportecompras.js">
    </script>
</body>
</html>