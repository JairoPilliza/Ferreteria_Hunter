<?php  
include("../config/conexion.php");
if ($_FILES['imagen']['name'] != null) {
//echo "Tiene datos La variable";
$tamanoArchivo=$_FILES['imagen']['size'];
$imagenSubida=fopen($_FILES['imagen']['tmp_name'],'r');
$binariosImagen=fread($imagenSubida,$tamanoArchivo);
$binariosImagen=mysqli_escape_string($db,$binariosImagen);
    $query="update inventario SET invProducto='$_REQUEST[producto]',catId='$_REQUEST[cmbcategorias]',invDescripcion='$_REQUEST[descripcion]',invPrecio='$_REQUEST[precio]',invStock='$_REQUEST[stock]',invImagen='$binariosImagen' WHERE invId='$_REQUEST[id]';";
   
    $enviar=mysqli_query($db,$query);
	header('location:index.php');
}else{
//echo "No hay datos";
 $query="update inventario SET invProducto='$_REQUEST[producto]',catId='$_REQUEST[cmbcategorias]',invDescripcion='$_REQUEST[descripcion]',invPrecio='$_REQUEST[precio]',invStock='$_REQUEST[stock]' WHERE invId='$_REQUEST[id]';";
 $enviar=mysqli_query($db,$query);
	header('location:index.php');
}

?>