<?php

if(isset($_GET['accion'])){
$accion = $_GET['accion'];
try{
    $cliente= new SoapClient('http://localhost:80/ferreteria/wsdl2.xml');
    if ($accion == "buscarTodos") {
        echo $cliente->consultarTodos();
    } else if ($accion == "buscarId") {
        $id = $_GET['invId'];
        echo $cliente->buscarId($id);
    } else if ($accion == "guardar") {
        $id = $_GET['id'];
        $producto = $_GET['producto'];
        $catId = $_GET['catId'];
        $descripcion = $_GET['descripcion'];
        $precio = $_GET['precio'];
        $stock = $_GET['stock'];
        $image = $_FILES['imagen']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
      
        if ($id == null) {
            echo $cliente->insertar($producto,$catId,$descripcion,$precio,$stock, $imgContenido);
        
        } else {
            echo $cliente->modificar($id,$producto,$catId,$descripcion,$precio,$stock, $imgContenido);
               
        }
    }else if($accion =='eliminar'){
        $id = $_GET['id'];
        echo $cliente->eliminar($id);
    }else if ($accion == "filtro") {
        $palabra=$_GET['palabra'];
        echo $cliente->filtro($palabra);
    }
}catch (SOAPFault $F) {
    echo $F->getMessage().PHP_EOL;
    echo $F->getMessage()."error".PHP_EOL;
}
}


?>