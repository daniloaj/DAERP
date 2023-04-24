<?php
//unicamente sirve para llamar a la vista de los reportes que se le mostraran al super usuario
class superreportescontrolador extends controlador {
    public function __construct($parametro) {
        parent::__construct("superreportes",$parametro,true);
    }
}