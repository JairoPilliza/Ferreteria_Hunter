<?php  
include("../config/conexion.php");

    $query="update clientes SET cliCedula='$_REQUEST[cedula]',cliNombre='$_REQUEST[nombre]',cliDireccion='$_REQUEST[direccion]',cliCorreo='$_REQUEST[correo]',cliClave='$_REQUEST[clave]' WHERE cliId='$_REQUEST[id]';";
    $enviar=mysqli_query($db,$query);
	header('location:index.php');


?>