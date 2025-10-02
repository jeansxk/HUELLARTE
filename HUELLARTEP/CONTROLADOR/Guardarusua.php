<?php
include('../MODELO/conexion.php');
header('Content-Type: text/html; charset=UTF-8');
session_start();
error_reporting(0);

// Recibir datos del formulario
$idTipousuario = $_POST['idTipousuario'] ?? '';
$idTipodoc = $_POST['idTipodoc'] ?? '';
$nombres = $_POST['nombres'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$celular = $_POST['celular'] ?? '';
$correo = $_POST['correo'] ?? '';
$contraseña = $_POST['contraseña'] ?? '';
$numeroDocumento = $_POST['numeroDocumento'] ?? '';
$fotoBlog = $_POST['fotoBlog'] ?? '';
$idCiudad = $_POST['idCiudad'] ?? '';
$idDepartamento = $_POST['idDepartamento'] ?? '';

// Validaciones básicas
if (empty($nombres) || empty($apellidos) || empty($celular) || empty($correo) || empty($contraseña) || empty($numeroDocumento)) {
    echo "<script>
    alert('Todos los campos son obligatorios.');
    history.back();
    </script>";
    exit;
}

// Hashear contraseña
$contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);

// Preparar consulta
$stmt = $conexion->prepare("
    INSERT INTO usuario (
        idTipousuario, idTipodoc, nombres, apellidos, celular, correo, contraseña, numeroDocumento, fotoBlog, idCiudad, idDepartamento
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "iisssssssii",
    $idTipousuario,
    $idTipodoc,
    $nombres,
    $apellidos,
    $celular,
    $correo,
    $contraseña_hash,
    $numeroDocumento,
    $fotoBlog,
    $idCiudad,
    $idDepartamento
);

$guardado = $stmt->execute();

if ($guardado) {
    // ✅ CORREGIDO: Redirige a Usuarios.php (no .html) y con ruta relativa correcta
    header("Location: ../Vista/App/Admin/Usuarios.php?guardado=1");
} else {
    // ✅ CORREGIDO: Redirige a Usuarios.php (no .html)
    header("Location: ../Vista/App/Admin/Usuarios.php?error=1");
}
exit;
?>