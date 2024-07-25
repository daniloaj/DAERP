<?php
include_once "aplicacion/modelos/db.class.php";
class usuarios extends BaseDeDatos
{

    public function __construct()
    {
        parent::conectar();
    }

    public function getAllusuarios()
    {
        $query = "SELECT 
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
        INNER JOIN departamentos 
        USING(id_dep) 
        order by id_usuario";
        $params = array();
        return $this->preparar_seleccion($query, $params);
    }
    public function saveusuarios($data)
    {
        $table = "usuarios";

        $data = array(
            "nombre" => $data["nombre"],
            "apellido" => $data["apellidos"],
            "usuario" => $data["usuario"],
            "password" => sha1($data["password"]),
            "tipo" => $data["tipo"],
            "tel" => $data["tel"],
            "whatsapp" => $data["whatsapp"],
            "correo" => $data["correo"],
            "id_dep" => $data["depa"]
        );
        return $this->preparar_insertar($table, $data);
    }

    public function getusuariosByName($data)
    {
        $query = "SELECT * FROM usuarios where usuario=? and id_usuario<>?";
        $params = array(
            $data["usuario"],
            $data["id_usuario"],
        );
        return $this->preparar_seleccion($query, $params);
    }

    public function getOneusuario($id_usuario)
    {
        $query = "SELECT id_usuario, 
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
        INNER JOIN departamentos 
        USING(id_dep) 
        where id_usuario=?";

        $params = array(
            $id_usuario
        );
        return $this->preparar_seleccion($query, $params);
    }

    public function updateusuarios($data, $id_usuario)
    {
        $table = "usuarios";

        $data = array(
            "nombre" => $data["nombre"],
            "apellido" => $data["apellidos"],
            "usuario" => $data["usuario"],
            "password" => $data["password"],
            "tipo" => $data["tipo"],
            "tel" => $data["tel"],
            "whatsapp" => $data["whatsapp"],
            "correo" => $data["correo"],
            "id_dep" => $data["depa"],
            "id_usuario"=>$data["id_usuario"]
        );
        if (!empty($data["password"])) {
            $data["password"] = sha1($data["password"]); 
        } else {
            unset($data["password"]); 
        }
        $condition = "id_usuario = ?";

        return $this->preparar_actualizar($table, $data, $condition,$id_usuario);
    }

    public function deleteusuario($id_usuario)
    {
        $query="DELETE from usuarios where id_usuario=?";
        $params=array(
            "id_usuario"=>$id_usuario,
        );
        return $this->preparar_eliminar($query,$params);
    }
}
