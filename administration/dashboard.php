<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
	// Department HOD
	
	$sql1='SELECT Department from tblemployees WHERE EmpId="'.$_SESSION["alogin"].'"';
	$result1=mysqli_query($conn,$sql1);
	$val =mysqli_fetch_row($result1);
    $_SESSION['thisdep'] =$val[0];
	
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>HOD | Dashboard</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
        <link href="../assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet">
        <link href="../assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet">

        	
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
           <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>

            <main class="mn-inner">
                <div class="middle-content">
                    <div class="row no-m-t no-m-b">
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                            
                                <span class="card-title">Total Registered Facultys</span>
                                <span class="stats-counter">
<?php
$sql = "SELECT Department from tblemployees";
$query = $dbh -> prepare($sql);
$query->execute();
$results2=$query->fetchAll(PDO::FETCH_OBJ);
$empcount=0;
foreach($results2 as $result2){
if($result2->Department==$_SESSION['thisdep']){
$empcount=$empcount+1;
}}
?>

                                    <span class="counter"><?php echo htmlentities($empcount);?></span></span>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                    </div>
					
					
					
					
                        <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                            
                                <span class="card-title">Listed Departments </span>
    <?php
$sql = "SELECT id from tbldepartments";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$dptcount=$query->rowCount();
?>                            
                                <span class="stats-counter"><span class="counter"><?php echo htmlentities($dptcount);?></span></span>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l4">
                        <div class="card stats-card">
                            <div class="card-content">
                                <span class="card-title">Listed leave Type</span>
                                    <?php
$sql = "SELECT id from  tblleavetype";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$leavtypcount=$query->rowCount();
?>   
                                <span class="stats-counter"><span class="counter"><?php echo htmlentities($leavtypcount);?></span></span>
                      
                            </div>
                            <div class="progress stats-card-progress">
                                <div class="determinate" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>
				
				
	   
   


<style>
.abc{
  border-collapse: collapse;
  width: 60%;
  border: 1px solid black;
   margin-left: 10px;
}

 .xyz123{
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #ffff}

.xyz {
  background-color: #4CAF50;
  color: white;
}
</style>
<h4> &nbsp Your leave record</h4>



<?php
session_start();
$eid=$_SESSION['alogin'];
//$sql1= 'SELECT CPL, T_CPL  from tblemployees WHRER id="'.$_SESSION['eid'].'"';

  
  

	$sql1= "SELECT CL, T_CL, EL, T_EL, DL, U_DL, FL, T_FL, CPL, U_CPL, OL, U_OL, LWP, U_LWP, ML, U_ML from tblemployees where EmpId='{$_SESSION['alogin']}'";
	$result1= $conn -> query($sql1);
	$row1 =$result1 -> fetch_assoc();
	$U_CL=$row1['T_CL']-$row1['CL'];
	$U_EL=$row1['T_EL']-$row1['EL'];
	$U_FL=$row1['T_FL']-$row1['FL'];
	
	$B_DL=$row1['DL']-$row1['U_DL'];
	$B_CPL=$row1['CPL']-$row1['U_CPL'];
	$B_OL=$row1['OL']-$row1['U_OL'];
	$B_LWP=$row1['LWP']-$row1['U_LWP'];
	
	
echo '<table class= "abc">
	<tr>
	<th class="xyz">Type of Leaves</th>
	<th class="xyz">Available</th>
	<th class="xyz">Availed</th> 
	<th class="xyz">Balance</th>
	</tr>'; 

echo '<tr>
	<td>Casual Leave(CL)</td>
	<td>'.$row1['T_CL'].'</td>
	<td>'.$U_CL.'</td>
	<td>'.$row1['CL'].'</td>
  </tr>
 
  
  <tr>
    <td>Earned Leave(EL)</td>
    <td>'.$row1['T_EL'].'</td>
    <td>'.$U_EL.'</td>
	<td>'.$row1['EL'].'</td>
  </tr>
  <tr>
    <td>Festival Leave(FL)</td>
    <td>'.$row1['T_FL'].'</td>
    <td>'.$U_FL.'</td>
	<td>'.$row1['FL'].'</td>
</tr>
<tr>
    <td>Duty Leave(DL)</td>
    <td>'.$row1['DL'].'</td>
    <td>'.$row1['U_DL'].'</td>
	<td>'.$B_DL.'</td>
  </tr>
<tr>
	<td>Compensatory Leave(CPL)</td>
	<td>'.$row1['CPL'].'</td>
	<td>'.$row1['U_CPL'].'</td>
	<td>'.$B_CPL.'</td>
  </tr>
  
  <tr>
	<td>Outdoor Leave(OL)</td>
	<td>'.$row1['OL'].'</td>
	<td>'.$row1['U_OL'].'</td>
	<td>'.$B_OL.'</td>
  </tr>
  
  <tr>
	<td>Leave Without Pay(LWP)</td>
	<td>'.$row1['LWP'].'</td>
	<td>'.$row1['U_LWP'].'</td>
	<td>'.$B_LWP.'</td>
  </tr>';
  
echo '</table>';

?>
<br>
<hr>




                </div>
              
            </main>
          
        </div>

        
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/counter-up-master/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="../assets/plugins/chart.js/chart.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="../assets/plugins/peity/jquery.peity.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/dashboard.js"></script>
        
    </body>
</html>
<?php } ?>