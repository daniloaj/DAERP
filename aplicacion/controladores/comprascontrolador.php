<?php
include_once("aplicacion/modelos/compras.php");
class comprascontrolador extends controlador {
    private $compras;
    public function __construct($param) {
        $this->compras = new compras;
        parent::__construct("compras",$param, true);
    }
}