<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "elms");


$a=$_POST['leavetype'];
$b=$_POST['Emp_id'];
$c = $_POST['days'];
echo $a;
echo "  E=".$b;
echo "  D=".$c;
$_SESSION['EmpId']=$b;

if($a=="DL")
{
	$result= $conn->query('UPDATE tblemployees SET DL=DL+'.$c.' WHERE EmpId="'.$_SESSION['EmpId'].'"');
}
if($a=="CPL")
{
	$result= $conn->query('UPDATE tblemployees SET CPL= CPL+'.$c.' WHERE EmpId="'.$_SESSION['EmpId'].'"');
}
if($a=="OL")
{
	$result= $conn->query('UPDATE tblemployees SET OL= OL+'.$c.' WHERE EmpId="'.$_SESSION['EmpId'].'"');
}
if($a=="ML")
{
	$result= $conn->query('UPDATE tblemployees SET ML= ML+'.$c.' WHERE EmpId="'.$_SESSION['EmpId'].'"');
}


$conn->close();
header('Location:add_leave.php');
?>