<?php
session_start();
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
		$this->Cell(30,10,$cref,0,0);
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

	$body=$_POST['body'];
	$title=$_POST['title'];
	
	$copyto=$_POST['copyto'];
	
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
		$pdf->Cell(0,7,'HOD',0,1);
		
	   if(isset($_POST['copyto'])){
		$pdf->MultiCell(0,7,"Copy To:",0,'L');
		$pdf->MultiCell(0,7,$copyto,0,'L');
	   }
		
	//$pdf->Output(['I']);

	//$string=
	$pdf->Output();
		
}	

elseif (isset($sub["send"])) {
	include("../includes/config.php");
	$refno=$_POST['refno'];
	$title=$_POST['title'];
	$send = $_SESSION['emplogin'];
	$body=$_POST['body'];
	//$copyto=$_POST['copyto'];
	
	
	
	
	
	if(isset($_POST['first_level']) and !isset($_POST['first_level1']))
	{
					$f_dept=$_POST['first_level'];
					$faculty=$_POST['second_level'];
	
					if($f_dept[0]=="all_dept"){
						$sql1 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date,sender_id)VALUES (0,'','Mechanical Engineering','$refno','$title','$body',now(),'$send')";
						$sql2 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date,sender_id)VALUES (0,'','First Year Engineering','$refno','$title','$body',now(),'$send')";
						$sql3 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date,sender_id)VALUES (0,'','Electrical Enginnering','$refno','$title','$body',now(),'$send')";
						$sql4 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date,sender_id)VALUES (0,'','Computer Engineering','$refno','$title','$body',now(),'$send')";
						$sql5 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date,sender_id)VALUES (0,'','Civil Engineering','$refno','$title','$body',now(),'$send')";
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
									$sql = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date,sender_id)VALUES (0,'','$aselection1','$refno','$title','$body',now(),'$send')";
									if ($conn->query($sql) === TRUE) {
										echo "New record created successfully";
									} else {
										echo "Error: " . $sql1 . "<br>" . $conn->error;
									}
										
										
									}
								else{
									foreach($faculty as $aselection){

									   //echo "$aselection<br>";
									$sql = "INSERT INTO notice( notice_id, EmpId, department, refno, title, body,date,sender_id)VALUES (0,'$aselection',NULL,'$refno','$title','$body',now(),'$send')";
									if ($conn->query($sql) === TRUE) {
										echo "New record created successfully";
									} else {
										echo "Error: " . $sql1 . "<br>" . $conn->error;
									}
									}
									
								}
							
							}
					}
	}
	elseif(!isset($_POST['first_level']) and isset($_POST['first_level1']))
	{
					$s_year=$_POST['first_level1'];
					$s_dept=$_POST['second_level1'];
					
					
					if(($s_year[0]=="all_year" and !isset($_POST['second_level1'])) or ($s_year[0]=="all_year" and $s_dept[0]=="all_dept"))
					{
						$sql1 = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,'First Year',NULL,'$refno','$title','$body',now(),'$send')";
						$sql2 = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,'Second Year',NULL,'$refno','$title','$body',now(),'$send')";
						$sql3 = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,'Third Year',NULL,'$refno','$title','$body',now(),'$send')";
						$sql4 = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,'Final Year',NULL,'$refno','$title','$body',now(),'$send')";
						$conn->query($sql1);
						$conn->query($sql2);
						$conn->query($sql3);
						$conn->query($sql4);
					}
					elseif($s_year[0]=="all_year" and $s_dept[0]!="all_dept")
					{
						foreach($s_dept as $aselection){

									   //echo "$aselection<br>";
									$sql = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,NULL,'$aselection','$refno','$title','$body',now(),'$send')";
									if ($conn->query($sql) === TRUE) {
										echo "New record created successfully";
									} else {
										echo "Error: " . $sql1 . "<br>" . $conn->error;
									}
									}
					}
					elseif($s_year[0]!="all_year" and $s_dept[0]=="all_dept")
					{
						foreach($s_year as $aselection){

									   //echo "$aselection<br>";
									$sql = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,'$aselection',NULL,'$refno','$title','$body',now(),'$send')";
									if ($conn->query($sql) === TRUE) {
										echo "New record created successfully";
									} else {
										echo "Error: " . $sql1 . "<br>" . $conn->error;
									}
									}
					}
					elseif($s_year[0]!="all_year" and $s_dept[0]!="all_dept")
					{
						foreach($s_year as $aselection){
							foreach($s_dept as $aselection1){
								$sql = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,'$aselection','$aselection1','$refno','$title','$body',now(),'$send')";
									if ($conn->query($sql) === TRUE) {
										echo "New record created successfully";
									} else {
										echo "Error: " . $sql1 . "<br>" . $conn->error;
									}
							}
						}
								
					}
		
	}
	elseif(isset($_POST['first_level']) and isset($_POST['first_level1']))
	{
		$f_dept=$_POST['first_level'];
					$faculty=$_POST['second_level'];
	
					if($f_dept[0]=="all_dept"){
						$sql1 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date,sender_id)VALUES (0,'','Mechanical Engineering','$refno','$title','$body',now(),'$send')";
						$sql2 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date,sender_id)VALUES (0,'','First Year Engineering','$refno','$title','$body',now(),'$send')";
						$sql3 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date,sender_id)VALUES (0,'','Electrical Enginnering','$refno','$title','$body',now(),'$send')";
						$sql4 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date,sender_id)VALUES (0,'','Computer Engineering','$refno','$title','$body',now(),'$send')";
						$sql5 = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date,sender_id)VALUES (0,'','Civil Engineering','$refno','$title','$body',now(),'$send')";
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
									$sql = "INSERT INTO notice( notice_id, EmpId,department, refno, title, body,date,sender_id)VALUES (0,'','$aselection1','$refno','$title','$body',now(),'$send')";
									if ($conn->query($sql) === TRUE) {
										echo "New record created successfully";
									} else {
										echo "Error: " . $sql1 . "<br>" . $conn->error;
									}
										
										
									}
								else{
									foreach($faculty as $aselection){

									   //echo "$aselection<br>";
									$sql = "INSERT INTO notice( notice_id, EmpId, department, refno, title, body,date,sender_id)VALUES (0,'$aselection',NULL,'$refno','$title','$body',now(),'$send')";
									if ($conn->query($sql) === TRUE) {
										echo "New record created successfully";
									} else {
										echo "Error: " . $sql1 . "<br>" . $conn->error;
									}
									}
									
								}
							
							}
					}
		
		
		$s_year=$_POST['first_level1'];
					$s_dept=$_POST['second_level1'];
					
					
					if(($s_year[0]=="all_year" and !isset($_POST['second_level1'])) or ($s_year[0]=="all_year" and $s_dept[0]=="all_dept"))
					{
						$sql1 = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,'First Year',NULL,'$refno','$title','$body',now(),'$send')";
						$sql2 = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,'Second Year',NULL,'$refno','$title','$body',now(),'$send')";
						$sql3 = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,'Third Year',NULL,'$refno','$title','$body',now(),'$send')";
						$sql4 = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,'Final Year',NULL,'$refno','$title','$body',now(),'$send')";
						$conn->query($sql1);
						$conn->query($sql2);
						$conn->query($sql3);
						$conn->query($sql4);
					}
					elseif($s_year[0]=="all_year" and $s_dept[0]!="all_dept")
					{
						foreach($s_dept as $aselection){

									   //echo "$aselection<br>";
									$sql = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,NULL,'$aselection','$refno','$title','$body',now(),'$send')";
									if ($conn->query($sql) === TRUE) {
										echo "New record created successfully";
									} else {
										echo "Error: " . $sql1 . "<br>" . $conn->error;
									}
									}
					}
					elseif($s_year[0]!="all_year" and $s_dept[0]=="all_dept")
					{
						foreach($s_year as $aselection){

									   //echo "$aselection<br>";
									$sql = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,'$aselection',NULL,'$refno','$title','$body',now(),'$send')";
									if ($conn->query($sql) === TRUE) {
										echo "New record created successfully";
									} else {
										echo "Error: " . $sql1 . "<br>" . $conn->error;
									}
									}
					}
					elseif($s_year[0]!="all_year" and $s_dept[0]!="all_dept")
					{
						foreach($s_year as $aselection){
							foreach($s_dept as $aselection1){
								$sql = "INSERT INTO stu_notice( notice_id, year,department, refno, title, body,date,sender_id)VALUES (0,'$aselection','$aselection1','$refno','$title','$body',now(),'$send')";
									if ($conn->query($sql) === TRUE) {
										echo "New record created successfully";
									} else {
										echo "Error: " . $sql1 . "<br>" . $conn->error;
									}
							}
						}
								
					}
		
	}
	
	header('Location:msg.php');
}

?>