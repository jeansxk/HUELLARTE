<?php 
include ('conex.php');
   /* El  usuario debiò haber presionado el botòn guardar que lo trae hasta acà--> */
   if(isset($_POST['BtnGuardar'])) {

   	 /* Creamos  unas nuevas variables con el signo $, donde almacenaremos lo que trae en los formularios en name ="idusuario", por ejemplo */
	$usuario = $_POST['idusuario'];
	$TipoDoc = $_POST['TipoDoc'];
	$Tipousua =$_POST['TipoUsua'];
	$Nombre = $_POST['NombUsua'];
	$Apellidos = $_POST['ApellUsua'];
	$Genero= $_POST['GeneUsu'];
	$Fecha = $_POST['FechaNac'];
	$clave = $_POST['PassUsua'];
	$Direccion = $_POST['DirUsua'];
	$Cel = $_POST['CeluUsua'];
	$correo = $_POST['CorreoUsua'];
echo $Tipousua .'<br>';
	 /* Creamos la sentencia para insertar datos en la tabla  usuario, las primeras variables corresponden a las que aparecen en la estructura de la BD y despues de Values corresponde a las que creamos anteriormente */
	$ins= "INSERT INTO  usuario ( idUsuario, IdTipoDoc, idTipoUsuario, NombreUsuario, ApellidoUsuario,  GeneroUsua, FechaNacUsua, ClaveUsua, DireccionUsua, CelUsua, CorreoUsua) VALUES ('$usuario', '$TipoDoc', '$Tipousua', '$Nombre', '$Apellidos','$Genero', '$Fecha', '$clave','$Direccion', '$Cel', '$correo')";
	
	if(mysqli_query($conexion,$ins)==TRUE) {
		echo "<script>
				alert('El registro se guardó exitosamente');
				location.href='../Vista/App/admin/Admin.php';
					</script>";
			}else{
				"<script>
				alert('El registro no pudo ser guardado');
				location.href='../Vista/App/admin/Admin.php';
					</script>";
			}
  }

  mysqli_close($conexion);
 ?>