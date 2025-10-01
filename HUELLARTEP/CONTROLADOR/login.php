<?php
session_start();
include('../MODELO/conexion.php');

//error_reporting(0);
//Indicamos que el documento será de tipo html y con caracteres de UTF-8:
header('Content-Type: text/html; charset=UTF-8');
//Al presionar el boton que previamente le llamamos "login", traeremos los datos del formulario:
$btninicio=$_POST['login'];
if(isset($btninicio)){
	//Traemos de los inputs los datos de usuario y contraseña:
    $user=$_POST['email'];
    $pass=$_POST['password'];

    $sql="SELECT idUsuario, contraseña, concat(nombres, ' ', apellidos), idTipousuario 	FROM usuario WHERE idUsuario  ='$user' and contraseña = '$pass'";


    $res=$conexion->query($sql);
    $fila=$res->fetch_row();
    
    if($fila[0]==$user && $fila[1]==$pass){

    	
    	$_SESSION['user']=$fila[0];
        $_SESSION['tipo']=$fila[3];
    	$_SESSION['usuario']=$fila[2];
    	$msj="Bienvenido ".$_SESSION['usuario']."";
			switch ($_SESSION['tipo']) {
				case '1':
					# code...
					header('location:../Vista/App/admin/Admin.php?mensaje=$msj');
					break;
				case '2':
					# code...
					header('location:../Vista/index.php?mensaje=$msj');
					break;
			case '17':
					# code...
					header('location:../Vista/index.php?mensaje=$msj');
					break;
				default:
					# code...
					header('location:../Vista/index.php?mensaje=$msj');
					break;
			}

    }
    else{
    	echo "<script>
					alert('Usuario y/o Contraseña Incorrectos');
					location.href='../vista/index.php';
					</script>";

    
    }
}
?>
