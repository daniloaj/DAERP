const btnViewReport=document.querySelector("#btnViewReport");
const CodigoDesde=document.querySelector("#desde");
const CodigoHasta=document.querySelector("#hasta");
const codigoProyecto=document.querySelector("#proyecto");
const frameReporte=document.querySelector("#framereporte");
const API = new Api();

eventListenner();

function eventListenner() {
    document.addEventListener("DOMContentLoaded",cargarproyecto);
    document.addEventListener("DOMContentLoaded",cargarDatos);
    document.addEventListener("DOMContentLoaded",cargarDesde);

    btnViewReport.addEventListener("click",verReporte);
}


function cargarDesde() {
    API.get("supertablero/getAllCompras").then(
        data=>{
            if (data.success) {
                CodigoDesde.innerHTML="";
                const optioncompra=document.createElement("option");
                optioncompra.value="0";
                optioncompra.textContent="Todos";
                CodigoDesde.append(optioncompra);
                data.records.forEach(
                    (item)=>{
                        const {id_compra}=item;
                        const optioncompra=document.createElement("option");
                        optioncompra.value=id_compra;
                        CodigoDesde.append(optioncompra);
                    }
                );
            }
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}

function cargarDatos() {
    API.get("supertablero/getAllCompras").then(
        data=>{
            if (data.success) {
                CodigoHasta.innerHTML="";
                const optioncompra=document.createElement("option");
                optioncompra.value="0";
                CodigoHasta.append(optioncompra);
                data.records.forEach(
                    (item)=>{
                        const {id_compra}=item;
                        const optioncompra=document.createElement("option");
                        optioncompra.value=id_compra;
                        CodigoHasta.append(optioncompra);
                    }
                );
            }
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}
function cargarproyecto() {
    API.get("supertablero/getAllCompras").then(
        data=>{
            if (data.success) {
                codigoProyecto.innerHTML="";
                const optionactividad=document.createElement("option");
                optionactividad.value="0";
                optionactividad.textContent="Todos";
                codigoProyecto.append(optionactividad);
                data.records.forEach(
                    (item)=>{
                        const {evento}=item;
                        const optionactividad=document.createElement("option");
                        optionactividad.value=evento;
                        optionactividad.textContent=evento;
                        codigoProyecto.append(optionactividad);
                    }
                );
            }
        }
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}

function verReporte() {
   frameReporte.src=`${BASE_API}reportecompras/getReporte?proyecto=${codigoProyecto.value}&desde=${CodigoDesde.value}&hasta=${CodigoHasta.value}`;
}