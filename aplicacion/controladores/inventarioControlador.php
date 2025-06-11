<?php
include_once "aplicacion/modelos/inventario.php";
class inventariocontrolador extends controlador {
    private $inventario;
    public function __construct($parametro) {
        $this->inventario=new inventario();
        parent::__construct("inventario",$parametro,true);
    }

    public function getAllinventario() {
        $records=$this->inventario->getAllinventario();
        if ($records) {
            http_response_code(200);
            echo json_encode(array('success'=>true,'records'=>$records));
        } else {
            http_response_code(200);
            echo json_encode(array('success'=>false,'msg'=>"Error al obtener datos"));
        }
    }
}