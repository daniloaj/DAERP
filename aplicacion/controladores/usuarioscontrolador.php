<?php
// se llama al modelo de usuarios para hacer uso de sus funciones
include_once "mailercontroller.php";
include_once "aplicacion/modelos/usuarios.php";

class usuariosControlador extends controlador
{
    private $usuarios;
    public function __construct($parametro)
    {
        $this->usuarios = new usuarios();
        parent::__construct("usuarios", $parametro, true);
    }

    public function deleteusuario()
    {
        $records = $this->usuarios->deleteusuario($_GET["id_usuario"]);
        if ($records) {
            http_response_code(200);
            echo json_encode(array('success' => true, 'msg' => "Usuario eliminado con exito"));
        } else {
            http_response_code(200);
            echo json_encode(array('success' => true, 'msg' => "Usuario eliminado con exito"));
        }
    }

    public function getOneusuario()
    {
        $records = $this->usuarios->getOneusuario($_GET["id_usuario"]);
        if (count($records) > 0) {
            http_response_code(200);
            echo json_encode(array('success' => true, 'records' => $records));
        } else {
            http_response_code(200);
            echo json_encode(array('success' => false, 'msg' => 'El registro no existe'));
        }
    }

    public function reset_pass()
    {
        $lang= $_SESSION["language"];
        $language= include "aplicacion/vistas/partes/language/" . $lang .".php";
        $records = $this->usuarios->reset_pass($_GET, $_GET["id"]);
        if ($records) {
            
            $user = $this->usuarios->getHashPassword($_GET["id"]);
            $correo = $user[0]["correo"];
            $issue = $language["reset_pass"];
            $message = $language["dear_user"] . " " . $user[0]["usuario"]. $language["send_reset_pass_body"] .  $language["user"] . ": " . $user[0]["usuario"] ." ". $language["pass"] . ": " . $user[0]["password"];

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
                echo json_encode(array('success' => true, "msg"=>$language["success_reset_pass"]));
            }
        } else {
            http_response_code(200);
            echo json_encode(array('success' => false));
        }
    }

    public function saveusuarios()
    {
        $datosUser = $this->usuarios->getusuariosByName($_POST);
        if ($_POST["id_usuario"] == "0") {
            if (count($datosUser) > 0) {
                echo json_encode(array('success' => false, 'msg' => "El usuario ya existe"));
            } else {
                $records = $this->usuarios->saveusuarios($_POST);
                if ($records) {
                    http_response_code(200);
                    echo json_encode(array('success' => true, 'msg' => "Usuario guardado con exito"));
                } else {
                    http_response_code(404);
                    echo json_encode(array('success' => false, 'msg' => "El usuario no se pudo guardar"));
                }
            }
        } else {
            if (count($datosUser) > 0) {
                echo json_encode(array('success' => false, 'msg' => "El usuario ya existe"));
            } else {
                $records = $this->usuarios->updateusuarios($_POST, $_POST["id_usuario"]);
                if ($records) {
                    http_response_code(200);
                    echo json_encode(array('success' => true, 'msg' => "Usuario actualizado con exito"));
                } else {
                    http_response_code(404);
                    echo json_encode(array('success' => false, 'msg' => "Error"));
                }
            }
        }
    }
    public function send_mail()
    {
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
            echo json_encode(array('success' => true, 'msg' => 'Correo enviado exitosamente'));
        } else {
            http_response_code(500);
            echo json_encode(array('success' => true, 'msg' => 'Error al enviar el correo'));
        }
    }
    public function send_many_mails()
    {
        $issue = $_POST['asunto'];
        $message = $_POST['mensaje'];

        $correos = json_decode($_POST['correo']);

        $mail = new EnvioCorreo();
        $mail->configMail('DAERP');

        for ($i = 0; $i < count($correos); $i++) {
            $result = $mail->enviarMail(
                $correos[$i]->correo,
                $issue ? $issue : '',
                $message ? $message : '',
                '',
                ''
            );
        }

        if ($result) {
            http_response_code(200);
            echo json_encode(array('success' => true, 'msg' => 'Correo enviado exitosamente'));
        } else {
            http_response_code(500);
            echo json_encode(array('success' => true, 'msg' => 'Error al enviar el correo'));
        }
    }

    public function getAllusuarios()
    {
        $records = $this->usuarios->getAllusuarios();
        if ($records) {
            http_response_code(200);
            echo json_encode(array('success' => true, 'records' => $records));
        } else {
            http_response_code(200);
            echo json_encode(array('success' => true, 'records' => $records));
        }
    }

    public function departamentList()
    {
        $data = $this->usuarios->departamentList();
        if ($data) {
            http_response_code(200);
            echo json_encode(array('success' => true, 'records' => $data));
        } else {
            http_response_code(200);
            echo json_encode(array('success' => true, 'records' => $data));
        }
    }
}
