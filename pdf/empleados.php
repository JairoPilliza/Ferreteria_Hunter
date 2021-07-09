<?php
	include 'plantilla.php';
	require 'conexion.php';

	$query = "select * from empleados";
	$resultado = $mysqli->query($query);
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(60,6,'ID',0,0,'C',1);
			$pdf->Cell(60,6,'CEDULA',0,0,'C',1);
			$pdf->Cell(60,6,'NOMBRE',0,1,'C',1);

			$pdf->Ln(2);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(60,6,utf8_decode($row['empId']),0,0,'C');
		$pdf->Cell(60,6,$row['empCedula'],0,0,'C');
		$pdf->Cell(60,6,$row['empNombre'],0,1,'C');
	}
	$pdf->Output();
?>