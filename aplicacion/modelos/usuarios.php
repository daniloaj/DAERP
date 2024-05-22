<?php
include_once "aplicacion/modelos/db.class.php";
class usuarios extends BaseDeDatos {

    public function __construct() {
        parent::conectar();
    }  

/*usuarios.................................................................................................................................... */
    public function getAllusuarios() {
        return $this->executeQuery("SELECT 
        id_usuario, 
        nombre, 
        apellido, 
        usuario,tipo, 
        nom_depa, 
        id_dep,
        tel,
        whatsapp,
        correo
        FROM usuarios 
        INNER JOIN 
        departamentos 
        USING(id_dep) 
        order by id_usuario");
    }
    public function saveusuarios($data) {
        return $this->executeInsert("insert into usuarios set 
        nombre='{$data["nombre"]}',
        apellido='{$data["apellidos"]}',
        usuario='{$data["usuario"]}', 
        password=sha1('{$data["password"]}'), 
        tipo='{$data["tipo"]}',
        tel='{$data["tel"]}',
        whatsapp='{$data["whatsapp"]}',
        correo='{$data["correo"]}',
        id_dep='{$data["depa"]}'");
    }

    public function getusuariosByName($data) {
        return $this->executeQuery("SELECT * FROM usuarios where usuario='{$data["usuario"]}' and id_usuario<>'{$data["id_usuario"]}'");
    }

    public function getOneusuario($id_usuario) {
        return $this->executeQuery("SELECT id_usuario, 
        nombre, 
        apellido, 
        usuario,
        tipo, 
        nom_depa, 
        id_dep,
        tel,
        whatsapp,
        correo
        FROM usuarios 
        INNER JOIN 
        departamentos 
        USING(id_dep) 
        where id_usuario='{$id_usuario}'");
    }

    public function updateusuarios($data) {
        return $this->executeInsert("update usuarios set 
        nombre='{$data["nombre"]}',
        apellido='{$data["apellidos"]}', 
        usuario='{$data["usuario"]}',
        password=if('{$data["password"]}'='',usuarios.password,sha1('{$data["password"]}')),
        tipo='{$data["tipo"]}',
        tel='{$data["tel"]}',
        correo='{$data["correo"]}',
        whatsapp='{$data["whatsapp"]}',
        id_dep='{$data["depa"]}' 
        where id_usuario='{$data["id_usuario"]}'");
    }

    public function deleteusuario($id_usuario) {
        return $this->executeInsert("delete from usuarios where id_usuario='$id_usuario'");
    }
}