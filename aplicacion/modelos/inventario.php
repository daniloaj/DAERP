<?php
include_once "aplicacion/modelos/db.class.php";
class inventario extends BaseDeDatos
{

    public function __construct()
    {
        parent::conectar();
    }
    public function getAllinventario()
    {
        $query = "SELECT id_inventario,insumo, 20 as precio, sum(unidades) as unidades from inventario GROUP by insumo ORDER BY id_inventario";
        $params = array();
        return $this->preparar_seleccion($query, $params);
    }

    public function getinventarioReporte($data)
    {
        $condicion = "";
        if ($data["principio"] != "") {
            $condicion .= "and fecha>='{$data["principio"]}'";
        }
        if ($data["acaba"] != "") {
            $condicion .= " and fecha<='{$data["acaba"]}'";
        }
        if ($data["comprador"] != "0") {
            $condicion .= " and comprador='{$data["comprador"]}'";
        }
        $query="SELECT * FROM inventario_historial where 1=1 $condicion";
        $params=array();
        return $this->preparar_seleccion($query,$params);
    }
}
