<?php
include ('../MODELO/conexion.php');
header('Content-Type: text/html; charset=UTF-8');
session_start();
error_reporting(0);

// Validación: solo permite números
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../Vista/App/Admin/Usuarios.php");
    exit;
}

$id = (int)$_GET['id'];

// Sentencia preparada para evitar inyección SQL
$stmt = $conexion->prepare("DELETE FROM usuario WHERE idUsuario = ?");
$stmt->bind_param("i", $id);
$del = $stmt->execute();

if ($del) {
    echo "<script>
    alert('Usuario eliminado correctamente.');
    location.href='../Vista/App/Admin/Usuarios.php';
    </script>";
} else {
    echo "<script>
    alert('Error al eliminar el usuario. Inténtalo nuevamente.');
    location.href='../Vista/App/Admin/Usuarios.php';
    </script>";
}
exit;
?>