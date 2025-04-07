const sidebar_user_txt = document.getElementById("sidebar_user_txt");
const sidebar_user_img = document.getElementById("sidebar_user_img");
const home_txt = document.getElementById("home_txt");
const home_img = document.getElementById("home_img");
const compras_img = document.getElementById("compras_img");
const compras_txt = document.getElementById("compras_txt");
const home = document.getElementById("home");

const urlActual = window.location.href;

const partes = urlActual.split('/');

const modulo = partes[partes.length - 1];
const color_azul = "rgba(13,110,253,255)"

switch (modulo) {
    case "compras":
        compras_img.setAttribute("fill", color_azul)
        compras_txt.style.color = color_azul
        break;
    case "ventas":
        sidebar_user_img.setAttribute("fill", color_azul)
        sidebar_user_txt.style.color = color_azul
        break;
    case "inventario":
        sidebar_user_img.setAttribute("fill", color_azul)
        sidebar_user_txt.style.color = color_azul
        break;
    case "agenda":
        sidebar_user_img.setAttribute("fill", color_azul)
        sidebar_user_txt.style.color = color_azul
        break;
    case "usuarios":
        sidebar_user_img.setAttribute("fill", color_azul)
        sidebar_user_txt.style.color = color_azul
        break;
    case "contacto":
        sidebar_user_img.setAttribute("fill", color_azul)
        sidebar_user_txt.style.color = color_azul
        break;

    default:
        home_img.setAttribute("fill", color_azul)
        home_txt.style.color = color_azul
        break;
}
