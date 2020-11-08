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
        
		<!-- For table –– --> 
		
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<!-- table css –– --> 
		 <style>
			body {
				overflow:auto;
			}
		 th {
		  text-align: center;
		}
		 table {
		  border-collapse: collapse;
		  width: 100%;
		}

		table, th, td {
		  border: 1px solid black;
		}
		
		
		
		/*--Horizontal Navigation Menu*/
			.nav ol,ul {
				list-style: none;
			}
			
			
			  #main-menu {
				margin: 10px;
				width: 1200px;
				padding-top: 50px;
				padding-left: 170px;
				font-weight: normal;
			}
			
			@media only screen and (max-width: 600px) {
				#main-menu {
				margin: 10px;
				width: 500px;
				padding-top: 50px;
				padding-left: 10px;
				font-weight: normal;
			}
			}
			  #main-menu li {
				display: block;
				width:200px;
				float: left;
				margin-left: 10px;
				border: 2px solid #EEE;
			}
			
			@media only screen and (max-width: 600px) {
				#main-menu li {
				display:inline-block;	
				width:180px;
				float: left;
				margin-left: 0px;
				//border: 2px solid #EEE;
			}
			}
			
			#main-menu a:hover,
			#main-menu li.active a {
				background-color:#4fc5d6;
				color:#ffffff;
			  //border: 1px solid #0000;
			}
			
			#main-menu a {
				display:block;
				padding:10px;
				 border: 2px solid #4fc5d6;
				text-decoration:none;
				background-color: #ffffff;
				color:#000000;
			}
			.nav {
			  font-family: 'Montserrat', sans-serif;
			  text-align: center;
			}

		 </style>
    </head>
    <body>
           <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');
	   
	   
$dept=$_GET['branch'];
$year=1;
$_SESSION['branch']=$dept;
$sql1 ="SELECT * FROM batch_record WHERE ac_year=1";
$result1= $conn -> query($sql1);
$row1 =$result1 -> fetch_assoc();
$batch=$row1['batch'];


?>

                <main class="mn-inner">  <div class="example1">
									<center>
                    				<div class="nav">
									  <ul id="main-menu">
										<li><a href="FE_clearence.php?branch=<?php echo $dept?>">All Students<br></a></li>
										<li><a href="FE_clearence_app.php?branch=<?php echo $dept?>">Approved Students</a></li>
										<li class="active"><a href="FE_clearence_napp.php?branch=<?php echo $dept?>">Non-Approved Students</a></li>
									  </ul>
									</div>	</center>
									<br>
									<br>
									<div class="container">
									  <h2><br>All Students <font size="6px">(<?php echo htmlentities ($dept);?>)</font></h2>
									  <p>Note: Click on any one SAVE button to save the changes.</p>
										<form method="POST" action="FE_clearence_action.php?batch=<?php echo $batch?>"> 		  
				  
				  	   <!-- nkn -->
<br> <h5> Apply to Selected Students</h5>              
										<table >
										<tbody>
										<tr>
										<td><select name="select_remark">
										<option value="" selected disabled>Select Remark</option>
														<option value="0">Waiting</option>										  
														  <option value="1">Approved</option>
														  <option value="2">Disapproved</option>
														  <option value="3">Visit In Personal</option>
														  
											</select>
										</td>
                                        <td><input type="text" name="select_text"  placeholder="Enter Due Details"></td>
										<td><input type="number" name="select_due"  placeholder="Enter Due(s)"></td>										
										</tr>
										</tbody>
										</table>
 <!--kmd--><br><br>
				  
									<input type="submit" value="Save" style="float: right;" class="btn btn-success"> 									
									  <table class="table table-striped" >
										<thead><br><br>	
										  <tr>
										   <th><div><input type="checkbox" name="selectall1" id="selectall1" class="all" value="1"> <label for="selectall1">Select all</label></div></th>
											<th>Sr.No</th>
											<th>PRN</th>
											<th>Name</th>
											<th>Remark</th>
											<th>Due Details<br>(if any)</th>
											<th>Due (Rs)</th>
										  </tr>
										</thead>
										<tbody>
										
<?php


$sql ="SELECT * FROM $batch WHERE department='$dept' and HOD_remark!=1 ORDER BY id ASC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
$name_PRN=1;
$name_remark=101;
$name_text=201;
$name_due=301;
$name_check=401;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
	 if($result->clearance=="hall_ticket"){?> 
										  <tr>
										    <td> <center><div>&nbsp <input type="checkbox" name="<?php echo ($name_check)?>" id="<?php echo ($name_check)?>" value="1"> <label for="<?php echo ($name_check)?>"></label></div></center></td>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->PRN);?></td>
											<?php echo '<input type="hidden" name='.$name_PRN.' value='.$result->PRN.'>'?>
											<td><?php echo htmlentities($result->name);?></td>
											<td>	<!--select--><?php $remark=$result->HOD_remark;?>
													<?php if($remark==0){
														echo '<select name='.$name_remark.'>'; ?>
														  <option value="0" selected>Waiting</option>
														  <option value="1">Approved</option>
														  <option value="2">Disapproved</option>
														  <option value="3">Visit In Personal</option>
														</select>
													<?php }else if($remark==1){
														echo '<select name='.$name_remark.'>'; ?>
														  <option value="0">Waiting</option>
														  <option value="1" selected>Approved</option>
														  <option value="2">Disapproved</option>
														  <option value="3">Visit In Personal</option>
														</select>
													<?php }else if($remark==2){
														echo '<select name='.$name_remark.'>'; ?>
														  <option value="0">Waiting</option>
														  <option value="1">Approved</option>
														  <option value="2" selected>Disapproved</option>
														  <option value="3">Visit In Personal</option>
														</select>
													<?php }else if($remark==3){
														echo '<select name='.$name_remark.'>'; ?>
														  <option value="0">Waiting</option>
														  <option value="1">Approved</option>
														  <option value="2">Disapproved</option>
														  <option value="3" selected>Visit In Personal</option>
														</select>
														<?php } $value=$result->HOD_t;?>
											<!--/select-->		
											</td>
											<td><input type="text" name="<?php echo ($name_text) ?>" value="<?php echo htmlspecialchars($value); ?>" ></td>
											<td><?php echo '<input type="number" name='.$name_due.' value='.$result->HOD_due.' >';?></td>
										  </tr>
<?php $cnt++; $name_PRN++; $name_remark++; $name_text++; $name_due++;  $name_check++;} } } ?>										 
										</tbody>
									  </table>
									   <?php echo '<input type="hidden" name="cnt" value='.$cnt.'>'; ?>
									   <br>
									  <input type="submit" value="Save" style="float: right;" class="btn btn-success"> 
									  </form>
									</div>
									
					
		<br>
		<br>
		<br>
           </div>  </main>

          
        </div>
		
         
		 <!-- Checkbox -->
		  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		  <script src="jquery.checkboxall-1.0.min.js"></script>
			<script>
				$('.example1').checkboxall();
				$('.example2').checkboxall('optionalclassname');
			</script>
        
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