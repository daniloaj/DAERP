const botonProveedores=document.querySelector("#btnAgregarProveedores");
const panelDatosProveedores=document.querySelector("#contentListProveedores");
const panelFormProveedores=document.querySelector("#contentFormProveedores");
const btnCancelarProveedor=document.querySelector("#btnCancelarProveedor");
const contentTableProveedores=document.querySelector("#contentTableProveedores table tbody");
const txtSearchProveedores=document.querySelector("#txtSearchProveedores");
const Proveedor_id=document.querySelector("#id_proveedor");
const paginationProveedor=document.querySelector("#paginaPro");
const formProveedor=document.querySelector("#formProveedores");
const objDatosProveedor={
    records:[],
    recordsFilter:[],
    currentPage:1,
    recordsShow:7,
    filter:""
};


eventListiners();

function eventListiners() {
    formProveedor.addEventListener("submit",guardarProveedor);

    botonProveedores.addEventListener("click",agregarProveedor);

    btnCancelarProveedor.addEventListener("click",cancelarProveedor);

    document.addEventListener("DOMContentLoaded",cargarDatosProveedor);

    txtSearchProveedores.addEventListener("input",aplicarFiltroProveedor);

}



function guardarProveedor(event) {
    event.preventDefault();
    const formDataProveedor=new FormData(formProveedor);
    const API=new Api();
    API.post(formDataProveedor,"supertablero/saveProveedores").then(
        data=> {
            if (data.success) {
                cancelarProveedor();
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


function aplicarFiltroProveedor(element) {
    element.preventDefault();
    objDatosProveedor.filter=this.value;
    crearTablaProveedor();
}


function cargarDatosProveedor() {
    const API=new Api();
    API.get("supertablero/getAllProveedores").then(
        data=>{
            if (data.success) {
                objDatosProveedor.records=data.records;
                objDatosProveedor.currentPage=1;
                crearTablaProveedor();
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

function agregarProveedor() {
    panelDatosProveedores.classList.add("d-none");
    panelFormProveedores.classList.remove("d-none");
    limpiarFormProveedor();
}

function limpiarFormProveedor() {
    formProveedor.reset();
    document.querySelector("#id_proveedor").value="0";
}


function cancelarProveedor() {
    panelDatosProveedores.classList.remove("d-none");
    panelFormProveedores.classList.add("d-none");
    cargarDatosProveedor();
}


function crearTablaProveedor() {
    if (objDatosProveedor.filter==="") {
        objDatosProveedor.recordsFilter=objDatosProveedor.records.map(item=>item);
    } else {
        objDatosProveedor.recordsFilter=objDatosProveedor.records.filter(item=>{
            const {empresa, representante, tel1 ,tel2, fax,email}=item;
            if (empresa.toUpperCase().search(objDatosProveedor.filter.toUpperCase())!=-1) {
                return item;
            }
            if (representante.toUpperCase().search(objDatosProveedor.filter.toUpperCase())!=-1) {
                return item;
            }
            if (tel1.toUpperCase().search(objDatosProveedor.filter.toUpperCase())!=-1) {
                return item;
            }
            if (tel2.toUpperCase().search(objDatosProveedor.filter.toUpperCase())!=-1) {
                return item;
            }
            if (fax.toUpperCase().search(objDatosProveedor.filter.toUpperCase())!=-1) {
                return item;
            }
            if (email.toUpperCase().search(objDatosProveedor.filter.toUpperCase())!=-1) {
                return item;
            }
        });
    }
    const recordIni=(objDatosProveedor.currentPage*objDatosProveedor.recordsShow)-objDatosProveedor.recordsShow;
    const recordFin=(recordIni+objDatosProveedor.recordsShow)-1;
    let html="";
    objDatosProveedor.recordsFilter.forEach(
        (item,index)=> {
            if ((index>=recordIni) && (index<=recordFin)) {
                html+=`
                    <tr>
                    <td>${index+1}</td>
                    <td>${item.empresa}</td>               
                    <td>${item.representante}</td>               
                    <td>${item.tel1}</td>
                    <td>${item.tel2}</td>
                    <td>${item.fax}</td>
                    <td>${item.email}</td>
                    <td>
                        <button class="btn btn-primary" onclick="editarproveedor(${item.id_proveedor})"><img src="publico/images/lapiz.png"></button>
                        <button class="btn btn-danger" onclick="eliminarproveedor(${item.id_proveedor})"><img src="publico/images/bote.png"></button>
                    </td>
                    </tr>
                `;
            }
        }
    );
    contentTableProveedores.innerHTML=html;
    crearPaginacionProveedor();
}

function crearPaginacionProveedor() {

    paginationProveedor.innerHTML="";

    const elAnterior=document.createElement("li");
    elAnterior.classList.add("page-item");
    elAnterior.innerHTML=`<a class="page-link" href="#">Anterior</a>`;
    elAnterior.onclick=()=>{
        objDatosProveedor.currentPage=(objDatosProveedor.currentPage==1 ? 1 : --objDatosProveedor.currentPage);
        crearTablaProveedor();
    };
    paginationProveedor.append(elAnterior);

    const totalPage=Math.ceil(objDatosProveedor.recordsFilter.length/objDatosProveedor.recordsShow);
    for (let i=1; i<= totalPage; i++) {
        const el=document.createElement("li");
        el.classList.add("page-item");
        el.innerHTML=`<a class="page-link" href="#">${i}</a>`;
        el.onclick=()=>{
            objDatosProveedor.currentPage=i;
            crearTablaProveedor();
        };
        paginationProveedor.append(el);
    }

    const elSiguiente=document.createElement("li");
    elSiguiente.classList.add("page-item");
    elSiguiente.innerHTML=`<a class="page-link" href="#">Siguiente</a>`;
    elSiguiente.onclick=()=> {
        objDatosProveedor.currentPage=(objDatosProveedor.currentPage==totalPage 
            ? totalPage : ++objDatosProveedor.currentPage);
        crearTablaProveedor();
    };
    paginationProveedor.append(elSiguiente);
}

function editarproveedor(id_proveedor) {
    limpiarFormProveedor(1);
    panelDatosProveedores.classList.add("d-none");
    panelFormProveedores.classList.remove("d-none");
    const API=new Api();
    API.get("supertablero/getOneProveedor?id_proveedor="+id_proveedor).then(
        data=>{
            if (data.success) {
                mostrarDatosFormProveedores(data.records[0]);
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

function mostrarDatosFormProveedores(record) {
    const {id_proveedor, empresa, representante,tel1,tel2, fax,email}=record;
    document.querySelector("#id_proveedor").value=id_proveedor;
    document.querySelector("#empresa").value=empresa;
    document.querySelector("#representante").value=representante;
    document.querySelector("#tel1").value=tel1;
    document.querySelector("#tel2").value=tel2;
    document.querySelector("#fax").value=fax;
    document.querySelector("#email").value=email;
}


function eliminarproveedor(id_proveedor) {
    Swal.fire({
        title:"¿Esta seguro de eliminar el registro?",
        showDenyButton:true,
        confirmButtonText:"Si",
        denyButtonText:"No"
    }).then(
        resultado=>{
            if (resultado.isConfirmed) {
                const API=new Api();
                API.get("supertablero/deleteproveedor?id_proveedor="+id_proveedor).then(
                    data=>{
                        if (data.success) {
                            cancelarProveedor();
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

