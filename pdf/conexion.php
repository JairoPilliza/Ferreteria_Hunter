<?php
$db = new mysqli("alfamysql.mysql.database.azure.com:3306","administrador","dev12345#","ferreteria");
	if (mysqli_connect_errno()) {
		echo "No se puede conectar 🚫";

	}
	/*$db = mysqli_init(); mysqli_ssl_set($db,NULL,NULL, "", NULL, NULL); mysqli_real_connect($db, "alfamysql.mysql.database.azure.com", "administrador", "dev12345#", "sys", 3306, MYSQLI_CLIENT_SSL);*/
?>
