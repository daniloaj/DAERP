//llamamos los elementos del login
const mensaje = document.querySelector("#mensaje");
const form = document.querySelector("#formlogin");

//llamamos el evento submit del post 
form.addEventListener("submit", login);
document.addEventListener("DOMContentLoaded", getDepartament);

//de forma asincrona validamos el usuario, si hay un error con los datos no nos dejará pasar
async function login(event) {
    event.preventDefault();
    const API = new Api();
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
function getDepartament() {
    const API = new Api();

    API.get("login/departamentList").then(response => {
        console.log(response);
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