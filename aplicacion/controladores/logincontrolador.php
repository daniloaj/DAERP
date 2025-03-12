<?php
//llamamos al modelo del login para poder utilizar sus funciones
include_once "aplicacion/modelos/login.php";
include_once "aplicacion/modelos/usuarios.php";
class LoginControlador extends controlador {
    private $user;
    private $usuarios;

    //utilizamos el metodo constructor para poder llamar a la vista por medio del parametro
    public function __construct($parametro) {
        $this->user=new Login();
        $this->usuarios = new usuarios();
        parent::__construct("login",$parametro);
    }

    //validamos el usuario que desee inciar sesión
    public function validar() {
        $user=$_POST["usuario"] ?? "";
        $pass=$_POST["password"] ?? "";
        $lang=$_POST["language"] ?? "";
        $language= include "aplicacion/vistas/partes/language/" . $lang .".php";
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
            $_SESSION["id_dep"]=$record["id_dep"];
            
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
            $info=array("success"=>false,"msg"=>$language["bad_login"]);    
        }
        echo json_encode($info);
    }

    public function departamentList() {
        $data=$this->usuarios->departamentList();
        if ($data) {
            http_response_code(200);
            echo json_encode(array('success' => true, 'records' => $data));
        } else {
            http_response_code(404);
            echo json_encode(array('success' => false));
        }
        
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