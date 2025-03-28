<?php
//llama a la conexion para utilizar sus funciones
include_once "aplicacion/modelos/db.class.php";
class Login extends BaseDeDatos {

    public function __construct() {
        parent::conectar();
    }

    //validamos los datos introducidos en la vista del login con los datos en la base de datos
    public function validarLogin($user,$pass) {
        $result=$this->conexion->query("SELECT tipo, usuario, nombre, id_usuario FROM usuarios WHERE usuario='$user' and password=sha1('$pass')");
        if ($record=$result->fetch_assoc()) {
            return $record;
        } else {
            return false;
        }
    }
    public function validarReset($user) {
        $query = "SELECT id_usuario
        FROM usuarios 
        where usuario='$user' and password=md5('$user')";

        $params = array(
        );
        return $this->preparar_seleccion($query, $params);
    }
    public function get_id_user($user){
        $query = "SELECT id_usuario
        FROM usuarios 
        where usuario='$user'";

        $params = array(
        );
        return $this->preparar_seleccion($query, $params);
    }
    public function change_password($data,$user) {
        $table = "usuarios";
        $data["pass"] = sha1($data["pass"]);
        $data = array(
            "password" => $data["pass"]
        );
      
        $condition = "id_usuario = ?";

        return $this->preparar_actualizar($table, $data, $condition, $user);
    }

}