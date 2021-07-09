<?php
    include "pedidos.php";
    include "../config/conexion.php";
    $pedidos = new Pedidos;
    //print_r($_SESSION['cart_contents']);
    //foreach($_SESSION['cart_contents'] as $items){
      //  if (isset($items['id']) && !empty($items['id'])) { 
        //printf($items['id']."<br>");
        //printf($items['stock']."<br>");
    //}
    //session_start();
    //echo $_SESSION['cliente'];
//}
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/principal2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <script type="text/javascript" src="../js/jquery-3.5.1.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Document</title>
    <script>
    function updateItem(e ,id){
       let cantidad = e.value;
       let xhttp = new XMLHttpRequest();
       xhttp.onload = function(){
              window.location="Carrito.php";  
       }
       xhttp.open("GET","SolicitarPedido.php?action=updateItem&id="+id+"&cantidad="+cantidad);
       xhttp.send();

    }
     $(document).ready(function() {
            $('#cmbClientes').change(function(){
                var id=document.getElementById("cmbClientes").value;
                alert(id);
                 let xhttp = new XMLHttpRequest();
                xhttp.onload = function(){
              alert("hola");  
       }
       xhttp.open("GET","SolicitarPedido.php?action=cliente&id="+id);
       xhttp.send();
        });
        });
    </script>
</head>
<body>
    <section class="app">
  <aside class="sidebar">
         <header>
        Ferreteria Hunter
      </header>
    <nav class="sidebar-nav">
      <ul>
        <li>
          <a href="../principal.php"><i class="fas fa-truck-moving"></i> <span>Principal</span></a>
        </li>
        <li>
          <a href="#"><i class="fas fa-clipboard-list"></i>Inventario</a>
          <ul class="nav-flyout">
            <li>
              <a href="../cliente/index.php"><i class="fas fa-wrench"></i>Productos</a>
            </li>
            <li>
              <a href="#"><i class="fas fa-box-open"></i>Categorias</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="far fa-address-card"></i> <span class="">Clientes</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="fas fa-address-book"></i>Gestion Clientes</a>
            </li>
            <li>
              <a href="#"><i class="fas fa-file-pdf"></i>Reportes</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fas fa-user-secret"></i> <span class="">Empleados</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="fas fa-business-time"></i>Gestion Empleados</a>
            </li>
            <li>
              <a href="#"><i class="fas fa-file-pdf"></i>Reportes</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fab fa-cc-visa"></i> <span class="">Ventas</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="../despachar.php"><i class="fas fa-wrench"></i>Ordenes</a>
            </li>
            <li>
              <a href="Carrito.php"><i class="fas fa-truck-loading"></i>Compras</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="salir.php"><i class="fas fa-power-off"></i> <span class="">Salir</span></a>
        </li>
      </ul>
    </nav>
  </aside>
</section>
<section class="app2" style="background-image: url(../img/logoDetalladoF2.png); background-size: 100% 100%; background-repeat: no-repeat;">

<div class="container">   
    <h1 style="color:white;">Carrito de Compras</h1>  
    Clientes: <select id="cmbClientes" class="form-control  col col-lg-4">
            <option value="0">Seleccione</option>
            <?php
                $query=$db->query("select * from clientes");
                $ver=mysqli_fetch_array($query);
                do{
                    $idC=$ver['cliId'];
                    $nombreC=$ver['cliNombre'];
                echo '
                <option value='.$idC.'>'.$nombreC.'</option>    
                ';
                }
                while ($ver=mysqli_fetch_array($query)); 
            ?>
        </select><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#nuevo"><i class="fas fa-plus-square"></i> Nuevo</i></button>
    <table class="table table-dark">
        <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Producto:</th>
        <th scope="col">Precio</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Importe</th>
        <th scope="col">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php
               if (($_SESSION['cart_contents']) && $_SESSION['cart_contents']>0 && $_SESSION['cart_contents']['total_items'] !=0) {
                    foreach($_SESSION['cart_contents'] as $items){
                        if (isset($items['id']) && !empty($items['id'])) {                            
                        echo "
                        <tr>
                        <td>".$items['id']."</td>
                        <td>".$items['producto']."</td>
                        <td>".$items['price']."</td>
                        <td> <input type='number' onchange='updateItem(this,". $items['id'] .")' value='".$items['cantidad']."'></td>
                        <td class='star'> $".$items['subtotal']."</td>
                        <td><a href='SolicitarPedido.php?action=removeItem&id=".$items['id']."' class='btn btn-dark'"."onclick=''><i class='fas fa-trash'> Eliminar</i></a></t>
                        </tr>
                        
                        ";
                        
                    }
                }
                }else{
                    echo "<tr><td colspan='6'><h1>No hay Datos</h1></td></tr>";
                }
                
        ?>
        </tbody>
        <tfoot>
        <tr>
        <th>ID</th>
        <th>Producto:</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>$ <?php echo $_SESSION['cart_contents']['cart_total'] ?></th>
        <th>&nbsp;</th>
        </tr>
        </tfoot>
    </table>
    <a href="SolicitarPedido.php?action=crearOrden2" class="btn btn-dark"><i class="fa fa-cart-arrow-down" aria-hidden="true"> Comprar</i></a>
    <a href="SolicitarPedido.php?action=nueva" class="btn btn-warning float-right"><i class="fas fa-trash-alt"></i> Nueva Venta</i></a>

       </div>
</div>
</section>
<div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-md modal-dialog-centered" role="document">
      <div class="modal-content" style="background-image:url('../img/logoDetalladoF2.png');">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nuevo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="crearCliente.php" method="post">
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Cedula" name="cedula" id="cedula" required>
              <input type="text" class="form-control" placeholder="id" name="id" id="id" hidden>

            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" required>
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Direccion" name="direccion" id="direccion" required>

            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <br><span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Correo" name="correo" id="correo" required>
            </div>
            <div class="input-group form-group">
              <div class="input-group-prepend">
                <br><span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="Clave" name="clave" id="clave" required>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-primary float-left login_btn" data-dismiss="modal">Cerrar</button>
              <input type="submit" name="guardar" value="Registar" class="btn btn-info float-right login_btn">
            </div>
          </form>

        </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</body>
</html>