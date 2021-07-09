<?php

if(isset($_GET['accion'])){
$accion = $_GET['accion'];
try{
    $cliente= new SoapClient('http://localhost:80/ferreteria/wsdlC.xml');
    if ($accion == "buscarTodos") {
        echo $cliente->consultarTodos();
    } else if ($accion == "buscarId") {
        $id = $_GET['cliId'];
        echo $cliente->buscarId($id);
    } else if ($accion == "guardar") {     
        
        $cedula = $_GET['cedula'];
        $nombre = $_GET['nombre'];
        $direccion = $_GET['direccion'];
        $correo = $_GET['correo'];
        $clave = $_GET['clave'];
            echo $cliente->insertar($cedula,$nombre,$direccion,$correo,$clave);     
    }else if($accion == "modificar"){
        $id = $_GET['id'];
        $cedula = $_GET['cedula'];
        $nombre = $_GET['nombre'];
        $direccion = $_GET['direccion'];
        $correo = $_GET['correo'];
        $clave = $_GET['clave'];
            
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