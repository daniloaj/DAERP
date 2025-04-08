<?php
include_once "aplicacion/modelos/db.class.php";
class ventas extends BaseDeDatos
{
    public function __construct()
    {
        parent::conectar();
    }
}
