<?php
//Es llamado por el controlador para redirigira cada una de las vistas que el usuario deseará ver
class Vista {
    public function render($vista){
        require_once "aplicacion/vistas/$vista.php";
    }
}