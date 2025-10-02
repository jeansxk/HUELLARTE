<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Gestión de Animales en Fundación - Huellarte">
    <meta name="author" content="Huellarte">

    <title>Animales en Fundación - Huellarte</title>

    <!-- Custom fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom styles -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: rgb(61, 174, 194);
            --primary-dark: #2a9d8f;
        }
        .sidebar {
            background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
        }
        .btn-primary {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
        }
        .btn-primary:hover {
            background-color: var(--primary-dark) !important;
            border-color: var(--primary-dark) !important;
        }
        .table thead th {
            background-color: var(--primary) !important;
            color: white !important;
        }
        .sidebar-brand-text {
            font-family: 'Quicksand', sans-serif;
            font-weight: 700;
        }
        .topbar {
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        .sticky-footer {
            background-color: #303030 !important;
            color: white !important;
        }
        .sticky-footer .copyright {
            color: rgba(255,255,255,0.7) !important;
        }
    </style>
</head>

<body id="page-top">

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="../../media/logo.png" alt="Huellarte Logo" style="height: 40px;">
                </div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="Usuarios.html">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Mascotas.html">
                    <i class="fas fa-fw fa-dog"></i>
                    <span>Mascotas</span>
                </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="Mascotasfundaciones.html">
                    <i class="fas fa-fw fa-hands-helping"></i>
                    <span>Mascotas en Fundación</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Publicaciones.html">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Publicaciones</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Fundaciones.html">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Fundaciones</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConfig"
                    aria-expanded="true" aria-controls="collapseConfig">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Configuración</span>
                </a>
                <div id="collapseConfig" class="collapse" aria-labelledby="headingConfig" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="TipoDocumento.html">Tipo Documento</a>
                        <a class="collapse-item" href="TipoUsuario.html">Tipo Usuario</a>
                        <a class="collapse-item" href="Ciudad.html">Ciudad</a>
                        <a class="collapse-item" href="Depto.html">Departamento</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="Reportes.html">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Reportes</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 shadow">
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Administrador</span>
                                <img class="img-profile rounded-circle"
                                    src="https://ui-avatars.com/api/?name=Admin&background=3daec2&color=fff&size=32">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <h1 class="h3 mb-2">
                        <i class="fa fa-dog"></i> Gestión de Animales en Fundación
                    </h1>
                    <p class="mb-4">Administra y visualiza todos los animales registrados en las fundaciones.</p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold" style="color: var(--primary);">Lista de Animales</h6>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus-circle"></i> Agregar Animal
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID Animal Fundación</th>
                                            <th class="text-center">ID Fundación</th>
                                            <th class="text-center">ID Mascota</th>
                                            <th class="text-center">Raza</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- 
                                            Aquí se insertarán dinámicamente las filas desde la base de datos.
                                            Ejemplo de estructura por fila (PHP/JS):
                                            
                                            <tr>
                                                <td class="text-center">AF-001</td>
                                                <td class="text-center">FND-01</td>
                                                <td class="text-center">PET-101</td>
                                                <td>Labrador Retriever</td>
                                                <td class="text-center">
                                                    <button class="btn btn-info btn-sm mr-1" title="Editar">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-warning btn-sm mr-1" title="Ver">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" title="Eliminar">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>

            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; 2025 Huellarte. Todos los derechos reservados. ❤️</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
    </div>

    <!-- Modal Nuevo Animal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title"><i class="fas fa-plus"></i> Nuevo Animal</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="idAnimalFundacion">ID Animal Fundación:</label>
                            <input type="text" class="form-control" id="idAnimalFundacion" name="idAnimalFundacion" required>
                        </div>
                        <div class="form-group">
                            <label for="idFundacion">ID Fundación:</label>
                            <input type="text" class="form-control" id="idFundacion" name="idFundacion" required>
                        </div>
                        <div class="form-group">
                            <label for="idMascota">ID Mascota:</label>
                            <input type="text" class="form-control" id="idMascota" name="idMascota" required>
                        </div>
                        <div class="form-group">
                            <label for="raza">Raza:</label>
                            <input type="text" class="form-control" id="raza" name="raza" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Animal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>

</body>
</html>