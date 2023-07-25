const botoninventario = document.querySelector("#btnAgregarinventario");
const panelDatosinventario = document.querySelector("#contentListinventario");
const panelForminventario = document.querySelector("#contentForminventario");
const btnCancelarinventario = document.querySelector("#btnCancelarinventario");
const contentTableinventario = document.querySelector("#contentTableinventario table tbody");
const txtSearchinventario = document.querySelector("#txtSearchinventario");
const paginainventario = document.querySelector("#paginainven");
const forminventario = document.querySelector("#forminventario");
const objDatosinventario = {
    records: [],
    recordsFilter: [],
    currentPage: 1,
    recordsShow: 7,
    filter: ""
};


eventListiners();

function eventListiners() {
    botoninventario.addEventListener("click", agregarinventario);

    btnCancelarinventario.addEventListener("click", cancelarinventario);

    document.addEventListener("DOMContentLoaded", cargarDatosinventario);

    txtSearchinventario.addEventListener("input", aplicarFiltroinventario);

    document.querySelector("#insumo").addEventListener("input", validar_insumo)
    document.querySelector("#precio").addEventListener("input", validar_precio)
    document.querySelector("#unidades").addEventListener("input", validar_unidades)
    document.querySelector("#fecha").addEventListener("input", validar_fecha)
    document.querySelector("#n_factura").addEventListener("input", validar_n_factura)
    document.querySelector("#comprador").addEventListener("input", validar_comprador)

    forminventario.addEventListener("submit", guardarinventario);
}

function validar_insumo() {
    if ($('#insumo').val().length == 0) {
        document.querySelector("#insumo").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#insumo").classList.remove('color_rojo_inputs')
    }
}
function validar_precio() {
    if ($('#precio').val().length == 0) {
        document.querySelector("#precio").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#precio").classList.remove('color_rojo_inputs')
    }
}
function validar_unidades() {
    if ($('#unidades').val().length == 0) {
        document.querySelector("#unidades").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#unidades").classList.remove('color_rojo_inputs')
    }
}
function validar_fecha() {
    if ($('#fecha').val().length == 0) {
        document.querySelector("#fecha").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#fecha").classList.remove('color_rojo_inputs')
    }
}
function validar_n_factura() {
    if ($('#n_factura').val().length == 0) {
        document.querySelector("#n_factura").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#n_factura").classList.remove('color_rojo_inputs')
    }
}
function validar_comprador() {
    if ($('#comprador').val().length == 0) {
        document.querySelector("#comprador").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#comprador").classList.remove('color_rojo_inputs')
    }
}
function quitar_rojo_inputs() {

    let inputs = document.querySelectorAll('input');

    for (let i = 0; i < inputs.length; i++) {
        inputs[i].classList.remove('inputs_vacios');
        inputs[i].classList.remove('color_rojo_inputs');
    }
}

function guardarinventario(event) {
    event.preventDefault();
    const formDatainventario = new FormData(forminventario);
    const API = new Api();


    if (($('#insumo').val().length == 0)
        || ($('#comprador').val().length == 0)
        || ($('#n_factura').val().length == 0)
        || ($('#fecha').val().length == 0)
        || ($('#unidades').val().length == 0)
        || ($('#precio').val().length == 0)) {

        let inputs = document.querySelectorAll('input');

        for (let i = 0; i < inputs.length; i++) {
            if (inputs[i].value === '') {
                inputs[i].classList.add('inputs_vacios');
                inputs[i].classList.add('color_rojo_inputs');
                setTimeout(() => {
                    inputs[i].classList.remove('inputs_vacios');
                }, 400);
            } else {
                inputs[i].classList.remove('inputs_vacios');
                inputs[i].classList.remove('color_rojo_inputs');
            }
        }
    } else {
        API.post(formDatainventario, "inventario/saveinventario").then(
            data => {
                if (data.success) {
                    cancelarinventario();
                    Swal.fire({
                        icon: "info",
                        text: data.msg
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: data.msg
                    });
                }
            }
        ).catch(
            error => {
                console.log("Error", error);
            }
        );
    }
}


function aplicarFiltroinventario(element) {
    element.preventDefault();
    objDatosinventario.filter = this.value;
    crearTablainventario();
}


function cargarDatosinventario() {
    const API = new Api();
    API.get("inventario/getAllinventario").then(
        data => {
            if (data.success) {
                objDatosinventario.records = data.records;
                objDatosinventario.currentPage = 1;
                crearTablainventario();
            } else {
                console.log("Error al recuperar registros");
            }
        }
    ).catch(
        error => {
            console.error("Error en la llamada:", error);
        }
    )
}

function agregarinventario() {
    panelDatosinventario.classList.add("form_animation");
    panelForminventario.classList.add("form_animation");
    panelDatosinventario.classList.add("d-none");
    panelForminventario.classList.remove("d-none");
    limpiarForminventario();
}

function limpiarForminventario() {
    forminventario.reset();
    document.querySelector("#id_inventario").value = "0";
}


function cancelarinventario() {
    panelDatosinventario.classList.remove("d-none");
    panelForminventario.classList.add("d-none");
    cargarDatosinventario();
    quitar_rojo_inputs()
}


function crearTablainventario() {
    if (objDatosinventario.filter === "") {
        objDatosinventario.recordsFilter = objDatosinventario.records.map(item => item);
    } else {
        objDatosinventario.recordsFilter = objDatosinventario.records.filter(item => {
            const { insumo, precio, unidades, fecha, provee, n_factura, comprador } = item;
            if (insumo.toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (precio.toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (unidades.toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (fecha.toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (provee.toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (n_factura.toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (comprador.toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
        });
    }
    const recordIni = (objDatosinventario.currentPage * objDatosinventario.recordsShow) - objDatosinventario.recordsShow;
    const recordFin = (recordIni + objDatosinventario.recordsShow) - 1;
    let html = "";
    objDatosinventario.recordsFilter.forEach(
        (item, index) => {
            if ((index >= recordIni) && (index <= recordFin)) {
                html += `
                        <tr>
                        <td onclick="editarinventario(${item.id_inventario})">${index + 1}</td>
                        <td onclick="editarinventario(${item.id_inventario})">${item.insumo}</td>               
                        <td onclick="editarinventario(${item.id_inventario})">$${item.precio}</td>               
                        <td onclick="editarinventario(${item.id_inventario})">${item.unidades}</td>
                        <td onclick="editarinventario(${item.id_inventario})">$${item.total}</td>
                        <td onclick="editarinventario(${item.id_inventario})">${item.fecha}</td>
                        <td onclick="editarinventario(${item.id_inventario})">${item.provee}</td>
                        <td onclick="editarinventario(${item.id_inventario})">${item.n_factura}</td>
                        <td onclick="editarinventario(${item.id_inventario})">${item.comprador}</td>
                        <td>
                            <button class="btn btn-primary" onclick="editarinventario(${item.id_inventario})"><img src="publico/images/lapiz.png"></button>
                            <button class="btn btn-danger" onclick="eliminarinventario(${item.id_inventario})"><img src="publico/images/paquete.png"></button>
                        </td>
                        </tr>
                    `;
            }
        }
    );
    contentTableinventario.innerHTML = html;
    crearPaginacioninventario();
}

function crearPaginacioninventario() {

    paginainventario.innerHTML = "";

    const elAnterior = document.createElement("li");
    elAnterior.classList.add("page-item");
    elAnterior.innerHTML = `<a class="page-link" href="#">Anterior</a>`;
    elAnterior.onclick = () => {
        objDatosinventario.currentPage = (objDatosinventario.currentPage == 1 ? 1 : --objDatosinventario.currentPage);
        crearTablainventario();
    };
    paginainventario.append(elAnterior);

    const totalPage = Math.ceil(objDatosinventario.recordsFilter.length / objDatosinventario.recordsShow);
    for (let i = 1; i <= totalPage; i++) {
        const el = document.createElement("li");
        el.classList.add("page-item");
        el.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        el.onclick = () => {
            objDatosinventario.currentPage = i;
            crearTablainventario();
        };
        paginainventario.append(el);
    }

    const elSiguiente = document.createElement("li");
    elSiguiente.classList.add("page-item");
    elSiguiente.innerHTML = `<a class="page-link" href="#">Siguiente</a>`;
    elSiguiente.onclick = () => {
        objDatosinventario.currentPage = (objDatosinventario.currentPage == totalPage
            ? totalPage : ++objDatosinventario.currentPage);
        crearTablainventario();
    };
    paginainventario.append(elSiguiente);
}

function editarinventario(id_inventario) {
    agregarinventario();
    // panelDatosinventario.classList.add("form_animation");
    // panelForminventario.classList.add("form_animation");
    // panelDatosinventario.classList.add("d-none");
    // panelForminventario.classList.remove("d-none");
    const API = new Api();
    API.get("inventario/getOneinventario?id_inventario=" + id_inventario).then(
        data => {
            if (data.success) {
                mostrarDatosForminventario(data.records[0]);
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: data.msg
                });
            }
        }
    ).catch(
        error => {
            console.log("Error:", error);
        }
    );
}

function mostrarDatosForminventario(record) {
    const { id_inventario, insumo, precio, unidades, fecha, provee, n_factura, comprador } = record;
    document.querySelector("#id_inventario").value = id_inventario;
    document.querySelector("#insumo").value = insumo;
    document.querySelector("#precio").value = precio;
    document.querySelector("#unidades").value = unidades;
    document.querySelector("#fecha").value = fecha;
    document.querySelector("#provee").value = provee;
    document.querySelector("#n_factura").value = n_factura;
    document.querySelector("#comprador").value = comprador;
}
function eliminarinventario(id_inventario) {
    Swal.fire({
        title: "¿Esta seguro de eliminar el registro?",
        showDenyButton: true,
        confirmButtonText: "Si",
        denyButtonText: "No"
    }).then(
        resultado => {
            if (resultado.isConfirmed) {
                const API = new Api();
                API.get("inventario/deleteinventario?id_inventario=" + id_inventario).then(
                    data => {
                        if (data.success) {
                            cancelarinventario();
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: data.msg
                            });
                        }
                    }
                ).catch(
                    error => {
                        console.err("Error", error);
                    }
                );
            }
        }
    );
}
