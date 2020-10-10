
<?php
session_start();

 $radio=$_SESSION['radio'];

 
 echo  $radio;
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
 
 $fromdt=$_POST['fromdate'];
$todt=$_POST['todate'];
 $aselection1=3;
 
 
					$U_CL=0;
					$U_EL=0;
					$U_FL=0;
					$U_DL=0;
					$U_CPL=0;
					$U_OL=0;
					$U_LWP=0;
					
					$sql1 = "SELECT * from tblleaves where empid=:aselection1 or aid=:aselection1";
					$query1 = $dbh -> prepare($sql1);
					$query1->bindParam(':aselection1',$aselection1,PDO::PARAM_STR);
					$query1->execute();
					$results1=$query1->fetchAll(PDO::FETCH_OBJ);
					if($query1->rowCount() > 0)
					{
					foreach($results1 as $result1)
					{	
						echo " $result1->FromDate , $result1->ToDate";
						echo  " $fromdt ,$todt ";
						if($result1->FromDate>=$fromdt and $result1->ToDate<=$todt){
							//when both date fall in condition
							$no= abs(strtotime($result1->ToDate)-strtotime($result1->FromDate))/60/60/24;
							$no=$no+1;
							
							if($result1->Full_Leave==0){
								$no=$no/2;
							}
							
							//echo " no of leaves=$no";
							
							if($result1->LeaveType=="CL"){$U_CL=$U_CL+$no;}
							else if($result1->LeaveType=="EL"){$U_EL=$U_EL+$no;}
							else if($result1->LeaveType=="FL"){$U_FL=$U_FL+$no;}
							else if($result1->LeaveType=="DL"){$U_DL=$U_DL+$no;}
							else if($result1->LeaveType=="CPL"){$U_CPL=$U_CPL+$no;}
							else if($result1->LeaveType=="OL"){$U_OL=$U_OL+$no;}
							else if($result1->LeaveType=="LWP"){$U_LWP=$U_LWP+$no;}
							
						}else if($result1->FromDate<$fromdt and $result1->ToDate<=$todt and $fromdt<=$result1->ToDate){
							//when todate fall in cond
							$no= abs(strtotime($fromdt)-strtotime($result1->ToDate))/60/60/24;
							$no=$no+1;
							
							if($result1->Full_Leave==0){
								$no=$no/2;
							}
							
							//echo " no of leaves=$no";
							
							if($result1->LeaveType=="CL"){$U_CL=$U_CL+$no;}
							else if($result1->LeaveType=="EL"){$U_EL=$U_EL+$no;}
							else if($result1->LeaveType=="FL"){$U_FL=$U_FL+$no;}
							else if($result1->LeaveType=="DL"){$U_DL=$U_DL+$no;}
							else if($result1->LeaveType=="CPL"){$U_CPL=$U_CPL+$no;}
							else if($result1->LeaveType=="OL"){$U_OL=$U_OL+$no;}
							else if($result1->LeaveType=="LWP"){$U_LWP=$U_LWP+$no;}
							
						}else if($result1->FromDate>=$fromdt and $result1->ToDate>$todt and $todt>=$result1->FromDate){
							//when fromdate fall in cond
							$no= abs(strtotime($result1->FromDate)-strtotime($todt))/60/60/24;
							$no=$no+1;
							
							if($result1->Full_Leave==0){
								$no=$no/2;
							}
							
							//echo " no of leaves=$no";
							
							if($result1->LeaveType=="CL"){$U_CL=$U_CL+$no;}
							else if($result1->LeaveType=="EL"){$U_EL=$U_EL+$no;}
							else if($result1->LeaveType=="FL"){$U_FL=$U_FL+$no;}
							else if($result1->LeaveType=="DL"){$U_DL=$U_DL+$no;}
							else if($result1->LeaveType=="CPL"){$U_CPL=$U_CPL+$no;}
							else if($result1->LeaveType=="OL"){$U_OL=$U_OL+$no;}
							else if($result1->LeaveType=="LWP"){$U_LWP=$U_LWP+$no;}
							
						}else if($result1->FromDate<=$fromdt and $result1->ToDate>=$todt){
							echo "//when  some part of leave fall in cond";
							$no= abs(strtotime($todt)-strtotime($fromdt))/60/60/24;
							$no=$no+1;
							
							if($result1->Full_Leave==0){
								$no=$no/2;
							}
							
							//echo " no of leaves=$no";
							
							if($result1->LeaveType=="CL"){$U_CL=$U_CL+$no;}
							else if($result1->LeaveType=="EL"){$U_EL=$U_EL+$no;}
							else if($result1->LeaveType=="FL"){$U_FL=$U_FL+$no;}
							else if($result1->LeaveType=="DL"){$U_DL=$U_DL+$no;}
							else if($result1->LeaveType=="CPL"){$U_CPL=$U_CPL+$no;}
							else if($result1->LeaveType=="OL"){$U_OL=$U_OL+$no;}
							else if($result1->LeaveType=="LWP"){$U_LWP=$U_LWP+$no;}
							
						}else if($result1->FromDate<$fromdt and $result1->ToDate>$todt){
							echo "//when both date are out of cond";
							$no=0;
						}else{
							//initialize everything to 0
							$no=0;
						}
						
					}
					}
?>