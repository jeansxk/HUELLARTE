<?php
session_start();
include('../MODELO/conexion.php');

// Indicamos que el documento será de tipo html y con caracteres UTF-8
header('Content-Type: text/html; charset=UTF-8');

// Verificamos si se presionó el botón "login"
if (isset($_POST['login'])) {

    // Traemos los datos del formulario
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Consulta: buscamos por correo y contraseña
    $sql = "SELECT idUsuario, `contraseña`, CONCAT(nombres, ' ', apellidos) AS nombreCompleto, idTipousuario 
            FROM usuario 
            WHERE correo = '$email' AND `contraseña` = '$pass'";

    $res = $conexion->query($sql);

    // Si encontró un usuario
    if ($res && $res->num_rows > 0) {
        $fila = $res->fetch_assoc();

        // Guardamos datos en la sesión
        $_SESSION['user'] = $fila['idUsuario'];
        $_SESSION['tipo'] = $fila['idTipousuario'];
        $_SESSION['usuario'] = $fila['nombreCompleto'];

        $msj = "Bienvenido " . $_SESSION['usuario'];

        // Redirigimos según el tipo de usuario
        switch ($_SESSION['tipo']) {
            case '1': // Administrador
                header("Location: ../VISTA/App/Admin/index.html?mensaje=?mensaje=" . urlencode($msj));
                exit;
            case '2': // Usuario normal
                header("Location: ../VISTA/App/Usuario/index.html?mensaje=" . urlencode($msj));
                exit;
            case '3': // Fundación
                header("Location: ../VISTA/App/Fundacion/index.html?mensaje=" . urlencode($msj));
                exit;
            default:
                header("Location: ../VISTA/index.php?mensaje=" . urlencode($msj));
                exit;
        }

    } else {
        // Si no se encontró el usuario
        echo "<script>
            alert('Usuario y/o Contraseña Incorrectos');
            location.href='../VISTA/index.php';
        </script>";
    }
}
?>
