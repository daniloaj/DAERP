<?php
//este controlador se utiliza para llevar al tablero del administrador
class tableroadministradorcontrolador extends controlador {
    public function __construct($parametro) {
        parent::__construct("tableroadministrador",$parametro,true);
    }
}