let tabla_inventario = document.querySelector("#contentTableinventario table tbody");
const txtSearchinventario = document.querySelector("#txtSearchinventario");
const paginainventario = document.querySelector("#paginainven");
const objDatosinventario = {
    records: [],
    recordsFilter: [],
    currentPage: 1,
    recordsShow: 6,
    filter: ""
};
eventListiners();

function eventListiners() {
    document.addEventListener("DOMContentLoaded", cargarDatosinventario);
    txtSearchinventario.addEventListener("input", aplicarFiltroinventario);
}

function aplicarFiltroinventario(element) {
    element.preventDefault();
    objDatosinventario.filter = this.value;
    crearTablainventario();
}

function cargarDatosinventario() {
    const API = new Api();
    API.get("inventario/getAllinventario").then(
        data => {
            if (data.success) {
                objDatosinventario.records = data.records;
                objDatosinventario.currentPage = 1;
                crearTablainventario();
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

function crearTablainventario() {
    if (objDatosinventario.filter === "") {
        objDatosinventario.recordsFilter = objDatosinventario.records.map(item => item);
    } else {
        objDatosinventario.recordsFilter = objDatosinventario.records.filter(item => {
            const { insumo, precio, unidades  } = item;
            if (insumo.toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (precio.toString().toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
            if (unidades.toString().toUpperCase().search(objDatosinventario.filter.toUpperCase()) != -1) {
                return item;
            }
        });
    }
    const recordIni = (objDatosinventario.currentPage * objDatosinventario.recordsShow) - objDatosinventario.recordsShow;
    const recordFin = (recordIni + objDatosinventario.recordsShow) - 1;
    let html = "";
    objDatosinventario.recordsFilter.forEach(
        (item, index) => {
            if ((index >= recordIni) && (index <= recordFin)) {
                html += `
                        <tr>
                        <td>${index + 1}</td>
                        <td data-toggle="tooltip" title="${item.insumo}" >${truncate(item.insumo, 15)}</td>               
                        <td style="text-align:center">${item.precio}</td>               
                        <td style="text-align:center">${item.unidades}</td>
                        </tr>
                    `;
            }
        }
    );
        tabla_inventario.innerHTML = html;
    crearPaginacioninventario();
}
function truncate(text, value) {
    if (text.length > value) {
        return text.slice(0, value) + '...'
    }
    return text
}
function crearPaginacioninventario() {

    paginainventario.innerHTML = "";

    const elAnterior = document.createElement("li");
    elAnterior.classList.add("page-item");
    elAnterior.innerHTML = `<a class="page-link" href="#">Anterior</a>`;
    elAnterior.onclick = () => {
        objDatosinventario.currentPage = (objDatosinventario.currentPage == 1 ? 1 : --objDatosinventario.currentPage);
        crearTablainventario();
    };
    paginainventario.append(elAnterior);

    const totalPage = Math.ceil(objDatosinventario.recordsFilter.length / objDatosinventario.recordsShow);
    for (let i = 1; i <= totalPage; i++) {
        const el = document.createElement("li");
        el.classList.add("page-item");
        el.innerHTML = `<a class="page-link" href="#">${i}</a>`;
        el.onclick = () => {
            objDatosinventario.currentPage = i;
            crearTablainventario();
        };
        paginainventario.append(el);
    }

    const elSiguiente = document.createElement("li");
    elSiguiente.classList.add("page-item");
    elSiguiente.innerHTML = `<a class="page-link" href="#">Siguiente</a>`;
    elSiguiente.onclick = () => {
        objDatosinventario.currentPage = (objDatosinventario.currentPage == totalPage
            ? totalPage : ++objDatosinventario.currentPage);
        crearTablainventario();
    };
    paginainventario.append(elSiguiente);
}
