<?php
include_once("aplicacion/modelos/ventas.php");
class ventascontrolador extends controlador {
    private $ventas;
    public function __construct($param) {
        $this->ventas = new ventas;
        parent::__construct("ventas",$param, true);
    }
}