const botonusuarios = document.querySelector("#btnAgregarUsuarios");
const panelDatosusuarios = document.querySelector("#contentListusuarios");
const panelFormusuarios = document.querySelector("#contentFormusuarios");
const btnCancelarusuario = document.querySelector("#btnCancelarusuario");
const contentTableusuarios = document.querySelector("#contentTableUsuarios table tbody");
const txtSearchusuarios = document.querySelector("#txtSearchUsuarios");
const paginationusuario = document.querySelector("#paginauser");
const formusuario = document.querySelector("#formusuarios");
const send_mail_button = document.querySelector("#send_mail");
const cancelar_mail_button = document.querySelector("#cancelar_mail");
const nombre = document.querySelector("#nombre");
const apellidos = document.querySelector("#apellidos");
const usuario = document.querySelector("#usuario");
const password = document.querySelector("#password");
const correo = document.querySelector("#correo");
const enviar_varios_mail_button = document.querySelector("#enviar_varios_correos");
const whatsapp = document.querySelector("#whatsapp");
const tel = document.querySelector("#tel");
const objDatosusuario = {
    records: [],
    recordsFilter: [],
    currentPage: 1,
    recordsShow: 7,
    filter: ""
};
let id_user = 0
let correos = []
let usuarios = []

eventListiners();

function eventListiners() {

    nombre.addEventListener("input", validar_nombre)
    apellidos.addEventListener("input", validar_apellidos)
    usuario.addEventListener("input", validar_usuario)
    password.addEventListener("input", validar_password)
    correo.addEventListener("input", validar_Correo)
    whatsapp.addEventListener("input", validar_Whatsapp)
    tel.addEventListener("input", validar_tel)
    formusuario.addEventListener("submit", guardarusuario);
    botonusuarios.addEventListener("click", agregarusuario);
    enviar_varios_mail_button.addEventListener("click", enviar_varios_mail);
    cancelar_mail_button.addEventListener("click", cancelar_mail);
    send_mail_button.addEventListener("click", enviar_correo);
    btnCancelarusuario.addEventListener("click", cancelarusuario);
    document.addEventListener("DOMContentLoaded", cargarDatosusuario);
    document.addEventListener("DOMContentLoaded", getDepartament);
    txtSearchusuarios.addEventListener("input", aplicarFiltrousuario);
}
function enviar_varios_mail() {
    let modalElement = document.getElementById('modal_mails');
    let modalInstance = bootstrap.Modal.getInstance(modalElement);
    modalInstance.show();
    document.getElementById("correo_usuario").innerHTML = "Enviar correo a: <br> Todos los usuarios"
}
function cancelar_mail() {
    let modalElement = document.getElementById('modal_mails');
    let modalInstance = bootstrap.Modal.getInstance(modalElement);
    modalInstance.hide();
    document.getElementById("asunto").value = ""
    document.getElementById("mensaje").value = ""
}
function getDepartament() {
    const API = new Api()
    API.get("usuarios/departamentList").then(response => {
        const select = document.getElementById("depa")
        response.records.forEach(element => {
            const option = document.createElement('option')
            option.value = element.id_dep
            option.textContent = element.nom_depa
            select.appendChild(option)
        });
    }).catch(error => {
        console.log(error);
    })
}
function enviar_correo() {
    let correo = document.getElementById("correo_usuario").innerHTML.split(">")[1].trim()
    let asunto = document.getElementById("asunto").value
    let mensaje = document.getElementById("mensaje").value
    const API = new Api()
    const formData = new FormData();
    formData.append("asunto", asunto);
    formData.append("mensaje", mensaje);

    if (correo == "Todos los usuarios") {
        formData.append("correo", JSON.stringify(correos));
        API.post(formData, "usuarios/send_many_mails").then(response => {
            cancelar_mail()
            Swal.fire({
                icon: "info",
                text: response.msg
            });
        }).catch(error => {
            console.log(error);
        })
    } else {
        formData.append("correo", correo);
        API.post(formData, "usuarios/send_mail").then(response => {
            cancelar_mail()
            Swal.fire({
                icon: "info",
                text: response.msg
            });
        }).catch(error => {
            console.log(error);
        })
    }
}
function validar_nombre() {
    if (nombre.value.length == 0) {
        document.querySelector("#nombre").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#nombre").classList.remove('color_rojo_inputs')
    }
}
function validar_tel() {
    if (tel.value.length == 0) {
        document.querySelector("#tel").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#tel").classList.remove('color_rojo_inputs')
    }
}
function validar_Whatsapp() {
    let duplicate = usuarios.filter(item => item.whatsapp == whatsapp.value && id_user!==item.id_usuario)    
    if (whatsapp.value.length == 0) {
        whatsapp.classList.add('color_rojo_inputs')
        whatsapp.classList.add('inputs_vacios')
    } else {
        whatsapp.classList.remove('color_rojo_inputs')
        whatsapp.classList.remove('inputs_vacios')
    }

    if (duplicate.length>0) {
        whatsapp.classList.add('color_rojo_inputs')
        whatsapp.classList.add('inputs_vacios')
        document.getElementById("error_wp").classList.remove("d-none")
    } else {
        whatsapp.classList.remove('color_rojo_inputs')
        whatsapp.classList.remove('inputs_vacios')
        document.getElementById("error_wp").classList.add("d-none")
    }
}
function validar_Correo() {

    let duplicate = usuarios.filter(item => item.correo	== correo.value && id_user!==item.id_usuario)    

    if (correo.value.length == 0) {
        correo.classList.add('color_rojo_inputs')
    } else {
        correo.classList.remove('color_rojo_inputs')
    }

    if (duplicate.length>0) {
        correo.classList.add('color_rojo_inputs')
        correo.classList.add('inputs_vacios')
        document.getElementById("error_mail").classList.remove("d-none")
    } else {
        correo.classList.remove('color_rojo_inputs')
        correo.classList.remove('inputs_vacios')
        document.getElementById("error_mail").classList.add("d-none")
    }
}
function validar_apellidos() {
    if (apellidos.value.length == 0) {
        document.querySelector("#apellidos").classList.add('color_rojo_inputs')
    } else {
        document.querySelector("#apellidos").classList.remove('color_rojo_inputs')
    }
}
function validar_usuario() {
    let duplicate = usuarios.filter(item => item.usuario == usuario.value && id_user!==item.id_usuario)    

    if (usuario.value.length == 0) {
        usuario.classList.add('color_rojo_inputs')
    } else {
        usuario.classList.remove('color_rojo_inputs')
    }

    if (duplicate.length>0) {
        usuario.classList.add('color_rojo_inputs')
        usuario.classList.add('inputs_vacios')
        document.getElementById("error_user").classList.remove("d-none")
    } else {
        usuario.classList.remove('color_rojo_inputs')
        usuario.classList.remove('inputs_vacios')
        document.getElementById("error_user").classList.add("d-none")
    }
}
function validar_password() {
    if (password.value.length == 0) {
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
    document.getElementById("error_user").classList.add("d-none")
    document.getElementById("error_mail").classList.add("d-none")
    document.getElementById("error_wp").classList.add("d-none")

}

function guardarusuario(event) {
    event.preventDefault();
    const formDatausuario = new FormData(formusuario);
    const API = new Api();
    if (
        (nombre.value.length == 0)
        || (id_user == 0 && password.value.length == 0 ? true : false)
        || (apellidos.value.length == 0)
        || (usuario.value.length == 0)
        || (tel.value.length == 0)
        || (whatsapp.value.length == 0)
        || (correo.value.length == 0)
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
                    let modalElement = document.getElementById('modal_form');
                    let modalInstance = bootstrap.Modal.getInstance(modalElement);
                    modalInstance.hide();
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: data.msg,
                        confirmButtonText: "Reintentar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let modalElement = document.getElementById('modal_form');
                            let modalInstance = bootstrap.Modal.getInstance(modalElement);
                            modalInstance.show();
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
                data.records.forEach(element => {
                    const array = {
                        correo: element.correo
                    }
                    correos.push(array)
                    usuarios.push(element)
                });
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
    id_user = 0
    quitar_rojo_inputs()
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
            const { nombre, apellido, usuario, correo } = item;
            if (nombre.toUpperCase().search(objDatosusuario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (apellido.toUpperCase().search(objDatosusuario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (usuario.toUpperCase().search(objDatosusuario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (correo.toUpperCase().search(objDatosusuario.filter.toUpperCase()) != -1) {
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
                    <tr style="cursor:pointer;" class="text-capitalize">
                    <td onclick="ver_detalle(${item.id_usuario})" >${index + 1}</td>
                    <td onclick="ver_detalle(${item.id_usuario})" >${item.nombre}</td>               
                    <td onclick="ver_detalle(${item.id_usuario})" >${item.apellido}</td>               
                    <td onclick="ver_detalle(${item.id_usuario})" >${item.usuario}</td>
                    <td style="color: #4942E4;cursor:pointer;" onclick="ver_detalle(${item.id_usuario})" >${item.correo}</td>
                    <td style="text-align:center">
                        <button href="#modal_form" data-bs-toggle="modal" class="btn btn-primary" onclick="editarusuario(${item.id_usuario}, false)"><img src="publico/images/edit.svg"></button>
                        <button class="btn btn-danger" onclick="eliminarusuario(${item.id_usuario})"><img src="publico/images/delete.svg"></button>
                        <button class="btn btn-info" onclick="open_mail_modal(${item.id_usuario}, false)"><img src="publico/images/mail.svg"></button>
                    </td>
                    </tr>
                `;
            }
        }
    );
    contentTableusuarios.innerHTML = html;
    crearPaginacionusuario();
}
function open_mail_modal(id) {
    const API = new Api();
    API.get("usuarios/getOneusuario?id_usuario=" + id).then(
        data => {
            let modal = new bootstrap.Modal(document.getElementById('modal_mails'));
            modal.show();
            document.getElementById("correo_usuario").innerHTML = "Enviar correo a: <br>" + data.records[0].correo
        }
    ).catch(error => {
        console.log("Error:", error);
    })
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
                    <div class="mt-3" style="width: 97%; padding-left:13%">
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
                        
                        <div class='row mb-4' style="text-align: left">
                            <div class='col-md-6 col-sm-6 col-lg-6 col-xl-6'>
                                <b class='mt-2'>Teléfono: </b> <br>
                                <label class='mt-2'>${data.records[0].tel}</label>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                                <b class="mt-2">Whatsapp: </b><br>
                                <label class='mt-2'>${data.records[0].whatsapp}</label>
                            </div>
                        </div>
                        
                        <div class='row mb-4' style="text-align: left">
                            <div class='col-md-8 col-sm-8 col-lg-8 col-xl-8'>
                                <b class='mt-2'>Correo: </b> <br>
                                <label class='mt-2' style="color: #4942E4;cursor:pointer;" onclick="open_mail_modal(${id})">${data.records[0].correo}</label>
                            </div>
                        </div>
                            
                    </div>
                    `
                }).then((result) => {
                    if (result.isConfirmed) {
                        botonusuarios.click()
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
    const { id_usuario, nombre, apellido, usuario, tipo, id_dep, tel, correo, whatsapp } = record;
    id_user = id_usuario
    document.querySelector("#id_usuario").value = id_usuario;
    document.querySelector("#nombre").value = nombre;
    document.querySelector("#apellidos").value = apellido;
    document.querySelector("#usuario").value = usuario;
    document.querySelector("#tipo").value = tipo;
    document.querySelector("#depa").value = id_dep;
    document.querySelector("#correo").value = correo;
    document.querySelector("#whatsapp").value = whatsapp;
    document.querySelector("#tel").value = tel;
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

