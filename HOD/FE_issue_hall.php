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
	
if(isset($_POST['save'])){
	$name_PRN1=1;
	$name_check1=501;
	$cnt1=$_POST['cnt'];
	
	$batch1=$_POST['batch'];
	
	for($i=0;$i<$cnt1-1;$i++){
		$a=$_POST[$name_PRN1];
		$e=$_POST[$name_check1];	
		if($e==1){
			$sql1="update {$batch1} set hall_ticket=1 where PRN=:a";
			$query1 = $dbh->prepare($sql1);	
			$query1->bindParam(':a',$a,PDO::PARAM_STR);
			$query1->execute();
		}else{
			$sql1="update {$batch1} set hall_ticket=0 where PRN=:a";
			$query1 = $dbh->prepare($sql1);	
			$query1->bindParam(':a',$a,PDO::PARAM_STR);
			$query1->execute();
		}
		$name_PRN1++;
		$name_check1++;
	}
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
			  #main-menu li {
				display: block;
				width:200px;
				float: left;
				margin-left: 10px;
				border: 2px solid #EEE;
			}

			#main-menu a:hover,
			#main-menu li.active a {
				background-color:#4fc5d6;
				color:#ffffff;
			  border: 1px solid #0000;
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
           <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');
$dept=$_GET['branch'];
$year=1;

$_SESSION['branch']=$dept;
$_SESSION['year']=$year;
$sql1 ="SELECT * FROM batch_record WHERE ac_year=1";
$result1= $conn -> query($sql1);
$row1 =$result1 -> fetch_assoc();
$batch=$row1['batch'];

?>

		
                <main class="mn-inner"> <div class="example1">
					
									<div class="container">
									  <h2>Hall Ticket<font size="6px">(<?php echo htmlentities ($dept);?>)</font></h2>
									  <p>Note: Click on any one SAVE button to save the changes.</p>
<hr>
										<form method="POST" action=""> 	

									  
	  
						<div><input type="checkbox" name="selectall1" id="selectall1" class="all" value="1"> <label for="selectall1">Select all</label></div>
						<input type="submit" name="save" value="Save" style="float: right;" class="btn btn-success"> 												
									  <table class="table table-striped" >
										<thead><br><br>	
										  <tr>
										   <th>Issued</th>
											<th>Sr.No</th>
											<th>PRN</th>
											<th>Name</th>
											<th>HOD</th>
											<th>Library</th>
											<th>Sports</th>
											<th>Scholarship</th>
											<th>Accounts</th>
										  </tr>
										</thead>
										<tbody>
										
<?php

$sql ="SELECT * FROM $batch WHERE department='$dept' ORDER BY id ASC";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
$name_PRN=1;
$name_check=501;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?> 
										  <tr>
										    <td> <center> <?php if(($result->hall_ticket)==1){ ?><div>&nbsp <input type="checkbox" name="<?php echo ($name_check)?>" id="<?php echo ($name_check)?>" value="1" checked> <label for="<?php echo ($name_check)?>"></label></div>
																			       <?php }else{?><div>&nbsp <input type="checkbox" name="<?php echo ($name_check)?>" id="<?php echo ($name_check)?>" value="1" > <label for="<?php echo ($name_check)?>"></label></div> <?php } ?></center></td>
											
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->PRN);?></td>
											<?php echo '<input type="hidden" name='.$name_PRN.' value='.$result->PRN.'>';?>
											<?php echo '<input type="hidden" name=batch value='.$batch.'>';?>
											<td><?php echo htmlentities($result->name);?></td>
											<td><?php if(($result->HOD_remark)==1){echo '<i class="fa fa-check-circle" style="font-size:36px;color:green"></i>';}else{echo '-'; }?></td>
											<td><?php if(($result->library_remark)==1){echo '<i class="fa fa-check-circle" style="font-size:36px;color:green"></i>';}else{echo '-'; }?></td>
											<td><?php if(($result->sports_remark)==1){echo '<i class="fa fa-check-circle" style="font-size:36px;color:green"></i>';}else{echo '-'; }?></td>
											<td><?php if(($result->scholarship_remark)==1){echo '<i class="fa fa-check-circle" style="font-size:36px;color:green"></i>';}else{echo '-'; }?></td>
											<td><?php if(($result->account_remark)==1){echo '<i class="fa fa-check-circle" style="font-size:36px;color:green"></i>';}else{echo '-'; }?></td>
											
										  </tr>
<?php $cnt++; $name_PRN++; $name_remark++; $name_text++; $name_due++;  $name_check++;} } ?>										 
										</tbody>
									  </table>
									   <?php echo '<input type="hidden" name="cnt" value='.$cnt.'>'; ?>
									   <br>
									  <input type="submit" name="save" value="Save" style="float: right;" class="btn btn-success"> 
									  </form>
									</div>
									
					
		<br>
		<br>
		<br>
          </div>   </main>
		

    
		
         
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