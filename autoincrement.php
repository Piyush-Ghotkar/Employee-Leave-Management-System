<?php
include('includes/config.php');

$d=date('d');
$m=date('m');

//echo "d=".$d." m=".$m;

//add CL on beginning of month & EL at end of month
//add 2 FL on every new session (session start on 1 july) also promote students
if($d==1){
	$result= $conn->query('UPDATE tblemployees SET CL= CL+1');
	$result= $conn->query('UPDATE tblemployees SET T_CL= T_CL+1');
}
if($d==28 and $m==2){
	$result= $conn->query('UPDATE tblemployees SET EL= EL+1.5');
	$result= $conn->query('UPDATE tblemployees SET T_EL= T_EL+1.5');
}
if($d==30 and ($m==4 or $m==6 or $m==9 or $m==11)){
	$result= $conn->query('UPDATE tblemployees SET EL= EL+1.5');
	$result= $conn->query('UPDATE tblemployees SET T_EL= T_EL+1.5');
}
if($d==31 and ($m==1 or $m==3 or $m==5 or $m=7 or $m=8 or $m=10 or $m=12)){
	$result= $conn->query('UPDATE tblemployees SET EL= EL+1.5');
	$result= $conn->query('UPDATE tblemployees SET T_EL= T_EL+1.5');
}
if($d==1 and $m==7){
	$result= $conn->query('UPDATE tblemployees SET FL=FL+2');
	$result= $conn->query('UPDATE tblemployees SET T_FL=T_FL+2');
	
	$result= $conn->query('UPDATE batch_record SET ac_year=ac_year+1');
	
	$sql ="SELECT * FROM batch_record";
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	if($query->rowCount() > 0)
	{
		foreach($results as $result)
		{ 
			$sql1="update {$result->batch} set ac_year=ac_year+1";
		
			$query1 = $dbh->prepare($sql1);	
			$query1->execute();
		}
	}
}
?>