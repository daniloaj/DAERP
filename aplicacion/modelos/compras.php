<?php
include_once "aplicacion/modelos/db.class.php";
class compras extends BaseDeDatos
{
    public function __construct()
    {
        parent::conectar();
    }
}
