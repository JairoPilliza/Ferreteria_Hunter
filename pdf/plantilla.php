<?php
	
	require 'fpdf/fpdf.php';
	require 'conexion.php';
	
	class PDF extends FPDF
	{
		function Header()
		{
			require 'conexion.php';
			$this->Image('../img/logoDetalladoF3.png','0','0','210','297'); 
			$this->Image('../img/logoFerreteria2.png', 5, 5, 30 );
			$this->Image('../img/logoFerreteria2.png', 170, 5, 30 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Ferreteria Hunter',0,1,'C');
			$this->SetFont('Arial','',10);
			$this->Cell(110,5, 'Direccion: Av. Los libertadores',0,0,'C');
			$this->Cell(120,5, 'Telefono: 0998672756',0,1,'L');
			$this->Cell(180,10, 'Quito-Ecuador',0,1,'C');
			$this->Ln(5);
			
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>