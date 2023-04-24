//llamamos a los elementos de la vista
const contentTableagenda=document.querySelector("#contentTableagenda table tbody");
const txtSearchagenda=document.querySelector("#txtSearchagenda");
const agenda_id=document.querySelector("#id_agenda");
const paginacionagenda=document.querySelector("#paginaagenda");

//llamamos al api del sistema
const API=new Api();

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

        document.addEventListener("DOMContentLoaded",cargarDatosagenda);

        txtSearchagenda.addEventListener("input",aplicarFiltroagenda);

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

    //crea los elementos que iran en la tabla y los asigna a una variable llamada item
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
