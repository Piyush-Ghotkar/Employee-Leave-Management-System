<?php
include('includes/config.php');

//Cron job for reintializing every clearance field to 0 and also hall_ticket=0 


	$sql ="SELECT * FROM batch_record ORDER BY id DESC";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	
	if($query->rowCount() > 0)
	{
	foreach($results as $result)
	{ 
		$batch=$result->batch;
		$sql1="update {$batch} set clearance=NULL,HOD_remark=0,HOD_t=0,HOD_due=0,library_remark=0,library_t=0,library_due=0,sports_remark=0,sports_t=0,sports_due=0,scholarship_remark=0,scholarship_t=0,scholarship_due=0,account_remark=0,account_t=0,account_due=0,hall_ticket=0";
		$query1 = $dbh->prepare($sql1);
		$query1->execute();
	}
	}
	
?>