<?php
	include 'plantilla.php';
	require 'conexion.php';

	$query = "select * from clientes";
	$resultado = $mysqli->query($query);
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',12);
			$pdf->Cell(10,6,'ID',1,0,'C',1);
			$pdf->Cell(40,6,'CEDULA',1,0,'C',1);
			$pdf->Cell(40,6,'NOMBRE',1,0,'C',1);
			$pdf->Cell(40,6,'DIRECCION',1,0,'C',1);
			$pdf->Cell(50,6,'CORREO',1,1,'C',1);
			$pdf->Ln(2);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(10,6,utf8_decode($row['cliId']),0,0,'C');
		$pdf->Cell(40,6,$row['cliCedula'],0,0,'C');
		$pdf->Cell(40,6,$row['cliNombre'],0,0,'C');
		$pdf->Cell(40,6,$row['cliDireccion'],0,0,'C');
		$pdf->Cell(50,6,$row['cliCorreo'],0,1,'C');
	}
	$pdf->Output();
?>