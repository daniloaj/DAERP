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
    const send_mail_text = document.querySelector("#send_mail");
    const cancelar = document.querySelector("#cancelar_mail");
    const mail_input = document.querySelector("#mail_pass");
    const user_input = document.querySelector("#user_forgot");

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
        send_mail_text.textContent = translations[lang]["send"];
        cancelar.textContent = translations[lang]["cancel"];
    }

    function send_mail_forgot_pass() {

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

    languageSelect.addEventListener("change", change_language);
    document.addEventListener("DOMContentLoaded", change_language);
</script>