<?php

$sub = $_POST["submit"];

if (isset($sub["download"])) {
	require('fpdf181/fpdf.php');

	class PDF extends FPDF
	{
	// Page header
	function Header()
	{
		$ref=strval($_POST['refno']);
		
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
		$this->Cell(30,10,$cref,0,0,);
		date_default_timezone_set('Asia/Kolkata');
		$date=strval(date("d/m/y"));
		$cdate="Date: ".$date;
		$this->Cell(132);
		$this->Cell(30,10,$cdate,0,0,'R');
		
		// Line break
		$this->Ln(20);
	}

	// Page footer
	function Footer()
	{
		$this->SetY(-30);
		$this->Cell(138);
		$this->SetFont('Arial','',14);
		$this->Cell(30,10,'Principal',0,0,'R');
		
		// Position 	at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
	}

	$body=$_POST['body'];
	$title=$_POST['title'];

	// Instanciation of inherited class
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Times','B',30);

		//$pdf->Cell(0,10,$body,0,1);
		
		$pdf->MultiCell(0,7,$title,0,'C');
		
		$pdf->Ln(20);
		
		$pdf->SetFont('Times','',15);
		
		$pdf->MultiCell(0,5,$body,0,'J');
	//$pdf->Output(['I']);

	//$string=
	$pdf->Output();

	//echo $string;
}
elseif (isset($sub["send"])) {
	
	$refno=$_POST['refno'];
	$title=$_POST['title'];
	$body=$_POST['body'];
	
	$f_dept=$_POST['first_level'];
	$faculty=$_POST['second_level'];
	
	if($f_dept[0]=="all_dept"){
		$sql1 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date)VALUES (0,'','Mechanical Engineering','$refno','$title','$body',now())";
		$sql2 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date)VALUES (0,'','First Year Engineering','$refno','$title','$body',now())";
		$sql3 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date)VALUES (0,'','Electrical Enginnering','$refno','$title','$body',now())";
		$sql4 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date)VALUES (0,'','Computer Engineering','$refno','$title','$body',now())";
		$sql5 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date)VALUES (0,'','Civil Engineering','$refno','$title','$body',now())";
		$conn->query($sql1);
		$conn->query($sql2);
		$conn->query($sql3);
		$conn->query($sql4);
		$conn->query($sql5);
	}
	else{
			foreach($f_dept as $aselection1){

				  // echo "$aselection1<br>";
				
				if($faculty[0]=="all_faculty"){
					$sql = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date)VALUES (0,'','$aselection1','$refno','$title','$body',now())";
					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql1 . "<br>" . $conn->error;
					}
						
						
					}
				else{
					foreach($faculty as $aselection){

					   //echo "$aselection<br>";
					$sql = "INSERT INTO notice( notice_id, EmpId, department, refno, title, body,date)VALUES (0,'$aselection',NULL,'$refno','$title','$body',now())";
					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} else {
						echo "Error: " . $sql1 . "<br>" . $conn->error;
					}
					}
					exit;
				}
			
			}
	}

}
?>