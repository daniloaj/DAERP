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
        $info=array('success'=>true,'msg'=>"Registro eliminado con exito");
        echo json_encode($info);
    }

    public function getOneinventario() {
        $records=$this->inventario->getOneinventario($_GET["id_inventario"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El registro no existe');
        }
        echo json_encode($info);
    }

    public function saveinventario() {
        if ($_POST["id_inventario"]=="0") {
            $datosinventario=$this->inventario->getinventarioByName($_POST["insumo"]);
            $records=$this->inventario->saveinventario($_POST);
            $info=array('success'=>true,'msg'=>"Insumo registrado con exito");
        } else {
            $records=$this->inventario->updateinventario($_POST);
            $info=array('success'=>true,'msg'=>"Insumo actualizado con exito");
        }
        echo json_encode($info);
    }

    public function getAllinventario() {
        $records=$this->inventario->getAllinventario();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    public function getAllhistorialinventario() {
        $records=$this->inventario->getAllhistorialinventario();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
}