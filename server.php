<?php

	class MiClase{
		
		public function insertar($id,$cedula,$nombre,$direccion,$clave)
		{
            include ("config/conexion.php");
			$query="insert into clientes values(0,'$cedula','$nombre','$direccion','$clave')";
	        $enviar=mysqli_query($db,$query);
			return "<script>alert('Cliente Registrado :D');
			window.location ='listarClientes.php';</script>";
		}
		public function modificar($cedula,$nombre,$direccion,$clave,$id)
		{
            include ("config/conexion.php");
			$query="update clientes set cedula='$cedula',nombre='$nombre',direccion='$direccion', clave='$clave' where cliid=$id";
	        $enviar=mysqli_query($db,$query);
			return "<script>alert('Cliente Modificado :D');
			window.location ='listarClientes.php';</script>";
		}
		public function eliminar($id)
		{
            include ("config/conexion.php");
            $query="select * from orden where cliid=$id";
	        $enviar=mysqli_query($db,$query);
			$ver=mysqli_num_rows($enviar);
			if ($ver>0) {
				return "<script>alert('El Cliente esta referenciado en otra tabla no se puede Eliminar');
				window.location ='listarClientes.php';</script>";
			}else{
				$query="delete from clientes where cliid=$id";
	        	$enviar=mysqli_query($db,$query);
				return "<script>alert('Cliente Eliminado :D');
				window.location ='listarClientes.php';</script>";
			}
		}
	}
		try{
			$server = new SoapServer(null,[
				'uri'=>'http://localhost:80/tiendam/server.php'
			]);

			$server->setClass('MiClase');
			$server->handle();
		}catch (SOAPFault $f){
			print $f->faultstring;
		}
	
	

?>