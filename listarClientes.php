<?php
include("config/conexion.php");
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/stylesConsulta.css">
<!DOCTYPE html>
<html>
<head>
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
    <script type="text/javascript">
        function ConfirmarEliminar()
        {
            var respuesta= confirm("Esta seguro de Eliminar al usuario");
            if(respuesta==true)
            {
                return true;
            }
            else
            {
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

</body>
</html>
<?php
	$query="select * from clientes";
    $enviar=mysqli_query($db,$query);
    $ver=mysqli_fetch_array($enviar);
	echo "<center><h1 style=color:white;>Registros de Clientes</h1></center>";
	echo "<div class=container><center><table class=table style=color:white;>
        <thead class=thead-dark>
    <tr>
      <th scope=col>ID</th>
      <th scope=col>Cedula</th>
      <th scope=col>Nombre</th>
      <th scope=col>Direccion</th>
      <th scope=col>Telefono</th>
      <th scope=col>Accion</th>
    </tr>
  </thead>";
	do{
	$id=$ver['cliId'];
	$cedula=$ver['cedula'];
	$nombre=$ver['nombre'];
	$direccion=$ver['direccion'];
	$clave=$ver['clave'];

	echo '
		<tbody>
		<tr>
		<td>'.$id.'</td>
		<td>'.$cedula.'</td>
		<td>'.$nombre.'</td>
		<td>'.$direccion.'</td>
		<td>'.$clave.'</td>
		<td><a href="cliente.php?id='.$id.'"><input type="button" value="Eliminar" name="Eliminar"class="btn btn-sm btn-danger" onclick="return ConfirmarEliminar()"></a>
        <a href="modificar.php?id='.$id.'"><input type="button" value="Modificar" name="Eliminar"class="btn btn-sm btn-warning"></a></td>
		</tr>

	';
	}while ($ver=mysqli_fetch_array($enviar)); 
		echo '</tbody></table></center></div>';
?>
