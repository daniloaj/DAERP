// aqui llamas a los elementos que estan en tu vista del reporte, asegurate que los nombres esten bien puestos y coicidan con los que tienes en la vista
const btnViewReport=document.querySelector("#btnViewReport");
const CodigoDesde=document.querySelector("#desde");
const CodigoHasta=document.querySelector("#hasta");
const codigoProyecto=document.querySelector("#proyecto");
const frameReporte=document.querySelector("#framereporte");
const API = new Api();

// eventListenner lo que hace es llamar a los eventos que declaras mas abajo
eventListenner();

// estos son los elementos que estas cargando en el DOM o vista (DOM y vista son casi lo mismo), son las funciones que creas mas abajo 
function eventListenner() {
    document.addEventListener("DOMContentLoaded",cargarproyecto);
    document.addEventListener("DOMContentLoaded",cargarDatos);
    document.addEventListener("DOMContentLoaded",cargarDesde);

    // este es el boton que llama al reporte, tiene que tener nombre_variable(definida arriba).addEventListener(agregas un evento)("click"(dices que el evento sea un clic), nombre_funcion(es la que quieres que se active cuando das el clic))
    btnViewReport.addEventListener("click",verReporte);
}

// esta funcion es un evento de calendario para poner una fecha, la fecha que escojas será la fecha inicial
function cargarDesde() {
    // llamas a la funcion de la que quieras que se tomen los datos
    API.get("supertablero/getAllCompras").then(
        // data obtiene los datos de esa consulta getAllCompras
        data=>{
            // si los datos existen hará lo siguiente
            if (data.success) {
                // la variable CodigoDesde definida arriba es quien tendrá la fecha inicial y definira un elemento html vacio
                CodigoDesde.innerHTML="";
                // definie una constante que tendrá las opciones a escojer, aqui pone que seran option como si fuera un select, pero igual sirve con los calendarios xd
                const optioncompra=document.createElement("option");
                // lo inicializa en 0
                optioncompra.value="0";
                // predeterminadamente "todos" será el valor predefinido para que no retorne null, asi si no escoges nada te dará todos los resultados de la consulta sql que hagas
                optioncompra.textContent="Todos";
                // CodigoDesde se definió arriba y se le añadirá optioncompra que contiene lo que te acabo de describir
                CodigoDesde.append(optioncompra);
                // recorre los datos recibidos de la consulta
                data.records.forEach(
                    // crea una variable llamada item que almacenará los datos
                    (item)=>{
                        // id_compra será el valor a validar, porque es un valor unico
                        const {id_compra}=item;
                        // volvemos a definir la optioncompra y volvemos a ponerle que queremos option, lo mismo de arriba xd
                        const optioncompra=document.createElement("option");
                        // se valida donde su valor pasaria a ser el id_compra
                        optioncompra.value=id_compra;
                        // y se lo añade a la varible definida arriba
                        CodigoDesde.append(optioncompra);
                    }
                );
            }
        }
        // si nada de eso funciona te dará este mensaje de error
    ).catch(
        error=>{
            console.error("Error:",error);
        }
    );
}

// este funciona exactamente igual que el anterior pero con la fecha final
function cargarDatos() {
    API.get("supertablero/getAllCompras").then(
        data=>{
            if (data.success) {
                // CodigoHasta es quien tendrá la fecha final
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
// funciona exactamente igual que el aterior pero esta vez es con un select que contiene los registros en tu bd
function cargarproyecto() {
    API.get("supertablero/getAllCompras").then(
        data=>{
            if (data.success) {
                // codigoProyecto definida arriba tendrá los registros y se inicializa con un html vacío igual que los anteriores
                codigoProyecto.innerHTML="";
                // aqui sin funciona que queremos los option de un select xd que tendrán los registros de la bd
                const optionactividad=document.createElement("option");
                optionactividad.value="0";
                optionactividad.textContent="Todos";
                codigoProyecto.append(optionactividad);
                data.records.forEach(
                    (item)=>{
                        // acá el elemento que se validará es lo que quieres que se muestre, en este caso es evento (el nombre que tenga el campo en tu bd)
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

// esta es la funcion que funcionará con un click en los addEventListenner
function verReporte() {
   frameReporte.src=`${BASE_API}reportecompras/getReporte?proyecto=${codigoProyecto.value}&desde=${CodigoDesde.value}&hasta=${CodigoHasta.value}`;
//    frameReporte está definida arriba y le estamos diciendo que muestre el_nombre_de_tu_controlador_en_el_parent::__construct/el_nombre_de_tu_funcion?nombre_de_tu_select_en_la_vista=${nombre_de_tu_variable_que_contiene_los_datos_en_este_archivo.value}&nombre_de_tu_calendario_inicial_en_la_vista=${nombre_de_tu_variable_que_contiene_los_datos_en_este_archivo.value}&nombre_de_tu_calendario_final_en_la_vista=${nombre_de_tu_variable_que_contiene_los_datos_en_este_archivo.value}
}