<div class="content second-content">
    <h1>Sistema de Inventario DAERP</h1>
    <br>
    <div id="contentListinventario">
        <button class="btn btn-success float-right" id="btnAgregarinventario">
            <i class="bi bi-plus-square-fill"></i>
            Agregar inventario
        </button>

        <div class="col-md-4">
            <div class="input-group mb-3">
                <input placeholder="Buscar registro" type="search" class="form-control" aria-describedby="basic-addon2"
                    id="txtSearchinventario">
                <span class="input-group-text" id="basic-addon2">
                    <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                    <lord-icon src="https://cdn.lordicon.com/xfftupfv.json" trigger="loop"
                        style="width:25px;height:25px">
                    </lord-icon></i>
                </span>
            </div>
        </div>

        <div id="contentTableinventario">
            <table style="font-size: 15px" class="table table-hover" id="myTableinventario">
                <thead>
                    <th>Id <img onclick="sortTableinventario(0, 'int')" src="publico/images/flecha.png"></th>
                    <th>Producto <img onclick="sortTableinventario(1, 'str')" src="publico/images/flecha.png"></th>
                    <th>Costo <img onclick="sortTableinventario(2, 'str')" src="publico/images/flecha.png"></th>
                    <th>Cantidad <img onclick="sortTableinventario(3, 'str')" src="publico/images/flecha.png"></th>
                    <th>Total<img onclick="sortTableinventario(4, 'str')" src="publico/images/flecha.png"></th>
                    <th>Fecha <img onclick="sortTableinventario(5, 'str')" src="publico/images/flecha.png"></th>
                    <th>Proveedor <img onclick="sortTableinventario(6, 'str')" src="publico/images/flecha.png"></th>
                    <th>N° factura <img onclick="sortTableinventario(7, 'str')" src="publico/images/flecha.png"></th>
                    <th>Responsable <img onclick="sortTableinventario(8, 'str')" src="publico/images/flecha.png"></th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <td>1</td>
                    <td>Bocina</td>
                    <td>$100</td>
                    <td>1</td>
                    <td>$100</td>
                    <td>2022-11-2</td>
                    <td>Siman</td>
                    <td>220025</td>
                    <td>DAERP</td>
                    <td>
                        <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                        <button class="btn btn-danger">
                            <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                            <lord-icon src="https://cdn.lordicon.com/kfzfxczd.json" trigger="hover"
                                colors="primary:#ffffff" style="width:15px;height:15px">
                            </lord-icon>
                        </button>
                    </td>
                </tbody>
            </table>
            <div>
                <ul id="paginainven" class="pagination float-right">
                    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="contentForminventario" class="d-none formulario">
        <h4>
            Agregar Inventario
        </h4>
        <hr>
        <form id="forminventario" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="insumo" class="mt-2" >Producto:  </label>
                <div  class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <input type="text" class="form-control" id="insumo" name="insumo"  >
                    <input type="hidden" name="id_inventario" id="id_inventario" value="0">
                </div>
                <label for="precio" class="mt-2">Costo unitario:  </label>
                <div  class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <input type="float" class="form-control" id="precio" name="precio"  >
                </div>
            </div>
            <div class="row mb-3">
            </div>
            <div class="row mb-3">
                <label for="unidades" class="mt-2"  >Cantidad:  </label>
                <div  class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <input type="number" class="form-control" id="unidades" name="unidades"  >
                </div>
                <label for="fecha" class="mt-2" >Fecha compra:  </label>
                <div  class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <input type="date" class="form-control" id="fecha" name="fecha"  >
                </div>
            </div>

            <div class="row mb-3">
                <label for="provee" class="mt-2" >Proveedor:</label>
                <div  class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <select class="form-control" name="provee" id="provee">
                        <?php
                        // Verificamos la conexión con el servidor y la base de datos
                        $mysqli = new mysqli('localhost', 'root', 'asd', 'daerp');
                        $query = $mysqli->query("SELECT id_proveedor, empresa FROM proveedores ");
                        while ($valores = mysqli_fetch_array($query)) {
                            echo '<option value="' . $valores[id_proveedor] . '">' . $valores[empresa] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <label for="n_factura" class="mt-2" >N° factura:  </label>
                <div  class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <input type="text" class="form-control " style="width: 110%;" id="n_factura" name="n_factura"  >
                </div>
            </div>
            <div class="row mb-3">
                <label for="comprador" class="mt-2" >Responsable:  </label>
                <div  class="col-md-9 col-sm-9 col-lg-9 col-xl-9">
                    <input type="text" class="form-control" style="width: 105%" id="comprador" name="comprador"  >
                </div>
            </div>

            <button type="button" class="btn btn-secondary" id="btnCancelarinventario"><i
                    class="bi bi-x-octagon-fill"></i> Cancelar</button>
            <button type="submit" class="btn btn-primary"><i class="bi bi-hdd-fill"></i> Guardar</button>
        </form>
    </div>
</div>
  <!--Scripts de inventario-->
  <script src="<?php echo URL ?>publico/customjs/inventario.js"></script>
  <script>
    function sortTableinventario(n, type) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

      table = document.getElementById("myTableinventario");
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