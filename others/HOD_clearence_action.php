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
$cnt=$_POST['cnt'];
$batch=$_GET['batch'];

for($i=0;$i<$cnt-1;$i++){
$a=$_POST[$name_PRN];
$b=$_POST[$name_remark];
$c=$_POST[$name_text];
$d=$_POST[$name_due];

//change table name according to you(in following line)
$sql="update {$batch} set HOD_remark=:b,HOD_t=:c,HOD_due=:d where PRN=:a";
$query = $dbh->prepare($sql);
$query->bindParam(':b',$b,PDO::PARAM_STR);
$query->bindParam(':c',$c,PDO::PARAM_STR);
$query->bindParam(':d',$d,PDO::PARAM_STR);
$query->bindParam(':a',$a,PDO::PARAM_STR);
$query->execute();

//echo $i." PRN=".$a." Remark=".$b." Text=".$c." Due=".$d."<br>";
$name_PRN++;
$name_remark++;
$name_text++;
$name_due++;

}
$year=$_SESSION['year'];
if($year==1){
	header('location:HOD_clearence.php?year=1');
}
else if($year==2){
	header('location:HOD_clearence.php?year=2');
}
else if($year==3){
	header('location:HOD_clearence.php?year=3');
}
else if($year==4){
	header('location:HOD_clearence.php?year=4');
}
else if($year==0){
	header('location:HOD_clearence.php?year=0');
}

?>