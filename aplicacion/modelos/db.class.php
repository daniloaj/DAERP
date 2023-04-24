<?php
//esta clase será utilizada por los modelos del sistema
class BaseDeDatos {

    //declaramos las variables que utilizaremos para realizar la conexión a la bd
    protected $conexion;
    protected $isConnected=false;
    
    public function conectar()  {
        //introducimos los datos para que el sistema acceda a la bd
        $this->conexion=new mysqli("localhost","root","asd","cbues_agenda_compra");

        //validamos la conexión 
        if ($this->conexion->connect_errno) {
            echo "Error de conexion:{$this->conexion->connect_error}";
            $this->isConnected=false;
        } else {
            $this->isConnected=true;
        }
        return $this->isConnected;
    }

    //funcion que reconoce los datos de las tablas de la bd
    public function executeQuery($query) {
        $result=$this->conexion->query($query);
        $records=array();
        while ($record=$result->fetch_assoc()) {
            $records[]=$record;
        }
        return $records;
    }
    
    //funcion que se utiliza para eliminar, actualizar o guardar un registro
    public function executeInsert($query) {
        $result=$this->conexion->query($query);
        return $this->conexion->insert_id;
    }
}