<?php
include_once("db.class.php");
class proveedores extends BaseDeDatos
{
    public function __construct()
    {
        parent::conectar();
    }
    public function getAllProveedores() {
        $query="SELECT * FROM proveedores order by id_proveedor";
        $params=array();
        return $this->preparar_seleccion($query,$params);
    }
}
