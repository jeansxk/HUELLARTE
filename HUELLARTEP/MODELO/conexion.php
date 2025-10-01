<?php
$host = 'localhost';
$dbname = 'huellarte_db';
$username = 'root';
$basedatos="huellarte_db"; //Aqui coloco el nombre de la base de datos de mi proyecto
$pass="";
$msj="No se ha encontrado enlace con el servidor o la base de datos";

//Constructor de conexion, utilizamos el mètodo mysqli() para realizar la conexiòn 
$conexion= new mysqli($server,$user,$pass,$basedatos) or die ($msj);
$acento= $conexion->query("SET NAMES 'utf8'");
//Si no se puede conectar, envìa un mensaje de error 
if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
}

 ?>