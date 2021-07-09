<?php
$id="0";
$cedula=$_GET['cedula'];
$nombre=$_GET['nombre'];
$direccion=$_GET['direccion'];
$clave=$_GET['password'];
$cliente= new SoapClient('http://localhost:80/tiendam/wsdl2.xml');
try {
    echo "<br>".$return = $cliente->__soapCall("insertar",[$id,$cedula,$nombre,$direccion,$clave]);
} catch (SOAPFault $F) {
    echo $F->getMessage().PHP_EOL;
}
?>