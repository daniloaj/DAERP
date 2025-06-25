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

    <?php
    $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $modulo = basename($current_url);
    if ($modulo === "administracion" || $modulo === "administracion&accion=usuarios") {
        require_once "aplicacion/vistas/partes/admin/usuarios.php";
    } else {
        require_once "aplicacion/vistas/partes/inventario/inventario.php";
    }
    ?>
    <?php include_once "aplicacion/vistas/partes/javascript.php"; ?>
</body>

</html>