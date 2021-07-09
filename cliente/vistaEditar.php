<?php  
include("../config/conexion.php");
$id=$_GET['id'];
$query=$db->query("select * from inventario where invId=$id");
$mostrar = mysqli_fetch_array($query);
$id2=$mostrar['invId'];
$producto=$mostrar['invProducto'];
$categoria=$mostrar['catId'];
$descripcion=$mostrar['invDescripcion'];
$precio=$mostrar['invPrecio'];
$stock=$mostrar['invStock'];
$image=$mostrar['invImagen'];
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
<div class="container "  >
	<div class="d-flex justify-content-center h-100">
		<div class="card col col-lg-6" style="background-image:url('https://ae01.alicdn.com/kf/HTB1tOvwm29TBuNjy0Fcq6zeiFXaA.jpg');">
			<div class="card-header">
				<br>
				<h3>Modificacion de Productos</h3>
				<center><?php echo'<img height="150" width="150" src="data:image/jpeg;base64,'.base64_encode($mostrar["invImagen"]).'"/>' ?></center>
			</div>
			<div class="card-body">
				<form method="post" action="editar.php" name="frmUsuarios" enctype="multipart/form-data">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-id-card"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="ID" name="id" id="id" value="<?php echo $id2;?>" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-shopping-cart"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="producto" name="producto" value="<?php echo $producto;?>" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-store"></i></span>
						</div>
						<select name="cmbcategorias" class="form-control">
							<?php
								$queryC="select * from categoria";
								$enviarC=mysqli_query($db,$queryC);
								$ver=mysqli_fetch_array($enviarC);
								do{
									$idC=$ver['catId'];
									$nombreC=$ver['catNombre'];
									if ($idC==$categoria) {
										echo '<option selected value='.$idC.'>'.$nombreC.'</option>';
									}else {
										echo '<option value='.$idC.'>'.$nombreC.'</option>';
									}
								}
								while ($ver=mysqli_fetch_array($enviarC)); 
							?>
						</select>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<br><span class="input-group-text"><i class="fas fa-book"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Descripcion" name="descripcion" value="<?php echo $descripcion?>" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<br><span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
						</div>
						<input type="number" class="form-control" placeholder="precio" name="precio" step="0.01" value="<?php echo $precio?>"  required>
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<br><span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
						</div>
						<input type="number" class="form-control" placeholder="Stock" name="stock" step="0.01" value="<?php echo $stock?>"  required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<br><span class="input-group-text"><i class="fas fa-file-image"></i></span>
						</div>
						<input type="file" class="form-control" name="imagen" id="imagen" accept="image/*">
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