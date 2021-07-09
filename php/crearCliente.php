<?php  
include("../config/conexion.php");

if(isset($_REQUEST['guardar'])){   
   
    $query="insert into clientes values (0,'$_REQUEST[cedula]','$_REQUEST[nombre]','$_REQUEST[direccion]','$_REQUEST[correo]','$_REQUEST[clave]')";
	echo $query;
    $enviar=mysqli_query($db,$query);
	header('location:carrito.php');
    

}
?>