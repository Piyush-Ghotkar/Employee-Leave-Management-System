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
		  
			$this->Cell(80);
			$this->SetFont('Arial','B',20);
			$this->Cell(30,10,'Leaves Summary Report',0,0,'C');
			$this->Ln(10);
			
			$this->Cell(80);
			$this->SetFont('Arial','',15);
			 $this->Cell(30,10,$printdt,0,0,'C');
			$this->Ln(13);
			
			$this->Cell(166);
			$this->SetFont('Arial','',15);
			$this->Cell(30,10,$today,0,0,'R');
			$this->Ln(4);
			
			$this->Line(0,42,300,42);
	
			// Line break
			$this->Ln(20);
		}
		
	function headerTable($name,$biom,$dept){
		$this->Cell(25);
		
		$this->SetFont('Times','B',12);
		$this->Cell(20,10,'BIOM ID: ',0,0,'L');
		$this->SetFont('Times','',12);
		$this->Cell(5,10,$biom,0,0,'L');
		
		$this->Cell(6);
		$this->SetFont('Times','B',12);
		$this->Cell(13,10,'Name: ',0,0,'L');
		$this->SetFont('Times','',12);
		$this->Cell(50,10,$name,0,0,'L');
		
		$this->Cell(7);
		$this->SetFont('Times','B',12);
		$this->Cell(24,10,'Department: ',0,0,'L');
		$this->SetFont('Times','',12);
		$this->Cell(30,10,$dept,0,0,'L');
		
		$this->Ln();
		$this->Cell(35);
		
		$this->Cell(33,10,'Leave Type',1,0,'C');
		$this->Cell(33,10,'Leaves Available',1,0,'C');
		$this->Cell(33,10,'Leaves Availed',1,0,'C');
		$this->Cell(33,10,'Leaves Balance',1,0,'C');
		$this->Ln();
	}
	
	function viewTable($aselection1,$dbh,$todt,$fromdt){
		
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
			
			$this->Cell(35);
			$this->Cell(33,10,'CL',1,0,'C');
			$this->Cell(33,10,$result->T_CL,1,0,'C');
			$this->Cell(33,10,$U_CL,1,0,'C');
			$this->Cell(33,10,$result->CL,1,0,'C');
			
			$this->Ln();
			$this->Cell(35);
			
			$this->Cell(33,10,'EL',1,0,'C');
			$this->Cell(33,10,$result->T_EL,1,0,'C');
			$this->Cell(33,10,$U_EL,1,0,'C');
			$this->Cell(33,10,$result->T_EL,1,0,'C');
			
			$this->Ln();
			$this->Cell(35);
			
			$this->Cell(33,10,'FL',1,0,'C');
			$this->Cell(33,10,$result->T_FL,1,0,'C');
			$this->Cell(33,10,$U_FL,1,0,'C');
			$this->Cell(33,10,$result->FL,1,0,'C');
			
			$this->Ln();
			$this->Cell(35);
			
			$this->Cell(33,10,'DL',1,0,'C');
			$this->Cell(33,10,$result->DL,1,0,'C');
			$this->Cell(33,10,$U_DL,1,0,'C');
			$this->Cell(33,10,'0',1,0,'C');
			
			$this->Ln();
			$this->Cell(35);
			
			$this->Cell(33,10,'CPL',1,0,'C');
			$this->Cell(33,10,$result->CPL,1,0,'C');
			$this->Cell(33,10,$U_CPL,1,0,'C');
			$this->Cell(33,10,'0',1,0,'C');
			
			$this->Ln();
			$this->Cell(35);
			
			$this->Cell(33,10,'OL',1,0,'C');
			$this->Cell(33,10,$result->OL,1,0,'C');
			$this->Cell(33,10,$U_OL,1,0,'C');
			$this->Cell(33,10,'0',1,0,'C');
			
			$this->Ln();
			$this->Cell(35);
			
			$this->Cell(33,10,'LWP',1,0,'C');
			$this->Cell(33,10,$result->LWP,1,0,'C');
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
$pdf->AddPage();

$cnt=1;
if($id[0]="all_emp"){
		
		
		$sql = "SELECT * from tblemployees";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		
		if($query->rowCount() > 0)
		{
			foreach($results as $result)
			{	
				if($cnt%2==1 and $cnt!=1){
					$pdf->AddPage();
				}
				$aselection1=$result->id;
				$biom=$result->id;
				$name=$result->FirstName." ".$result->LastName;
				$dept=$result->Department;
				$pdf->headerTable($name,$biom,$dept);
				$pdf->viewTable($aselection1,$dbh,$todt,$fromdt);
							
				$cnt=$cnt+1;
				
			}
		}
	
}else{
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
					$pdf->AddPage();
				}
				
				$biom=$result->id;
				$name=$result->FirstName." ".$result->LastName;
				$dept=$result->Department;
				$pdf->headerTable($name,$biom,$dept);
				$pdf->viewTable($aselection1,$dbh,$todt,$fromdt);
							
				$cnt=$cnt+1;
				
			}
		}
	}
}
$pdf->Output();

?>