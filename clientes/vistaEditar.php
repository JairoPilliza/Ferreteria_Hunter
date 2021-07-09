<?php
include("../config/conexion.php");
$id = $_GET['id'];
$query = $db->query("select * from clientes where cliId=$id");
$mostrar = mysqli_fetch_array($query);
$id2 = $mostrar['cliId'];
$nombre = $mostrar['cliNombre'];
$cedula = $mostrar['cliCedula'];
$direccion = $mostrar['cliDireccion'];
$correo = $mostrar['cliCorreo'];
$clave = $mostrar['cliClave'];
?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/esti.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/stylesConsulta2.css">
<div class="container ">
	<div class="d-flex justify-content-center h-100">
		<div class="card col col-lg-6" style="background-image:url('https://ae01.alicdn.com/kf/HTB1tOvwm29TBuNjy0Fcq6zeiFXaA.jpg');">
			<div class="card-header">
				<br>
				<h3>Modificacion de Clientes</h3>

			</div>
			<div class="card-body">
				<form method="post" action="editar.php" name="frmUsuarios">
				<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-id-card"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="ID" name="id" id="id" value="<?php echo $id2; ?>" required>

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<br><span class="input-group-text"><i class="fas fa-book"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Cedula" name="cedula" value="<?php echo $cedula ?>" required>
					</div>
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $nombre; ?>" required>

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<br><span class="input-group-text"><i class="fas fa-book"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Direccion" name="direccion" value="<?php echo $direccion ?>" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<br><span class="input-group-text"><i class="fas fa-book"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Correo" name="correo" value="<?php echo $correo ?>" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<br><span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Clave" name="clave" value="<?php echo $clave ?>" required>
					</div>

					<div class="form-group">
						<a href="index.php"><input type="button" value="Atras" class="btn btn-warning float-left login_btn"></a>
						<input type="submit" name="guardar" value="Registar" class="btn btn-info float-right login_btn">
					</div>
				</form>
			</div>

		</div>
	</div>
</div>