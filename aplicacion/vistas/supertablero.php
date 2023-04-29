<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
    <title>DAERP</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Archivos adicionales CSS -->
    <link rel="stylesheet" href="publico/css/super.css">

  </head>

  <body>
  <!--Simbolo de secuencia de carga-->
    <div class="sequence">
  
      <div class="seq-preloader">
        <svg width="39" height="16" viewBox="0 0 39 16" xmlns="http://www.w3.org/2000/svg" class="seq-preload-indicator"><g fill="#F96D38"><path class="seq-preload-circle seq-preload-circle-1" d="M3.999 12.012c2.209 0 3.999-1.791 3.999-3.999s-1.79-3.999-3.999-3.999-3.999 1.791-3.999 3.999 1.79 3.999 3.999 3.999z"/><path class="seq-preload-circle seq-preload-circle-2" d="M15.996 13.468c3.018 0 5.465-2.447 5.465-5.466 0-3.018-2.447-5.465-5.465-5.465-3.019 0-5.466 2.447-5.466 5.465 0 3.019 2.447 5.466 5.466 5.466z"/><path class="seq-preload-circle seq-preload-circle-3" d="M31.322 15.334c4.049 0 7.332-3.282 7.332-7.332 0-4.049-3.282-7.332-7.332-7.332s-7.332 3.283-7.332 7.332c0 4.05 3.283 7.332 7.332 7.332z"/></g></svg>
      </div>
      
    </div>
  <!--Fin del simbolo de secuencia de carga-->

    <!--Logo de cbues-->
        <div class="logo">
            <img style="width: 100%; margin-top: 25px;" src="publico/images/logo_nombre.png" alt="">
        </div>
    <!--Fin de logo de cbues-->

<!--Sidebar de opciones-->
        <nav>
          <ul>
            <li>
              <a href="#1"><em>
                <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/osuxyevn.json"
                    trigger="loop"
                    delay="2000"
                    colors="primary:#ffffff"
                    style="width: 32px;height:32px">
                </lord-icon>
                Inicio</em>
              </a>
            </li> 

            <li>
             <a href="#2"><em>
              <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
              <lord-icon
                  src="https://cdn.lordicon.com/isugonwi.json"
                  trigger="loop"
                  delay="2000"
                  colors="primary:#ffffff"
                  style="width:32px;height:32px">
              </lord-icon>
                Inventario</em>
              </a>
            </li> 
              
              <li>
                <a href="#3"><em>
                <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/medpcfcy.json"
                    trigger="loop"
                    delay="2000"
                    colors="primary:#ffffff"
                    style="width:32px;height:32px">
                </lord-icon>
                Compras para eventos</em>
              </a>
            </li>

            <li>
              <a href="#4"><em>
                <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/bhfjfgqz.json"
                    trigger="loop"
                    delay="2000"
                    colors="primary:#ffffff"
                    style="width:32px;height:32px">
                </lord-icon>
                Proveedores</em>
              </a>
            </li>

            <li>
              <a href="#5"><em>
              <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/fbdgkenc.json"
                    trigger="loop"
                    delay="2000"
                    colors="primary:#ffffff"
                    style="width:32px;height:32px">
                </lord-icon>
                Usuarios</em>
              </a>
            </li>

            <li>
              <a href="#6"><em>
                <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                <lord-icon
                    src="https://cdn.lordicon.com/qjuahhae.json"
                    trigger="loop"
                    delay="2000"
                    colors="primary:#ffffff"
                    style="width:32px;height:32px">
                </lord-icon>
                Agenda</em>
              </a>
            </li>

          </ul>
        </nav>

        <a class="reportes" href="<?php  echo URL;?>superreportes">
          <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
          <lord-icon
              src="https://cdn.lordicon.com/vufjamqa.json"
              trigger="loop"
              delay="2000"
              colors="primary:#ffffff"
              style="width:32px;height:32px">
          </lord-icon>
          REPORTES
        </a>

        <a class="salir" href="<?php echo URL;?>login/cerrar">
            Cerrar Sesión
        </a>
        

<!--Slides de inicio para ver los manuales de compras y agenda-->
        <div class="slides">
          <div class="slide" id="1">
            <div id="slider-wrapper">
                
<!--Imagenes del pie de la pagina de inicio-->
              <div id="thumbnail">
                <ul>
                  <li style="color: white;">Departamento de <br> "Contabilidad"<img src="publico/images/contabilidad.jpg" alt="" /></li>
                  <li style="color: white;">Departamento de <br> "Recursos humanos"<img src="publico/images/rh.png" alt="" /></li>
                  <li style="color: white;">Departamento de<br> "Marketing"<img src="publico/images/marketing.jpg" alt="" /></li>
                  <li style="color: white;">Departamento de<br> "Comercial"<img src="publico/images/comercio.png" alt="" /></li>
                  <li style="color: white;">Departamento de<br> "Compras"<img src="publico/images/compras.jpg" alt="" /></li>
                  <li style="color: white;">Departamento de<br> "Logistica"<img src="publico/images/logistica.png" alt="" /></li>
                  <li style="color: white;">Departamento de<br> "Control de gestión"<img src="publico/images/gestion.jpg" alt="" /></li>
                  <li style="color: white;">Departamento de<br> "Dirección general"<img src="publico/images/direccion.jpg" alt="" /></li>
                  <li style="color: white;">Comité de<br> "Dirección"<img src="publico/images/jefazos.jpg" alt="" /></li>
                </ul>
              </div>
          </div>
        </div>
<!--Inventario-->
    <div class="slide" id="2">
          <div class="content second-content">
            <h1>Sistema de Inventario OT-CBUES</h1>
            <br>
            <div id="contentListinventario">
            <button class="btn btn-success float-right" id="btnAgregarinventario">
              <i class="bi bi-plus-square-fill"></i>
              Agregar inventario
            </button>

            <div class="col-md-4">
              <div class="input-group mb-3">
                  <input placeholder="Buscar registro" type="search" class="form-control" aria-describedby="basic-addon2" id="txtSearchinventario">
                  <span class="input-group-text" id="basic-addon2">
                    <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                    <lord-icon
                        src="https://cdn.lordicon.com/xfftupfv.json"
                        trigger="loop"
                        style="width:25px;height:25px">
                    </lord-icon></i></span>
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
                      <td>OT-CBUES</td>
                      <td>
                          <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-danger"><script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                            <lord-icon
                                src="https://cdn.lordicon.com/kfzfxczd.json"
                                trigger="hover"
                                colors="primary:#ffffff"
                                style="width:15px;height:15px">
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
        <div id="contentForminventario" class="d-none">
                <h4>
                   Agregar Inventario (Cada campo obligatorio tendrá un asterisco)
                </h4>
                <hr>
                <form id="forminventario" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="insumo" class="col-sm-2 col-form-label">Producto: *</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="insumo" name="insumo" required>
                        <input type="hidden" name="id_inventario" id="id_inventario" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="precio" class="col-sm-2 col-form-label">Costo unitario: *</label>
                        <div class="col-sm-10">
                        <input type="float" class="form-control" id="precio" name="precio" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="unidades" class="col-sm-2 col-form-label">Cantidad: *</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="unidades" name="unidades" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fecha" class="col-sm-2 col-form-label">Fecha compra: *</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="provee" class="col-sm-2 col-form-label">Proveedor:</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="provee" id="provee">
                            <option value="No especificado">Proveedores</option>
                            <?php
                            // Verificamos la conexión con el servidor y la base de datos
                              $mysqli = new mysqli('localhost', 'root', 'asd', 'cbues_agenda_compra');
                              $query = $mysqli -> query ("SELECT id_proveedor, empresa FROM proveedores ");
                              while ($valores = mysqli_fetch_array($query)) {
                              echo '<option value="'.$valores[id_proveedor].'">'.$valores[empresa].'</option>';
                              }
                            ?>                        
                          </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="n_factura" class="col-sm-2 col-form-label">N° factura: *</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="n_factura" name="n_factura" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="comprador" class="col-sm-2 col-form-label">Responsable: *</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="comprador" name="comprador" required>
                        </div>
                    </div>

                    <button type="button" class="btn btn-secondary" id="btnCancelarinventario"><i class="bi bi-x-octagon-fill"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-hdd-fill"></i> Guardar</button>
                </form>
            </div>
            </div>
        </div>
<!--Compras para eventos-->
        <div class="slide" id="2">
          <div class="content second-content">
            <h1>Sistema de Compras OT-CBUES</h1>
            <br>
            <div id="contentListCompras">
            <button class="btn btn-success float-right" id="btnAgregarCompras">
              <i class="bi bi-plus-square-fill"></i>
              Agregar compras
            </button>

            <div class="col-md-4">
              <div class="input-group mb-3">
                  <input placeholder="Buscar registro" type="search" class="form-control" aria-describedby="basic-addon2" id="txtSearchCompras">
                  <span class="input-group-text" id="basic-addon2">
                    <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                    <lord-icon
                        src="https://cdn.lordicon.com/xfftupfv.json"
                        trigger="loop"
                        style="width:25px;height:25px">
                    </lord-icon></i></span>
              </div>
            </div>
              
            <div id="contentTableCompras">
              <table style="font-size: 15px" class="table table-hover" id="myTableCompras">
                  <thead>
                      <th>Id <img onclick="sortTableCompras(0, 'int')" src="publico/images/flecha.png"></th>
                      <th>Producto <img onclick="sortTableCompras(1, 'str')" src="publico/images/flecha.png"></th>
                      <th>Costo <img onclick="sortTableCompras(2, 'str')" src="publico/images/flecha.png"></th>
                      <th>Cantidad <img onclick="sortTableCompras(3, 'str')" src="publico/images/flecha.png"></th>
                      <th>Total<img onclick="sortTableCompras(4, 'str')" src="publico/images/flecha.png"></th>
                      <th>Fecha <img onclick="sortTableCompras(5, 'str')" src="publico/images/flecha.png"></th>
                      <th>Proveedor <img onclick="sortTableCompras(6, 'str')" src="publico/images/flecha.png"></th>
                      <th>N° factura <img onclick="sortTableCompras(7, 'str')" src="publico/images/flecha.png"></th>
                      <th>Responsable <img onclick="sortTableCompras(8, 'str')" src="publico/images/flecha.png"></th>
                      <th>Proyecto <img onclick="sortTableCompras(9, 'str')" src="publico/images/flecha.png"></th>
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
                      <td>OT-CBUES</td>
                      <td>Celebración de navidad</td>
                      <td>
                          <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-danger"><script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                            <lord-icon
                                src="https://cdn.lordicon.com/kfzfxczd.json"
                                trigger="hover"
                                colors="primary:#ffffff"
                                style="width:15px;height:15px">
                            </lord-icon>
                          </button>
                      </td>
                  </tbody>
                </table>
                <div>
                    <ul id="compraspagina" class="pagination float-right">
                        <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                    </ul>
                </div>
            </div>
          </div>
        <div id="contentFormCompras" class="d-none">
                <h4>
                   Agregar Compras (Cada campo obligatorio tendrá un asterisco)
                </h4>
                <hr>
                <form id="formcompra" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="producto" class="col-sm-2 col-form-label">Producto o servicio: *</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="producto" name="producto" required>
                        <input type="hidden" name="id_compra" id="id_compra" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="costo" class="col-sm-2 col-form-label">Costo unitario: *</label>
                        <div class="col-sm-10">
                        <input type="float" class="form-control" id="costo" name="costo" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cantidad" class="col-sm-2 col-form-label">Cantidad: *</label>
                        <div class="col-sm-10">
                        <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fecha_compra" class="col-sm-2 col-form-label">Fecha compra: *</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control" id="fecha_compra" name="fecha_compra" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="proveedor" class="col-sm-2 col-form-label">Proveedor: *</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="proveedor" id="proveedor">
                            <option value="No especificado">Proveedores</option>
                            <?php
                            // Verificamos la conexión con el servidor y la base de datos
                              $mysqli = new mysqli('localhost', 'root', 'asd', 'cbues_agenda_compra');
                              $query = $mysqli -> query ("SELECT empresa FROM proveedores ");
                              while ($valores = mysqli_fetch_array($query)) {
                              echo '<option value="'.$valores[empresa].'">'.$valores[empresa].'</option>';
                              }
                            ?>                        
                          </select>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="num_factura" class="col-sm-2 col-form-label">N° factura: *</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="num_factura" name="num_factura" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="responsable" class="col-sm-2 col-form-label">Responsable: *</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="responsable" name="responsable" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="proyecto" class="col-sm-2 col-form-label">Proyecto: *</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="proyecto" id="proyecto">
                            <option value="No especificada">Actividad</option>
                            <?php
                            // Verificamos la conexión con el servidor y la base de datos
                              $mysqli = new mysqli('localhost', 'root', 'asd', 'cbues_agenda_compra');
                              $query = $mysqli -> query ("SELECT proyecto FROM agenda ");
                              while ($valores = mysqli_fetch_array($query)) {
                              echo '<option value="'.$valores[proyecto].'">'.$valores[proyecto].'</option>';
                              }
                            ?>                        
                          </select>                        
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" id="btnCancelarCompra"><i class="bi bi-x-octagon-fill"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-hdd-fill"></i> Guardar</button>
                </form>
            </div>
            </div>
        </div>
<!--proveedores-->
        <div class="slide" id="3">
            <div class="content second-content">
              <h1>Sistema de Proveedores OT-CBUES</h1>
              <br>
              <div id="contentListProveedores">
              <button class="btn btn-success float-right" id="btnAgregarProveedores">
                <i class="bi bi-plus-square-fill"></i>
                Agregar proveedor
              </button>

              <div class="col-md-4">
                <div class="input-group mb-3">
                    <input placeholder="Buscar registro" type="search" class="form-control" aria-describedby="basic-addon2" id="txtSearchProveedores">
                    <span class="input-group-text" id="basic-addon2">
                      <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                      <lord-icon
                          src="https://cdn.lordicon.com/xfftupfv.json"
                          trigger="loop"
                          style="width:25px;height:25px">
                      </lord-icon></i></span>
                </div>
              </div>
              
              <div id="contentTableProveedores">
                <table class="table table-hover" id="myTableProveedores">
                    <thead>
                        <th>Id <img onclick="sortTableProveedores(0, 'int')" src="publico/images/flecha.png"></th>
                        <th>Proveedor <img onclick="sortTableProveedores(1, 'str')" src="publico/images/flecha.png"></th>
                        <th>Representante <img onclick="sortTableProveedores(2, 'str')" src="publico/images/flecha.png"></th>
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
          <div  id="contentFormProveedores" class="d-none">
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
                    <button type="button" class="btn btn-secondary" id="btnCancelarProveedor"><i class="bi bi-x-octagon-fill"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-hdd-fill"></i> Guardar</button>
                </form>
            </div>
            </div>
        </div>
<!--Usuarios-->
        <div class="slide" id="5">
            <div class="content second-content">
              <h1>Sistema de Usuarios OT-CBUES</h1>
              <br>
              <div id="contentListusuarios">
              <button class="btn btn-success float-right" id="btnAgregarUsuarios">
                <i class="bi bi-plus-square-fill"></i>
                Agregar Usuarios
              </button>

              <div class="col-md-4">
                <div class="input-group mb-3">
                    <input placeholder="Buscar registro" type="search" class="form-control" aria-describedby="basic-addon2" id="txtSearchUsuarios">
                    <span class="input-group-text" id="basic-addon2">
                      <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                      <lord-icon
                          src="https://cdn.lordicon.com/xfftupfv.json"
                          trigger="loop"
                          style="width:25px;height:25px">
                      </lord-icon></i></span>
                </div>
              </div>
              
              <div id="contentTableUsuarios">
                <table class="table table-hover" id="myTableUsuarios">
                    <thead>
                        <th>Id <img onclick="sortTableUsuarios(0, 'int')" src="publico/images/flecha.png"></th>
                        <th>Nombre <img onclick="sortTableUsuarios(1, 'str')" src="publico/images/flecha.png"></th>
                        <th>Usuario <img onclick="sortTableUsuarios(2, 'str')" src="publico/images/flecha.png"></th>
                        <th>Tipo <img onclick="sortTableUsuarios(3, 'str')" src="publico/images/flecha.png"></th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>Danilo Aguilar</td>
                        <td>daniloAJ</td>
                        <td>usuario</td>
                        <td>
                            <button class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tbody>
                </table>
                <div class="">
                    <ul id="paginauser" class="pagination float-right">
                        <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                    </ul>
                </div>
              </div>
            </div>
          <div id="contentFormusuarios" class="d-none">
                <h4>
                   Agregar Usuarios (Cada campo obligatorio tendrá un asterisco)
                </h4>
                <hr>
                <form id="formusuarios" enctype="multipart/form-data">
                    <div class="row mb-3">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre: *</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                        <input type="hidden" name="id_usuario" id="id_usuario" value="0">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="usuario" class="col-sm-2 col-form-label">Usuario: *</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" id="usuario" name="usuario" require>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Contraseña: *</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" require>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tipo" class="col-sm-2 col-form-label">Tipo de usuario: *</label>
                        <div class="col-sm-10">
                        <select class="form-control" name="tipo" id="tipo">
                          <option value="super usuario">Super Usuario</option>
                          <option value="administrador">Usuario Administrador</option>
                          <option value="usuario">Usuario Normal</option>
                        </select>
                      </div>
                    </div>

                    <button type="button" class="btn btn-secondary" id="btnCancelarusuario"><i class="bi bi-x-octagon-fill"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-hdd-fill"></i> Guardar</button>
                </form>
            </div>
            </div>
            </div>
<!--Agenda-->
          <div class="slide" id="4">
            <div class="content second-content">
              <h1>Sistema de Agenda OT-CBUES</h1>
              <div id="contentListagenda">
              <br><button class="btn btn-success float-right" id="btnAgregaragenda">
                <i class="bi bi-plus-square-fill"></i>
                Agregar actividades
              </button>

              <div class="col-md-4">
                <div class="input-group mb-3">
                    <input placeholder="Buscar registro" type="search" class="form-control" aria-describedby="basic-addon2" id="txtSearchagenda">
                    <span class="input-group-text" id="basic-addon2">
                    <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                    <lord-icon
                          src="https://cdn.lordicon.com/xfftupfv.json"
                          trigger="loop"
                          style="width:25px;height:25px">
                    </lord-icon></span>
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
                      <td>OT-CBUES</td>
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
                    <button type="button" class="btn btn-secondary" id="btnCancelaragenda"><i class="bi bi-x-octagon-fill"></i> Cancelar</button>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-hdd-fill"></i> Guardar</button>
                </form>
            </div>
            </div>

        </div>
        </div>
<!--Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!--Additional Scripts -->
    <script src="publico/js/owl.js"></script>
    <script src="publico/js/main.js"></script>
    <?php include_once "aplicacion/vistas/partes/javascript.php";?>

<!--Scripts de Compras-->
    <script src="<?php echo URL?>publico/customjs/compras.js"></script>
    <script>
            function sortTableCompras(n,type) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            
            table = document.getElementById("myTableCompras");
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
                    if ((type=="str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
                    shouldSwitch= true;
                    break;
                    }
                } else if (dir == "desc") {
                    if ((type=="str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
                    shouldSwitch = true;
                    break;
                    }
                }
                }
                if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount ++;
                } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
                }
            }
            }
          </script>
<!--Scripts de inventario-->
  <script src="<?php echo URL?>publico/customjs/inventario.js"></script>
    <script>
            function sortTableinventario(n,type) {
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
                    if ((type=="str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
                    shouldSwitch= true;
                    break;
                    }
                } else if (dir == "desc") {
                    if ((type=="str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
                    shouldSwitch = true;
                    break;
                    }
                }
                }
                if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount ++;
                } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
                }
            }
            }
          </script>
<!--Scripts de proveedores-->
    <script src="<?php echo URL?>publico/customjs/proveedor.js"></script>
    <script>
              function sortTableProveedores(n,type) {
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
                      if ((type=="str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
                      shouldSwitch= true;
                      break;
                      }
                  } else if (dir == "desc") {
                      if ((type=="str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
                      shouldSwitch = true;
                      break;
                      }
                  }
                  }
                  if (shouldSwitch) {
                  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                  switching = true;
                  switchcount ++;
                  } else {
                  if (switchcount == 0 && dir == "asc") {
                      dir = "desc";
                      switching = true;
                  }
                  }
              }
              }
            </script>
<!--Scripts de agenda-->
    <script src="<?php echo URL?>publico/customjs/agenda.js"></script>
    <script>
              function sortTableActividades(n,type) {
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
                      if ((type=="str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
                      shouldSwitch= true;
                      break;
                      }
                  } else if (dir == "desc") {
                      if ((type=="str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
                      shouldSwitch = true;
                      break;
                      }
                  }
                  }
                  if (shouldSwitch) {
                  rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                  switching = true;
                  switchcount ++;
                  } else {
                  if (switchcount == 0 && dir == "asc") {
                      dir = "desc";
                      switching = true;
                  }
                  }
              }
              }
            </script>
            
<!--Scripts de usuarios-->
    <script src="<?php echo URL?>publico/customjs/user.js"></script>
    <script>
            function sortTableUsuarios(n,type) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            
            table = document.getElementById("myTableUsuarios");
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
                    if ((type=="str" && x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) > parseFloat(y.innerHTML))) {
                    shouldSwitch= true;
                    break;
                    }
                } else if (dir == "desc") {
                    if ((type=="str" && x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) || (type=="int" && parseFloat(x.innerHTML) < parseFloat(y.innerHTML))) {
                    shouldSwitch = true;
                    break;
                    }
                }
                }
                if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount ++;
                } else {
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
                }
            }
            }
        </script>
</body>
</html>