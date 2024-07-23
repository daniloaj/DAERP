<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once "aplicacion/vendor/autoload.php";
require_once "aplicacion/vendor/phpmailer/phpmailer/src/PHPMailer.php";

class EnvioCorreo {
    private $mail;
    
    public function configMail($fromname) {
            $credentials = require "aplicacion/modelos/credentials_config.php";
            $this->mail = new PHPMailer();
            // $this->mail->SMTPDebug  = 2;
            $this->mail->isSMTP();
            $this->mail->Host = "smtp.gmail.com";
            $this->mail->From = $credentials["mail"];
            $this->mail->FromName = $fromname;
            $this->mail->SMTPAuth = true;
            $this->mail->SMTPSecure = "tls";
            $this->mail->Port = 587;
            $this->mail->Username = $credentials["mail"];
            $this->mail->Password = $credentials["passMail"];

        }
        
        public function enviarMail($correo, $sub, $body, $attachment = '', $file_name) {
            $correosenv=explode(";",$correo);
            $this->mail->Subject = $sub;
            $this->mail->AltBody = $body;
            $this->mail->MsgHTML($body);
            $this->mail->ClearAttachments();
            if ($attachment != '') {                             
                $this->mail->addStringAttachment(base64_decode($attachment), $file_name);               
            }
            $enviado=true;            
            foreach ($correosenv as $i => $value) {
               $this->mail->ClearAddresses();
               $this->mail->AddAddress(trim($value), trim($value));
               if(!$this->mail->Send()) {
                $enviado=false;
              } 
            }
            return $enviado;
        }
      }
      
?>