<?php
include_once("aplicacion/modelos/administracion.php");
class administracioncontrolador extends controlador {
    private $administracion;
    public function __construct($param) {
        $this->administracion = new administracion;
        parent::__construct("administracion",$param, true);
    }
}