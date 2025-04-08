<?php
include_once("aplicacion/modelos/finanzas.php");
class finanzascontrolador extends controlador {
    private $finanzas;
    public function __construct($param) {
        $this->finanzas = new finanzas;
        parent::__construct("finanzas",$param, true);
    }
}