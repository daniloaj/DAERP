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
    <title>Inventario</title>
</head>

<body>
    <?php require_once "aplicacion/vistas/partes/supertablero_partes/sidebar_supertablero.php"; ?>
    <div class="data">
        <h1 class='centrar'>Sistema de Inventario DAERP</h1>
        <br>
        <div id="contentListinventario">
            <button href="#modal_form" data-bs-toggle="modal" class="btn btn-success float-right" id="btnAgregarinventario">
                <i class="bi bi-plus-square-fill"></i>
                Agregar inventario
            </button>

            <div class="col-md-4">
                <div class="input-group mb-3">
                    <input placeholder="Buscar registro" type="search" class="form-control"
                        aria-describedby="basic-addon2" id="txtSearchinventario">
                    <span class="input-group-text" id="basic-addon2">
                        <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                        <lord-icon src="https://cdn.lordicon.com/xfftupfv.json" trigger="loop"
                            style="width:25px;height:25px">
                        </lord-icon></i>
                    </span>
                </div>
            </div>

            <div id="contentTableinventario">
                <table class="table table-hover" style="text-transform: capitalize" id="myTableinventario">
                    <thead>
                        <th>Id <img onclick="sortTableinventario(0, 'int')" src="publico/images/flecha.png"></th>
                        <th>Fecha <img onclick="sortTableinventario(5, 'str')" src="publico/images/flecha.png"></th>
                        <th>Producto <img onclick="sortTableinventario(1, 'str')" src="publico/images/flecha.png"></th>
                        <th>Costo <img onclick="sortTableinventario(2, 'str')" src="publico/images/flecha.png"></th>
                        <th>Cantidad <img onclick="sortTableinventario(3, 'str')" src="publico/images/flecha.png"></th>
                        <th>Total<img onclick="sortTableinventario(4, 'str')" src="publico/images/flecha.png"></th>
                        <th style="text-align:center">Opciones</th>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>Bocina</td>
                        <td>$100</td>
                        <td>1</td>
                        <td>$100</td>
                        <td>2022-11-2</td>
                        <td>
                            <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-danger">
                                <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                                <lord-icon src="https://cdn.lordicon.com/kfzfxczd.json" trigger="hover"
                                    colors="primary:#ffffff" style="width:15px;height:15px">
                                </lord-icon>
                            </button>
                        </td>
                    </tbody>
                </table>

                <div class="row">
                    <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8">
                        <ul id="paginainven" class="pagination ">
                            <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-2 col-lg-2 col-xl-2 mt-2">
                        <b>Total: $<span id="total">0</span></b>
                    </div>
                </div>
            </div>
        </div>
        <div style="z-index: 9000" class="modal fade" id="modal_form" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="border-radius: 10px; margin-top: -5%">
                    <div class="container">
                        <div class="modal-body">
                            <div id="contentForminventario" style="font-size: 20px" class="formulario">
                                <h3 class='centrar'>
                                    Inventario Producto
                                </h3>
                                <hr>
                                <form id="forminventario" enctype="multipart/form-data">
    
                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label for="insumo" class="mt-2">Producto: </label>
                                            <input type="text" class="form-control" id="insumo" name="insumo">
                                            <input type="hidden" name="id_inventario" id="id_inventario" value="0">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label for="insumo" class="mt-2">Costo unitario: </label>
                                            <input type="float" class="form-control" id="precio" name="precio">
                                        </div>
                                    </div>
    
                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label for="unidades" class="mt-2">Cantidad: </label>
                                            <input type="number" class="form-control" id="unidades" name="unidades">
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label for="fecha" class="mt-2">Fecha compra: </label>
                                            <input type="date" class="form-control" id="fecha" name="fecha">
                                        </div>
                                    </div>
    
                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label for="provee" class="mt-2">Proveedor:</label>
                                            <select class="form-control" name="provee" id="provee">
                                                <?php
                                                // Verificamos la conexión con el servidor y la base de datos
                                                $mysqli = new mysqli('localhost', 'root', 'asd', 'daerp');
                                                $query = $mysqli->query("SELECT id_proveedor, empresa FROM proveedores ");
                                                while ($valores = mysqli_fetch_array($query)) {
                                                    echo '<option value="' . $valores[id_proveedor] . '">' . $valores[empresa] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                            <label for="n_factura" class="mt-2">N° factura: </label>
                                            <input type="text" class="form-control" id="n_factura" name="n_factura">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                                            <label for="comprador" class="mt-2">Responsable: </label>
                                            <input type="text" class="form-control" id="comprador" name="comprador">
                                        </div>
                                    </div>
                                    <div class="centrar">
                                        <button type="button" class="btn btn-secondary" id="btnCancelarinventario">
                                            <i class="bi bi-x-octagon-fill"></i>
                                            Cancelar
                                        </button>
                                        <button type="submit" class="btn btn-primary" id="btnSaveInventario">
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
    <!--Scripts de inventario-->
    <script src="<?php echo URL ?>publico/customjs/inventario.js"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
        function sortTableinventario(n, type) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

            table = document.getElementById("myTableinventario");
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
    <script src="aplicacion/vendor/jquery/jquery.min.js"></script>
    <script src="aplicacion/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!--Additional Scripts -->
    <?php include_once "aplicacion/vistas/partes/javascript.php"; ?>
</body>

</html>