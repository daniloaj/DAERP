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
        $query = "SELECT 
        id_inventario, 
        insumo, 
        precio,
        unidades, 
        total, 
        DATE_FORMAT(fecha,'%d/%m/%Y') as fecha_format, 
        empresa as provee, 
        n_factura,comprador 
        FROM inventario, proveedores 
        WHERE proveedores.id_proveedor=inventario.provee 
        order by id_inventario desc";
        $params = array();
        return $this->preparar_seleccion($query, $params);
    }

    public function saveinventario($data)
    {
        $table = "inventario";

        $datosInsertar = array(
            "insumo" => $data["insumo"],
            "precio" => $data["precio"],
            "unidades" => $data["unidades"],
            "total" => round($data["unidades"] * $data["precio"], 2),
            "fecha" => $data["fecha"],
            "provee" => $data["provee"],
            "n_factura" => $data["n_factura"],
            "comprador" => $data["comprador"]
        );

        return $this->preparar_insertar($table, $datosInsertar);
    }

    public function getOneinventario($id_inventario)
    {
        $query = "SELECT i.*, 
            DATE_FORMAT(i.fecha,'%d/%m/%Y') as fecha_format,
            fecha, 
            p.empresa 
            FROM inventario i 
            INNER JOIN proveedores p 
            on p.id_proveedor=i.provee 
            where id_inventario=?";

        $params = array(
            $id_inventario
        ); 
        return $this->preparar_seleccion($query, $params);
    }

    public function updateinventario($id_inventario, $data)
    {
        $table = "inventario"; 

        $datosActualizar = array(
            "insumo" => $data["insumo"],
            "precio" => $data["precio"],
            "unidades" => $data["unidades"],
            "total" => round($data["unidades"] * $data["precio"], 2),
            "fecha" => $data["fecha"],
            "provee" => $data["provee"],
            "n_factura" => $data["n_factura"],
            "comprador" => $data["comprador"]
        );

        $condition = "id_inventario = ?";

        $datosActualizar["id_inventario"] = $id_inventario;

        return $this->preparar_actualizar($table, $datosActualizar, $condition,$id_inventario);
    }

    public function deleteinventario($id_inventario)
    {
        $query = "DELETE 
            from inventario 
            where id_inventario=?";

        $params = array(
            "id_inventario" => $id_inventario
        );
        return $this->preparar_eliminar($query, $params);
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
