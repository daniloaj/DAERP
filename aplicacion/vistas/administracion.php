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
    <div class="data">

                <div id="admintContent" class="container mt-2">
                    <section class="stats mb-4">
                        <a href="<?php echo URL ?>administracion">
                            <div class="stat-item start-quiz"><i class="bi bi-plus-square-fill"></i> <br>Personal</div>
                        </a>
                        <div class="stat-item" id="filter_busqueda"><i class="bi bi-eye"></i><br>proveedores</div>
                        <div class="stat-item"><i class="bi bi-trash"></i> <br>contacto</div>
                        <div  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" class="stat-item"><i class="bi bi-trash"></i> <br>historial</div>
                        <div class="stat-item"><i class="bi bi-download"></i> <br>PDF</div>
                        <div class="stat-item"><i class="bi bi-download"></i> <br>EXCEL</div>
                    </section>

                   <?php require_once "aplicacion/vistas/partes/admin/usuarios.php"; ?>
                </div>

                <!-- historial -->
            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">historial</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">

                    <div style="padding: 15px; background-color: white; border-radius: 15px; box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1); margin-bottom: 25px">
                        <h5 style="color: green">
                            adding
                        </h5>
                        <p>
                            se agregaron 5 productos "microhondas" a $5 cada uno.
                        </p>
                    </div>
                    <div style="padding: 15px; background-color: white; border-radius: 15px; box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1); margin-bottom: 25px">
                        <h5 style="color: blue">
                            Edition
                        </h5>
                        <p>
                            se editó el nombre del producto de "A" a "el microhondas"
                        </p>
                    </div>
                    <div style="padding: 15px; background-color: white; border-radius: 15px; box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1); margin-bottom: 25px">
                        <h5 style="color: red">
                            delete
                        </h5>
                        <p>
                            se eliminó el producto"A"
                        </p>
                    </div>
                    <div style="padding: 15px; background-color: white; border-radius: 15px; box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1); margin-bottom: 25px">
                        <h5 style="color: green">
                            adding
                        </h5>
                        <p>
                            se agregaron 5 productos "microhondas" a $5 cada uno.
                        </p>
                    </div>
                    <div style="padding: 15px; background-color: white; border-radius: 15px; box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1); margin-bottom: 25px">
                        <h5 style="color: blue">
                            Edition
                        </h5>
                        <p>
                            se editó el nombre del producto de "A" a "el microhondas"
                        </p>
                    </div>
                    <div style="padding: 15px; background-color: white; border-radius: 15px; box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1); margin-bottom: 25px">
                        <h5 style="color: red">
                            delete
                        </h5>
                        <p>
                            se eliminó el producto"A"
                        </p>
                    </div>
                    <div style="padding: 15px; background-color: white; border-radius: 15px; box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1); margin-bottom: 25px">
                        <h5 style="color: green">
                            adding
                        </h5>
                        <p>
                            se agregaron 5 productos "microhondas" a $5 cada uno.
                        </p>
                    </div>
                    <div style="padding: 15px; background-color: white; border-radius: 15px; box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1); margin-bottom: 25px">
                        <h5 style="color: blue">
                            Edition
                        </h5>
                        <p>
                            se editó el nombre del producto de "A" a "el microhondas"
                        </p>
                    </div>
                    <div style="padding: 15px; background-color: white; border-radius: 15px; box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1); margin-bottom: 25px">
                        <h5 style="color: red">
                            delete
                        </h5>
                        <p>
                            se eliminó el producto"A"
                        </p>
                    </div>
                </div>
            </div>
    </div>
    <!--Scripts de inventario-->
    <script src="<?php echo URL ?>publico/customjs/inventarios.js"></script>
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