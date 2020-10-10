<?php
session_start();
//fetch_second_level_category.php

include('../includes/config.php');

if(isset($_POST["selected"]))
{
 $id = join("','", $_POST["selected"]);
 $_SESSION['dept']=$_POST["selected"];
 
 $query = "
 SELECT DISTINCT designation FROM tbldesignation 
 WHERE department IN ('".$id."')
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '';
 $output .= '<option value="all_des">All Designations</option>';
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["designation"].'">'.$row["designation"].'</option>';
 }
 echo $output;
}

?>