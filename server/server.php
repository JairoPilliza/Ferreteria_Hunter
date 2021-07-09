<?php

	class wsEjemplo{
        function insertar(string $producto,int $catId,string $descripcion,string $precio, int $stock ,string $imagen):int
        {
                include "../config/conexion.php";
               return $db ->query("Insert into inventario values(null,'$producto','$catId','$descripcion','$precio', $stock,'$imagen');");              
                
        }

	function consultarTodos():string
	{
		
		include "../config/conexion.php";
		$r= $db->query("Select * from inventario");
		$html="";
		while($row = $r->fetch_assoc()){
		$html .="
		<tr>
		<td>".$row['invId']."</td>
		<td>".$row['invProducto']."</td>
		<td>".$row['invDescripcion']."</td>
		<td>".$row['invPrecio']."</td>
		<td>".$row['invStock']."</td>
		<td>
          <img src='data:image/jpeg;base64,".base64_encode($row["invImagen"])."' width='150px' height='100px'>
		</td>
		<td> <a href='../cliente/vistaEditar.php?id=".$row['invId']."' class='btn btn-sm btn-info btn-lg' >Editar</a></td>
		<td><button class='btn btn-sm btn-danger' onclick='eliminar(".$row['invId'].");'>Eliminar</button></td>
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
			$r = $db->query("Select * from inventario where invId= $id;");
			$res="";
			while($row = $r->fetch_assoc()){
				$res = $row['invId'].",".$row['invProducto'].",".$row['invDescripcion'].",".$row['invPrecio'].",".$row['invStock'].",".$row['invImagen'];
			}
			return $res;			
		}

		function modificar(int $id, string $nombre, string $apellido, string $correo, int $edad): int
		{
			include "../conectar/conectar.php";
			return $db->query("update clientes set nombre='$nombre', apellido='$apellido', correo='$correo', edad=$edad where id = $id;");
		}

		function eliminar(string $id): int
		{
			include "../config/conexion.php";
			return $db->query("delete from inventario where invId = $id;");
		}
	}
		try{
			$server = new SoapServer('http://localhost:80/ferreteria/wsdl2.xml');

			$server->setClass('wsEjemplo');
			$server->handle();
		}catch (SOAPFault $f){
			print $f->faultstring;
		}
	
	

?>