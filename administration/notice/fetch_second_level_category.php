
<?php

//fetch_second_level_category.php
include('../includes/config.php');


if(isset($_POST["selected"]))
{
 $id = join("','", $_POST["selected"]);
 $query = "
 SELECT FirstName,LastName,EmpId FROM tblemployees 
 WHERE Department IN ('".$id."')
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '';
 
 $output .= '<option value="all_faculty">All Faculty of Selected Department</option>';
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["EmpId"].'">'.$row["FirstName"].'  '.$row["LastName"].'</option>';
 }
 echo $output;
}

?>
