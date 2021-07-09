<?php

if(isset($_GET['accion'])){
$accion = $_GET['accion'];
try{
    $cliente= new SoapClient('http://localhost:80/ferreteria/wsdlE.xml');
    if ($accion == "buscarTodos") {
        echo $cliente->consultarTodos();
    } else if ($accion == "buscarId") {
        $id = $_GET['empId'];
        echo $cliente->buscarId($id);
    } else if ($accion == "guardar") {     
        $nombre = $_GET['nombre'];
        $cedula = $_GET['cedula'];
        $clave = $_GET['clave'];
            echo $cliente->insertar($nombre,$cedula,$clave);     
    }else if($accion == "modificar"){
        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
        $cedula = $_GET['cedula'];
        $clave = $_GET['clave'];
            echo $nombre;
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