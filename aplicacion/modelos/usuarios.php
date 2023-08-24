<?php
include_once "aplicacion/modelos/db.class.php";
class usuarios extends BaseDeDatos {

    public function __construct() {
        parent::conectar();
    }  

/*usuarios.................................................................................................................................... */
    public function getAllusuarios() {
        return $this->executeQuery("SELECT * FROM usuarios INNER JOIN departamentos USING(id_dep) order by id_usuario");
    }
    public function saveusuarios($data) {
        return $this->executeInsert("insert into usuarios set nombre='{$data["nombre"]}',usuario='{$data["usuario"]}', password=sha1('{$data["password"]}'), tipo='{$data["tipo"]}',id_dep='{$data["depa"]}'");
    }

    public function getusuariosByName($usuario) {
        return $this->executeQuery("SELECT * FROM usuarios where usuario='{$usuario}'");
    }

    public function getOneusuario($id_usuario) {
        return $this->executeQuery("SELECT * FROM usuarios where id_usuario='{$id_usuario}'");
    }

    public function updateusuarios($data) {
        return $this->executeInsert("update usuarios set nombre='{$data["nombre"]}', usuario='{$data["usuario"]}',password=if('{$data["password"]}'=usuarios.password,usuarios.password,sha1('{$data["password"]}')),tipo='{$data["tipo"]}',id_dep='{$data["depa"]}' where id_usuario='{$data["id_usuario"]}'");
    }

    public function deleteusuario($id_usuario) {
        return $this->executeInsert("delete from usuarios where id_usuario='$id_usuario'");
    }
}