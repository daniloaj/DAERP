<?php
//unicamente sirve para llamar a la vista de los reportes que se le mostraran al usuario administrador
class reportesadministradorcontrolador extends controlador {
    public function __construct($parametro) {
        parent::__construct("reportesadministrador",$parametro,true);
    }
}