<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <!-- Archivos adicionales CSS -->
    <link rel="stylesheet" href="publico/css/super.css">
    <title>Inventario</title>
</head>

<body>
    <?php require_once "aplicacion/vistas/partes/supertablero_partes/sidebar_supertablero.php"; ?>
        <div id="contentListinventario">

            <div class="row" id="filtros_busqueda">

                <div class="col-md-4">
                    <div class="input-group mb-3 buscador">
                        <input placeholder="Buscar registro" type="search" class="form-control" aria-describedby="basic-addon2" id="txtSearchinventario">
                        <i class="bi bi-search p-2"></i>
                    </div>
                </div>
            </div>

            <div id="contentTableinventario" class="tables_border">
                <table class="table table-hover" style="text-transform: capitalize" id="myTableinventario">
                    <thead>
                        <th># <img onclick="sortTableinventario(0, 'int')" src="publico/images/flecha.png"></th>
                        <th>Producto <img onclick="sortTableinventario(1, 'str')" src="publico/images/flecha.png"></th>
                        <th style="text-align:center">Costo promedio <img onclick="sortTableinventario(2, 'int')" src="publico/images/flecha.png"></th>
                        <th style="text-align:center">Stock <img onclick="sortTableinventario(3, 'int')" src="publico/images/flecha.png"></th>
                    </thead>
                    <tbody>

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
    <!--Scripts de inventario-->
    <script src="<?php echo URL ?>publico/customjs/inventario.js"></script>
    <script>
        let tooltips = document.querySelectorAll('[data-toggle="tooltip"]');
        tooltips.forEach(function(tooltip) {
            new bootstrap.Tooltip(tooltip);
        });

        function sortTableinventario(n, type) {
            let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

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
    <!--Additional Scripts -->
    <?php include_once "aplicacion/vistas/partes/javascript.php"; ?>
</body>

</html>