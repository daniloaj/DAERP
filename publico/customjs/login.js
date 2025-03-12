//llamamos los elementos del login
const mensaje = document.querySelector("#mensaje");
const form = document.querySelector("#formlogin");

//llamamos el evento submit del post 
form.addEventListener("submit", login);
const API = new Api();
//de forma asincrona validamos el usuario, si hay un error con los datos no nos dejará pasar
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
