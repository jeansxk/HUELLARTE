<?php
include ('../Modelo/conex.php');
header( 'Content-Type: text/html; charset=UTF-8'); 
session_start(); 
error_reporting(0); 

$id = $_REQUEST['id'];

	
			

			$del = $conexion -> query("DELETE FROM usuario WHERE idUsuario = '$id' ");
				if ($del) {
					echo "<script>
					location.href='../Vista/App/admin/Admin.php#imprime?Result=1';
					</script>";
				}else{
					echo "<script>
					alert('El registro no pudo ser eliminado');
					location.href='../Vista/App/admin/Admin.php';
					</script>";

				}


		
 ?>