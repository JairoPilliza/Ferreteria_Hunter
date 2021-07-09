
<!DOCTYPE html>
<html>
<head>
	<title>Registro de Usuarios</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script>
        function validar() {
            if(document.frmUsuarios.password.value===document.frmUsuarios.password2.value){
                alert('Usuario Registrado');
                return true;
            }
            else{
                alert('Las Contraseñas no Coinciden');
                return false;
            }
}
</script>        
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
      
      <a class="navbar-brand"><img src="img/logo.png" height="70px" width="80px;" /></a>
         <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div id="my-nav" class="collapse navbar-collapse">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                     <a class="nav-link" href="principal.php">Inicio <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="php/Carrito.php">Carrito <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="pago.php">Pagos <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                       Administrar Clientes
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="registro2.php">Nuevo Cliente</a>
                        <a class="dropdown-item" href="listarClientes.php">Listar Clientes</a>                        
                    </div>
                    </li>
                 <li class="nav-item">
                     <a class="nav-link" href="php/salir.php" tabindex="-1" aria-disabled="true">Salir</a>
                 </li>
             </ul>
         </div>
  </nav>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<br>
				<h3>Registro de Clientes</h3>
				<div class="d-flex justify-content-end social_icon">
					<a href="https://www.facebook.com/sneider.starman.9/" target="_BLANK"><span><i class="fab fa-facebook-square"></i></span></a>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method="get" name="frmUsuarios" onsubmit="return validar()" action="cliente2.php">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-id-card"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Cedula" name="cedula" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Nombre" name="nombre" maxlength="30" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Direccion" name="direccion" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<br><span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<br><span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Confirmar Password" name="password2" id="password2" required>
					</div>
					
					<div class="form-group">
						<input type="submit" name="enviar" value="Registar" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<footer style="background-color: #202020;color: white;">

		<img src="https://img.icons8.com/metro/26/000000/twitter.png" width="35px" height="35px">
		<a href="https://www.facebook.com/sneider.starman.9/"><img  src="https://img.icons8.com/ios-filled/50/000000/facebook-circled.png"></a>
		<a href="https://studio.youtube.com/channel/UCgtOH6Udn-0YEpc5i3WrGVA/videos/upload?filter=%5B%5D&sort=%7B%22columnType%22%3A%22date%22%2C%22sortOrder%22%3A%22DESCENDING%22%7D"><img  src="https://img.icons8.com/ios-filled/50/000000/youtube.png" ></a>
		<center><label class="letra"style="padding-left: 20px">&copy 2021 Starman todos los derechos reservados</label></center><br>
		<center><b><label style="font-size:16px;color: white"><--BRYAN--></label></b></center>

        </footer>
</body>
</html>
