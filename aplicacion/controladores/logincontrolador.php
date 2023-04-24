<?php
//llamamos al modelo del login para poder utilizar sus funciones
include_once "aplicacion/modelos/login.php";
class LoginControlador extends controlador {
    private $user;

    //utilizamos el metodo constructor para poder llamar a la vista por medio del parametro
    public function __construct($parametro) {
        $this->user=new Login();
        parent::__construct("login",$parametro);
    }

    //validamos el usuario que desee inciar sesión
    public function validar() {
        $user=$_POST["usuario"] ?? "";
        $pass=$_POST["password"] ?? "";
        $record=$this->user->validarLogin($user,$pass);
        if ($record) {
            if (!isset($_SESSION)) {
                session_start();
            }

            //utilizamos los campos de la tabla usuarios para validar el inicio de sesión
            $_SESSION["id_usuario"]=$record["id_usuario"];
            $_SESSION["nombre"]=$record["nombre"];
            $_SESSION["usuario"]=$record["usuario"];
            $_SESSION["password"]=$record["password"];
            $_SESSION["tipo"]=$record["tipo"];
            
            //Identificamos el tipo de usuario que está iniciando sesión
            if ($record["tipo"]=='super usuario') {
                $info=array("success"=>true,"msg"=>"Usuario valido","url"=>URL."supertablero");     
            }
            elseif ($record["tipo"]=='administrador') {
                $info=array("success"=>true,"msg"=>"Usuario valido","url"=>URL."tableroadministrador");
            }
            elseif ($record["tipo"]=='usuario') {
                $info=array("success"=>true,"msg"=>"Usuario valido","url"=>URL."tablero");
            }
        } else {
            $info=array("success"=>false,"msg"=>"Usuario o contraseña incorrecta");    
        }
        echo json_encode($info);
    }
    //cerramos sesión llamando al login en las vistas
    public function cerrar() {
        if (!isset($_SESSION)) {
            session_start();
        }
        session_destroy();
        $this->vista->render("login");
    }

}