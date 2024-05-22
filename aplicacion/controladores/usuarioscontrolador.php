<?php
// se llama al modelo de usuarios para hacer uso de sus funciones
include_once "mailercontroller.php";
include_once "aplicacion/modelos/usuarios.php";

class usuariosControlador extends controlador {
    private $usuarios;
    public function __construct($parametro) {
        $this->usuarios=new usuarios();
        parent::__construct("usuarios",$parametro,true);
    }

/*Usuarios......................................................................... */
    public function deleteusuario() {
        $records=$this->usuarios->deleteusuario($_GET["id_usuario"]);
        $info=array('success'=>true,'msg'=>"Usuario eliminado con exito");
        echo json_encode($info);
    }

    public function getOneusuario() {
        $records=$this->usuarios->getOneusuario($_GET["id_usuario"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El registro no existe');
        }
        echo json_encode($info);
    }

    public function saveusuarios() {
        $datosUser=$this->usuarios->getusuariosByName($_POST);
        if ($_POST["id_usuario"]=="0") {
            if (count($datosUser)>0) {
                $info=array('success'=>false,'msg'=>"El usuario ya existe");
            } else {
                $records=$this->usuarios->saveusuarios($_POST);
                $info=array('success'=>true,'msg'=>"Usuario guardado con exito");
            }
        } else {
            if (count($datosUser)>0) {
                $info=array('success'=>false,'msg'=>"El usuario ya existe");
            } else {
                $records=$this->usuarios->updateusuarios($_POST);
                $info=array('success'=>true,'msg'=>"Usuario actualizado con exito");
            }
        }
        echo json_encode($info);
    }

    public function send_mail() {
        $correo = $_POST['correo'];
        $issue = $_POST['asunto'];
        $message = $_POST['mensaje'];

        $mail = new EnvioCorreo();
        $mail->configMail('DAERP');
        $result = $mail->enviarMail(
            $correo,
            $issue,
            $message,
            '',
            ''
        );

        if ($result) {
            http_response_code(200);
            echo json_encode(array('success' => true, 'msg' => 'Correo enviado'));
        } else {
            http_response_code(500);
            echo json_encode(array('success' => true, 'msg' => 'Error al enviar el correo'));
        }
    }

    public function getAllusuarios() {
        $records=$this->usuarios->getAllusuarios();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
}