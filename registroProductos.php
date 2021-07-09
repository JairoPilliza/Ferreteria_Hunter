<?php

include("config/conexion.php");
if (isset($_POST['enviar'])) {
  $cantidad=$_POST['cantidad'];
  $producto=$_POST['cmbProducto'];
  if ($cantidad<1) {
    echo'<script>alert("Cantidad No Valida")</script>';
  }
  if ($producto==0) {
    echo'<script>alert("Seleccione el Producto")</script>';
  }else{
  $query="select * from inventario where invId=$producto";
  $enviarC=mysqli_query($db,$query);
  $ver=mysqli_fetch_array($enviarC);
  $invCantidad=$ver['invStock'];
  $total=$cantidad+$invCantidad;
  $query="update inventario set invStock=$total where invId=$producto";
  $enviarC=mysqli_query($db,$query);
  }
  
  
  
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
      <link rel="stylesheet" type="text/css" href="css/principal5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    
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
<section class="app2" style="background-image: url(img/logoDetalladoF2.png); background-size: 100% 100%; background-repeat: no-repeat;">
 <div class="card-body">
  <form method="post">
    <h2 style="color:white">Cantidad: </h2> 
  <input type="number" name="cantidad" id="cantidad" class="form-control  col col-lg-3" value="0">
  <br>
  <br>
  <h2 style="color:white">Producto: </h2> 
   <select name="cmbProducto" id="cmbProducto" class="form-control  col col-lg-3">
            <option value="0">Seleccione</option>
            <?php
            include "config/conexion.php";
                $query=$db->query("select * from inventario");
                $ver=mysqli_fetch_array($query);
                do{
                    $idC=$ver['invId'];
                    $nombreC=$ver['invProducto'];
                    $descripcion=$ver['invDescripcion'];
                echo '
                <option value='.$idC.'>'.$nombreC." " .$descripcion.'</option>    
                ';
                }
                while ($ver=mysqli_fetch_array($query)); 
            ?>
        </select>
        <br>
<input type="submit" name="enviar" id="enviar" class="btn btn-dark" value="Guardar">
  </form>
 </div>
    
</section>
</body>
</html>