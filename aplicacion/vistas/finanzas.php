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
        <div id="buttons_actions_finances" class="container mt-2">
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
        <?php require_once "aplicacion/vistas/partes/inventario/inventario.php"; ?>
    </div>
    <!--Additional Scripts -->
    <?php include_once "aplicacion/vistas/partes/javascript.php"; ?>
</body>

</html>