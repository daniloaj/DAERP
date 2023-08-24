<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Archivos adicionales CSS -->
    <link rel="stylesheet" href="publico/css/super.css">
    <title>Usuarios</title>
</head>
    <body>
    <?php require_once "aplicacion/vistas/partes/supertablero_partes/sidebar_supertablero.php"; ?>
    <div class="data">
    <h1 class="centrar">Sistema de Usuarios DAERP</h1>
    <br>
    <div id="contentListusuarios">
        <button class="btn btn-success float-right" id="btnAgregarUsuarios">
            <i class="bi bi-plus-square-fill"></i>
            Agregar Usuarios
        </button>

        <div class="col-md-4">
            <div class="input-group mb-3">
                <input placeholder="Buscar registro" type="search" class="form-control" aria-describedby="basic-addon2"
                    id="txtSearchUsuarios">
                <span class="input-group-text" id="basic-addon2">
                    <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                    <lord-icon src="https://cdn.lordicon.com/xfftupfv.json" trigger="loop"
                        style="width:25px;height:25px">
                    </lord-icon></i>
                </span>
            </div>
        </div>

        <div id="contentTableUsuarios">
            <table class="table table-hover" id="myTableUsuarios">
                <thead>
                    <th>Id <img onclick="sortTableUsuarios(0, 'int')" src="publico/images/flecha.png"></th>
                    <th>Nombre <img onclick="sortTableUsuarios(1, 'str')" src="publico/images/flecha.png"></th>
                    <th>Usuario <img onclick="sortTableUsuarios(2, 'str')" src="publico/images/flecha.png"></th>
                    <th>Tipo <img onclick="sortTableUsuarios(3, 'str')" src="publico/images/flecha.png"></th>
                    <th>Departamento <img onclick="sortTableUsuarios(3, 'str')" src="publico/images/flecha.png"></th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
            <div class="">
                <ul id="paginauser" class="pagination float-right">
                    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="contentFormusuarios" class="d-none">
        <h4>
            Agregar Usuarios (Cada campo obligatorio tendrá un asterisco)
        </h4>
        <hr>
        <form id="formusuarios" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre Completo: *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                    <input type="hidden" name="id_usuario" id="id_usuario" value="0">
                </div>
            </div>
            <div class="row mb-3">
                <label for="depa" class="col-sm-2 col-form-label">Departamento: *</label>
                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <select class="form-control text-capitalize" name="depa" id="depa">
                        <?php
                        // Verificamos la conexión con el servidor y la base de datos
                        $mysqli = new mysqli('localhost', 'root', 'asd', 'daerp');
                        $query = $mysqli->query("SELECT id_dep, nom_depa FROM departamentos ");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="' . $valores[id_dep] . '">' . $valores[nom_depa] . '</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="usuario" class="col-sm-2 col-form-label">Usuario: *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="usuario" name="usuario" require>
                </div>
            </div>
            <div class="row mb-3">
                <label for="password" class="col-sm-2 col-form-label">Contraseña: *</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" require>
                </div>
            </div>
            <div class="row mb-3">
                <label for="tipo" class="col-sm-2 col-form-label">Tipo de usuario: *</label>
                <div class="col-sm-10">
                    <select class="form-control" name="tipo" id="tipo">
                        <option value="super usuario">Super Usuario</option>
                        <option value="administrador">Usuario Administrador</option>
                        <option value="usuario">Usuario Normal</option>
                    </select>
                </div>
            </div>

            <button type="button" class="btn btn-secondary" id="btnCancelarusuario"><i class="bi bi-x-octagon-fill"></i>
                Cancelar</button>
            <button type="submit" class="btn btn-primary"><i class="bi bi-hdd-fill"></i> Guardar</button>
        </form>
    </div>
</div>
<script src="<?php echo URL ?>publico/customjs/user.js"></script>
<script>
    function sortTableUsuarios(n, type) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

        table = document.getElementById("myTableUsuarios");
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
                    if ((type == "str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type == "int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if ((type == "str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type == "int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>
<!--Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--Additional Scripts -->
<?php include_once "aplicacion/vistas/partes/javascript.php"; ?>
    </body>
</html>