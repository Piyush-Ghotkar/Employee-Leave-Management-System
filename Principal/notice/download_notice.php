<?php

	

require('fpdf181/fpdf.php');
	class PDF extends FPDF
{
	// Page header
function Header()
	{   
$ref=$_GET['refno'];		
$date=$_GET['date'];		
	

		
		// Logo
		$this->Image('logo BIT.png',10,12,30);
		// Arial bold 15
	  
		//$subtitle->SetFont('Arial',15);
		// Move to the right
		$this->Cell(90);
		// Title
		
		
		$this->SetFont('Arial','',15);
		$this->Cell(30,10,"Shiksha Mandal's",0,0,'C');
		$this->Ln(10);
		
		$this->Cell(90);
		$this->SetFont('Arial','B',25);
		$this->Cell(30,10,'Bajaj Institute of Technology,',0,0,'C');
		$this->Ln(10);
		
		$this->Cell(90);
		$this->SetFont('Arial','',15);
		 $this->Cell(30,10,'Pipri-Wardha',0,0,'C');
		$this->Ln(8);
		
		$this->Cell(90);
		$this->SetFont('Arial','',8);
		$this->Cell(30,10,'Post Box.No. 25, Arvi Road, Pipri, Wardha-442001',0,0,'C');
		$this->Ln(8);
		
		$this->Line(0,48,300,48);
		$this->Cell(90);
		$this->SetFont('Arial','',12);
		$this->Cell(30,10,'Phone:07152-254770,255770    Fax:07152-230506    Email Id:bit@bit.shikshamandal.org',0,0,'C');
		$this->Line(0,53,300,53);
		$this->Ln(8);
		
		
		
		$this->SetFont('Arial','',14);
		$cref="Ref. No.:".$ref;
		$this->Cell(30,10,$cref,0,0);
		
		
		$cdate="Date: ".$date;
		$this->Cell(132);
		$this->Cell(30,10,$cdate,0,0,'R');
		
		// Line break
		$this->Ln(20);
	}

	// Page footer
	function Footer()
	{
	/*	$this->SetY(-30);
		$this->Cell(138);
		$this->SetFont('Arial','',14);
		$this->Cell(30,10,'Principal',0,0,'R');*/
		
		// Position 	at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	}

	$title=$_GET['title'];		
$body=$_GET['body'];
	//$copyto=$_POST['copyto'];
	
	// Instanciation of inherited class
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','B',30);

		//$pdf->Cell(0,10,$body,0,1);
		
		$pdf->MultiCell(0,8,$title,0,'C');
		
		$pdf->Ln(15);
		
		$pdf->SetFont('Times','',15);
		
		$pdf->MultiCell(0,7,$body,0,'J');
		
		$pdf->Ln(20);
		$pdf->Cell(148);
		$pdf->Cell(0,7,'Principal',0,1);
		
		//$pdf->MultiCell(0,7,"Copy To:",0,'L');
		//$pdf->MultiCell(0,7,$copyto,0,'L');
		
		
	//$pdf->Output(['I']);

	//$string=
	$pdf->Output();

	
?>