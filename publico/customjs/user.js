const botonusuarios = document.querySelector("#btnAgregarUsuarios");
const panelDatosusuarios = document.querySelector("#contentListusuarios");
const panelFormusuarios = document.querySelector("#contentFormusuarios");
const btnCancelarusuario = document.querySelector("#btnCancelarusuario");
const contentTableusuarios = document.querySelector("#contentTableUsuarios table tbody");
const txtSearchusuarios = document.querySelector("#txtSearchUsuarios");
const paginationusuario = document.querySelector("#paginauser");
const formusuario = document.querySelector("#formusuarios");
const objDatosusuario = {
    records: [],
    recordsFilter: [],
    currentPage: 1,
    recordsShow: 7,
    filter: ""
};
let id_user = 0

eventListiners();

function eventListiners() {

    document.querySelector("#nombre").addEventListener("input", validar_nombre)
    document.querySelector("#apellidos").addEventListener("input", validar_apellidos)
    document.querySelector("#usuario").addEventListener("input", validar_usuario)
    document.querySelector("#password").addEventListener("input", validar_password)

    formusuario.addEventListener("submit", guardarusuario);

    botonusuarios.addEventListener("click", agregarusuario);

    btnCancelarusuario.addEventListener("click", cancelarusuario);

    document.addEventListener("DOMContentLoaded", cargarDatosusuario);

    txtSearchusuarios.addEventListener("input", aplicarFiltrousuario);
}

function validar_nombre() {
    if ($('#nombre').val().length == 0) {
        document.querySelector("#nombre").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#nombre").classList.remove('color_rojo_inputs')
    }
}
function validar_apellidos() {
    if ($('#apellidos').val().length == 0) {
        document.querySelector("#apellidos").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#apellidos").classList.remove('color_rojo_inputs')
    }
}
function validar_usuario() {
    if ($('#usuario').val().length == 0) {
        document.querySelector("#usuario").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#usuario").classList.remove('color_rojo_inputs')
    }
}
function validar_password() {
    if ($('#password').val().length == 0) {
        document.querySelector("#password").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#password").classList.remove('color_rojo_inputs')
    }
}
function quitar_rojo_inputs() {

    let inputs = document.querySelectorAll('input');

    for (let i = 0; i < inputs.length; i++) {
        inputs[i].classList.remove('inputs_vacios');
        inputs[i].classList.remove('color_rojo_inputs');
    }
}
function guardarusuario(event) {
    event.preventDefault();
    const formDatausuario = new FormData(formusuario);
    const API = new Api();
    if (
        ($('#nombre').val().length == 0)
        || (id_user == 0 && $('#password').val().length == 0 ? true : false)
        || ($('#apellidos').val().length == 0)
        || ($('#usuario').val().length == 0)
    ) {
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
        API.post(formDatausuario, "usuarios/saveusuarios").then(
            data => {
                if (data.success) {
                    cancelarusuario();
                    btnCancelarusuario.click()
                    Swal.fire({
                        icon: "info",
                        text: data.msg
                    });
                } else {
                    $('#modal_form').modal('hide')
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: data.msg,
                        confirmButtonText: "Reintentar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#modal_form').modal('show')
                        } 
                    });;
                }
            }
        ).catch(
            error => {
                console.log("Error", error);
            }
        );
    }
}


function aplicarFiltrousuario(element) {
    element.preventDefault();
    objDatosusuario.filter = this.value;
    crearTablausuario();
}


function cargarDatosusuario() {
    const API = new Api();
    API.get("usuarios/getAllusuarios").then(
        data => {
            if (data.success) {
                objDatosusuario.records = data.records;
                objDatosusuario.currentPage = 1;
                crearTablausuario();
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

function agregarusuario() {
    limpiarFormusuario();
}

function limpiarFormusuario() {
    formusuario.reset();
    document.querySelector("#id_usuario").value = "0";
    id_user=0
}


function cancelarusuario() {
    btnCancelarusuario.setAttribute("data-bs-dismiss", "modal");
    btnCancelarusuario.classList.add('close-modal');
    cargarDatosusuario();
    quitar_rojo_inputs()
}


function crearTablausuario() {
    if (objDatosusuario.filter === "") {
        objDatosusuario.recordsFilter = objDatosusuario.records.map(item => item);
    } else {
        objDatosusuario.recordsFilter = objDatosusuario.records.filter(item => {
            const { nombre,apellido, usuario } = item;
            if (nombre.toUpperCase().search(objDatosusuario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (apellido.toUpperCase().search(objDatosusuario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (usuario.toUpperCase().search(objDatosusuario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (tipo.toUpperCase().search(objDatosusuario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (nom_depa.toUpperCase().search(objDatosusuario.filter.toUpperCase()) != -1) {
                return item;
            }
        });
    }
    const recordIni = (objDatosusuario.currentPage * objDatosusuario.recordsShow) - objDatosusuario.recordsShow;
    const recordFin = (recordIni + objDatosusuario.recordsShow) - 1;
    let html = "";
    objDatosusuario.recordsFilter.forEach(
        (item, index) => {
            if ((index >= recordIni) && (index <= recordFin)) {
                html += `
                    <tr class="text-capitalize">
                    <td onclick="ver_detalle(${item.id_usuario})" >${index + 1}</td>
                    <td onclick="ver_detalle(${item.id_usuario})" >${item.nombre}</td>               
                    <td onclick="ver_detalle(${item.id_usuario})" >${item.apellido}</td>               
                    <td onclick="ver_detalle(${item.id_usuario})" >${item.usuario}</td>
                    <td style="text-align:center">
                        <button href="#modal_form" data-bs-toggle="modal" class="btn btn-primary" onclick="editarusuario(${item.id_usuario}, false)"><img src="publico/images/edit.svg"></button>
                        <button class="btn btn-danger" onclick="eliminarusuario(${item.id_usuario})"><img src="publico/images/delete.svg"></button>
                    </td>
                    </tr>
                `;
            }
        }
    );
    contentTableusuarios.innerHTML = html;
    crearPaginacionusuario();
}
function ver_detalle(id) {
    const API = new Api();
    API.get("usuarios/getOneusuario?id_usuario=" + id).then(
        data => {
            if (data.success) {
                Swal.fire({
                    title: "Empleado: " + data.records[0].nombre + ' ' + data.records[0].apellido,
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Editar",
                    denyButtonText: `Eliminar`,
                    width: 600,
                    html: `
                    <div class="mt-3 text-capitalize" style="width: 97%; padding-left:13%">
                        <div class='row mb-4' style="text-align: left">
                            <div class='col-md-4 col-sm-4 col-lg-4 col-xl-4'>
                                <b class='mt-2'>Usuario: </b> <br>
                                <label class='mt-2'>${data.records[0].usuario}</label>
                            </div>
                            <div class='col-md-4 col-sm-4 col-lg-4 col-xl-4'>
                                <b class='mt-2'>Tipo: </b> <br>
                                <label class='mt-2'>${data.records[0].tipo}</label>
                            </div>
                            <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                                <b class="mt-2">Área: </b><br>
                                <label class='mt-2'>${data.records[0].nom_depa}</label>
                            </div>
                        </div>
                    </div>
                    `
                }).then((result) => {
                    if (result.isConfirmed) {
                        botonusuarios.click()
                        agregarusuario();
                        mostrarDatosFormusuarios(data.records[0], false);
                    } else if (result.isDenied) {
                        eliminarusuario(id)
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
function crearPaginacionusuario() {

    paginationusuario.innerHTML = "";

    const elAnterior = document.createElement("li");
    elAnterior.classList.add("page-item");
    elAnterior.innerHTML = `<a class="page-link" href="#">Anterior</a>`;
    elAnterior.onclick = () => {
        objDatosusuario.currentPage = (objDatosusuario.currentPage == 1 ? 1 : --objDatosusuario.currentPage);
        crearTablausuario();
    };
    paginationusuario.append(elAnterior);

    const totalPage = Math.ceil(objDatosusuario.recordsFilter.length / objDatosusuario.recordsShow);
    for (let i = 1; i <= totalPage; i++) {
        const el = document.createElement("li");
        el.classList.add("page-item");
        el.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        el.onclick = () => {
            objDatosusuario.currentPage = i;
            crearTablausuario();
        };
        paginationusuario.append(el);
    }

    const elSiguiente = document.createElement("li");
    elSiguiente.classList.add("page-item");
    elSiguiente.innerHTML = `<a class="page-link" href="#">Siguiente</a>`;
    elSiguiente.onclick = () => {
        objDatosusuario.currentPage = (objDatosusuario.currentPage == totalPage
            ? totalPage : ++objDatosusuario.currentPage);
        crearTablausuario();
    };
    paginationusuario.append(elSiguiente);
}

function editarusuario(id_usuario) {
    limpiarFormusuario();
    const API = new Api();
    API.get("usuarios/getOneusuario?id_usuario=" + id_usuario).then(
        data => {
            if (data.success) {
                mostrarDatosFormusuarios(data.records[0]);
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

function mostrarDatosFormusuarios(record) {
    const { id_usuario, nombre, apellido, usuario, tipo, id_dep } = record;
    id_user=id_usuario
    document.querySelector("#id_usuario").value = id_usuario;
    document.querySelector("#nombre").value = nombre;
    document.querySelector("#apellidos").value = apellido;
    document.querySelector("#usuario").value = usuario;
    document.querySelector("#tipo").value = tipo;
    document.querySelector("#depa").value = id_dep;
}


function eliminarusuario(id_usuario) {
    Swal.fire({
        title: "¿Esta seguro de eliminar el usuario?",
        showDenyButton: true,
        confirmButtonText: "Si",
        denyButtonText: "No"
    }).then(
        resultado => {
            if (resultado.isConfirmed) {
                const API = new Api();
                API.get("usuarios/deleteusuario?id_usuario=" + id_usuario).then(
                    data => {
                        if (data.success) {
                            cancelarusuario();
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

