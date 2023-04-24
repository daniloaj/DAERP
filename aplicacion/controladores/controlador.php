<?php
//llama a la vista para poder hacer uso de sus funciones
require_once "aplicacion/vistas/vista.php";

//declara una clase que será utilizada por todos los demás controladores
class controlador {
    public $vista;

    //declaramos 3 variables por el metodo constructor
    public function __construct($vista,$parametro,$validar=false){
        $this->vista=new Vista();

        //validamos el inicio de sesion
        if ($validar) {
            if (!isset($_SESSION)) {
                session_start();
            }
            if (!isset($_SESSION["id_usuario"])) {
                $this->vista->render("login");
                return;
            }
        }
        if (empty($parametro)) {
            $this->vista->render($vista);
            return;
        }
        if (method_exists($this,$parametro)) {
            $this->$parametro();
        } else {
            echo "Error";
        }
    }
}