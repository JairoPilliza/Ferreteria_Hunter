<?php
	$db = new mysqli("alfamysql.mysql.database.azure.com","administrador","dev12345#","ferreteria");
	if (mysqli_connect_errno()) {
		echo "No se puede conectar 🚫";
	}
?>
