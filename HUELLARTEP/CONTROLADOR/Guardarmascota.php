<?php
include('../MODELO/conexion.php');
header('Content-Type: text/html; charset=UTF-8');
session_start();

$nombreMascota = $_POST['nombreMascota'] ?? '';
$edad = $_POST['edad'] ?? '';
$genero = $_POST['genero'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$estado = $_POST['estado'] ?? '';
$idRaza = $_POST['idRaza'] ?? '';
$idUsuario = $_POST['idUsuario'] ?? '';

if (empty($nombreMascota) || empty($edad) || empty($genero) || empty($descripcion) || empty($idRaza) || empty($idUsuario)) {
    header("Location: ../Vista/App/Admin/Mascotas.php?error=1");
    exit;
}

$stmt = $conexion->prepare("
    INSERT INTO mascota (nombreMascota, edad, genero, descripcion, estado, idRaza, idUsuario)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "sisssii",
    $nombreMascota,
    $edad,
    $genero,
    $descripcion,
    $estado,
    $idRaza,
    $idUsuario
);

if ($stmt->execute()) {
    header("Location: ../Vista/App/Admin/Mascotas.php?guardado=1");
} else {
    header("Location: ../Vista/App/Admin/Mascotas.php?error=1");
}
exit;
?>