<?php
require_once ("dbcontroller.php");
$db_handle = new DBController();
if (! empty($_POST["state_id"])) {
    $query = "SELECT * FROM tbldesignation  WHERE department = '" . $_POST["state_id"] . "'";
    $results = $db_handle->runQuery($query);
    ?>
<option value disabled selected>Select Designation</option>
<?php
    foreach ($results as $city) {
        ?>
<option value="<?php echo $city["designation"]; ?>"><?php echo $city['designation']; ?></option>
<?php
    }
}
?>