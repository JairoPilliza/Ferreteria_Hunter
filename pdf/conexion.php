<?php
	
	$mysqli = new mysqli('localhost', 'root', '', 'ferreteria');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>