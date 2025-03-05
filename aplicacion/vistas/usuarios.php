<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="aplicacion/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
            <button href="#modal_form" data-bs-toggle="modal" class="btn btn-success float-right" id="btnAgregarUsuarios">
                <i class="bi bi-plus-square-fill"></i>
                Agregar Usuarios
            </button>
            <button href="#modal_mails" data-bs-toggle="modal" class="btn btn-success float-right mr-3" id="enviar_varios_correos">
                <i class="bi bi-plus-square-fill"></i>
                Enviar correo a todos
            </button>

            <div class="col-md-4">
                <div class="input-group mb-3">
                    <input placeholder="Buscar registro" type="search" class="form-control" aria-describedby="basic-addon2" id="txtSearchUsuarios">
                    <span class="input-group-text" id="basic-addon2">
                        <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/xfftupfv.json" trigger="loop" style="width:25px;height:25px">
                        </lord-icon></i>
                    </span>
                </div>
            </div>

            <div id="contentTableUsuarios">
                <table class="table table-hover" id="myTableUsuarios">
                    <thead>
                        <th># <img onclick="sortTableUsuarios(0, 'int')" src="publico/images/flecha.png"></th>
                        <th>Nombre <img onclick="sortTableUsuarios(1, 'str')" src="publico/images/flecha.png"></th>
                        <th>Apellido <img onclick="sortTableUsuarios(2, 'str')" src="publico/images/flecha.png"></th>
                        <th>Usuario <img onclick="sortTableUsuarios(3, 'str')" src="publico/images/flecha.png"></th>
                        <th>Correo <img onclick="sortTableUsuarios(4, 'str')" src="publico/images/flecha.png"></th>
                        </th>
                        <th style="text-align:center">Opciones</th>
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

        <!-- send mail users -->
        <div style="z-index: 9000" class="modal fade" id="modal_mails" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border-radius: 10px; margin-top: -12%">
                    <div class="container">
                        <div class="modal-body">
                            <h3 class='centrar' id="correo_usuario">

                            </h3>
                            <hr>
                            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                                <label class="mt-2">Asunto: </label>
                                <input type="text" class="form-control" id="asunto" name="asunto">
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                                <label class="mt-2">Mensaje: </label>
                                <textarea id="mensaje" name="mensaje" rows="10" cols="61"></textarea>
                            </div>

                            <div class="centrar mt-3">
                                <button id="cancelar_mail" class="btn btn-secondary">Cancelar</button>
                                <button id="send_mail" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- form users, add and edit -->
        <div style="z-index: 9000" class="modal fade" id="modal_form" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border-radius: 10px; margin-top: -12%">
                    <div class="container">
                        <div class="modal-body">
                            <div id="contentFormusuarios" style="font-size: 20px" class="formulario">
                                <h3 class='centrar'>
                                    Usuarios
                                </h3>
                                <hr>
                                <form id="formusuarios" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label class="mt-2">Nombres: </label>
                                            <input type="text" class="form-control" id="nombre" name="nombre">
                                            <input type="hidden" name="id_usuario" id="id_usuario" value="0">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label class="mt-2">Apellidos: </label>
                                            <input type="text" class="form-control" id="apellidos" name="apellidos">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label class="mt-2">Teléfono: </label>
                                            <input type="text" class="form-control" id="tel" name="tel">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label class="mt-2">Whatsapp: </label>
                                            <input type="text" class="form-control" id="whatsapp" name="whatsapp">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label class="mt-2">Departamento: </label>
                                            <select class="form-control text-capitalize" name="depa" id="depa">
                                              
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label class="mt-2">Usuario: </label>
                                            <input type="text" class="form-control" id="usuario" name="usuario">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label class="mt-2">Contraseña:</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label class="mt-2">Correo: </label>
                                            <input type="text" class="form-control" id="correo" name="correo">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label for="n_factura" class="mt-2">Tipo de usuario: </label>
                                            <select class="form-control" name="tipo" id="tipo">
                                                <option value="super usuario">Super Usuario</option>
                                                <option value="administrador">Usuario Administrador</option>
                                                <option value="usuario">Usuario Normal</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="centrar mt-4">
                                        <button type="button" class="btn btn-secondary" id="btnCancelarusuario">
                                            <i class="bi bi-x-octagon-fill"></i>
                                            Cancelar
                                        </button>
                                        <button type="submit" class="btn btn-primary" id="btnSaveUsuario">
                                            <i class="bi bi-hdd-fill"></i>
                                            Guardar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <!--Additional Scripts -->
    <?php include_once "aplicacion/vistas/partes/javascript.php"; ?>
</body>

</html>