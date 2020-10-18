<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
$name_PRN=1;
$name_remark=101;
$name_text=201;
$name_due=301;
$name_check=401;
$cnt=$_POST['cnt'];
$batch=$_GET['batch'];


	for($i=0;$i<$cnt-1;$i++){
	$a=$_POST[$name_PRN];
	$b=$_POST[$name_remark];
	$c=$_POST[$name_text];
	$d=$_POST[$name_due];
	$e=$_POST[$name_check];						

	$r=$_POST['select_remark'];
	$t=$_POST['select_text'];
	$u=$_POST['select_due'];							
			
	//change table name according to you(in following line)
	if($e==1){  //echo " enter if=".$r,$t,$u;            //selected students
	$sql1="update {$batch} set account_remark=:r,account_t=:t,account_due=:u where PRN=:a";
	
	$query1 = $dbh->prepare($sql1);	
	$query1->bindParam(':r',$r,PDO::PARAM_STR);
	$query1->bindParam(':t',$t,PDO::PARAM_STR);
	$query1->bindParam(':u',$u,PDO::PARAM_STR);
	$query1->bindParam(':a',$a,PDO::PARAM_STR);
	$query1->execute();
	
	}else{ 
	
	$sql="update {$batch} set account_remark=:b,account_t=:c,account_due=:d where PRN=:a";
	$query = $dbh->prepare($sql);
	$query->bindParam(':b',$b,PDO::PARAM_STR);
	$query->bindParam(':c',$c,PDO::PARAM_STR);
	$query->bindParam(':d',$d,PDO::PARAM_STR);
	$query->bindParam(':a',$a,PDO::PARAM_STR);
	$query->execute();
	}
	
	//echo $i." PRN=".$a." Remark=".$b." Text=".$c." Due=".$d."<br>";
	$name_PRN++;
	$name_remark++;
	$name_text++;
	$name_due++;
	$name_check++;
	
	}
	$year=$_SESSION['year'];
	if($year==1){
		header('location:LIB_clearence_ele.php?year=1&show=all');
	}
	else if($year==2){
		header('location:LIB_clearence_ele.php?year=2&show=all');
	}
	else if($year==3){
		header('location:LIB_clearence_ele.php?year=3&show=all');
	}
	else if($year==4){
		header('location:LIB_clearence_ele.php?year=4&show=all');
	}
	else if($year==0){
		header('location:LIB_clearence_ele.php?year=0&show=all');
	}

?>