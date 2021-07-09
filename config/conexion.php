<?php
	$db = new mysqli("localhost","root","","ferreteria");
	if (mysqli_connect_errno()) {
		echo "No se puede conectar 🚫";
	}
?>