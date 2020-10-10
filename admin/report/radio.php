<?php
session_start();

if (!empty($_POST["country_id"])) {
	
	//unset($_SESSION['radio']);

	$_SESSION["radio"]=$_POST["country_id"];
  
}
?>