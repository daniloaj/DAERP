<?php
//llama a la conexion para utilizar sus funciones
include_once "aplicacion/modelos/db.class.php";
class Login extends BaseDeDatos {

    public function __construct() {
        parent::conectar();
    }

    //validamos los datos introducidos en la vista del login con los datos en la base de datos
    public function validarLogin($user,$pass) {
        $result=$this->conexion->query("SELECT * FROM usuarios WHERE usuario='$user' and password=sha1('$pass')");
        if ($record=$result->fetch_assoc()) {
            return $record;
        } else {
            return false;
        }
    }

}