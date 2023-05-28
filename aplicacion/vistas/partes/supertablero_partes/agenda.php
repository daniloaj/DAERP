<div class="content second-content">
        <h1>Sistema de Agenda DAERP</h1>
        <div id="contentListagenda">
          <br><button class="btn btn-success float-right" id="btnAgregaragenda">
            <i class="bi bi-plus-square-fill"></i>
            Agregar actividades
          </button>

          <div class="col-md-4">
            <div class="input-group mb-3">
              <input placeholder="Buscar registro" type="search" class="form-control" aria-describedby="basic-addon2"
                id="txtSearchagenda">
              <span class="input-group-text" id="basic-addon2">
                <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                <lord-icon src="https://cdn.lordicon.com/xfftupfv.json" trigger="loop" style="width:25px;height:25px">
                </lord-icon>
              </span>
            </div>
          </div>

          <div id="contentTableagenda">
            <table class="table table-hover" id="myTableAgenda">
              <thead>
                <th>Id <img onclick="sortTableActividades(0, 'int')" src="publico/images/flecha.png"></th>
                <th>Responsable <img onclick="sortTableActividades(1, 'str')" src="publico/images/flecha.png"></i></th>
                <th>Actividad <img onclick="sortTableActividades(2, 'str')" src="publico/images/flecha.png"></th>
                <th>Fecha Prevista <img onclick="sortTableActividades(3, 'str')" src="publico/images/flecha.png"></th>
                <th>Fecha Final<img onclick="sortTableActividades(4, 'str')" src="publico/images/flecha.png"></th>
                <th>Estado <img onclick="sortTableActividades(5, 'str')" src="publico/images/flecha.png"></th>
                <th>Opciones</th>
              </thead>
              <tbody>
                <td>1</td>
                <td>DAERP</td>
                <td>Celebrar Navidad</td>
                <td>2022-12-25</td>
                <td>2022-12-31</td>
                <td>Por iniciar</td>
                <td>
                  <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                  <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                </td>
              </tbody>
            </table>
            <div class="">
              <ul id="paginaagenda" class="pagination float-right">
                <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div id="contentFormagenda" class="d-none">
          <h4>
            Agregar Actividades (Cada campo obligatorio tendrá un asterisco)
          </h4>
          <hr>
          <form id="formagenda" enctype="multipart/form-data">
            <div class="row mb-3">
              <label for="responsables" class="col-sm-2 col-form-label">Responsable: *</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="responsables" name="responsables" required>
                <input type="hidden" name="id_agenda" id="id_agenda" value="0">
              </div>
            </div>
            <div class="row mb-3">
              <label for="actividad" class="col-sm-2 col-form-label">Actividad: *</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="actividad" name="actividad" require>
              </div>
            </div>
            <div class="row mb-3">
              <label for="fecha_prevista" class="col-sm-2 col-form-label">Fecha prevista: *</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_prevista" name="fecha_prevista" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="fecha_final" class="col-sm-2 col-form-label">Fecha final: *</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="fecha_final" name="fecha_final" required>
              </div>
            </div>
            <div class="row mb-3">
              <label for="estado" class="col-sm-2 col-form-label">Estado: *</label>
              <div class="col-sm-10">
                <select class="form-control" name="estado" id="estado">
                  <option value="Por iniciar">Por iniciar</option>
                  <option value="En proceso">En proceso</option>
                  <option value="Finalizado">Finalizado</option>
                </select>
              </div>
            </div>
            <button type="button" class="btn btn-secondary" id="btnCancelaragenda"><i class="bi bi-x-octagon-fill"></i>
              Cancelar</button>
            <button type="submit" class="btn btn-primary"><i class="bi bi-hdd-fill"></i> Guardar</button>
          </form>
        </div>
      </div>
    </div>
    
  <!--Scripts de agenda-->
  <script src="<?php echo URL ?>publico/customjs/agenda.js"></script>
  <script>
    function sortTableActividades(n, type) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;

      table = document.getElementById("myTableAgenda");
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