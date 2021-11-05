<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ferreteria Hunter</title>
      <link rel="stylesheet" type="text/css" href="css/principal6.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
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
  <br><br><br><br>
  <center>
  
  <iframe width="600" height="373.5" src="https://app.powerbi.com/view?r=eyJrIjoiMmQ2M2JjNmEtZjczOC00MjU0LWI4ZTUtNDAyZTBmMjc4ZWJlIiwidCI6ImUzNDU2Y2I5LTFkMmQtNGU3OS1iZTlhLTdhOTkwMzczZmIyYiJ9&pageName=ReportSection" frameborder="0" allowFullScreen="true"></iframe>
</section>
</body>
</html>
