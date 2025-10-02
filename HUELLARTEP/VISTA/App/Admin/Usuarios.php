<?php
// Incluir conexión — Ruta correcta para tu estructura
include('../../../MODELO/conexion.php');
header('Content-Type: text/html; charset=UTF-8');
session_start();

// Consulta simplificada: sin JOIN (usa solo la tabla 'usuario')
$consulta = "SELECT 
    idUsuario,
    idTipousuario,
    idTipodoc,
    numeroDocumento,
    CONCAT(nombres, ' ', apellidos) AS nombreCompleto,
    correo,
    celular
FROM usuario
ORDER BY idUsuario DESC";

$resultado = $conexion->query($consulta);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Gestión de Usuarios - Huellarte">
    <meta name="author" content="Huellarte">

    <title>Usuarios - Huellarte</title>

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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="../../media/logo.png" alt="Huellarte Logo" style="height: 40px;">
                </div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="Usuarios.php">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Mascotas.php">
                    <i class="fas fa-fw fa-dog"></i>
                    <span>Mascotas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Mascotasfundaciones.php">
                    <i class="fas fa-fw fa-hands-helping"></i>
                    <span>Mascotas en Fundación</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Publicaciones.php">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Publicaciones</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="comentario.php">
                    <i class="fas fa-fw fa-message"></i>
                    <span>Comentarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Fundaciones.php">
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
                        <a class="collapse-item" href="TipoDocumento.php">Tipo Documento</a>
                        <a class="collapse-item" href="TipoUsuario.php">Tipo Usuario</a>
                        <a class="collapse-item" href="Ciudad.php">Ciudad</a>
                        <a class="collapse-item" href="Depto.php">Departamento</a>
                        <a class="collapse-item" href="raza.php">Raza</a>
                        <a class="collapse-item" href="especie.php">Especie</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Reportes.php">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Reportes</span>
                </a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
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

                <div class="container-fluid">
                    <h1 class="h3 mb-2">
                        <i class="fa fa-users"></i> Gestión de Usuarios
                    </h1>
                    <p class="mb-4">Administra y visualiza todos los usuarios registrados en el sistema.</p>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold" style="color: var(--primary);">Lista de Usuarios</h6>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus-circle"></i> Agregar Usuario
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Tipo Usuario</th>
                                            <th class="text-center">Tipo Documento</th>
                                            <th class="text-center">Identificación</th>
                                            <th class="text-center">Nombre Completo</th>
                                            <th class="text-center">Correo Electrónico</th>
                                            <th class="text-center">Celular</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($resultado && $resultado->num_rows > 0): ?>
                                            <?php while ($fila = $resultado->fetch_assoc()): ?>
                                            <tr>
                                                <td class="text-center"><?= htmlspecialchars($fila['idUsuario']) ?></td>
                                                <td class="text-center"><?= htmlspecialchars($fila['idTipousuario']) ?></td>
                                                <td class="text-center"><?= htmlspecialchars($fila['idTipodoc']) ?></td>
                                                <td class="text-center"><?= htmlspecialchars($fila['numeroDocumento']) ?></td>
                                                <td><?= htmlspecialchars($fila['nombreCompleto']) ?></td>
                                                <td><?= htmlspecialchars($fila['correo']) ?></td>
                                                <td class="text-center"><?= htmlspecialchars($fila['celular']) ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-info btn-sm mr-1" title="Editar">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <a href="../../../Controlador/Borrarusua.php?id=<?= $fila['idUsuario'] ?>" 
                                                       class="btn btn-danger btn-sm"
                                                       onclick="return confirm('¿Está seguro de eliminar este usuario?');"
                                                       title="Eliminar">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="8" class="text-center">No hay usuarios registrados.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>&copy; 2025 Huellarte. Todos los derechos reservados. ❤️</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">¿Cerrar sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Salir" si realmente desea terminar su sesión.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../Controlador/logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

   
   <!-- Modal Agregar Usuario -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="fas fa-user-plus"></i> Nuevo Usuario</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ✅ Formulario con ID -->
                <form id="formUsuario" action="../../../Controlador/Guardarusua.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idTipousuario">Tipo Usuario:</label>
                                <select class="form-control" id="idTipousuario" name="idTipousuario" required>
                                    <option value="">Seleccionar...</option>
                                    <option value="2">Usuario</option>
                                    <option value="3">Fundación</option>
                                    <option value="1">Administrador</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idTipodoc">Tipo Documento:</label>
                                <select class="form-control" id="idTipodoc" name="idTipodoc" required>
                                    <option value="">Seleccionar...</option>
                                    <option value="1">Cédula de Ciudadanía</option>
                                    <option value="2">Tarjeta de Identidad</option>
                                    <option value="3">Pasaporte</option>
                                    <option value="4">Cédula de Extranjería</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="numeroDocumento">Identificación:</label>
                                <input type="text" name="numeroDocumento" class="form-control" id="numeroDocumento" placeholder="Número de identificación" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="celular">Celular:</label>
                                <input type="text" name="celular" class="form-control" id="celular" placeholder="+57 3XX XXX XXXX" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Nombres completos" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellidos">Apellidos:</label>
                                <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos completos" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Electrónico:</label>
                        <input type="email" name="correo" class="form-control" id="correo" placeholder="usuario@correo.com" required>
                    </div>
                    <div class="form-group">
                        <label for="contraseña">Contraseña:</label>
                        <input type="password" name="contraseña" class="form-control" id="contraseña" placeholder="Contraseña segura" required>
                    </div>
                    <div class="form-group">
                        <label for="fotoBlog">URL Foto Blog:</label>
                        <input type="text" name="fotoBlog" class="form-control" id="fotoBlog" placeholder="https://ejemplo.com/foto.jpg">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idCiudad">ID Ciudad:</label>
                                <input type="text" name="idCiudad" class="form-control" id="idCiudad" placeholder="Ej: 01" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="idDepartamento">ID Departamento:</label>
                                <input type="text" name="idDepartamento" class="form-control" id="idDepartamento" placeholder="Ej: 05" required>
                            </div>
                        </div>
                    </div>
                </form> <!-- Cierra el formulario aquí -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Cancelar
                </button>
                <!-- ✅ Botón con form="formUsuario" -->
                <button type="submit" form="formUsuario" class="btn btn-primary">
                    <i class="fas fa-save"></i> Guardar Usuario
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

    <!-- Mensajes de éxito/error -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('eliminado')) {
                alert('Usuario eliminado correctamente.');
            } else if (urlParams.has('guardado')) {
                alert('Usuario registrado correctamente.');
            } else if (urlParams.has('error')) {
                alert('Ocurrió un error. Inténtalo nuevamente.');
            }
        });
    </script>

</body>
</html>