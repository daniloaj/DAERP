<?php
include_once "aplicacion/modelos/db.class.php";
class finanzas extends BaseDeDatos
{
    public function __construct()
    {
        parent::conectar();
    }
}
