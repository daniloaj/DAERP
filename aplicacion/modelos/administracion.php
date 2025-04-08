<?php
include_once "aplicacion/modelos/db.class.php";
class administracion extends BaseDeDatos
{
    public function __construct()
    {
        parent::conectar();
    }
}
