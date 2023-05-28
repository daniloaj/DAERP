const botoninventario=document.querySelector("#btnAgregarinventario");
const panelDatosinventario=document.querySelector("#contentListinventario");
const panelForminventario=document.querySelector("#contentForminventario");
const btnCancelarinventario=document.querySelector("#btnCancelarinventario");
const contentTableinventario=document.querySelector("#contentTableinventario table tbody");
const txtSearchinventario=document.querySelector("#txtSearchinventario");
const paginainventario=document.querySelector("#paginainven");
const forminventario=document.querySelector("#forminventario");
const objDatosinventario={
        records:[],
        recordsFilter:[],
        currentPage:1,
        recordsShow:7,
        filter:""
    };


    eventListiners();

    function eventListiners() {
        botoninventario.addEventListener("click",agregarinventario);

        btnCancelarinventario.addEventListener("click",cancelarinventario);

        document.addEventListener("DOMContentLoaded",cargarDatosinventario);

        txtSearchinventario.addEventListener("input",aplicarFiltroinventario);

        forminventario.addEventListener("submit",guardarinventario);
    }



    function guardarinventario(event) {
        event.preventDefault();
        const formDatainventario=new FormData(forminventario);
        const API=new Api();
        API.post(formDatainventario,"supertablero/saveinventario").then(
            data=> {
                if (data.success) {
                    cancelarinventario();
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


    function aplicarFiltroinventario(element) {
        element.preventDefault();
        objDatosinventario.filter=this.value;
        crearTablainventario();
    }


    function cargarDatosinventario() {
        const API=new Api();
        API.get("supertablero/getAllinventario").then(
            data=>{
                if (data.success) {
                    objDatosinventario.records=data.records;
                    objDatosinventario.currentPage=1;
                    crearTablainventario();
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

    function agregarinventario() {
        panelDatosinventario.classList.add("d-none");
        panelForminventario.classList.remove("d-none");
        limpiarForminventario();
    }

    function limpiarForminventario() {
        forminventario.reset();
        document.querySelector("#id_inventario").value="0";
    }


    function cancelarinventario() {
        panelDatosinventario.classList.remove("d-none");
        panelForminventario.classList.add("d-none");
        cargarDatosinventario();
    }


    function crearTablainventario() {
        if (objDatosinventario.filter==="") {
            objDatosinventario.recordsFilter=objDatosinventario.records.map(item=>item);
        } else {
            objDatosinventario.recordsFilter=objDatosinventario.records.filter(item=>{
                const {insumo, precio, unidades ,fecha, provee,n_factura,comprador}=item;
                if (insumo.toUpperCase().search(objDatosinventario.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (precio.toUpperCase().search(objDatosinventario.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (unidades.toUpperCase().search(objDatosinventario.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (fecha.toUpperCase().search(objDatosinventario.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (provee.toUpperCase().search(objDatosinventario.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (n_factura.toUpperCase().search(objDatosinventario.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (comprador.toUpperCase().search(objDatosinventario.filter.toUpperCase())!=-1) {
                    return item;
                }
            });
        }
        const recordIni=(objDatosinventario.currentPage*objDatosinventario.recordsShow)-objDatosinventario.recordsShow;
        const recordFin=(recordIni+objDatosinventario.recordsShow)-1;
        let html="";
        objDatosinventario.recordsFilter.forEach(
            (item,index)=> {
                if ((index>=recordIni) && (index<=recordFin)) {
                    html+=`
                        <tr>
                        <td>${index+1}</td>
                        <td>${item.insumo}</td>               
                        <td>$${item.precio}</td>               
                        <td>${item.unidades}</td>
                        <td>$${item.total}</td>
                        <td>${item.fecha}</td>
                        <td>${item.provee}</td>
                        <td>${item.n_factura}</td>
                        <td>${item.comprador}</td>
                        <td>
                            <button class="btn btn-primary" onclick="editarinventario(${item.id_inventario})"><img src="publico/images/lapiz.png"></button>
                            <button class="btn btn-danger" onclick="eliminarinventario(${item.id_inventario})"><img src="publico/images/paquete.png"></button>
                        </td>
                        </tr>
                    `;
                }
            }
        );
        contentTableinventario.innerHTML=html;
        crearPaginacioninventario();
    }

    function crearPaginacioninventario() {

        paginainventario.innerHTML="";

        const elAnterior=document.createElement("li");
        elAnterior.classList.add("page-item");
        elAnterior.innerHTML=`<a class="page-link" href="#">Anterior</a>`;
        elAnterior.onclick=()=>{
            objDatosinventario.currentPage=(objDatosinventario.currentPage==1 ? 1 : --objDatosinventario.currentPage);
            crearTablainventario();
        };
        paginainventario.append(elAnterior);

        const totalPage=Math.ceil(objDatosinventario.recordsFilter.length/objDatosinventario.recordsShow);
        for (let i=1; i<= totalPage; i++) {
            const el=document.createElement("li");
            el.classList.add("page-item");
            el.innerHTML=`<a class="page-link" href="#">${i}</a>`;
            el.onclick=()=>{
                objDatosinventario.currentPage=i;
                crearTablainventario();
            };
            paginainventario.append(el);
        }

        const elSiguiente=document.createElement("li");
        elSiguiente.classList.add("page-item");
        elSiguiente.innerHTML=`<a class="page-link" href="#">Siguiente</a>`;
        elSiguiente.onclick=()=> {
            objDatosinventario.currentPage=(objDatosinventario.currentPage==totalPage 
                ? totalPage : ++objDatosinventario.currentPage);
            crearTablainventario();
        };
        paginainventario.append(elSiguiente);
    }

    function editarinventario(id_inventario) {
        limpiarForminventario(1);
        panelDatosinventario.classList.add("d-none");
        panelForminventario.classList.remove("d-none");
        const API=new Api();
        API.get("supertablero/getOneinventario?id_inventario="+id_inventario).then(
            data=>{
                if (data.success) {
                    mostrarDatosForminventario(data.records[0]);
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

    function mostrarDatosForminventario(record) {
        const {id_inventario, insumo, precio,unidades,fecha, provee,n_factura,comprador}=record;
        document.querySelector("#id_inventario").value=id_inventario;
        document.querySelector("#insumo").value=insumo;
        document.querySelector("#precio").value=precio;
        document.querySelector("#unidades").value=unidades;
        document.querySelector("#fecha").value=fecha;
        document.querySelector("#provee").value=provee;
        document.querySelector("#n_factura").value=n_factura;
        document.querySelector("#comprador").value=comprador;
    }
    function eliminarinventario(id_inventario) {
        Swal.fire({
            title:"¿Esta seguro de eliminar el registro?",
            showDenyButton:true,
            confirmButtonText:"Si",
            denyButtonText:"No"
        }).then(
            resultado=>{
                if (resultado.isConfirmed) {
                    const API=new Api();
                    API.get("supertablero/deleteinventario?id_inventario="+id_inventario).then(
                        data=>{
                            if (data.success) {
                                cancelarinventario();
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
