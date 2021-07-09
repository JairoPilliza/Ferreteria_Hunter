<?php

	class wsEjemplo{
        function insertar(string $cedula,string $nombre,string $direccion,string $correo,string $clave):int
        {
                include "../config/conexion.php";
               return $db ->query("Insert into clientes values(null,'$cedula','$nombre','$direccion','$correo','$clave');");              
                
        }

	function consultarTodos():string
	{
		
		include "../config/conexion.php";
		$r= $db->query("Select * from clientes");
		$html="";
		while($row = $r->fetch_assoc()){
		$html .="
		<tr>
		<td>".$row['cliId']."</td>
		<td>".$row['cliCedula']."</td>
		<td>".$row['cliNombre']."</td>
        <td>".$row['cliDireccion']."</td>
        <td>".$row['cliCorreo']."</td>
		<td>".$row['cliClave']."</td>	
		<td> <a href='../clientes/vistaEditar.php?id=".$row['cliId']."' class='btn btn-sm btn-info btn-lg' >Editar</a></td>
		<td><button class='btn btn-sm btn-danger' onclick='eliminar(".$row['cliId'].");'>Eliminar</button></td>
		</tr>";
		}
			return $html;

		}

		function filtro($palabra):string
		{
			include "../config/conexion.php";
			$r= $db->query("Select * from clientes where id like'%$palabra%' or nombre like'%$palabra%' or apellido like'%$palabra%' or correo like'%$palabra%' or edad like'%$palabra%'");
			$html="";
			while($row = $r->fetch_assoc()){
				$html .="
				<tr>
				<td>".$row['id']."</td>
				<td>".$row['nombre']."</td>
				<td>".$row['apellido']."</td>
				<td>".$row['correo']."</td>
				<td>".$row['edad']."</td>
				<td><button class='btn btn-sm btn-warning' onclick='buscarId(".$row['id'].");'>Actualizar</button></td>
				<td><button class='btn btn-sm btn-danger' onclick='eliminar(".$row['id'].");'>Eliminar</button></td>
				</tr>";
			}
			return $html;

		}

		function buscarId(int $id):string
		{
			include "../config/conexion.php";
			$r = $db->query("Select * from clientes where cliId= $id;");
			$res="";
			while($row = $r->fetch_assoc()){
				$res = $row['cliId'].",".$row['cliNombre'].",".$row['cliCedula'].",".$row['cliClave'];
			}
			return $res;			
		}

		function modificar(int $id, string $nombre, string $cedula, string $clave): int
		{
			include "../conectar/conectar.php";
			return $db->query("update clientes set cliNombre='$nombre', cliCedula='$cedula', cliClave='$clave' where cliId = $id;");
		}

		function eliminar(string $id): int
		{
			include "../config/conexion.php";
			return $db->query("delete from clientes where cliId = $id;");
		}
	}
		try{
			$server = new SoapServer('http://localhost:80/ferreteria/wsdlC.xml');

			$server->setClass('wsEjemplo');
			$server->handle();
		}catch (SOAPFault $f){
			print $f->faultstring;
		}
	
	

?>