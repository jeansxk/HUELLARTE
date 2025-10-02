<?php
$host = 'localhost';
$username = 'root';
$basedatos = 'huellarte_db'; // Nombre de la base de datos
$pass = '';
$msj = "No se ha encontrado enlace con el servidor o la base de datos";

// Constructor de conexión con las variables correctas
$conexion = new mysqli($host, $username, $pass, $basedatos) or die($msj);

// Configurar el conjunto de caracteres
$acento = $conexion->query("SET NAMES 'utf8'");

// Verificar si la conexión falló
if (mysqli_connect_errno()) {
    echo 'Conexión Fallida: ' . mysqli_connect_error();
    exit();
}
?>
