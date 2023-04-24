const btnViewReport=document.querySelector("#btnViewReport");
const Codigoprincipio=document.querySelector("#principio");
const Codigoacaba=document.querySelector("#acaba");
const codigocomprador=document.querySelector("#comprador");
const frameReporte=document.querySelector("#framereporte");
const API = new Api();

eventListenner();

function eventListenner() {
    btnViewReport.addEventListener("click",verReporte);
    document.addEventListener("DOMContentLoaded",cargarcomprador);
    document.addEventListener("DOMContentLoaded",cargarDatos);
}

function cargarDatos() {
    API.get("supertablero/getAllhistorialinventario").then(
        data=>{
            if (data.success) {
                Codigoprincipio.innerHTML="";
                const optioncompra=document.createElement("option");
                optioncompra.value="0";
                optioncompra.textContent="Todos";
                Codigoprincipio.append(optioncompra);
                data.records.forEach(
                    (item)=>{
                        const {id_compra}=item;
                        const optioncompra=document.createElement("option");
                        optioncompra.value=id_compra;
                        Codigoprincipio.append(optioncompra);
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
    API.get("supertablero/getAllhistorialinventario").then(
        data=>{
            if (data.success) {
                Codigoacaba.innerHTML="";
                const optioncompra=document.createElement("option");
                optioncompra.value="0";
                optioncompra.textContent="Todos";
                Codigoacaba.append(optioncompra);
                data.records.forEach(
                    (item)=>{
                        const {id_compra}=item;
                        const optioncompra=document.createElement("option");
                        optioncompra.value=id_compra;
                        Codigoacaba.append(optioncompra);
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
function cargarcomprador() {
    API.get("supertablero/getAllhistorialinventario").then(
        data=>{
            if (data.success) {
                codigocomprador.innerHTML="";
                const optioncomprador=document.createElement("option");
                optioncomprador.value="0";
                optioncomprador.textContent="Todos";
                codigocomprador.append(optioncomprador);
                data.records.forEach(
                    (item)=>{
                        const {comprador}=item;
                        const optioncomprador=document.createElement("option");
                        optioncomprador.value=comprador;
                        optioncomprador.textContent=comprador;
                        codigocomprador.append(optioncomprador);
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
    frameReporte.src=`${BASE_API}reporteinventario/getReporte?principio=${Codigoprincipio.value}&acaba=${Codigoacaba.value}&comprador=${codigocomprador.value}`;
}