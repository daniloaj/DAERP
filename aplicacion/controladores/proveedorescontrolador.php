<?php
include_once("aplicacion/modelos/proveedores.php");
class proveedorescontrolador extends controlador {
    private $provee;
    public function __construct($param) {
        $this->provee = new proveedores;
        parent::__construct("proveedores",$param, true);
    }
    public function proveedoresList() {
        $data=$this->provee->getAllProveedores();
        if ($data) {
            http_response_code(200);
            echo json_encode(array("success"=>true, "data"=>$data));
        } else {
            http_response_code(200);
            echo json_encode(array("success"=>false, "msg"=>"Error"));
        }
        
    }
}