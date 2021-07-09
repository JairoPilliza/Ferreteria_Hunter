<?php
    include ("config/conexion.php");
    session_start();
    $nombre=$_SESSION['nombre'];
    if (!isset($nombre)) {
        header("location:index.php");
    }
    //unset($_SESSION["favcolor"]);//variar session
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
      <link rel="stylesheet" type="text/css" href="css/principal4.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
<div class="container">
         <br><br><br><br><br>
         <div class="alert alert-dark">
             <h1>Bienvenido <?php echo $nombre; ?></h1>           
         </div>
          <div class="row">
            <?php
                $query=$db->query("select * from inventario");
                if ($query->num_rows>0) {
                    while($row=$query->fetch_assoc()){
                if ($row['invStock']>0) {
      
                
            ?>
                        <div class="col-3">
                        <div class="card">
                         <?php
                         echo '<img class="card-img-top" height="150 px" width="100 px" src="data:image/jpeg;base64,'.base64_encode($row["invImagen"]).'">';
                         ?>
                            <div class="card-body">
                                <h5 class="card-title"><strong> Producto: </strong> <?php echo $row['invProducto']?></h5>
                                <h5 class="card-title"><strong> Precio: </strong> $<?php echo $row['invPrecio']?></h5>
                                <h5 class="card-title"><strong> Stock: </strong> <?php echo $row['invStock']?></h5>
                            </div>
                        </div> 
                        <div class="col-1">
                            <a href="php/SolicitarPedido.php?action=addItem&id=<?php echo $row['invId']?>" class="btn btn-dark">Comprar</a>
                        </div>             
                    </div>  
                 
            <?php
          }else{
            ?>
            <div class="col-3">
                        <div class="card">
                         <?php
                         echo '<img class="card-img-top" height="150 px" width="100 px" src="data:image/jpeg;base64,'.base64_encode($row["invImagen"]).'">';
                         ?>
                            <div class="card-body">
                                <h5 class="card-title"><strong> Producto: </strong> <?php echo $row['invProducto']?></h5>
                                <h4 class="card-title"><strong> No Disponible</strong></h4>
                            </div>
                        </div>              
                    </div>  

            <<?php 
            }
                    }
                }else{
                    echo "<h1>No existen Productos en Stock</h1>";
                }

            ?>
                     
     </div>
</section>
</body>
</html>