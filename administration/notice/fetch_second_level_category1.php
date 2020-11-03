
<?php

//fetch_second_level_category.php
include('../includes/config.php');

if(isset($_POST["selected"]))
{
 $id = join("','", $_POST["selected"]);
 $query = "
 SELECT DepartmentName FROM tbldepartments where DepartmentName!='First Year Engineering'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '';
  $output .= '<option value="all_dept">All Departments of Selected Year</option>';
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["DepartmentName"].'">'.$row["DepartmentName"].'</option>';
 }
 echo $output;
}

?>
