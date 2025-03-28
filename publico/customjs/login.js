//llamamos los elementos del login
const mensaje = document.querySelector("#mensaje");
const form = document.querySelector("#formlogin");
const mail = document.querySelector("#mail_pass");
const rehacer_contra = document.querySelector("#rehacer_contra");
const user = document.querySelector("#user_forgot");

//llamamos el evento submit del post 
form.addEventListener("submit", login);
user.addEventListener("input", valid_mail_user);
mail.addEventListener("input", valid_mail_user);

const API = new Api();

async function login(event) {
    event.preventDefault();
    // const API = new Api();
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
}

function valid_mail_user() {
    if (user.value == "" || mail.value == "") {
        send_mail.classList.add("disabled")
    } else {
        send_mail.classList.remove("disabled")
    }
}