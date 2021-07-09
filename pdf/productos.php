<?php
	include 'plantilla.php';
	require 'conexion.php';

	$query = "select * from inventario";
	$resultado = $mysqli->query($query);
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(10,6,'ID',1,0,'C',1);
			$pdf->Cell(60,6,'PRODUCTO',1,0,'C',1);
			$pdf->Cell(80,6,'DESCRIPCION',1,0,'C',1);
			$pdf->Cell(20,6,'STOCK',1,0,'C',1);
			$pdf->Cell(20,6,'PRECIO',1,1,'C',1);
			$pdf->Ln(2);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(10,6,utf8_decode($row['invId']),0,0,'C');
		$pdf->Cell(60,6,utf8_decode($row['invProducto']),0,0,'L');
		$pdf->Cell(80,6,utf8_decode($row['invDescripcion']),0,0,'L');
		$pdf->Cell(20,6,$row['invStock'],0,0,'C');
		$pdf->Cell(20,6,$row['invPrecio'],0,1,'C');
	}
	$pdf->Output();
?>