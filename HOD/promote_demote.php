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
	
if(isset($_POST['submit_promote'])){
	$a=$_POST['PRN'];
	$batch=$_POST['batch'];
	$sql1="update {$batch} set ac_year=ac_year+1 where PRN=:a";
	
	$query1 = $dbh->prepare($sql1);	
	$query1->bindParam(':a',$a,PDO::PARAM_STR);
	$query1->execute();
}else if(isset($_POST['submit_demote'])){
	$a=$_POST['PRN'];
	$batch=$_POST['batch'];
	$sql1="update {$batch} set ac_year=ac_year-1 where PRN=:a";
	
	$query1 = $dbh->prepare($sql1);	
	$query1->bindParam(':a',$a,PDO::PARAM_STR);
	$query1->execute();
}
	
	
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
		 th,td {
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
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
           <?php include('includes/header.php');
				 include('includes/sidebar.php');
				 	   
				$dept=$_GET['branch'];

				$_SESSION['branch']=$dept;?>
  

                <main class="mn-inner">
									<div class="container">
									  <h2>Promote/Demote Students <br><font size="6px">(<?php echo htmlentities ($dept);?>)</font></h2>
									  
										
									</div>
									
                    				<div class="nav">
									  <ul id="main-menu">
									  
										       <?php	  

												$sql ="SELECT * FROM batch_record ORDER BY id DESC";
												$query = $dbh -> prepare($sql);
												$query->execute();
												$results=$query->fetchAll(PDO::FETCH_OBJ);
												$cnt=0;
												if($query->rowCount() > 0)
												{
												foreach($results as $result)
												{ 
													if($cnt==4){echo '<br> <br><br>'; $cnt=0;}
												?>
												
													<?php if($_GET['batch']==$result->batch){?>
													<li class="active"><a href="promote_demote.php?branch=<?php echo $dept?>&batch=<?php echo $result->batch?>&batch2=<?php echo $result->batch2?>"><?php echo htmlspecialchars($result->batch2); ?><br></a></li>
													<?php }else{?>
													<li><a href="promote_demote.php?branch=<?php echo $dept?>&batch=<?php echo $result->batch?>&batch2=<?php echo $result->batch2?>"><?php echo htmlspecialchars($result->batch2); ?><br></a></li>
													<?php }$cnt++;?>
												<?php }}?>
									  </ul>
									</div>
									<br>
									<br>
									<div class="container">									<br>
									<hr>
									  <h2><?php if(isset($_GET['batch2'])){ echo htmlspecialchars($_GET['batch2']); ?><br></h2>
									  
									   
									   <table class="table table-striped" >
										<thead><br><br>	
										  <tr>
										   	<th>Sr.No</th>
											<th>PRN</th>
											<th>Name</th>
											<th>Current Year</th>
											<th>Promote</th>
											<th>Demote</th>
										  </tr>
										</thead>
									  <tbody>
										
<?php

$batch=$_GET['batch'];

	$sql1 ="SELECT * FROM $batch WHERE department='$dept' ORDER BY id ASC";

$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

$form=301;
if($query1->rowCount() > 0)
{
foreach($results1 as $result)
{  
?> 
										<form name=<?php echo ($form);?> method="POST" action="">  
										<tr>
										
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->PRN);?></td>
											<?php echo '<input type="hidden" name=PRN value='.$result->PRN.'>'?>
											<td><?php echo htmlentities($result->name);?></td>
											<td><?php echo htmlentities($result->ac_year);?></td>
											<td>
											
											<?php echo '<input type="hidden" name=batch value='.$batch.'>'?>
											
											<button type="submit" name="submit_promote" style="color: transparent; background-color: transparent; border-color: transparent;"><i class="fa fa-arrow-up" aria-hidden="true" style="font-size:26px;color:green">
											</i></button></td>
											<td>
											<button type="submit" name="submit_demote" style="color: transparent; background-color: transparent; border-color: transparent;"><i class="fa fa-arrow-down" aria-hidden="true" style="font-size:26px;color:red">
											</i></button></td>
											
											
										  </tr></form>
<?php $cnt++; $form++;} } ?>										 
										</tbody>
									  </table>
									  
									  <?php }?>
									  
									  
									  
										
									</div>
									
					
		<br>
		<br>
		<br>
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