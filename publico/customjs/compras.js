const botonCompras=document.querySelector("#btnAgregarCompras");
const panelDatosCompras=document.querySelector("#contentListCompras");
const panelFormCompras=document.querySelector("#contentFormCompras");
const btnCancelarCompra=document.querySelector("#btnCancelarCompra");
const contentTableCompras=document.querySelector("#contentTableCompras table tbody");
const txtSearchCompras=document.querySelector("#txtSearchCompras");
const compra_id=document.querySelector("#id_compra");
const pagination=document.querySelector("#compraspagina");
const formcompra=document.querySelector("#formcompra");
const API=new Api();
const objDatosCompra={
        records:[],
        recordsFilter:[],
        currentPage:1,
        recordsShow:7,
        filter:""
    };


    eventListiners();

    function eventListiners() {
        botonCompras.addEventListener("click",agregarcompra);

        btnCancelarCompra.addEventListener("click",cancelarcompra);

        document.addEventListener("DOMContentLoaded",cargarDatosCompra);

        txtSearchCompras.addEventListener("input",aplicarFiltroCompra);

        formcompra.addEventListener("submit",guardarcompra);
    }



    function guardarcompra(event) {
        event.preventDefault();
        const formDataCompra=new FormData(formcompra);
        API.post(formDataCompra,"supertablero/saveCompras").then(
            data=> {
                if (data.success) {
                    cancelarcompra();
                    Swal.fire({
                        icon:"info",
                        text:data.msg
                    });
                } else {
                    Swal.fire({
                        icon:"error",
                        title:"Error",
                        text:data.msg
                    });
                }
            }
        ).catch(
            error=>{
                console.log("Error",error);
            }
        );
    }


    function aplicarFiltroCompra(element) {
        element.preventDefault();
        objDatosCompra.filter=this.value;
        crearTablaCompra();
    }


    function cargarDatosCompra() {
        API.get("supertablero/getAll").then(
            data=>{
                if (data.success) {
                    objDatosCompra.records=data.records;
                    objDatosCompra.currentPage=1;
                    crearTablaCompra();
                } else {
                    console.log("Error al recuperar registros");
                }
            }
        ).catch(
            error=>{
                console.error("Error en la llamada:",error);
            }
        )
    }

    function agregarcompra() {
        panelDatosCompras.classList.add("d-none");
        panelFormCompras.classList.remove("d-none");
        limpiarFormCompra();
    }

    function limpiarFormCompra() {
        formcompra.reset();
        document.querySelector("#id_compra").value="0";
    }


    function cancelarcompra() {
        panelDatosCompras.classList.remove("d-none");
        panelFormCompras.classList.add("d-none");
        cargarDatosCompra();
    }


    function crearTablaCompra() {
        if (objDatosCompra.filter==="") {
            objDatosCompra.recordsFilter=objDatosCompra.records.map(item=>item);
        } else {
            objDatosCompra.recordsFilter=objDatosCompra.records.filter(item=>{
                const {producto, costo, cantidad ,fecha_compra, proveedores,num_factura,responsable, proyecto}=item;
                if (producto.toUpperCase().search(objDatosCompra.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (costo.toUpperCase().search(objDatosCompra.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (cantidad.toUpperCase().search(objDatosCompra.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (fecha_compra.toUpperCase().search(objDatosCompra.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (proveedores.toUpperCase().search(objDatosCompra.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (num_factura.toUpperCase().search(objDatosCompra.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (responsable.toUpperCase().search(objDatosCompra.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (proyecto.toUpperCase().search(objDatosCompra.filter.toUpperCase())!=-1) {
                    return item;
                }
            });
        }
        const recordIni=(objDatosCompra.currentPage*objDatosCompra.recordsShow)-objDatosCompra.recordsShow;
        const recordFin=(recordIni+objDatosCompra.recordsShow)-1;
        let html="";
        objDatosCompra.recordsFilter.forEach(
            (item,index)=> {
                if ((index>=recordIni) && (index<=recordFin)) {
                    html+=`
                        <tr>
                        <td>${index+1}</td>
                        <td>${item.producto}</td>               
                        <td>$${item.costo}</td>               
                        <td>${item.cantidad}</td>
                        <td>$${item.total_a_pagar}</td>
                        <td>${item.fecha_compra}</td>
                        <td>${item.proveedores}</td>
                        <td>${item.num_factura}</td>
                        <td>${item.responsable}</td>
                        <td>${item.proyecto}</td>
                        <td>
                            <button class="btn btn-primary" onclick="editarcompra(${item.id_compra})"><img src="publico/images/lapiz.png"></button>
                            <button class="btn btn-danger" onclick="eliminarcompra(${item.id_compra})"><img src="publico/images/paquete.png"></button>
                        </td>
                        </tr>
                    `;
                }
            }
        );
        contentTableCompras.innerHTML=html;
        crearPaginacion();
    }

    function crearPaginacion() {

        pagination.innerHTML="";

        const elAnterior=document.createElement("li");
        elAnterior.classList.add("page-item");
        elAnterior.innerHTML=`<a class="page-link" href="#">Anterior</a>`;
        elAnterior.onclick=()=>{
            objDatosCompra.currentPage=(objDatosCompra.currentPage==1 ? 1 : --objDatosCompra.currentPage);
            crearTablaCompra();
        };
        pagination.append(elAnterior);

        const totalPage=Math.ceil(objDatosCompra.recordsFilter.length/objDatosCompra.recordsShow);
        for (let i=1; i<= totalPage; i++) {
            const el=document.createElement("li");
            el.classList.add("page-item");
            el.innerHTML=`<a class="page-link" href="#">${i}</a>`;
            el.onclick=()=>{
                objDatosCompra.currentPage=i;
                crearTablaCompra();
            };
            pagination.append(el);
        }

        const elSiguiente=document.createElement("li");
        elSiguiente.classList.add("page-item");
        elSiguiente.innerHTML=`<a class="page-link" href="#">Siguiente</a>`;
        elSiguiente.onclick=()=> {
            objDatosCompra.currentPage=(objDatosCompra.currentPage==totalPage 
                ? totalPage : ++objDatosCompra.currentPage);
            crearTablaCompra();
        };
        pagination.append(elSiguiente);
    }

    function editarcompra(id_compra) {
        limpiarFormCompra(1);
        panelDatosCompras.classList.add("d-none");
        panelFormCompras.classList.remove("d-none");
        API.get("supertablero/getOneCompra?id_compra="+id_compra).then(
            data=>{
                if (data.success) {
                    mostrarDatosFormCompra(data.records[0]);
                } else {
                    Swal.fire({
                        icon:"error",
                        title:"Error",
                        text:data.msg
                    });
                }
            }
        ).catch(
            error=>{
                console.log("Error:",error);
            }
        );
    }

    function mostrarDatosFormCompra(record) {
        const {id_compra, producto, costo,cantidad,fecha_compra, proveedores,num_factura,responsable, proyecto}=record;
        document.querySelector("#id_compra").value=id_compra;
        document.querySelector("#producto").value=producto;
        document.querySelector("#costo").value=costo;
        document.querySelector("#cantidad").value=cantidad;
        document.querySelector("#fecha_compra").value=fecha_compra;
        document.querySelector("#proveedor").value=proveedores;
        document.querySelector("#num_factura").value=num_factura;
        document.querySelector("#responsable").value=responsable;
        document.querySelector("#proyecto").value=proyecto;


    }


    function eliminarcompra(id_compra) {
        Swal.fire({
            title:"¿Esta seguro de eliminar el registro?",
            showDenyButton:true,
            confirmButtonText:"Si",
            denyButtonText:"No"
        }).then(
            resultado=>{
                if (resultado.isConfirmed) {
                    API.get("supertablero/deleteCompra?id_compra="+id_compra).then(
                        data=>{
                            if (data.success) {
                                cancelarcompra();
                            } else {
                                Swal.fire({
                                    icon:"error",
                                    title:"Error",
                                    text:data.msg
                                });
                            }
                        }
                    ).catch(
                        error=>{
                            console.err("Error",error);
                        }
                    );
                }
            }
        );
    }
