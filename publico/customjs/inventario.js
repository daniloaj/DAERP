const botoninventario = document.querySelector("#btnAgregarinventario");
const panelDatosinventario = document.querySelector("#contentListinventario");
const panelForminventario = document.querySelector("#contentForminventario");
const btnCancelarinventario = document.querySelector("#btnCancelarinventario");
const btnSaveInventario = document.querySelector("#btnSaveInventario");
const contentTableinventario = document.querySelector("#contentTableinventario table tbody");
const txtSearchinventario = document.querySelector("#txtSearchinventario");
const paginainventario = document.querySelector("#paginainven");
const forminventario = document.querySelector("#forminventario");
let total = document.querySelector("#total");
const objDatosinventario = {
    records: [],
    recordsFilter: [],
    currentPage: 1,
    recordsShow: 7,
    filter: ""
};


eventListiners();

function eventListiners() {
    document.addEventListener("DOMContentLoaded", cargarDatosinventario);
    document.addEventListener("DOMContentLoaded", getProveedores);
    
    botoninventario.addEventListener("click", agregarinventario);
    btnCancelarinventario.addEventListener("click", cancelarinventario);
    
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
                    $('#modal_form').modal('hide')
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

function getProveedores() {
    const API = new Api()
    API.get("proveedores/proveedoresList").then(response=>{
        console.log(response);
    }).catch(error=>{
        console.log(error);
    })
    
}

function cargarDatosinventario() {
    const API = new Api();
    API.get("inventario/getAllinventario").then(
        data => {
            if (data.success) {
                objDatosinventario.records = data.records;
                objDatosinventario.currentPage = 1;
                let count = 0
                total.innerHTML = 0
                data.records.forEach(element => {
                    count = count + Number(element.total)
                });
                total.innerHTML = count
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
    limpiarForminventario();
}

function limpiarForminventario() {
    forminventario.reset();
    document.querySelector("#id_inventario").value = "0";
}


function cancelarinventario() {
    btnCancelarinventario.setAttribute("data-bs-dismiss", "modal");
    btnCancelarinventario.classList.add('close-modal');
    cargarDatosinventario();
    quitar_rojo_inputs()
}


function crearTablainventario() {
    if (objDatosinventario.filter === "") {
        objDatosinventario.recordsFilter = objDatosinventario.records.map(item => item);
    } else {
        objDatosinventario.recordsFilter = objDatosinventario.records.filter(item => {
            const { insumo, precio, unidades, fecha_format } = item;
            if (insumo.toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (precio.toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (unidades.toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (fecha_format.toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
        });
    }
    let count = 0
    total.innerHTML = 0
    objDatosinventario.recordsFilter.forEach(element => {
        count = count + Number(element.total)
    });
    total.innerHTML = count
    const recordIni = (objDatosinventario.currentPage * objDatosinventario.recordsShow) - objDatosinventario.recordsShow;
    const recordFin = (recordIni + objDatosinventario.recordsShow) - 1;
    let html = "";
    objDatosinventario.recordsFilter.forEach(
        (item, index) => {
            if ((index >= recordIni) && (index <= recordFin)) {
                html += `
                        <tr>
                        <td onclick="ver_detalle_producto(${item.id_inventario})">${index + 1}</td>
                        <td onclick="ver_detalle_producto(${item.id_inventario})">${item.fecha_format}</td>
                        <td data-toggle="tooltip" title="${item.insumo}" onclick="ver_detalle_producto(${item.id_inventario})">${truncate(item.insumo, 15)}</td>               
                        <td onclick="ver_detalle_producto(${item.id_inventario})">$${item.precio}</td>               
                        <td onclick="ver_detalle_producto(${item.id_inventario})">${item.unidades}</td>
                        <td onclick="ver_detalle_producto(${item.id_inventario})">$${item.total}</td>
                        <td style="text-align:center">
                            <button href="#modal_form" data-bs-toggle="modal" class="btn btn-primary" onclick="editarinventario(${item.id_inventario}, false)"><img src="publico/images/edit.svg"></button>
                            <button class="btn btn-danger" onclick="eliminarinventario(${item.id_inventario})"><img src="publico/images/delete.svg"></button>
                            <button href="#modal_form" data-bs-toggle="modal" class="btn btn-info" onclick="editarinventario(${item.id_inventario}, true)"><img src="publico/images/copy.svg"></button>
                        </td>
                        </tr>
                    `;
            }
        }
    );
    contentTableinventario.innerHTML = html;
    crearPaginacioninventario();
}
function truncate(text, value) {
    if (text.length > value) {
        return text.slice(0, value) + '...'
    }
    return text
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

function ver_detalle_producto(id_inventario) {
    const API = new Api();
    API.get("inventario/getOneinventario?id_inventario=" + id_inventario).then(
        data => {
            if (data.success) {
                Swal.fire({
                    title: "Producto: " + data.records[0].insumo,
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Editar",
                    denyButtonText: `Eliminar`,
                    width: 600,
                    html: `
                    <div class="mt-3" style="width: 97%; padding-left:13%">

                    <div class='row mb-4' style="text-align: left">
                        <div class='col-md-4 col-sm-4 col-lg-4 col-xl-4'>
                            <b class='mt-2'>Cantidad: </b> <br>
                            <label class='mt-2'>${data.records[0].unidades}</label>
                        </div>
                        <div class='col-md-4 col-sm-4 col-lg-4 col-xl-4'>
                            <b class='mt-2'>Costo unitario: </b> <br>
                            <label class='mt-2'>$${data.records[0].precio}</label>
                        </div>
                        <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                            <b class="mt-2">Total: </b> <br>
                            <label class='mt-2'>${data.records[0].total}</label>
                        </div>
                    </div>

                    <div class="row mb-4" style="text-align: left">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                            <b class="mt-2">Fecha compra: </b><br>
                            <label class='mt-2'>${data.records[0].fecha_format}</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                            <b class="mt-2">Proveedor: </b><br>
                            <label class='mt-2'>${data.records[0].empresa}</label>
                        </div>
                    </div>

                    <div class="row mb-3" style="text-align: left">
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                            <b class="mt-2">N° Factura: </b><br>
                            <label class='mt-2'>${data.records[0].n_factura}</label>
                        </div>
                        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                            <b class="mt-2">Responsable: </b><br>
                            <label class='mt-2'>${data.records[0].comprador}</label>
                        </div>
                    </div>
                    </div>
                    `
                }).then((result) => {
                    if (result.isConfirmed) {
                        botoninventario.click()
                        agregarinventario();
                        mostrarDatosForminventario(data.records[0], false);
                    } else if (result.isDenied) {
                        eliminarinventario(id_inventario)
                    }
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
            console.log("Error:", error);
        }
    );
}
function editarinventario(id_inventario, copy) {
    const API = new Api();
    API.get("inventario/getOneinventario?id_inventario=" + id_inventario).then(
        data => {
            if (data.success) {
                agregarinventario();
                mostrarDatosForminventario(data.records[0], copy);
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

function mostrarDatosForminventario(record, copy) {
    const { id_inventario, insumo, precio, unidades, fecha, provee, n_factura, comprador } = record;
    document.querySelector("#id_inventario").value = copy == false ? id_inventario : 0;
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
