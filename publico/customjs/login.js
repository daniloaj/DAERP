//llamamos los elementos del login
const mensaje = document.querySelector("#mensaje");
const form = document.querySelector("#formlogin");
const cancelar_mail_button = document.querySelector("#cancelar_mail");
const send_mail = document.querySelector("#send_mail");
const mail = document.querySelector("#mail_pass");
const user = document.querySelector("#user_forgot");

//llamamos el evento submit del post 
form.addEventListener("submit", login);
cancelar_mail_button.addEventListener("click", cancelar_mail);
send_mail.addEventListener("click", send_mail_forgot_pass);
user.addEventListener("input", valid_mail_user);
mail.addEventListener("input", valid_mail_user);

const API = new Api();

async function login(event) {
    event.preventDefault();
    // const API = new Api();
    const formData = new FormData(form);
    API.post(formData, "login/validar").then(
        data => {
            if (data.success) {
                window.location = data.url;
            } else {
                mensaje.classList.remove("d-none");
                mensaje.innerHTML = data.msg;
            }
        }
    ).catch(
        error => {
            console.error("Error", error);
        }
    );
}

function cancelar_mail() {
    let modalElement = document.getElementById('modal_mails');
    let modalInstance = bootstrap.Modal.getInstance(modalElement);
    modalInstance.hide();
    document.getElementById("user_forgot").value = ""
    document.getElementById("mail_pass").value = ""
}

function valid_mail_user() {
    if (user.value == "" || mail.value == "") {
        send_mail.classList.add("disabled")
    } else {
        send_mail.classList.remove("disabled")
    }
}