<?php

	class wsEjemplo{
        function insertar(string $nombre,string $cedula,string $clave):int
        {
                include "../config/conexion.php";
               return $db ->query("Insert into empleados values(null,'$nombre','$cedula','$clave');");              
                
        }

	function consultarTodos():string
	{
		
		include "../config/conexion.php";
		$r= $db->query("Select * from empleados");
		$html="";
		while($row = $r->fetch_assoc()){
		$html .="
		<tr>
		<td>".$row['empId']."</td>
		<td>".$row['empNombre']."</td>
		<td>".$row['empCedula']."</td>
		<td>".$row['empClave']."</td>	
		<td> <a href='../empleados/vistaEditar.php?id=".$row['empId']."' class='btn btn-sm btn-info btn-lg' >Editar</a></td>
		<td><button class='btn btn-sm btn-danger' onclick='eliminar(".$row['empId'].");'>Eliminar</button></td>
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
			$r = $db->query("Select * from empleados where empId= $id;");
			$res="";
			while($row = $r->fetch_assoc()){
				$res = $row['empId'].",".$row['empNombre'].",".$row['empCedula'].",".$row['empClave'];
			}
			return $res;			
		}

		function modificar(int $id, string $nombre, string $cedula, string $clave): int
		{
			include "../conectar/conectar.php";
			return $db->query("update empleados set empNombre='$nombre', empCedula='$cedula', empClave='$clave' where empId = $id;");
		}

		function eliminar(string $id): int
		{
			include "../config/conexion.php";
			return $db->query("delete from empleados where empId = $id;");
		}
	}
		try{
			$server = new SoapServer('http://localhost:80/ferreteria/wsdlE.xml');

			$server->setClass('wsEjemplo');
			$server->handle();
		}catch (SOAPFault $f){
			print $f->faultstring;
		}
	
	

?>