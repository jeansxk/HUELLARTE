<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panel de administración - Huellarte">
    <meta name="author" content="Huellarte">

    <title>Dashboard - Huellarte</title>

    <!-- Custom fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Estilos personalizados (SB Admin 2 base + personalización Huellarte) -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <style>
        :root {
            --primary: rgb(61, 174, 194);
            --primary-dark: rgba(40, 140, 155, 0.9);
            --dark: #303030;
        }

        /* Sidebar con gradiente Huellarte */
        .sidebar {
            background: linear-gradient(180deg, var(--primary) 0%, #2a9d8f 100%) !important;
        }

        /* Brand */
        .sidebar-brand {
            font-family: 'Quicksand', sans-serif;
            font-weight: 700;
            font-size: 1.2rem;
        }

        /* Íconos del sidebar */
        .nav-item .nav-link i {
            color: rgba(255,255,255,0.8) !important;
        }
        .nav-item.active .nav-link i,
        .nav-item:hover .nav-link i {
            color: white !important;
        }

        /* Topbar */
        .topbar {
            background-color: white !important;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        /* Dropdown user */
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        /* Botón de logout */
        .btn-primary {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
        }
        .btn-primary:hover {
            background-color: #2a9d8f !important;
            border-color: #2a9d8f !important;
        }

        /* Scroll to top */
        .scroll-to-top {
            background-color: var(--primary) !important;
        }
        .scroll-to-top:hover {
            background-color: #2a9d8f !important;
        }

        /* Footer */
        .sticky-footer {
            background-color: var(--dark) !important;
            color: white !important;
        }
        .sticky-footer .copyright {
            color: rgba(255,255,255,0.7) !important;
        }

        /* Logo en el centro */
        .project-logo {
            height: 120px;
            margin: 2rem auto;
            display: block;
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="../../media/logo.png" alt="Huellarte Logo" style="height: 40px;">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sección: Gestión -->
            <li class="nav-item">
                <a class="nav-link" href="Usuarios.php">
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
            <li class="nav-item">
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
                <a class="nav-link" href="comentario.html">
                    <i class="fas fa-fw fa-message"></i>
                    <span>Comentarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Fundaciones.html">
                    <i class="fas fa-fw fa-building"></i>
                    <span>Fundaciones</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Configuración -->
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
                         <a class="collapse-item" href="raza.html">Raza</a>
                         <a class="collapse-item" href="especie.html">Especie</a>
                    </div>
                </div>
            </li>

            <!-- Reportes -->
            <li class="nav-item">
                <a class="nav-link" href="Reportes.html">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Reportes</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin Huellarte</span>
                                <img class="img-profile rounded-circle"
                                    src="https://ui-avatars.com/api/?name=Admin&background=3daec2&color=fff&size=32">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Mi Perfil
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
                <div class="container-fluid py-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <img src="../../media/logo.png" alt="Huellarte" class="project-logo">
                            <h2 class="text-gray-800 mt-3">Panel de Administración</h2>
                            <p class="text-muted">Gestiona usuarios, mascotas, fundaciones y más.</p>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->

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
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Cerrar sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" si realmente desea terminar su sesión.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../../login.html">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>