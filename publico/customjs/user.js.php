<?php
$languages = [
    "es" => include "aplicacion/vistas/partes/language/es.php",
    "en" => include "aplicacion/vistas/partes/language/en.php"
];
?>
<script>
    const translations = <?php echo json_encode($languages); ?>;
    const lang = sessionStorage.getItem("lang");

    function change_language() {

        const edit_tooltip = document.querySelectorAll(".edit_tooltip");
        edit_tooltip.forEach(function(element) {
            element.textContent = translations[lang]["edit"];
        });

        const delete_tooltip = document.querySelectorAll(".delete_tooltip");
        delete_tooltip.forEach(function(element) {
            element.textContent = translations[lang]["delete"];
        });

        const mail_tooltip = document.querySelectorAll(".mail_tooltip");
        mail_tooltip.forEach(function(element) {
            element.textContent = translations[lang]["send_mail"];
        });

        const reset_tooltip = document.querySelectorAll(".reset_tooltip");
        reset_tooltip.forEach(function(element) {
            element.textContent = translations[lang]["reset_pass"];
        });

    }
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
        let duplicate = usuarios.filter(item => item.whatsapp == whatsapp.value && id_user !== item.id_usuario)
        if (whatsapp.value.length == 0) {
            whatsapp.classList.add('color_rojo_inputs')
            whatsapp.classList.add('inputs_vacios')
        } else {
            whatsapp.classList.remove('color_rojo_inputs')
            whatsapp.classList.remove('inputs_vacios')
        }

        if (duplicate.length > 0) {
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

        let duplicate = usuarios.filter(item => item.correo == correo.value && id_user !== item.id_usuario)

        if (correo.value.length == 0) {
            correo.classList.add('color_rojo_inputs')
        } else {
            correo.classList.remove('color_rojo_inputs')
        }

        if (duplicate.length > 0) {
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
        let duplicate = usuarios.filter(item => item.usuario == usuario.value && id_user !== item.id_usuario)

        if (usuario.value.length == 0) {
            usuario.classList.add('color_rojo_inputs')
        } else {
            usuario.classList.remove('color_rojo_inputs')
        }

        if (duplicate.length > 0) {
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
            (nombre.value.length == 0) ||
            (id_user == 0 && password.value.length == 0 ? true : false) ||
            (apellidos.value.length == 0) ||
            (usuario.value.length == 0) ||
            (tel.value.length == 0) ||
            (whatsapp.value.length == 0) ||
            (correo.value.length == 0)
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
                const {
                    nombre,
                    apellido,
                    usuario,
                    correo
                } = item;
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

                <div class="tooltip-container">
                    <button href="#modal_form" data-bs-toggle="modal" class="btn btn-primary tooltip-target" onclick="editarusuario(${item.id_usuario}, false)"><img src="publico/images/edit.svg"></button>
                    <span class="tooltip-text-blue edit_tooltip"></span>
                </div>

                <div class="tooltip-container">
                    <button class="btn btn-danger" onclick="eliminarusuario(${item.id_usuario})"><img src="publico/images/delete.svg"></button>
                    <span class="tooltip-text-red delete_tooltip"></span>
                </div>

                <div class="tooltip-container">
                    <button class="btn btn-info" onclick="open_mail_modal(${item.id_usuario}, false)"><img src="publico/images/mail.svg"></button>
                    <span class="tooltip-text-lightblue mail_tooltip"></span>
                </div>

                <div class="tooltip-container">
                    <button class="btn btn-warning" onclick="reset_pass(${item.id_usuario})">
                        <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="-5.2 -5.2 62.40 62.40" enable-background="new 0 0 52 52" xml:space="preserve" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M42,23H10c-2.2,0-4,1.8-4,4v19c0,2.2,1.8,4,4,4h32c2.2,0,4-1.8,4-4V27C46,24.8,44.2,23,42,23z M31,44.5 c-1.5,1-3.2,1.5-5,1.5c-0.6,0-1.2-0.1-1.8-0.2c-2.4-0.5-4.4-1.8-5.7-3.8l3.3-2.2c0.7,1.1,1.9,1.9,3.2,2.1c1.3,0.3,2.6,0,3.8-0.8 c2.3-1.5,2.9-4.7,1.4-6.9c-0.7-1.1-1.9-1.9-3.2-2.1c-1.3-0.3-2.6,0-3.8,0.8c-0.3,0.2-0.5,0.4-0.7,0.6L26,37h-9v-9l2.6,2.6 c0.4-0.4,0.9-0.8,1.3-1.1c2-1.3,4.4-1.8,6.8-1.4c2.4,0.5,4.4,1.8,5.7,3.8C36.2,36.1,35.1,41.7,31,44.5z"></path> <path d="M10,18.1v0.4C10,18.4,10,18.3,10,18.1C10,18.1,10,18.1,10,18.1z"></path> <path d="M11,19h4c0.6,0,1-0.3,1-0.9V18c0-5.7,4.9-10.4,10.7-10C32,8.4,36,13,36,18.4v-0.3c0,0.6,0.4,0.9,1,0.9h4 c0.6,0,1-0.3,1-0.9V18c0-9.1-7.6-16.4-16.8-16c-8.5,0.4-15,7.6-15.2,16.1C10.1,18.6,10.5,19,11,19z"></path> </g> </g></svg>
                    </button>
                    <span class="tooltip-text-yellow reset_tooltip"></span>
                </div>
                    
                       
                </td>
                </tr>
            `;
                }
            }
        );
        contentTableusuarios.innerHTML = html;
        crearPaginacionusuario();
        change_language(); // esta funcion viene de user.js.php
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

    function select_user(id) {
        let ususario_selected = objDatosusuario.records.filter(item => item.id_usuario == id)
        return ususario_selected[0]
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
            objDatosusuario.currentPage = (objDatosusuario.currentPage == totalPage ?
                totalPage : ++objDatosusuario.currentPage);
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
        const {
            id_usuario,
            nombre,
            apellido,
            usuario,
            tipo,
            id_dep,
            tel,
            correo,
            whatsapp
        } = record;
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

    function reset_pass(id) {
        const usr = select_user(id);
        Swal.fire({
            title: translations[lang]["reset_pass_title"],
            showCancelButton: true,
            confirmButtonText: translations[lang]["reset_pass"],
            cancelButtonText: translations[lang]["cancel"],
            width: 400,
            preConfirm: () => {
                return new Promise((resolve, reject) => {
                    const API = new Api();
                    API.get("usuarios/reset_pass?id=" + usr.id_usuario + "&username=" + usr.usuario).then(
                        data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: "success",
                                    text: data.msg
                                });
                                resolve(); // Cierra el modal cuando la respuesta es exitosa
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text: data.msg
                                });
                                reject(); // No cierra el modal en caso de error
                            }
                        }
                    ).catch(
                        error => {
                            console.log("Error:", error);
                            reject(); // En caso de error en la consulta, no cerrar el modal
                        }
                    );
                });
            }
        });
    }
</script>