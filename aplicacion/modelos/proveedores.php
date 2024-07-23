<?php
include_once("db.class.php");
class proveedores extends BaseDeDatos
{
    public function __construct()
    {
        parent::conectar();
    }
    public function getAllProveedores() {
        return $this->executeQuery("SELECT * FROM proveedores order by id_proveedor");
    }

    public function saveProveedores($data) {
        return $this->executeInsert("insert into proveedores set empresa='{$data["empresa"]}',representante='{$data["representante"]}', tel1='{$data["tel1"]}', tel2='{$data["tel2"]}', fax='{$data["fax"]}', email='{$data["email"]}'");
    }

    public function getProveedoresByName($empresa) {
        return $this->executeQuery("SELECT * FROM proveedores where empresa='{$empresa}'");
    }

    public function getOneProveedor($id_proveedor) {
        return $this->executeQuery("SELECT * FROM proveedores where id_proveedor='{$id_proveedor}'");
    }

    public function updateProveedores($data) {
        return $this->executeInsert("update proveedores set empresa='{$data["empresa"]}', representante='{$data["representante"]}', tel1='{$data["tel1"]}',tel2='{$data["tel2"]}', fax='{$data["fax"]}', email='{$data["email"]}' where id_proveedor='{$data["id_proveedor"]}'");
    }

    public function deleteproveedor($id_proveedor) {
        return $this->executeInsert("delete from proveedores where id_proveedor='$id_proveedor'");
    }
}
