<?php
	include 'plantilla.php';
	require 'conexion.php';
	$id=$_GET['id'];
	$query = "select * from clientes c,orden o,inventario i,detalle d WHERE o.cliId=c.cliId and d.ordId=o.ordId and d.invId=i.invId and d.ordId=$id";
	$resultado = $mysqli->query($query);
	$query2 = "select * from clientes c,orden o,inventario i,detalle d
			WHERE o.cliId=c.cliId and d.ordId=o.ordId and d.invId=i.invId and d.ordId=$id";
			$resultado2 = $mysqli->query($query2);
			$row2 = $resultado2->fetch_assoc();
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',10);
			$pdf->Cell(15,5, 'Cliente: ',0,0,'L');
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(50,5, $row2['cliNombre'],0,0,'L');
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(5,5, '',0,0,'C');
			$pdf->Cell(15,5, 'Cedula: ',0,0,'L');
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(30,5, $row2['cliCedula'],0,0,'L');
			$pdf->Cell(5,5, '',0,0,'C');
			$pdf->Cell(18,5, 'Direccion: ',0,0,'L');
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(60,5, $row2['cliDireccion'],0,1,'L');
			$pdf->Ln(5);
			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(10,6,'ID',1,0,'C',1);
			$pdf->Cell(40,6,'PRODUCTO',1,0,'C',1);
			$pdf->Cell(70,6,'DESCRIPCION',1,0,'C',1);
			$pdf->Cell(30,6,'CANTIDAD',1,0,'C',1);
			$pdf->Cell(30,6,'PRECIO',1,1,'C',1);

	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(10,6,utf8_decode($row['invId']),1,0,'C');
		$pdf->Cell(40,6,utf8_decode($row['invProducto']),1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['invDescripcion']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['detCantidad']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode("$ ".$row['invPrecio']),1,1,'L');

	}
	//$subtotal=$row2['ordTotalprecio']-($row['ordTotalprecio']*0.12);
	$iva=number_format($row2['ordTotalprecio']*0.12, 2);
	$subtotal=number_format($row2['ordTotalprecio']-$iva, 2);
	$total=$iva+$subtotal;
	$pdf->Ln(8);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(150,6,utf8_decode("Subtotal: "),0,0,'R');
	$pdf->Cell(30,6,utf8_decode("$ ".$subtotal),0,1,'L');
	$pdf->Cell(150,6,utf8_decode("IVA: "),0,0,'R');
	$pdf->Cell(30,6,utf8_decode("$ ".$iva),0,1,'L');
	$pdf->Cell(150,6,utf8_decode("Total: "),0,0,'R');
	$pdf->Cell(30,6,utf8_decode("$ ".$total),0,1,'L');
	$pdf->Output();
?>