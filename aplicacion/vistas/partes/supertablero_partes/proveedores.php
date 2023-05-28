<div class="content second-content">
    <h1>Sistema de Proveedores DAERP</h1>
    <br>
    <div id="contentListProveedores">
        <button class="btn btn-success float-right" id="btnAgregarProveedores">
            <i class="bi bi-plus-square-fill"></i>
            Agregar proveedor
        </button>

        <div class="col-md-4">
            <div class="input-group mb-3">
                <input placeholder="Buscar registro" type="search" class="form-control" aria-describedby="basic-addon2"
                    id="txtSearchProveedores">
                <span class="input-group-text" id="basic-addon2">
                    <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                    <lord-icon src="https://cdn.lordicon.com/xfftupfv.json" trigger="loop"
                        style="width:25px;height:25px">
                    </lord-icon></i>
                </span>
            </div>
        </div>

        <div id="contentTableProveedores">
            <table class="table table-hover" id="myTableProveedores">
                <thead>
                    <th>Id <img onclick="sortTableProveedores(0, 'int')" src="publico/images/flecha.png"></th>
                    <th>Proveedor <img onclick="sortTableProveedores(1, 'str')" src="publico/images/flecha.png"></th>
                    <th>Representante <img onclick="sortTableProveedores(2, 'str')" src="publico/images/flecha.png">
                    </th>
                    <th>Tel. 1 <img onclick="sortTableProveedores(3, 'str')" src="publico/images/flecha.png"></th>
                    <th>Tel. 2<img onclick="sortTableProveedores(4, 'str')" src="publico/images/flecha.png"></th>
                    <th>Fax <img onclick="sortTableProveedores(5, 'str')" src="publico/images/flecha.png"></th>
                    <th>Email <img onclick="sortTableProveedores(6, 'str')" src="publico/images/flecha.png"></th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>Siman</td>
                    <td>Carlos Ballarta</td>
                    <td>2458-9636</td>
                    <td>7585-6324</td>
                    <td>Carlos.Ballarta@siman.com</td>
                    <td>4585-6324</td>
                    <td>
                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </td>
                </tbody>
            </table>
            <div class="">
                <ul id="paginaPro" class="pagination float-right">
                    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="contentFormProveedores" class="d-none">
        <h4>
            Agregar Proveedores (Cada campo obligatorio tendrá un asterisco)
        </h4>
        <hr>
        <form id="formProveedores" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="empresa" class="col-sm-2 col-form-label">Proveedor: *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="empresa" name="empresa" required>
                    <input type="hidden" name="id_proveedor" id="id_proveedor" value="0">
                </div>
            </div>
            <div class="row mb-3">
                <label for="representante" class="col-sm-2 col-form-label">Representante:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="representante" name="representante">
                </div>
            </div>
            <div class="row mb-3">
                <label for="tel1" class="col-sm-2 col-form-label">Tel1: *</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tel1" name="tel1" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="tel2" class="col-sm-2 col-form-label">Tel2:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tel2" name="tel2">
                </div>
            </div>

            <div class="row mb-3">
                <label for="fax" class="col-sm-2 col-form-label">Fax:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fax" name="fax">
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email">
                </div>
            </div>
            <button type="button" class="btn btn-secondary" id="btnCancelarProveedor"><i
                    class="bi bi-x-octagon-fill"></i> Cancelar</button>
            <button type="submit" class="btn btn-primary"><i class="bi bi-hdd-fill"></i> Guardar</button>
        </form>
    </div>
</div>
<script src="<?php echo URL ?>publico/customjs/proveedor.js"></script>
<script>
    function sortTableProveedores(n, type) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

        table = document.getElementById("myTableProveedores");
        switching = true;
        dir = "asc";

        while (switching) {
            switching = false;
            rows = table.rows;
            for (i = 1; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                if (dir == "asc") {
                    if ((type == "str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type == "int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if ((type == "str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type == "int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>