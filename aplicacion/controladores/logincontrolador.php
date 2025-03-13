<?php
//llamamos al modelo del login para poder utilizar sus funciones
include_once "aplicacion/modelos/login.php";
include_once "aplicacion/modelos/usuarios.php";
include_once "mailercontroller.php";
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
        $lang=$_POST["language"] ?? "es";
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

    public function send_mail() {

        $lang=$_POST["lang"] ?? "es";
        $language= include "aplicacion/vistas/partes/language/" . $lang .".php";

        $correo = $_POST['mail'];
        $user = $_POST['user'];
        $message =$language["mail_message"] . $language["my_user"] . $user . $language["my_mail"] . $correo;

        $mail = new EnvioCorreo();
        $mail->configMail('DAERP');
        $result = $mail->enviarMail(
            "agilardanilo@gmail.com",
            $language["reset_pass"],
            $message,
            '',
            ''
        );

        if ($result) {
            http_response_code(200);
            echo json_encode(array('success' => true, 'msg' => $language["mail_success"]));
        } else {
            http_response_code(500);
            echo json_encode(array('success' => true, 'msg' => 'Error'));
        }
        
    }

    public function cerrar() {
        if (!isset($_SESSION)) {
            session_start();
        }
        session_destroy();
        $this->vista->render("login");
    }

}