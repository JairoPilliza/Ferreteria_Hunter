<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/estile.css">
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
    <link rel="stylesheet" type="text/css" href="../css/principal5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <title>Ventana Cliente</title>
    <script>
    
        function cargarDatos() {
            let xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("datos").innerHTML = this.responseText;

            }
            xhttp.open("GET", "cliente.php?accion=buscarTodos");
            xhttp.send();
        }

        function buscarId(id) {

            let res = "";
            let xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                res = (this.responseText).split(",");
                document.getElementById('id').value = res[0];
                document.getElementById('nombre').value = res[1];
                document.getElementById('apellido').value = res[2];
                document.getElementById('correo').value = res[3];
                document.getElementById('edad').value = res[4];
            }
            xhttp.open("GET", "cliente.php?accion=buscarId&id=" + id);
            xhttp.send();
        }

        function eliminar(id) {


            let xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                xhttp.onload = function() {
                    document.getElementById("datos").innerHTML = this.responseText;

                }
                xhttp.open("GET", "cliente.php?accion=buscarTodos");
                xhttp.send();
            }
            xhttp.open("GET", "cliente.php?accion=eliminar&id=" + id);
            xhttp.send();
        }

        function guardar() {
            let id = document.getElementById('id').value;
            let producto = document.getElementById('producto').value;
            let catId = document.getElementById('cmbcategorias').value;
            let descripcion = document.getElementById('descripcion').value;
            let precio = document.getElementById('precio').value;
            let stock = document.getElementById('stock').value;
            let imagen = document.getElementById('imagen').value;
            let xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                xhttp.onload = function() {
                    document.getElementById("datos").innerHTML = this.responseText;

                }
                xhttp.open("GET", "cliente.php?accion=buscarTodos");
                xhttp.send();
            }
            xhttp.open("GET", "cliente.php?accion=guardar&id=" + id + "&producto=" + producto + "&catId=" + catId + "&descripcion=" + descripcion + "&precio=" + precio + "&stock=" + stock+ "&imagen=" + imagen);
            xhttp.send();
        }

        function buscarDatos() {
            var a = document.getElementById('buscar').value;
            let xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("datos").innerHTML = this.responseText;

            }
            xhttp.open("GET", "cliente.php?accion=filtro&palabra=" + a);
            xhttp.send();
        }
    </script>  
</head>

<body onload="cargarDatos();">
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
              <a href="index.php"><i class="fas fa-wrench"></i>Productos</a>
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
              <a href="../php/Carrito.php"><i class="fas fa-truck-loading"></i>Compras</a>
            </li>
          </ul>
        </li>
        <li>
          <a href="../php/salir.php"><i class="fas fa-power-off"></i> <span class="">Salir</span></a>
        </li>
      </ul>
    </nav>
  </aside>
</section>
<section class="app2" style="background-image: url(../img/logoDetalladoF3.png); background-size: 100% 100%; background-repeat: no-repeat;">
    <center><i class="fas fa-search"></i><input type="search" name="buscar" id="buscar" placeholder="Buscar" onkeyup="buscarDatos()"></center>
    <!-- </form> -->
    <br><br>
    <center>
        <h1 style=color:white;>Inventario de Productos</h1>
    </center>
    <div class=container>
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#nuevo"><i class="fa fa-plus">Nuevo</i></button>
        <center>
            <table class="table" style="color:white">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Accion</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody id="datos">

                </tbody>
                
            </table>
        </center>
      

        <div class="modal fade" id="nuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-md modal-dialog-centered" role="document">
                <div class="modal-content" style="background-image:url('https://ae01.alicdn.com/kf/HTB1tOvwm29TBuNjy0Fcq6zeiFXaA.jpg');">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body"  >
                       <form action="crear.php" method="post" enctype="multipart/form-data">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Producto" name="producto" id="producto" required>
                                <input type="text" class="form-control" placeholder="id" name="id" id="id" hidden >

                            </div>
                            <div class="input-group form-group">
                            <div class="input-group-prepend">
                                    <br><span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <select id="cmbcategorias" name="cmbcategorias" class="form-control">
                                    <option value="0">Todos</option>
                                    <?php
                                    include ('../config/conexion.php');
                                    $queryC = "select * from categoria";
                                    $enviarC = mysqli_query($db, $queryC);
                                    $ver = mysqli_fetch_array($enviarC);
                                    do {
                                        $idC = $ver['catId'];
                                        $nombreC = $ver['catNombre'];
                                        echo '
                                                <option value=' . $idC . '>' . $nombreC . '</option>	
                                                ';
                                    } while ($ver = mysqli_fetch_array($enviarC));
                                    ?>
                                </select>
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Descripcion" id="descripcion" name="descripcion"  required>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Precio" name="precio" id="precio" required>

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <br><span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Stock" name="stock" id="stock" required>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <br><span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="file" class="form-control" placeholder="imagen" name="imagen" id="imagen" required accept="image/*">
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
    </div>
  </section>
</body>

</html>