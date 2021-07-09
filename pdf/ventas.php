<?php
	include 'plantilla.php';
	require 'conexion.php';

	$query = "select * from orden o,clientes c where o.cliId=c.cliId order by o.ordId";
	$resultado = $mysqli->query($query);
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(20,6,'ID',0,0,'C',1);
			$pdf->Cell(50,6,'CLIENTE',0,0,'C',1);
			$pdf->Cell(50,6,'FECHA',0,0,'C',1);
			$pdf->Cell(40,6,'TOTAL',0,1,'C',1);
			$pdf->Ln(2);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,utf8_decode($row['ordId']),0,0,'C');
		$pdf->Cell(50,6,utf8_decode($row['cliNombre']),0,0,'L');
		$pdf->Cell(50,6,utf8_decode($row['ordFecha']),0,0,'C');
		$pdf->Cell(40,6,$row['ordTotalprecio'],0,1,'C');
	}
	$pdf->Output();
?>