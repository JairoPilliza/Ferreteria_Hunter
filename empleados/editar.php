<?php  
include("../config/conexion.php");

    $query="update empleados SET empNombre='$_REQUEST[nombre]',empCedula='$_REQUEST[cedula]',empClave='$_REQUEST[clave]' WHERE empId='$_REQUEST[id]';";
    $enviar=mysqli_query($db,$query);
	header('location:index.php');


?>