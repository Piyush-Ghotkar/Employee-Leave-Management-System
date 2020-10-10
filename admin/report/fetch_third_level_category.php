<?php
session_start();
//fetch_third_level_category.php

include('../includes/config.php');


if(isset($_POST["selected"]))
{
 $id = join("','", $_POST["selected"]);
 $id1 =$_POST["selected"];
 $radio=$_SESSION['radio'];
 $dept=$_SESSION['dept'];
 
 if($id1[0]=="all_des"){
	$query = "
 SELECT * FROM tblemployees 
 
 ";   
	 $statement = $connect->prepare($query);
	 $statement->execute();
	 $result = $statement->fetchAll();
 }else{
 $query = "
 SELECT * FROM tblemployees 
 WHERE Designation IN ('".$id."')
 "; 
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
 }
 

 $output = '';
  $output .= '<option value="all_emp">All Employees</option>';
 foreach($result as $row)
 {	
	if($radio!="all"){
		 if(in_array($row["Department"],$dept) and $row["Teaching"]== $radio){
			$output .= '<option value="'.$row["id"].'">'.$row["FirstName"].' '.$row["LastName"].'</option>';
		 }
	}else{
		if(in_array($row["Department"],$dept)){
			$output .= '<option value="'.$row["id"].'">'.$row["FirstName"].' '.$row["LastName"].'</option>';
		 }
	}
 }
 echo $output;
}




?>