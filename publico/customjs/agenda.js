//llamamos a los elementos de la vista
const botonagenda=document.querySelector("#btnAgregaragenda");
const panelDatosagenda=document.querySelector("#contentListagenda");
const panelFormagenda=document.querySelector("#contentFormagenda");
const btnCancelaragenda=document.querySelector("#btnCancelaragenda");
const contentTableagenda=document.querySelector("#contentTableagenda table tbody");
const txtSearchagenda=document.querySelector("#txtSearchagenda");
const agenda_id=document.querySelector("#id_agenda");
const paginacionagenda=document.querySelector("#paginaagenda");
const formagenda=document.querySelector("#formagenda");

//Definimos los datos que se mostrarán y las raices que tendran los datos
const objDatosagenda={
        records:[],
        recordsFilter:[],
        currentPage:1,
        recordsShow:7,
        filter:""
    };

//llamamos los eventos que serán utilizados por el sistema
    eventListiners();
    function eventListiners() {
        botonagenda.addEventListener("click",agregaragenda);

        btnCancelaragenda.addEventListener("click",cancelaragenda);

        document.addEventListener("DOMContentLoaded",cargarDatosagenda);

        txtSearchagenda.addEventListener("input",aplicarFiltroagenda);

        formagenda.addEventListener("submit",guardaragenda);
    }

//Utiliza el modelo "supertablero" y su función "saveagenda" para guardar nuevos registros
    function guardaragenda(event) {
        event.preventDefault();
        const formDataagenda=new FormData(formagenda);
        API.post(formDataagenda,"supertablero/saveagenda").then(
            data=> {
                if (data.success) {
                    cancelaragenda();
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

//buscador de datos en la vista
    function aplicarFiltroagenda(element) {
        element.preventDefault();
        objDatosagenda.filter=this.value;
        crearTablaagenda();
    }


//muestra los datos en la tabla de la vista
    function cargarDatosagenda() {
        API.get("supertablero/getAllagenda").then(
            data=>{
                if (data.success) {
                    objDatosagenda.records=data.records;
                    objDatosagenda.currentPage=1;
                    crearTablaagenda();
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

//quita de la vista la tabla de registros y muestra el formulario para editar o agregar un nuevo registro
    function agregaragenda() {
        panelDatosagenda.classList.add("d-none");
        panelFormagenda.classList.remove("d-none");
        limpiarFormagenda();
    }

//limpia el formulario para que cuando aparezca esté vacío
    function limpiarFormagenda() {
        formagenda.reset();
        document.querySelector("#id_agenda").value="0";
    }

//Quita el formulario y muestra la tabla de registros
    function cancelaragenda() {
        panelDatosagenda.classList.remove("d-none");
        panelFormagenda.classList.add("d-none");
        cargarDatosagenda();
    }

//crea los elementos que iran en la tabla y los asigna a una variable llamada item para luego mostrarlos incluyendo los botones de editar y eliminar
    function crearTablaagenda() {
        if (objDatosagenda.filter==="") {
            objDatosagenda.recordsFilter=objDatosagenda.records.map(item=>item);
        } else {
            objDatosagenda.recordsFilter=objDatosagenda.records.filter(item=>{
                const {responsables, proyecto, fecha_prevista ,fecha_final, estado}=item;
                if (responsables.toUpperCase().search(objDatosagenda.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (proyecto.toUpperCase().search(objDatosagenda.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (fecha_prevista.toUpperCase().search(objDatosagenda.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (fecha_final.toUpperCase().search(objDatosagenda.filter.toUpperCase())!=-1) {
                    return item;
                }
                if (estado.toUpperCase().search(objDatosagenda.filter.toUpperCase())!=-1) {
                    return item;
                }
            });
        }
        const recordIni=(objDatosagenda.currentPage*objDatosagenda.recordsShow)-objDatosagenda.recordsShow;
        const recordFin=(recordIni+objDatosagenda.recordsShow)-1;
        let html="";
        objDatosagenda.recordsFilter.forEach(
            (item,index)=> {
                if ((index>=recordIni) && (index<=recordFin)) {
                    html+=`
                        <tr>
                        <td>${index+1}</td>
                        <td>${item.responsables}</td>               
                        <td>${item.proyecto}</td>               
                        <td>${item.fecha_prevista}</td>
                        <td>${item.fecha_final}</td>
                        <td>${item.estado}</td>
                        <td>
                            <button class="btn btn-primary" onclick="editaragenda(${item.id_agenda})"><img src="publico/images/lapiz.png"></button>
                            <button class="btn btn-danger" onclick="eliminaragenda(${item.id_agenda})"><img src="publico/images/paquete.png"></button>
                        </td>
                        </tr>
                    `;
                }
            }
        );
        contentTableagenda.innerHTML=html;
        crearPaginacionAgenda();
    }

//paginación para cuando la tabla se llene de datos
    function crearPaginacionAgenda() {

        paginacionagenda.innerHTML="";

        const elAnterior=document.createElement("li");
        elAnterior.classList.add("page-item");
        elAnterior.innerHTML=`<a class="page-link" href="#">Anterior</a>`;
        elAnterior.onclick=()=>{
            objDatosagenda.currentPage=(objDatosagenda.currentPage==1 ? 1 : --objDatosagenda.currentPage);
            crearTablaagenda();
        };
        paginacionagenda.append(elAnterior);

        const totalPage=Math.ceil(objDatosagenda.recordsFilter.length/objDatosagenda.recordsShow);
        for (let i=1; i<= totalPage; i++) {
            const el=document.createElement("li");
            el.classList.add("page-item");
            el.innerHTML=`<a class="page-link" href="#">${i}</a>`;
            el.onclick=()=>{
                objDatosagenda.currentPage=i;
                crearTablaagenda();
            };
            paginacionagenda.append(el);
        }

        const elSiguiente=document.createElement("li");
        elSiguiente.classList.add("page-item");
        elSiguiente.innerHTML=`<a class="page-link" href="#">Siguiente</a>`;
        elSiguiente.onclick=()=> {
            objDatosagenda.currentPage=(objDatosagenda.currentPage==totalPage 
                ? totalPage : ++objDatosagenda.currentPage);
            crearTablaagenda();
        };
        paginacionagenda.append(elSiguiente);
    }

//Utiliza el modelo "supertablero" con su función "getOneagenda" tomando el id del registro seleccionado para mostrarlo en el formulario
    function editaragenda(id_agenda) {
        limpiarFormagenda(1);
        panelDatosagenda.classList.add("d-none");
        panelFormagenda.classList.remove("d-none");
        API.get("supertablero/getOneagenda?id_agenda="+id_agenda).then(
            data=>{
                if (data.success) {
                    mostrarDatosFormagenda(data.records[0]);
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

//Llama los elementos del formulario de la vista y cuando se edita le asigna el valor corespondiente
    function mostrarDatosFormagenda(record) {
        const {id_agenda, responsables, proyecto,fecha_prevista,fecha_final, estado}=record;
        document.querySelector("#id_agenda").value=id_agenda;
        document.querySelector("#responsables").value=responsables;
        document.querySelector("#actividad").value=proyecto;
        document.querySelector("#fecha_prevista").value=fecha_prevista;
        document.querySelector("#fecha_final").value=fecha_final;
        document.querySelector("#estado").value=estado;
    }

//elimina un registro por el id, utiliza el modelo "supertablero" y su función "deleteagenda"
    function eliminaragenda(id_agenda) {
        Swal.fire({
            title:"¿Esta seguro de eliminar el registro?",
            showDenyButton:true,
            confirmButtonText:"Si",
            denyButtonText:"No"
        }).then(
            resultado=>{
                if (resultado.isConfirmed) {
                    API.get("supertablero/deleteagenda?id_agenda="+id_agenda).then(
                        data=>{
                            if (data.success) {
                                cancelaragenda();
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
