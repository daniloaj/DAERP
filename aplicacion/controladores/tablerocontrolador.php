<?php
//este controlador se utiliza para llevar al tablero del usuario normal
class tablerocontrolador extends controlador {
    public function __construct($parametro) {
        parent::__construct("tablero",$parametro,true);
    }
}