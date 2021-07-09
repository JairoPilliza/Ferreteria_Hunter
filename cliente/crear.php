<?php  
include("../config/conexion.php");

if(isset($_REQUEST['guardar'])){
    if (isset($_FILES['imagen']['name'])) {
    $tamanoArchivo=$_FILES['imagen']['size'];
	$imagenSubida=fopen($_FILES['imagen']['tmp_name'],'r');
	$binariosImagen=fread($imagenSubida,$tamanoArchivo);
	$binariosImagen=mysqli_escape_string($db,$binariosImagen);
    $query="insert into inventario values (0,'$_REQUEST[producto]','$_REQUEST[cmbcategorias]','$_REQUEST[descripcion]','$_REQUEST[precio]','$_REQUEST[stock]','$binariosImagen')";
    $enviar=mysqli_query($db,$query);

	header('location:index.php');
    }

}
?>