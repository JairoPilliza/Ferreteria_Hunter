<?php
$cliente= new SoapClient('http://localhost:80/tiendam/wsdl2.xml');
try {
    echo "<br>".$return = $cliente->__soapCall("listar",[]);
} catch (SOAPFault $F) {
    echo $F->getMessage().PHP_EOL;
}
?>