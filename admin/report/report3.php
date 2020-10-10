<?php
require('fpdf181/fpdf.php');
include('../includes/config.php');

$id=$_POST['third_level'];
$fromdt=$_POST['fromdate'];
$todt=$_POST['todate'];


class PDF extends FPDF{
	function Header()
		{	
			$fromdt=$_POST['fromdate'];
			$todt=$_POST['todate'];
			$printdt="From: ".$fromdt."    To: ".$todt;
			date_default_timezone_set('Asia/Kolkata');
			$today="Printed on: ".date('d-m-Y');
		  
			$this->Cell(125);
			$this->SetFont('Arial','B',18);
			$this->Cell(30,1,'Bajaj Institute of Technology, Wardha',0,0,'C');
			$this->Ln(7);
			
			$this->Cell(125);
			$this->SetFont('Arial','',16);
			$this->Cell(30,1,'Leaves Summary Report',0,0,'C');
			$this->Ln(7);
			
			$this->Cell(125);
			$this->SetFont('Arial','',15);
			 $this->Cell(30,1,$printdt,0,0,'C');
			$this->Ln(3);
			
			$this->Cell(250);
			$this->SetFont('Arial','',15);
			$this->Cell(30,1,$today,0,0,'R');
			$this->Ln(3);
			
			$this->Line(0,31,300,31);
	
			// Line break
			$this->Ln(3);
			
			
		//table head	
		$this->Cell(1);
		$this->SetFont('Arial','B',12);
		$this->Cell(50,27,'Name of Staff',1,0,'L');
		$x=$this->GetX();
		$y=$this->GetY();		
		$this->MultiCell(15,13.5,'Leave Type',1,'L');
		$this->SetXY($x+15,$y);
		$x=$this->GetX();
		$y=$this->GetY();
		$this->MultiCell(21,9,'Carry forwaded Leaves',1,'L');
		$this->SetXY($x+21,$y);
		$x=$this->GetX();
		$y=$this->GetY();
		$this->MultiCell(17,13.5,'Leaves Added',1,'L');
		$this->SetXY($x+17,$y);
		$x=$this->GetX();
		$y=$this->GetY();
		$this->MultiCell(17,13.5,'Total Leaves',1,'L');
		$this->SetXY($x+17,$y);
		
		$this->Cell(10,27,'Jan',1,0,'C');
		$this->Cell(10,27,'Feb',1,0,'C');
		$this->Cell(10,27,'Mar',1,0,'C');
		$this->Cell(10,27,'Apr',1,0,'C');
		$this->Cell(10,27,'May',1,0,'C');
		$this->Cell(10,27,'Jun',1,0,'C');
		$this->Cell(10,27,'Jul',1,0,'C');
		$this->Cell(10,27,'Aug',1,0,'C');
		$this->Cell(10,27,'Sep',1,0,'C');
		$this->Cell(10,27,'Oct',1,0,'C');
		$this->Cell(10,27,'Nov',1,0,'C');
		$this->Cell(10,27,'Dec',1,0,'C');
		$this->Cell(12,27,'Total',1,0,'C');
		$this->MultiCell(19,13.5,'Balance Leaves',1,'L');
		
		}
		
	
	
	function viewTable($aselection1,$dbh,$todt,$fromdt,$pdf){
		
		$sql = "SELECT * from tblemployees where id=:aselection1";
		$query = $dbh -> prepare($sql);
		$query->bindParam(':aselection1',$aselection1,PDO::PARAM_STR);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		if($query->rowCount() > 0)
		{
		foreach($results as $result)
		{	
					
								$U_CL=0;
								$U_EL=0;
								$U_FL=0;
								$U_DL=0;
								$U_CPL=0;
								$U_OL=0;
								$U_LWP=0;
								
								$sql1 = "SELECT * from tblleaves where (empid=:aselection1 or aid=:aselection1) and (P_Status=1 and action=1)";
								$query1 = $dbh -> prepare($sql1);
								$query1->bindParam(':aselection1',$aselection1,PDO::PARAM_STR);
								$query1->execute();
								$results1=$query1->fetchAll(PDO::FETCH_OBJ);
								if($query1->rowCount() > 0)
								{
								foreach($results1 as $result1)
								{	
									//echo " $result1->FromDate , $result1->ToDate";
									//echo  " $fromdt ,$todt ";
									if($result1->FromDate>=$fromdt and $result1->ToDate<=$todt){
										//when both date fall in condition
										$no= abs(strtotime($result1->ToDate)-strtotime($result1->FromDate))/60/60/24;
										$no=$no+1;
										
										if($result1->Full_Leave==0){
											$no=$no/2;
										}
										
										//echo " no of leaves=$no";
										
										if($result1->LeaveType=="CL"){$U_CL=$U_CL+$no;}
										else if($result1->LeaveType=="EL"){$U_EL=$U_EL+$no;}
										else if($result1->LeaveType=="FL"){$U_FL=$U_FL+$no;}
										else if($result1->LeaveType=="DL"){$U_DL=$U_DL+$no;}
										else if($result1->LeaveType=="CPL"){$U_CPL=$U_CPL+$no;}
										else if($result1->LeaveType=="OL"){$U_OL=$U_OL+$no;}
										else if($result1->LeaveType=="LWP"){$U_LWP=$U_LWP+$no;}
										
									}else if($result1->FromDate<$fromdt and $result1->ToDate<=$todt and $fromdt<=$result1->ToDate){
										//when todate fall in cond
										$no= abs(strtotime($fromdt)-strtotime($result1->ToDate))/60/60/24;
										$no=$no+1;
										
										if($result1->Full_Leave==0){
											$no=$no/2;
										}
										
										//echo " no of leaves=$no";
										
										if($result1->LeaveType=="CL"){$U_CL=$U_CL+$no;}
										else if($result1->LeaveType=="EL"){$U_EL=$U_EL+$no;}
										else if($result1->LeaveType=="FL"){$U_FL=$U_FL+$no;}
										else if($result1->LeaveType=="DL"){$U_DL=$U_DL+$no;}
										else if($result1->LeaveType=="CPL"){$U_CPL=$U_CPL+$no;}
										else if($result1->LeaveType=="OL"){$U_OL=$U_OL+$no;}
										else if($result1->LeaveType=="LWP"){$U_LWP=$U_LWP+$no;}
										
									}else if($result1->FromDate>=$fromdt and $result1->ToDate>$todt and $todt>=$result1->FromDate){
										//when fromdate fall in cond
										$no= abs(strtotime($result1->FromDate)-strtotime($todt))/60/60/24;
										$no=$no+1;
										
										if($result1->Full_Leave==0){
											$no=$no/2;
										}
										
										//echo " no of leaves=$no";
										
										if($result1->LeaveType=="CL"){$U_CL=$U_CL+$no;}
										else if($result1->LeaveType=="EL"){$U_EL=$U_EL+$no;}
										else if($result1->LeaveType=="FL"){$U_FL=$U_FL+$no;}
										else if($result1->LeaveType=="DL"){$U_DL=$U_DL+$no;}
										else if($result1->LeaveType=="CPL"){$U_CPL=$U_CPL+$no;}
										else if($result1->LeaveType=="OL"){$U_OL=$U_OL+$no;}
										else if($result1->LeaveType=="LWP"){$U_LWP=$U_LWP+$no;}
										
									}else if($result1->FromDate<=$fromdt and $result1->ToDate>=$todt){
										echo "//when  some part of leave fall in cond";
										$no= abs(strtotime($todt)-strtotime($fromdt))/60/60/24;
										$no=$no+1;
										
										if($result1->Full_Leave==0){
											$no=$no/2;
										}
										
										//echo " no of leaves=$no";
										
										if($result1->LeaveType=="CL"){$U_CL=$U_CL+$no;}
										else if($result1->LeaveType=="EL"){$U_EL=$U_EL+$no;}
										else if($result1->LeaveType=="FL"){$U_FL=$U_FL+$no;}
										else if($result1->LeaveType=="DL"){$U_DL=$U_DL+$no;}
										else if($result1->LeaveType=="CPL"){$U_CPL=$U_CPL+$no;}
										else if($result1->LeaveType=="OL"){$U_OL=$U_OL+$no;}
										else if($result1->LeaveType=="LWP"){$U_LWP=$U_LWP+$no;}
										
									}else if($result1->FromDate<$fromdt and $result1->ToDate>$todt){
										echo "//when both date are out of cond";
										$no=0;
									}else{
										//initialize everything to 0
										$no=0;
									}
									
								}
								}
					
					
					
					
					
					
					
					
					
					
					
					
		
			$this->SetFont('Times','',12);
			
			$this->Cell(1);
			$name=$result->FirstName.' '.$result->LastName;
			$this->Cell(50,35,$name,1,0,'L');
			
			$x_start=$pdf->GetX();
			$y_start=$pdf->GetY();
			
			$cell_high=5;
			
			$this->Cell(15,$cell_high,'CL',1,0,'C');
			$this->Cell(21,$cell_high,'0',1,0,'C');
			$this->Cell(17,$cell_high,'12',1,0,'C');
			$this->Cell(17,$cell_high,'12',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(12,$cell_high,'12',1,0,'C');
			$this->Cell(19,$cell_high,'0',1,0,'C');
			$this->Ln();
			
			
			$y_start=$y_start+$cell_high;
			$this->SetXY($x_start,$y_start);
			$this->Cell(15,$cell_high,'EL',1,0,'C');
			$this->Cell(21,$cell_high,'4',1,0,'C');
			$this->Cell(17,$cell_high,'12',1,0,'C');
			$this->Cell(17,$cell_high,'2',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(12,$cell_high,'12',1,0,'C');
			$this->Cell(19,$cell_high,'4',1,0,'C');
			$this->Ln();
			
			
			$y_start=$y_start+$cell_high;
			$this->SetXY($x_start,$y_start);
			$this->Cell(15,$cell_high,'FL',1,0,'C');
			$this->Cell(21,$cell_high,'0',1,0,'C');
			$this->Cell(17,$cell_high,'12',1,0,'C');
			$this->Cell(17,$cell_high,'2',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(12,$cell_high,'12',1,0,'C');
			$this->Cell(19,$cell_high,'0',1,0,'C');
			$this->Ln();
			
			$y_start=$y_start+$cell_high;
			$this->SetXY($x_start,$y_start);
			$this->Cell(15,$cell_high,'CPL',1,0,'C');
			$this->Cell(21,$cell_high,'0',1,0,'C');
			$this->Cell(17,$cell_high,'12',1,0,'C');
			$this->Cell(17,$cell_high,'2',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(12,$cell_high,'12',1,0,'C');
			$this->Cell(19,$cell_high,'0',1,0,'C');
			$this->Ln();
			
			$y_start=$y_start+$cell_high;
			$this->SetXY($x_start,$y_start);
			$this->Cell(15,$cell_high,'DL',1,0,'C');
			$this->Cell(21,$cell_high,'0',1,0,'C');
			$this->Cell(17,$cell_high,'12',1,0,'C');
			$this->Cell(17,$cell_high,'2',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(12,$cell_high,'12',1,0,'C');
			$this->Cell(19,$cell_high,'0',1,0,'C');
			$this->Ln();
			
			$y_start=$y_start+$cell_high;
			$this->SetXY($x_start,$y_start);
			$this->Cell(15,$cell_high,'OL',1,0,'C');
			$this->Cell(21,$cell_high,'0',1,0,'C');
			$this->Cell(17,$cell_high,'12',1,0,'C');
			$this->Cell(17,$cell_high,'2',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(12,$cell_high,'12',1,0,'C');
			$this->Cell(19,$cell_high,'0',1,0,'C');
			$this->Ln();
			
			$y_start=$y_start+$cell_high;
			$this->SetXY($x_start,$y_start);
			$this->Cell(15,$cell_high,'LWP',1,0,'C');
			$this->Cell(21,$cell_high,'0',1,0,'C');
			$this->Cell(17,$cell_high,'12',1,0,'C');
			$this->Cell(17,$cell_high,'2',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(10,$cell_high,'1',1,0,'C');
			$this->Cell(12,$cell_high,'12',1,0,'C');
			$this->Cell(19,$cell_high,'0',1,0,'C');
			$this->Ln();
			
			
			
			
			
			
			
			
			$this->Ln();$this->Ln();$this->Ln();$this->Ln();$this->Ln();$this->Ln();$this->Ln();
			$this->Cell(33,10,$result->CL,1,0,'C');
			
			$this->Ln();
			$this->Cell(35);
			
			$this->Cell(33,10,'EL',1,0,'C');
			
			$this->Cell(33,10,$U_EL,1,0,'C');
			$this->Cell(33,10,$result->T_EL,1,0,'C');
			
			$this->Ln();
			$this->Cell(35);
			
			$this->Cell(33,10,'FL',1,0,'C');
			
			$this->Cell(33,10,$U_FL,1,0,'C');
			$this->Cell(33,10,$result->FL,1,0,'C');
			
			$this->Ln();
			$this->Cell(35);
			
			$this->Cell(33,10,'DL',1,0,'C');
			
			$this->Cell(33,10,$U_DL,1,0,'C');
			$this->Cell(33,10,'0',1,0,'C');
			
			$this->Ln();
			$this->Cell(35);
			
			$this->Cell(33,10,'CPL',1,0,'C');
			
			$this->Cell(33,10,$U_CPL,1,0,'C');
			$this->Cell(33,10,'0',1,0,'C');
			
			$this->Ln();
			$this->Cell(35);
			
			$this->Cell(33,10,'OL',1,0,'C');
			
			$this->Cell(33,10,$U_OL,1,0,'C');
			$this->Cell(33,10,'0',1,0,'C');
			
			$this->Ln();
			$this->Cell(35);
			
			$this->Cell(33,10,'LWP',1,0,'C');
			
			$this->Cell(33,10,$U_LWP,1,0,'C');
			$this->Cell(33,10,'0',1,0,'C');
			
			$this->Ln(20);
			
		}
		}
	}
	
	function Footer()
	{		
		// Position 	at 1.5 cm from bottom
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','',8);
		// Page number
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}	
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');

$cnt=1;
foreach($id as $aselection1){
	
	$sql = "SELECT * from tblemployees where id=:aselection1";
	$query = $dbh -> prepare($sql);
	$query->bindParam(':aselection1',$aselection1,PDO::PARAM_STR);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	
	if($query->rowCount() > 0)
	{
		foreach($results as $result)
		{	
			if($cnt%2==1 and $cnt!=1){
				$pdf->AddPage('L');
			}
			
			$biom=$result->id;
			$name=$result->FirstName." ".$result->LastName;
			$dept=$result->Department;
			
			$pdf->viewTable($aselection1,$dbh,$todt,$fromdt,$pdf);
						
			$cnt=$cnt+1;
			
		}
	}
}

$pdf->Output();

?>