<?php
$languages = [
    "es" => include "aplicacion/vistas/partes/language/es.php",
    "en" => include "aplicacion/vistas/partes/language/en.php"
];
?>
<script>
    const translations = <?php echo json_encode($languages); ?>;

    const languageSelect = document.querySelector("#language");
    const userLabel = document.querySelector("#user");
    const passLabel = document.querySelector("#pass");
    const loginButton = document.querySelector("#login_b");
    const forgot_pass = document.querySelector("#forgot_pass");
    const title_forgot_pass = document.querySelector("#title_forgot_pass");
    const mail_forgot_pass = document.querySelector("#mail_forgot_pass");
    const message_forgot_pass = document.querySelector("#message_forgot_pass");
    const user_forgot_pass = document.querySelector("#user_forgot_pass");
    const send_mail = document.querySelector("#send_mail");
    const cancelar = document.querySelector("#cancelar_mail");
    const mail_input = document.querySelector("#mail_pass");
    const user_input = document.querySelector("#user_forgot");
    const loading = document.querySelector("#loading");
    const reset_pass_title = document.querySelector("#reset_pass_title");
    const message_reset_pass = document.querySelector("#message_reset_pass");
    const pass_reset = document.querySelector("#pass_reset");
    const repeat_pass = document.querySelector("#repeat_pass");
    const change_pass = document.querySelector("#change_pass");
    const loading_change_pass = document.querySelector("#loading_change_pass");
    const no_match = document.querySelector("#no_match");
    const new_pass = document.querySelector("#new_pass");
    const repeat_new_pass = document.querySelector("#repeat_new_pass");
    const cancelar_reset_password = document.querySelector("#cancelar_reset_password");
    const floatingPassword = document.querySelector("#floatingPassword");
    const floatingInputUser = document.querySelector("#floatingInput");

    send_mail.addEventListener("click", send_mail_forgot_pass);
    cancelar.addEventListener("click", cancelar_mail);
    change_pass.addEventListener("click", change_password);
    cancelar_reset_password.addEventListener("click", cancelar_reset);
    repeat_new_pass.addEventListener("input", validar_pass);
    new_pass.addEventListener("input", validar_pass);

    function change_language() {
        const lang = languageSelect.value;

        userLabel.textContent = translations[lang]["user"];
        passLabel.textContent = translations[lang]["pass"];
        loginButton.textContent = translations[lang]["login"];
        forgot_pass.textContent = translations[lang]["forgot_pass"];
        title_forgot_pass.textContent = translations[lang]["forgot_pass"];
        mail_forgot_pass.textContent = translations[lang]["mail"];
        message_forgot_pass.textContent = translations[lang]["forgot_pass_message"];
        user_forgot_pass.textContent = translations[lang]["user"];
        send_mail.textContent = translations[lang]["send"];
        cancelar.textContent = translations[lang]["cancel"];
        reset_pass_title.textContent = translations[lang]["reset_pass"];
        message_reset_pass.textContent = translations[lang]["new_pass"];
        pass_reset.textContent = translations[lang]["pass"];
        repeat_pass.textContent = translations[lang]["new_pass_repite"];
        change_pass.textContent = translations[lang]["accept"];
        no_match.textContent = translations[lang]["no_match_pass"];
    }

    function send_mail_forgot_pass() {

        send_mail.classList.add("d-none")
        loading.classList.remove("d-none")

        const formData = new FormData();

        formData.append("mail", mail_input.value);
        formData.append("user", user_input.value);
        formData.append("lang", languageSelect.value);

        API.post(formData, "login/send_mail").then(response => {
            cancelar_mail()
            Swal.fire({
                icon: "info",
                text: response.msg
            });
        }).catch(error => {
            console.log(error);
        })
    }

    function cancelar_mail() {
        let modalElement = document.getElementById('modal_mails');
        let modalInstance = bootstrap.Modal.getInstance(modalElement);
        modalInstance.hide();
        document.getElementById("user_forgot").value = ""
        document.getElementById("mail_pass").value = ""
        send_mail.classList.remove("d-none")
        loading.classList.add("d-none")
    }

    function change_password(params) {
        let contra = new_pass.value
        let lang = languageSelect.value
        change_pass.classList.add("d-none")
        change_passloading_change_pass.classList.remove("d-none")
        const API = new Api();
        const formData = new FormData();
        formData.append("user", floatingInputUser.value)
        formData.append("pass", contra)
        API.post(formData, "login/change_pass").then(
            data => {
                if (data.success) {
                    Swal.fire({
                        icon: "success",
                        text: translations[lang]["success_reset_pass"]
                    });
                    floatingPassword.value = contra
                    const formData = new FormData(form);
                    API.post(formData, "login/validar").then(
                        data => {
                            if (data.success_reset) {
                                rehacer_contra.click()
                            } else {
                                if (data.success) {
                                    window.location = data.url;
                                } else {
                                    mensaje.classList.remove("d-none");
                                    mensaje.innerHTML = data.msg;
                                }
                            }
                        }
                    ).catch(
                        error => {
                            console.error("Error", error);
                        }
                    );
                } else {
                    Swal.fire({
                        icon: "error",
                    });
                }
            }
        ).catch(
            error => {
                console.error("Error", error);
            }
        );
        cancelar_reset()
    }

    function validar_pass() {
        let contra = new_pass.value
        let contra_repetir = repeat_new_pass.value
        if (contra !== contra_repetir) {
            no_match.classList.remove("d-none")
        } else {
            no_match.classList.add("d-none")
            change_pass.classList.remove("disabled")
        }
    }

    function cancelar_reset() {
        change_pass.classList.remove("d-none")
        change_passloading_change_pass.classList.add("d-none")
        new_pass.value = ""
        repeat_new_pass.value = ""
        let modalElement = document.getElementById('modal_rehacer_pass');
        let modalInstance = bootstrap.Modal.getInstance(modalElement);
        modalInstance.hide();
    }
    languageSelect.addEventListener("change", change_language);
    document.addEventListener("DOMContentLoaded", change_language);
</script>