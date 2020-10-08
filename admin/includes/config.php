<?php 
//DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','elms');

$connect = new PDO('mysql:host=localhost;dbname=elms', 'root', '');

//Establish database connection.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "elms";
$conn = new mysqli($servername, $username, $password, $dbname);

try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>