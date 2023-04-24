<?php
// se llama al modelo de supertablero para hacer uso de sus funciones
include_once "aplicacion/modelos/supertablero.php";
class supertableroControlador extends controlador {
    private $supertablero;
    public function __construct($parametro) {
        $this->supertablero=new supertablero();
        parent::__construct("supertablero",$parametro,true);
    }
/*Historial de compras */
    //llama a la función que mostrará los datos de la tabla del historial de compras
    public function getAllCompras() {
        $records=$this->supertablero->getAllCompras();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
/*Compras........................................................................................... */

    //llama los datos de la tabla de las compras
    public function getAll() {
        $records=$this->supertablero->getAll();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    //guarda los datos de un nuevo registro
    public function saveCompras() {
        
        //si el id_compra es igual a 0 lo guarda como un nuevo registro, si es mayor identifica el id correspondiente y lo edita con los nuevos datos
        if ($_POST["id_compra"]=="0") {
            $datossupertablero=$this->supertablero->getCompraByName($_POST["producto"]);
            $records=$this->supertablero->saveCompras($_POST);
            $info=array('success'=>true,'msg'=>"Compra registrada con exito");
        } else {
            $records=$this->supertablero->updateCompras($_POST);
            $info=array('success'=>true,'msg'=>"Compra actualizada con exito");
        }
        echo json_encode($info);
    }
    //identifica el registro por el id
    public function getOneCompra() {
        $records=$this->supertablero->getOneCompra($_GET["id_compra"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El registro no existe');
        }
        echo json_encode($info);
    }
    //Elimina el registro identificandolo por el id
    public function deleteCompra() {
        $records=$this->supertablero->deleteCompra($_GET["id_compra"]);
        $info=array('success'=>true,'msg'=>"Registro eliminado con exito");
        echo json_encode($info);
    }
    
/*proveedores......................................................................... */
    public function saveProveedores() {
        if ($_POST["id_proveedor"]=="0") {
            $datossupertablero=$this->supertablero->getProveedoresByName($_POST["empresa"]);
            $records=$this->supertablero->saveProveedores($_POST);
            $info=array('success'=>true,'msg'=>"Proveedor registrado con exito");
        } else {
            $records=$this->supertablero->updateProveedores($_POST);
            $info=array('success'=>true,'msg'=>"Proveedor actualizado con exito");
        }
        echo json_encode($info);
    }
    public function deleteproveedor() {
        $records=$this->supertablero->deleteproveedor($_GET["id_proveedor"]);
        $info=array('success'=>true,'msg'=>"Registro eliminado con exito");
        echo json_encode($info);
    }

    public function getOneProveedor() {
        $records=$this->supertablero->getOneProveedor($_GET["id_proveedor"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El registro no existe');
        }
        echo json_encode($info);
    }

    public function getAllProveedores() {
        $records=$this->supertablero->getAllProveedores();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }

/*Usuarios......................................................................... */
    public function deleteusuario() {
        $records=$this->supertablero->deleteusuario($_GET["id_usuario"]);
        $info=array('success'=>true,'msg'=>"Registro eliminado con exito");
        echo json_encode($info);
    }

    public function getOneusuario() {
        $records=$this->supertablero->getOneusuario($_GET["id_usuario"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El registro no existe');
        }
        echo json_encode($info);
    }

    public function saveusuarios() {
        if ($_POST["id_usuario"]=="0") {
            $datosUser=$this->supertablero->getusuariosByName($_POST["usuario"]);
            if (count($datosUser)>0) {
                $info=array('success'=>false,'msg'=>"El usuario ya existe");
            } else {
                $records=$this->supertablero->saveusuarios($_POST);
                $info=array('success'=>true,'msg'=>"Usuario guardado con exito");
            }
        } else {
            $records=$this->supertablero->updateusuarios($_POST);
            $info=array('success'=>true,'msg'=>"Usuario actualizado con exito");
        }
        echo json_encode($info);
    }

    public function getAllusuarios() {
        $records=$this->supertablero->getAllusuarios();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
/*Agenda......................................................................... */
    public function deleteagenda() {
        $records=$this->supertablero->deleteagenda($_GET["id_agenda"]);
        $info=array('success'=>true,'msg'=>"Registro eliminado con exito");
        echo json_encode($info);
    }

    public function getOneagenda() {
        $records=$this->supertablero->getOneagenda($_GET["id_agenda"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El registro no existe');
        }
        echo json_encode($info);
    }

    public function saveagenda() {
        if ($_POST["id_agenda"]=="0") {
            $datossupertablero=$this->supertablero->getagendaByName($_POST["responsables"]);
            $records=$this->supertablero->saveagenda($_POST);
            $info=array('success'=>true,'msg'=>"Actividad registrada con exito");
        } else {
            $records=$this->supertablero->updateagenda($_POST);
            $info=array('success'=>true,'msg'=>"Actividad actualizada con exito");
        }
        echo json_encode($info);
    }

    public function getAllagenda() {
        $records=$this->supertablero->getAllagenda();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }

    public function getAllagendahistorial() {
        $records=$this->supertablero->getAllagendahistorial();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
/*iventario......................................................................... */
    public function deleteinventario() {
        $records=$this->supertablero->deleteinventario($_GET["id_inventario"]);
        $info=array('success'=>true,'msg'=>"Registro eliminado con exito");
        echo json_encode($info);
    }

    public function getOneinventario() {
        $records=$this->supertablero->getOneinventario($_GET["id_inventario"]);
        if (count($records)>0) {
            $info=array('success'=>true,'records'=>$records);
        } else {
            $info=array('success'=>false,'msg'=>'El registro no existe');
        }
        echo json_encode($info);
    }

    public function saveinventario() {
        if ($_POST["id_inventario"]=="0") {
            $datossupertablero=$this->supertablero->getinventarioByName($_POST["insumo"]);
            $records=$this->supertablero->saveinventario($_POST);
            $info=array('success'=>true,'msg'=>"Insumo registrado con exito");
        } else {
            $records=$this->supertablero->updateinventario($_POST);
            $info=array('success'=>true,'msg'=>"Insumo actualizado con exito");
        }
        echo json_encode($info);
    }

    public function getAllinventario() {
        $records=$this->supertablero->getAllinventario();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
    public function getAllhistorialinventario() {
        $records=$this->supertablero->getAllhistorialinventario();
        $info=array('success'=>true,'records'=>$records);
        echo json_encode($info);
    }
}