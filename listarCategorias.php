<?php
include("config/conexion.php");
?>
<link rel="stylesheet" type="text/css" href="css/principal5.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
<section class="app" >
  <aside class="sidebar">
         <header >
        Ferreteria Hunter
      </header>
    <nav class="sidebar-nav" >
      <ul >
        <li>
          <a href="principal.php"><i class="fas fa-truck-moving"></i> <span>Principal</span></a>
        </li>
        <li>
          <a href="#"><i class="fas fa-clipboard-list"></i>Inventario</a>
          <ul class="nav-flyout">
            <li>
              <a href="cliente/index.php"><i class="fas fa-wrench"></i>Productos</a>
            </li>
            <li>
              <a href="registroProductos.php"><i class="fas fa-box-open"></i>Ingreso de Productos</a>
            </li>
            <li>
              <a href="listarCategorias.php"><i class="fas fa-toolbox"></i>Categorias</a>
            </li>
            <li>
              <a href="pdf/productos.php" target="_BLANK"><i class="fas fa-file-pdf"></i>Reporte Productos</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="far fa-address-card"></i> <span class="">Clientes</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="clientes/index.php"><i class="fas fa-address-book"></i>Gestion Clientes</a>
            </li>
            <li>
              <a href="pdf/clientes.php" target="_BLANK"><i class="fas fa-file-pdf"></i>Reportes</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fas fa-user-secret"></i> <span class="">Empleados</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="empleados/index.php"><i class="fas fa-business-time"></i>Gestion Empleados</a>
            </li>
            <li>
              <a href="pdf/empleados.php" target="_BLANK"><i class="fas fa-file-pdf"></i>Reportes</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fab fa-cc-visa"></i> <span class="">Ventas</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="despachar.php"><i class="fas fa-wrench"></i>Ordenes</a>
            </li>
            <li>
              <a href="php/Carrito.php"><i class="fas fa-truck-loading"></i>Compras</a>
            </li>
            <li>
              <a href="pdf/ventas.php" target="_BLANK"><i class="fas fa-file-pdf"></i>Reporte Ventas</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="facturacion.php"><i class="fas fa-file-pdf"></i> <span class="">Facturación</span></a>
        </li>
        <li>
          <a href="php/salir.php"><i class="fas fa-power-off"></i> <span class="">Salir</span></a>
        </li>
      </ul>
    </nav>
  </aside>
</section>
<section class="app2" style="background-image: url(img/logoDetalladoF3.png); background-size: 100% 100%; background-repeat: no-repeat;">
<?php
    $query="select * from categoria";
    $enviar=mysqli_query($db,$query);
    $ver=mysqli_fetch_array($enviar);
    echo "<center><h1 style=color:white;>Registros de Categorias</h1></center>";
    echo "<div class=container><center><table class=table style=color:white;>
        <thead class=thead-dark>
    <tr>
      <th scope=col>ID</th>
      <th scope=col>Nombre</th>
      <th scope=col>Accion</th>
    </tr>
  </thead>";
    do{
    $id=$ver['catId'];
    $nombre=$ver['catNombre'];
    echo '
        <tbody>
        <tr>
        <td>'.$id.'</td>
        <td>'.$nombre.'</td>
        <td><a href="categorias.php?id='.$id.'"><input type="button" value="Eliminar" name="Eliminar"class="btn btn-sm btn-danger" onclick="return ConfirmarEliminar()"></a>
        <a href="modificar.php?id='.$id.'"><input type="button" value="Modificar" name="Eliminar"class="btn btn-sm btn-warning"></a></td>
        </tr>

    ';
    }while ($ver=mysqli_fetch_array($enviar)); 
        echo '</tbody></table></center></div>';
?>

</section>

</body>
</html>

