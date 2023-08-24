const botonusuarios=document.querySelector("#btnAgregarUsuarios");
const panelDatosusuarios=document.querySelector("#contentListusuarios");
const panelFormusuarios=document.querySelector("#contentFormusuarios");
const btnCancelarusuario=document.querySelector("#btnCancelarusuario");
const contentTableusuarios=document.querySelector("#contentTableUsuarios table tbody");
const txtSearchusuarios=document.querySelector("#txtSearchUsuarios");
const usuario_id=document.querySelector("#id_usuario");
const paginationusuario=document.querySelector("#paginauser");
const formusuario=document.querySelector("#formusuarios");
const objDatosusuario={
    records:[],
    recordsFilter:[],
    currentPage:1,
    recordsShow:7,
    filter:""
};


eventListiners();

function eventListiners() {
    formusuario.addEventListener("submit",guardarusuario);

    botonusuarios.addEventListener("click",agregarusuario);

    btnCancelarusuario.addEventListener("click",cancelarusuario);

    document.addEventListener("DOMContentLoaded",cargarDatosusuario);

    txtSearchusuarios.addEventListener("input",aplicarFiltrousuario);

}



function guardarusuario(event) {
    event.preventDefault();
    const formDatausuario=new FormData(formusuario);
    const API=new Api();
    API.post(formDatausuario,"usuarios/saveusuarios").then(
        data=> {
            if (data.success) {
                cancelarusuario();
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


function aplicarFiltrousuario(element) {
    element.preventDefault();
    objDatosusuario.filter=this.value;
    crearTablausuario();
}


function cargarDatosusuario() {
    const API=new Api();
    API.get("usuarios/getAllusuarios").then(
        data=>{
            if (data.success) {
                objDatosusuario.records=data.records;
                objDatosusuario.currentPage=1;
                crearTablausuario();
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

function agregarusuario() {
    panelDatosusuarios.classList.add("d-none");
    panelFormusuarios.classList.remove("d-none");
    limpiarFormusuario();
}

function limpiarFormusuario() {
    formusuario.reset();
    document.querySelector("#id_usuario").value="0";
}


function cancelarusuario() {
    panelDatosusuarios.classList.remove("d-none");
    panelFormusuarios.classList.add("d-none");
    cargarDatosusuario();
}


function crearTablausuario() {
    if (objDatosusuario.filter==="") {
        objDatosusuario.recordsFilter=objDatosusuario.records.map(item=>item);
    } else {
        objDatosusuario.recordsFilter=objDatosusuario.records.filter(item=>{
            const {nombre, usuario, password ,tipo}=item;
            if (nombre.toUpperCase().search(objDatosusuario.filter.toUpperCase())!=-1) {
                return item;
            }
            if (usuario.toUpperCase().search(objDatosusuario.filter.toUpperCase())!=-1) {
                return item;
            }
            if (password.toUpperCase().search(objDatosusuario.filter.toUpperCase())!=-1) {
                return item;
            }
            if (tipo.toUpperCase().search(objDatosusuario.filter.toUpperCase())!=-1) {
                return item;
            }
            if (nom_depa.toUpperCase().search(objDatosusuario.filter.toUpperCase())!=-1) {
                return item;
            }
        });
    }
    const recordIni=(objDatosusuario.currentPage*objDatosusuario.recordsShow)-objDatosusuario.recordsShow;
    const recordFin=(recordIni+objDatosusuario.recordsShow)-1;
    let html="";
    objDatosusuario.recordsFilter.forEach(
        (item,index)=> {
            if ((index>=recordIni) && (index<=recordFin)) {
                html+=`
                    <tr class="text-capitalize">
                    <td>${index+1}</td>
                    <td>${item.nombre}</td>               
                    <td>${item.usuario}</td>               
                    <td>${item.tipo}</td>
                    <td>${item.nom_depa}</td>
                    <td>
                        <button class="btn btn-primary" onclick="editarusuario(${item.id_usuario})"><img src="publico/images/lapiz.png"></button>
                        <button class="btn btn-danger" onclick="eliminarusuario(${item.id_usuario})"><img src="publico/images/bote.png"></button>
                    </td>
                    </tr>
                `;
            }
        }
    );
    contentTableusuarios.innerHTML=html;
    crearPaginacionusuario();
}

function crearPaginacionusuario() {

    paginationusuario.innerHTML="";

    const elAnterior=document.createElement("li");
    elAnterior.classList.add("page-item");
    elAnterior.innerHTML=`<a class="page-link" href="#">Anterior</a>`;
    elAnterior.onclick=()=>{
        objDatosusuario.currentPage=(objDatosusuario.currentPage==1 ? 1 : --objDatosusuario.currentPage);
        crearTablausuario();
    };
    paginationusuario.append(elAnterior);

    const totalPage=Math.ceil(objDatosusuario.recordsFilter.length/objDatosusuario.recordsShow);
    for (let i=1; i<= totalPage; i++) {
        const el=document.createElement("li");
        el.classList.add("page-item");
        el.innerHTML=`<a class="page-link" href="#">${i}</a>`;
        el.onclick=()=>{
            objDatosusuario.currentPage=i;
            crearTablausuario();
        };
        paginationusuario.append(el);
    }

    const elSiguiente=document.createElement("li");
    elSiguiente.classList.add("page-item");
    elSiguiente.innerHTML=`<a class="page-link" href="#">Siguiente</a>`;
    elSiguiente.onclick=()=> {
        objDatosusuario.currentPage=(objDatosusuario.currentPage==totalPage 
            ? totalPage : ++objDatosusuario.currentPage);
        crearTablausuario();
    };
    paginationusuario.append(elSiguiente);
}

function editarusuario(id_usuario) {
    limpiarFormusuario(1);
    panelDatosusuarios.classList.add("d-none");
    panelFormusuarios.classList.remove("d-none");
    const API=new Api();
    API.get("usuarios/getOneusuario?id_usuario="+id_usuario).then(
        data=>{
            if (data.success) {
                mostrarDatosFormusuarios(data.records[0]);
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

function mostrarDatosFormusuarios(record) {
    const {id_usuario, nombre, usuario,password,tipo,id_dep}=record;
    document.querySelector("#id_usuario").value=id_usuario;
    document.querySelector("#nombre").value=nombre;
    document.querySelector("#usuario").value=usuario;
    document.querySelector("#password").value=password;
    document.querySelector("#tipo").value=tipo;
    document.querySelector("#depa").value=id_dep;
}


function eliminarusuario(id_usuario) {
    Swal.fire({
        title:"¿Esta seguro de eliminar el usuario?",
        showDenyButton:true,
        confirmButtonText:"Si",
        denyButtonText:"No"
    }).then(
        resultado=>{
            if (resultado.isConfirmed) {
                const API=new Api();
                API.get("usuarios/deleteusuario?id_usuario="+id_usuario).then(
                    data=>{
                        if (data.success) {
                            cancelarusuario();
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

