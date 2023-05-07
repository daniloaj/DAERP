<?php
include_once "aplicacion/modelos/db.class.php";
class supertablero extends BaseDeDatos {

    public function __construct() {
        parent::conectar();
    }  

    //Funciones que son llamadas por los controladores de acuerdo a las acciones del usuario en las vistas

    //los $data son los datos que el usuario está ingresando en las vistas, los elementos en las vistas deben tener el mismo nombre

    //cada comentario hecho en "compras" aplica para las demas funciones de proveedores, usuarios, agenda e inventario
      
/*compras .................................................................................................................................*/
    //llama todos los datos de la tabla
    public function getAll() {
        return $this->executeQuery("SELECT * FROM compras order by id_compra");
    }

    //llama los datos de la tabla del historial 
    public function getAllCompras() {
        return $this->executeQuery("SELECT * FROM historial_compras group by evento");
        // esta consulta es llamada por el js para el reporte
    }

    //guarda nuevos registros
    public function saveCompras($data) {
        return $this->executeInsert("insert into compras set producto='{$data["producto"]}',costo='{$data["costo"]}', cantidad='{$data["cantidad"]}',total_a_pagar=ROUND('{$data["cantidad"]}'*'{$data["costo"]}',2), proveedores='{$data["proveedor"]}', fecha_compra='{$data["fecha_compra"]}', num_factura='{$data["num_factura"]}', responsable='{$data["responsable"]}', proyecto='{$data["proyecto"]}'");
    }

    //es utilizado por el save para diferenciar cada registro
    public function getCompraByName($producto) {
        return $this->executeQuery("SELECT * FROM compras where producto='{$producto}'");
    }

    //identifica cada registro por el identificador
    public function getOneCompra($id_compra) {
        return $this->executeQuery("SELECT * FROM compras where id_compra='{$id_compra}'");
    }

    //actualiza un registro
    public function updateCompras($data) {
        return $this->executeInsert("update compras set producto='{$data["producto"]}', costo='{$data["costo"]}', cantidad='{$data["cantidad"]}', total_a_pagar='{$data["cantidad"]}'*'{$data["costo"]}',proveedores='{$data["proveedor"]}', fecha_compra='{$data["fecha_compra"]}', num_factura='{$data["num_factura"]}', responsable='{$data["responsable"]}', proyecto='{$data["proyecto"]}' where id_compra='{$data["id_compra"]}'");
    }

    //elimina un registro
    public function deleteCompra($id_compra) {
        return $this->executeInsert("delete from compras where id_compra='$id_compra'");
    }

    //identifica los campos de la vista para utilizarlos en los filtros para los reportes
    public function getcomprasReporte($data) {
        // aqui llamas los datos de como se llaman en la vista de los reportes
        $condicion="";
        if ($data["desde"]!="") {
            // desde es el nombre del elemento en tu vista
            $condicion.="and fecha_compra>='{$data["desde"]}'";
            // fecha_compra es el campo en tu bd y le diras que lo seleccionado sea mayor o igual como fecha inicial
        }
        if ($data["hasta"]!="") {
            $condicion.=" and fecha_compra<='{$data["hasta"]}'";
            // fecha_compra es el campo en tu bd puedes utilizar la misma y le diras que lo seleccionado sea menor o igual como fecha final

        }
        if ($data["proyecto"]!="0") {
            $condicion.=" and evento='{$data["proyecto"]}'";
                        // evento es el campo en tu bd y le diras que lo seleccionado sea igual que lo seleccionado en el select

        }
        return $this->executeQuery("SELECT * FROM historial_compras where 1=1 $condicion");
        // con esos datos ya podes utilizar esta consulta sql que la tomará el controlador
    }
/*Proveedores.................................................................................................................................... */
    public function getAllProveedores() {
        return $this->executeQuery("SELECT * FROM proveedores order by id_proveedor");
    }

    public function saveProveedores($data) {
        return $this->executeInsert("insert into proveedores set empresa='{$data["empresa"]}',representante='{$data["representante"]}', tel1='{$data["tel1"]}', tel2='{$data["tel2"]}', fax='{$data["fax"]}', email='{$data["email"]}'");
    }

    public function getProveedoresByName($empresa) {
        return $this->executeQuery("SELECT * FROM proveedores where empresa='{$empresa}'");
    }

    public function getOneProveedor($id_proveedor) {
        return $this->executeQuery("SELECT * FROM proveedores where id_proveedor='{$id_proveedor}'");
    }

    public function updateProveedores($data) {
        return $this->executeInsert("update proveedores set empresa='{$data["empresa"]}', representante='{$data["representante"]}', tel1='{$data["tel1"]}',tel2='{$data["tel2"]}', fax='{$data["fax"]}', email='{$data["email"]}' where id_proveedor='{$data["id_proveedor"]}'");
    }

    public function deleteproveedor($id_proveedor) {
        return $this->executeInsert("delete from proveedores where id_proveedor='$id_proveedor'");
    }
/*usuarios.................................................................................................................................... */
    public function getAllusuarios() {
        return $this->executeQuery("SELECT * FROM usuarios order by id_usuario");
    }
    public function saveusuarios($data) {
        return $this->executeInsert("insert into usuarios set nombre='{$data["nombre"]}',usuario='{$data["usuario"]}', password=sha1('{$data["password"]}'), tipo='{$data["tipo"]}'");
    }

    public function getusuariosByName($usuario) {
        return $this->executeQuery("SELECT * FROM usuarios where usuario='{$usuario}'");
    }

    public function getOneusuario($id_usuario) {
        return $this->executeQuery("SELECT * FROM usuarios where id_usuario='{$id_usuario}'");
    }

    public function updateusuarios($data) {
        return $this->executeInsert("update usuarios set nombre='{$data["nombre"]}', usuario='{$data["usuario"]}',password=if('{$data["password"]}'=usuarios.password,usuarios.password,sha1('{$data["password"]}')),tipo='{$data["tipo"]}' where id_usuario='{$data["id_usuario"]}'");
    }

    public function deleteusuario($id_usuario) {
        return $this->executeInsert("delete from usuarios where id_usuario='$id_usuario'");
    }

/*agenda.................................................................................................................................... */
    public function getAllagenda() {
        return $this->executeQuery("SELECT * FROM agenda order by id_agenda");
    }
    public function getAllagendahistorial() {
        return $this->executeQuery("SELECT * FROM agenda_historial group by estado");
    }
    public function saveagenda($data) {
        return $this->executeInsert("insert into agenda set responsables='{$data["responsables"]}',proyecto='{$data["actividad"]}', fecha_prevista='{$data["fecha_prevista"]}', fecha_final='{$data["fecha_final"]}', estado='{$data["estado"]}'");
    }

    public function getagendaByName($responsables) {
        return $this->executeQuery("SELECT * FROM agenda where responsables='{$responsables}'");
    }

    public function getOneagenda($id_agenda) {
        return $this->executeQuery("SELECT * FROM agenda where id_agenda='{$id_agenda}'");
    }

    public function updateagenda($data) {
        return $this->executeInsert("update agenda set responsables='{$data["responsables"]}', proyecto='{$data["actividad"]}',fecha_prevista='{$data["fecha_prevista"]}',fecha_final='{$data["fecha_final"]}', estado='{$data["estado"]}' where id_agenda='{$data["id_agenda"]}'");
    }

    public function deleteagenda($id_agenda) {
        return $this->executeInsert("delete from agenda where id_agenda='$id_agenda'");
    }
    public function getagendaReporte($data) {
        $condicion="";
        if ($data["inicio"]!="") {
            $condicion.="and fecha_prevista>='{$data["inicio"]}'";
        }
        if ($data["final"]!="") {
            $condicion.=" and fecha_prevista<='{$data["final"]}'";
        }
        if ($data["estado"]!="0") {
            $condicion.=" and estado='{$data["estado"]}'";
        }
        return $this->executeQuery("SELECT * FROM agenda_historial where 1=1 $condicion");
    }
/*inventario.................................................................................................................................... */
    public function getAllinventario() {
        return $this->executeQuery("SELECT id_inventario, insumo, precio,unidades, total, fecha, empresa as provee, n_factura,comprador FROM inventario, proveedores WHERE proveedores.id_proveedor=inventario.provee order by id_inventario");
    }
    public function getAllhistorialinventario() {
        return $this->executeQuery("SELECT * FROM inventario_historial group by comprador");
    }
    public function saveinventario($data) {
        return $this->executeInsert("insert into inventario set insumo='{$data["insumo"]}',precio='{$data["precio"]}', unidades='{$data["unidades"]}', total=ROUND('{$data["unidades"]}'*'{$data["precio"]}',2), fecha='{$data["fecha"]}', provee='{$data["provee"]}', n_factura='{$data["n_factura"]}', comprador='{$data["comprador"]}'");
    }

    public function getinventarioByName($insumo) {
        return $this->executeQuery("SELECT * FROM inventario where insumo='{$insumo}'");
    }

    public function getOneinventario($id_inventario) {
        return $this->executeQuery("SELECT * FROM inventario where id_inventario='{$id_inventario}'");
    }

    public function updateinventario($data) {
        return $this->executeInsert("update inventario set insumo='{$data["insumo"]}', precio='{$data["precio"]}',unidades='{$data["unidades"]}',total=ROUND('{$data["unidades"]}'*'{$data["precio"]}',2), fecha='{$data["fecha"]}', provee='{$data["provee"]}', n_factura='{$data["n_factura"]}', comprador='{$data["comprador"]}' where id_inventario='{$data["id_inventario"]}'");
    }

    public function deleteinventario($id_inventario) {
        return $this->executeInsert("delete from inventario where id_inventario='$id_inventario'");
    }
    public function getinventarioReporte($data) {
        $condicion="";
        if ($data["principio"]!="") {
            $condicion.="and fecha>='{$data["principio"]}'";
        }
        if ($data["acaba"]!="") {
            $condicion.=" and fecha<='{$data["acaba"]}'";
        }
        if ($data["comprador"]!="0") {
            $condicion.=" and comprador='{$data["comprador"]}'";
        }
        return $this->executeQuery("SELECT * FROM inventario_historial where 1=1 $condicion");
    }
}