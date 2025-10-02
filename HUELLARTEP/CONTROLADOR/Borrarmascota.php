<?php
include('../MODELO/conexion.php');
header('Content-Type: text/html; charset=UTF-8');
session_start();

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: ../Vista/App/Admin/Mascotas.php?error=1");
    exit;
}

$id = (int)$_GET['id'];

$stmt = $conexion->prepare("DELETE FROM mascota WHERE idMascota = ?");
$stmt->bind_param("i", $id);
$del = $stmt->execute();

if ($del) {
    header("Location: ../Vista/App/Admin/Mascotas.php?eliminado=1");
} else {
    header("Location: ../Vista/App/Admin/Mascotas.php?error=1");
}
exit;
?>