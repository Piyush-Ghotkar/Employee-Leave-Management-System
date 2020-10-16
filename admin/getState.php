<?php

require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["country_id"])) {
    $query = "SELECT * FROM tbldepartments";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected>Select Department</option>
<?php
    foreach ($results as $state) {
        ?>
<option value="<?php echo $state["DepartmentName"]; ?>"><?php echo $state["DepartmentName"]; ?></option>
<?php
    }
}
?>