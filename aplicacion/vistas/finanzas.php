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
        <div id="contentListinventario" class="container mt-2">
            <section class="stats mb-4">
                <div class="stat-item start-quiz"><i class="bi bi-receipt"></i><br>Inventario</div>
                <div class="stat-item"><i class="bi bi-bag"></i><br>Compras</div>
                <div class="stat-item">agregar compra </div>
                <div class="stat-item"><i class="bi bi-currency-dollar"></i> <br>Ventas</div>
                <div class="stat-item">agregar venta</div>
                <div class="stat-item"><i class="bi bi-download"></i> <br>PDF</div>
                <div class="stat-item"><i class="bi bi-download"></i> <br>EXCEL</div>
            </section>  
        </div>
        <?php require_once "aplicacion/vistas/inventario.php"; ?>
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