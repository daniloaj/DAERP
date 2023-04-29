<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <link rel="shortcut icon" href="publico/images/favicon.ico">
        <meta name="author" content="" />
        <title>DAERP</title>
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="publico/css/style_inventario.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <img style="width:150px; margin-top:-15px" src="publico/images/LOGO TRANSPARENTE CBUES.png" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <h1 class="navbar-brand">Oficina Tecnica CBUES</h1>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Portfolio Grid-->
        <section style="margin-top: 50px" class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Manual de usuario para el sistema de agenda</h2>
                    <h3 class="section-subheading text-muted">Seleccione el área de la que necesite información</h3>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                        <lord-icon
                                            src="https://cdn.lordicon.com/msoeawqm.json"
                                            trigger="click"
                                            style="width:150px;height:150px">
                                        </lord-icon>
                                    </div>
                                </div>
                                <img class="img-fluid" src="https://media.istockphoto.com/id/1288487765/vector/file-folder-documentation-library-personal-database-workplace-cabinet-organization.jpg?s=612x612&w=0&k=20&c=hZSB2OpNnvU6Wpcax-wvmaBpLKnAUw6pT93p28l2LUM=" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Guardar actividades</div>
                                <div class="portfolio-caption-subheading text-muted">Registrar nuevos datos de alguna actividad en el sistema.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                        <!-- Portfolio item 2-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                        <lord-icon
                                            src="https://cdn.lordicon.com/msoeawqm.json"
                                            trigger="click"
                                            style="width:150px;height:150px">
                                        </lord-icon>
                                    </div>
                                </div>
                                <img class="img-fluid" src="https://img.freepik.com/vector-premium/persona-autor-escribiendo-contenido-documento-hoja-papel-computadora_101884-535.jpg" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Editar la agenda</div>
                                <div class="portfolio-caption-subheading text-muted">Editar una actividad que se hayan registrado de forma erronea.</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-md-6 mb-4">
                        <!-- Portfolio item 3-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content">
                                        <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
                                        <lord-icon
                                            src="https://cdn.lordicon.com/msoeawqm.json"
                                            trigger="click"
                                            style="width:150px;height:150px">
                                        </lord-icon>
                                    </div>
                                </div>
                                <img class="img-fluid" src="https://img.freepik.com/premium-vector/delete-concept-deleting-data-move-unnecessary-files-trash-bin-illustration-vector_199064-469.jpg?w=2000" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">Eliminar actividad</div>
                                <div class="portfolio-caption-subheading text-muted">Eliminar la actividad que no sea necesaria.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- modal guardar-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal">
                        <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                        <lord-icon
                            src="https://cdn.lordicon.com/nhfyhmlt.json"
                            trigger="click"
                            style="width:50px;height:50px">
                        </lord-icon>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Guardar registros en el sistema</h2>
                                    <p  class="item-intro text-muted">Aclare sus dudas con esta información</p>

                                    <section id="scroll">
                                        <div class="container px-5">
                                            <div class="row gx-5 align-items-center">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <h2 class="display-4">Modulo agenda</h2>
                                                        <p>Para acceder a la opción de agenda daremos clic en el botón que dice "Agenda" en el panel izquierdo.</p>
                                                        <img style="width: 800px; border-radius: 20px" src="publico/images/modulo agenda.png" alt="..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="scroll">
                                        <div class="container px-5">
                                            <div class="row gx-5 align-items-center">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <h2 class="display-4">Listado de actividades</h2>
                                                        <p>En esta pantalla se mostrarán todas las actividades registradas en el sistema de la Oficina Técnica CBUES, para guardar un registro daremos clic en el boton verde que dice "Agregar actividades". </p>
                                                        <img style="width: 800px; border-radius: 20px" src="publico/images/agregar agenda.png" alt="..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="scroll">
                                        <div class="container px-5">
                                            <div class="row gx-5 align-items-center">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <h2 class="display-4">Guardar una nueva actividad</h2>
                                                        <p>Para registrar un nuevo registro ingresaremos los datos de la actividad en los espacios correspondientes y para hacer valido el registro daremos clic en el boton azul "guardar" o "Cancelar" si se desea cancelar el proceso de registro.</p>
                                                        <img style="width: 800px; border-radius: 20px" src="publico/images/guardar agenda.png" alt="..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="scroll">
                                        <div class="container px-5">
                                            <div class="row gx-5 align-items-center">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <h2 class="display-4">Exito al guardar</h2>
                                                        <p>Si ha puesto bien todos los datos correspondientes le aparecerá un mensaje corroborando que la actividad se ha registrado con exito. Si hubo algun problema el sistema se lo hará saber, lo mismo si hay un campo que no se ha llenado.</p>
                                                        <img  style="width: 800px; border-radius: 20px" src="publico/images/agenda guardada.png" alt="..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Editar-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal">
                        <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                        <lord-icon
                            src="https://cdn.lordicon.com/nhfyhmlt.json"
                            trigger="click"
                            style="width:50px;height:50px">
                        </lord-icon>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Editar registros en el sistema de agenda</h2>
                                    <p  class="item-intro text-muted">Aclare sus dudas con esta información</p>

                                    <section id="scroll">
                                        <div class="container px-5">
                                            <div class="row gx-5 align-items-center">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <h2 class="display-4">Modulo agenda</h2>
                                                        <p>Para acceder a la opción de agenda daremos clic en el botón que dice "agenda" en el panel izquierdo.</p>
                                                        <img style="width: 800px; border-radius: 20px" src="publico/images/modulo agenda.png" alt="..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="scroll">
                                        <div class="container px-5">
                                            <div class="row gx-5 align-items-center">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <h2 class="display-4">Listado de actividades</h2>
                                                        <p>En esta pantalla se mostrarán todos las actividades registradas en el sistema de la Oficina Técnica CBUES, para editar un registro daremos clic en el boton azul que tiene un pequeño lapiz en su interior. </p>
                                                        <img style="width: 800px; border-radius: 20px" src="publico/images/editar agenda.png" alt="..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="scroll">
                                        <div class="container px-5">
                                            <div class="row gx-5 align-items-center">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <h2 class="display-4">Actualizar un viejo registro</h2>
                                                        <p>Para actualizar un viejo registro veremos los datos de la actividad en los espacios correspondientes, cambiamos los datos que hagan falta y para hacer valida la actualización daremos clic en el boton azul "Guardar" o "Cancelar" si se desea cancelar el proceso de edición.</p>
                                                        <img style="width: 800px; border-radius: 20px" src="publico/images/actualizar agenda" alt="..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="scroll">
                                        <div class="container px-5">
                                            <div class="row gx-5 align-items-center">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <h2 class="display-4">Exito al editar</h2>
                                                        <p>Si ha puesto correctamente todos los datos correspondientes le aparecerá un mensaje corroborando que el agenda se ha actualizado con exito. Si hubo algun problema el sistema se lo hará saber, lo mismo si hay un campo que no se ha llenado.</p>
                                                        <img  style="width: 800px; border-radius: 20px" src="publico/images/agenda actualizada.png" alt="..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Eliminar-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal">
                        <script src="https://cdn.lordicon.com/qjzruarw.js"></script>
                        <lord-icon
                            src="https://cdn.lordicon.com/nhfyhmlt.json"
                            trigger="click"
                            style="width:50px;height:50px">
                        </lord-icon>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Eliminar registros en el sistema de agenda</h2>
                                    <p> *Cualquier registro eliminado de la vista quedará guardada en el historial y podrá verse en los reportes*</p>

                                    <section id="scroll">
                                        <div class="container px-5">
                                            <div class="row gx-5 align-items-center">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <h2 class="display-4">Modulo agenda</h2>
                                                        <p>Para acceder a la opción de agenda daremos clic en el botón que dice "agenda" en el panel izquierdo.</p>
                                                        <img style="width: 800px; border-radius: 20px" src="publico/images/modulo agenda.png" alt="..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="scroll">
                                        <div class="container px-5">
                                            <div class="row gx-5 align-items-center">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <h2 class="display-4">Listado de agenda</h2>
                                                        <p>En esta pantalla se mostrarán todos las actividades registradas en el sistema de la Oficina Técnica CBUES, para eliminar un registro daremos clic en el boton rojo que tiene un pequeño basurero en su interior. </p>
                                                        <img style="width: 800px; border-radius: 20px" src="publico/images/eliminar agenda.png" alt="..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="scroll">
                                        <div class="container px-5">
                                            <div class="row gx-5 align-items-center">
                                                <div class="col-lg-12">
                                                    <div>
                                                        <h2 class="display-4">Eliminar un registro</h2>
                                                        <p>Para eliminar un agenda veremos un mensaje de confirmación preguntandonos si estamos seguros de eliminar el registro. Si aceptamos ya no veremos ese registro en el listado de agenda.</p>
                                                        <img style="width: 800px; border-radius: 20px" src="publico/images/eliminar registro.png" alt="..." />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="publico/customjs/scripts_manual_inventario.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>