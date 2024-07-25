<?php
include_once "aplicacion/modelos/inventario.php";
class inventariocontrolador extends controlador {
    private $inventario;
    public function __construct($parametro) {
        $this->inventario=new inventario();
        parent::__construct("inventario",$parametro,true);
    }
    public function deleteinventario() {
        $records=$this->inventario->deleteinventario($_GET["id_inventario"]);
        if ($records) {
            http_response_code(200);
            echo json_encode(array('success'=>true,'msg'=>"Registro eliminado con exito"));
        } else {
            http_response_code(200);
            echo json_encode(array('success'=>false,'msg'=>"Error, no se pudo eliminar el registro"));
        }
    }

    public function getOneinventario() {
        $records=$this->inventario->getOneinventario($_GET["id_inventario"]);
        if (count($records)>0) {
            http_response_code(200);
            echo json_encode(array('success'=>true,'records'=>$records));
        } else {
            http_response_code(200);
            echo json_encode(array('success'=>false,'msg'=>'El registro no existe'));
        }
    }

    public function saveinventario() {
        if ($_POST["id_inventario"]=="0") {
            $records=$this->inventario->saveinventario($_POST);
            if ($records) {
                http_response_code(200);
                echo json_encode(array('success'=>true,'msg'=>"Insumo registrado con exito"));
            }else{
                http_response_code(200);
                echo json_encode(array('success'=>false,'msg'=>"Error"));
            }
        } else {
            $records=$this->inventario->updateinventario($_POST["id_inventario"] ,$_POST);
            if ($records) {
                http_response_code(200);
                echo json_encode(array('success'=>true,'msg'=>"Insumo actualizado con exito"));
            }else{
                http_response_code(200);
                echo json_encode(array('success'=>false,'msg'=>"Error"));
            }
        }
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