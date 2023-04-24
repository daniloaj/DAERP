const btnViewReport=document.querySelector("#btnViewReport");
const Codigoinicio=document.querySelector("#inicio");
const Codigofinal=document.querySelector("#final");
const codigoestado=document.querySelector("#estado");
const frameReporte=document.querySelector("#framereporte");
const API = new Api();

eventListenner();

function eventListenner() {
    btnViewReport.addEventListener("click",verReporte);
    document.addEventListener("DOMContentLoaded",cargarestado);
    document.addEventListener("DOMContentLoaded",cargarDatos);
}

function cargarDatos() {
    API.get("supertablero/getAllagendahistorial").then(
        data=>{
            if (data.success) {
                Codigoinicio.innerHTML="";
                const optioncompra=document.createElement("option");
                optioncompra.value="0";
                optioncompra.textContent="Todos";
                Codigoinicio.append(optioncompra);
                data.records.forEach(
                    (item)=>{
                        const {id_compra}=item;
                        const optioncompra=document.createElement("option");
                        optioncompra.value=id_compra;
                        Codigoinicio.append(optioncompra);
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
    API.get("supertablero/getAllagendahistorial").then(
        data=>{
            if (data.success) {
                Codigofinal.innerHTML="";
                const optioncompra=document.createElement("option");
                optioncompra.value="0";
                Codigofinal.append(optioncompra);
                data.records.forEach(
                    (item)=>{
                        const {id_compra}=item;
                        const optioncompra=document.createElement("option");
                        optioncompra.value=id_compra;
                        Codigofinal.append(optioncompra);
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
function cargarestado() {
    API.get("supertablero/getAllagendahistorial").then(
        data=>{
            if (data.success) {
                codigoestado.innerHTML="";
                const optionestado=document.createElement("option");
                optionestado.value="0";
                optionestado.textContent="Todos";
                codigoestado.append(optionestado);
                data.records.forEach(
                    (item)=>{
                        const {estado}=item;
                        const optionestado=document.createElement("option");
                        optionestado.value=estado;
                        optionestado.textContent=estado;
                        codigoestado.append(optionestado);
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
    frameReporte.src=`${BASE_API}reporteagenda/getReporte?inicio=${Codigoinicio.value}&final=${Codigofinal.value}&estado=${codigoestado.value}`;
}