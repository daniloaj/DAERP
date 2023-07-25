<?php
include_once "aplicacion/modelos/db.class.php";
class inventario extends BaseDeDatos
{

    public function __construct()
    {
        parent::conectar();
    }
    /*inventario.................................................................................................................................... */
    public function getAllinventario()
    {
        return $this->executeQuery("SELECT id_inventario, insumo, precio,unidades, total, fecha, empresa as provee, n_factura,comprador FROM inventario, proveedores WHERE proveedores.id_proveedor=inventario.provee order by id_inventario");
    }
    public function getAllhistorialinventario()
    {
        return $this->executeQuery("SELECT * FROM inventario_historial group by comprador");
    }
    public function saveinventario($data)
    {
        return $this->executeInsert("insert into inventario set insumo='{$data["insumo"]}',precio='{$data["precio"]}', unidades='{$data["unidades"]}', total=ROUND('{$data["unidades"]}'*'{$data["precio"]}',2), fecha='{$data["fecha"]}', provee='{$data["provee"]}', n_factura='{$data["n_factura"]}', comprador='{$data["comprador"]}'");
    }

    public function getinventarioByName($insumo)
    {
        return $this->executeQuery("SELECT * FROM inventario where insumo='{$insumo}'");
    }

    public function getOneinventario($id_inventario)
    {
        return $this->executeQuery("SELECT * FROM inventario where id_inventario='{$id_inventario}'");
    }

    public function updateinventario($data)
    {
        return $this->executeInsert("update inventario set insumo='{$data["insumo"]}', precio='{$data["precio"]}',unidades='{$data["unidades"]}',total=ROUND('{$data["unidades"]}'*'{$data["precio"]}',2), fecha='{$data["fecha"]}', provee='{$data["provee"]}', n_factura='{$data["n_factura"]}', comprador='{$data["comprador"]}' where id_inventario='{$data["id_inventario"]}'");
    }

    public function deleteinventario($id_inventario)
    {
        return $this->executeInsert("delete from inventario where id_inventario='$id_inventario'");
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
        return $this->executeQuery("SELECT * FROM inventario_historial where 1=1 $condicion");
    }
}