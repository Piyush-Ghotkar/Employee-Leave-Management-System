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
	$conn = mysqli_connect("localhost", "root", "", "elms");
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
<h4>Your leave record</h4>



<?php
session_start();
$eid=$_SESSION['alogin'];
//$sql1= 'SELECT CPL, T_CPL  from tblemployees WHRER id="'.$_SESSION['eid'].'"';

  
  
$conn = mysqli_connect("localhost", "root", "", "elms");
if($conn -> connect_error)
{
	die("Connection failed:".$conn -> connect_error);
}
	$sql1= "SELECT CL, T_CL, EL, T_EL, DL, U_DL, FL, T_FL, CPL, U_CPL, OL, U_OL, LWP, U_LWP, ML, U_ML from tblemployees where EmpId='{$_SESSION['alogin']}'";
	$result1= $conn -> query($sql1);
	$row1 =$result1 -> fetch_assoc();
	$U_CL=$row1['T_CL']-$row1['CL'];
	$U_EL=$row1['T_EL']-$row1['EL'];
	$U_FL=$row1['T_FL']-$row1['FL'];
	
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
    <td>-</td>
    <td>'.$row1['U_DL'].'</td>
	<td>'.$row1['DL'].'</td>
  </tr>
<tr>
	<td>Compensatory Leave(CPL)</td>
	<td>-</td>
	<td>'.$row1['U_CPL'].'</td>
	<td>'.$row1['CPL'].'</td>
  </tr>
  
  <tr>
	<td>Outdoor Leave(OL)</td>
	<td>-</td>
	<td>'.$row1['U_OL'].'</td>
	<td>'.$row1['OL'].'</td>
  </tr>
  
  <tr>
	<td>Leave Without Pay(LWP)</td>
	<td>-</td>
	<td>'.$row1['U_LWP'].'</td>
	<td>'.$row1['LWP'].'</td>
  </tr>
  
  <tr>
	<td>Medical Leave(ML)</td>
	<td>-</td>
	<td>-</td>
	<td>-</td>
  </tr>';
  
echo '</table>';
$conn->close();
?>



<br><hr><br>

                 
                    <div class="row no-m-t no-m-b">
                        <div class="col s12 m12 l12">
                            <div class="card invoices-card">
                                <div class="card-content">
                                 
                                    <span class="card-title">Latest Leave Applications</span>
                             <table id="example" class="display responsive-table ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th width="200">Faculty Name</th>
                                            <th width="120">Leave Type</th>

                                             <th width="180">Posting Date</th>                 
                                            <th>Status</th>
                                            <th align="center">Action</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
<?php $sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblleaves.LeaveType,tblleaves.PostingDate,tblemployees.Department,tblleaves.Status from tblleaves join tblemployees on tblleaves.empid=tblemployees.id order by lid desc limit 6";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;


if($query->rowCount() > 0)
{
foreach($results as $result)
{        
    if($result->Department==$_SESSION['thisdep']) {
      ?>  

                                        <tr>
                                            <td> <b><?php echo htmlentities($cnt);?></b></td>
                                              <td><a href="editemployee.php?empid=<?php echo htmlentities($result->id);?>" target="_blank"><?php echo htmlentities($result->FirstName." ".$result->LastName);?>(<?php echo htmlentities($result->EmpId);?>)</a></td>
                                            <td><?php echo htmlentities($result->LeaveType);?></td>
                                            <td><?php echo htmlentities($result->PostingDate);?></td>
                                                                       <td><?php $stats=$result->Status;
if($stats==1){
                                             ?>
                                                 <span style="color: green">Approved</span>
                                                 <?php } if($stats==2)  { ?>
                                                <span style="color: red">Not Approved</span>
                                                 <?php } if($stats==0)  { ?>
 <span style="color: blue">Waiting for Approval</span>
 <?php } ?>


                                             </td>

          <td>
           <td><a href="leave-details.php?leaveid=<?php echo htmlentities($result->lid);?>" class="waves-effect waves-light btn blue m-b-xs"  > View Details</a></td>
                                    </tr>
	<?php $cnt++; } } }?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
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