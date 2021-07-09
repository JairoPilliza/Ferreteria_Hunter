<?php
$id=$_GET['id'];
$cedula=$_GET['cedula'];
$nombre=$_GET['nombre'];
$direccion=$_GET['direccion'];
$clave=$_GET['password'];
$cliente= new SoapClient('http://localhost:80/tiendam/wsdl2.xml');
try {
    echo "<br>".$return = $cliente->__soapCall("modificar",[$cedula,$nombre,$direccion,$clave,$id]);
} catch (SOAPFault $F) {
    echo $F->getMessage().PHP_EOL;
}
?>