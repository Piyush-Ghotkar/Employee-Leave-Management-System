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
	
	if(isset($_POST['hod'])){
				
		$name_PRN=1;
		$name_remark=101;
		$name_text=201;
		$name_due=301;
		$name_check=401;
		$name_batch=501;
		$cnt=$_POST['cnt'];
		
		for($i=0;$i<$cnt-1;$i++){
			
			$a=$_POST[$name_PRN];
			$b=$_POST[$name_remark];
			$c=$_POST[$name_text];
			$d=$_POST[$name_due];
			$e=$_POST[$name_check];	
			$batch=$_POST[$name_batch];
										
			$r=$_POST['select_remark'];
			$t=$_POST['select_text'];
			$u=$_POST['select_due'];
			
			//change table name according to you(in following line)
			if($e==1){  //echo " enter if=".$r,$t,$u;            //selected students
				$sql1="update {$batch} set HOD_remark=:r,HOD_t=:t,HOD_due=:u where PRN=:a";
				
				$query1 = $dbh->prepare($sql1);	
				$query1->bindParam(':r',$r,PDO::PARAM_STR);
				$query1->bindParam(':t',$t,PDO::PARAM_STR);
				$query1->bindParam(':u',$u,PDO::PARAM_STR);
				$query1->bindParam(':a',$a,PDO::PARAM_STR);
				$query1->execute();
				
				}else{ 
				
				$sql="update {$batch} set HOD_remark=:b,HOD_t=:c,HOD_due=:d where PRN=:a";
				$query = $dbh->prepare($sql);
				$query->bindParam(':b',$b,PDO::PARAM_STR);
				$query->bindParam(':c',$c,PDO::PARAM_STR);
				$query->bindParam(':d',$d,PDO::PARAM_STR);
				$query->bindParam(':a',$a,PDO::PARAM_STR);
				$query->execute();
				}
				

			//echo $i." PRN=".$a." Remark=".$b." Text=".$c." Due=".$d."<br>";
			$name_PRN++;
			$name_remark++;
			$name_text++;
			$name_due++;
			$name_check++;
			$name_batch++;
		}
	}
	
	
	
	if(isset($_POST['lib'])){
		$name_PRN=1;
		$name_remark=101;
		$name_text=201;
		$name_due=301;
		$name_check=401;
		$name_batch=501;
		$cnt=$_POST['cnt'];

		for($i=0;$i<$cnt-1;$i++){
			
			$a=$_POST[$name_PRN];
			$b=$_POST[$name_remark];
			$c=$_POST[$name_text];
			$d=$_POST[$name_due];
			$e=$_POST[$name_check];	
			$batch=$_POST[$name_batch];
										
			$r=$_POST['select_remark'];
			$t=$_POST['select_text'];
			$u=$_POST['select_due'];

			//change table name according to you(in following line)
			if($e==1){  //echo " enter if=".$r,$t,$u;            //selected students
				$sql1="update {$batch} set library_remark=:r,library_t=:t,library_due=:u where PRN=:a";
				$query1 = $dbh->prepare($sql1);	
				$query1->bindParam(':r',$r,PDO::PARAM_STR);
				$query1->bindParam(':t',$t,PDO::PARAM_STR);
				$query1->bindParam(':u',$u,PDO::PARAM_STR);
				$query1->bindParam(':a',$a,PDO::PARAM_STR);
				$query1->execute();
				
			}else{ 
				
				$sql="update {$batch} set library_remark=:b,library_t=:c,library_due=:d where PRN=:a";
				$query = $dbh->prepare($sql);
				$query->bindParam(':b',$b,PDO::PARAM_STR);
				$query->bindParam(':c',$c,PDO::PARAM_STR);
				$query->bindParam(':d',$d,PDO::PARAM_STR);
				$query->bindParam(':a',$a,PDO::PARAM_STR);
				$query->execute();
				}
				

			//echo $i." PRN=".$a." Remark=".$b." Text=".$c." Due=".$d."<br>";
			$name_PRN++;
			$name_remark++;
			$name_text++;
			$name_due++;
			$name_check++;
			$name_batch++;
		}	
	}
	
	
	
	
	
	
	$sql1='SELECT Department from tblemployees WHERE EmpId="'.$_SESSION["alogin"].'"';
	$result1=mysqli_query($conn,$sql1);
	$val =mysqli_fetch_row($result1);
    $_SESSION['thisdep'] =$val[0];
	
	//Fetch account (imp for library to get all dept students)	
	$sql2 ='SELECT account FROM admin WHERE UserName="'.$_SESSION["alogin"].'"';
	$result2=mysqli_query($conn,$sql2);
	$val2 =mysqli_fetch_row($result2);

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

$show=$_GET['show'];

$_SESSION['year']=$year;

$sql1 ="SELECT * FROM batch_record";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);


	$dept=$_SESSION['thisdep'];
?>

		
			<?php if($val2[0]!="LIB"){?>
                <main class="mn-inner"> <div class="example1">
									<center>
                    				<div class="nav">
									  <ul id="main-menu">
									  <?php if($show=="all"){?> 
										<li class="active"><a href="transfer_clearance.php?show=all">All Students<br></a></li>
										<li><a href="transfer_clearance.php?show=app">Approved Students</a></li>
										<li><a href="transfer_clearance.php?show=napp">Non-Approved Students</a></li>
									  <?php }else if($show=="app"){?>
										<li><a href="transfer_clearance.php?show=all">All Students<br></a></li>
										<li class="active"><a href="transfer_clearance.php?show=app">Approved Students</a></li>
										<li><a href="transfer_clearance.php?show=napp">Non-Approved Students</a></li>
									  <?php }else if($show=="napp"){?>
										<li><a href="transfer_clearance.php?show=all">All Students<br></a></li>
										<li><a href="transfer_clearance.php?show=app">Approved Students</a></li>
										<li class="active"><a href="transfer_clearance.php?show=napp">Non-Approved Students</a></li>
									  <?php }?>
									  </ul>
									</div>	</center>
									<br>
									<br>
									<div class="container">
									 <h2><?php if($show=="all")echo 'All '; elseif($show=="app")echo 'Approved '; elseif($show=="napp")echo 'Non-Approved ';?> Students </h2>
									  <p>Note: Click on any one SAVE button to save the changes.</p>

										<form method="POST" action=""> 	


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


						<input type="submit" value="Save" name="hod" style="float: right;" class="btn btn-success"> 												
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
	$cnt=1;
	$name_PRN=1;
	$name_remark=101;
	$name_text=201;
	$name_due=301;
	$name_check=401;
	$name_batch=501;
foreach($results1 as $result1)
{  
	$batch=$result1->batch;
	
	if($val2[0]=="FE" and $result1->ac_year==1){
		if($show=="all"){
			$sql ="SELECT * FROM $batch  ORDER BY id ASC";
		}elseif($show=="app"){
			$sql ="SELECT * FROM $batch WHERE HOD_remark=1 ORDER BY id ASC";
		} elseif($show=="napp"){
			$sql ="SELECT * FROM $batch WHERE HOD_remark!=1 ORDER BY id ASC";
		}	
	}else{
		if($show=="all"){
			$sql ="SELECT * FROM $batch WHERE department='$dept' ORDER BY id ASC";
		}elseif($show=="app"){
			$sql ="SELECT * FROM $batch WHERE department='$dept' and HOD_remark=1 ORDER BY id ASC";
		} elseif($show=="napp"){
			$sql ="SELECT * FROM $batch WHERE department='$dept' and HOD_remark!=1 ORDER BY id ASC";
		}		
	}	
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	 
	if($query->rowCount() > 0)
	{
	foreach($results as $result)
	{  
	   if($result->clearance=="transfer"){?> 
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
														
														<?php echo '<input type="hidden" name='.$name_batch.' value='.$batch.'>'?>
											<!--/select-->		
											</td>
											<td><input type="text" name="<?php echo ($name_text) ?>" value="<?php echo htmlspecialchars($value); ?>" ></td>
											<td><?php echo '<input type="number" name='.$name_due.' value='.$result->HOD_due.' >';?></td>
										  </tr>
   <?php $cnt++; $name_PRN++; $name_remark++; $name_text++; $name_due++;  $name_check++; $name_batch++;} } } }?>										 
										</tbody>
									  </table>
									   <?php echo '<input type="hidden" name="cnt" value='.$cnt.'>'; ?>
									   <br>
									  <input type="submit" value="Save" name="hod" style="float: right;" class="btn btn-success"> 
									  </form>
									</div>
	
		<br>
		<br>
		<br>
          </div>   </main>
		  
<!--else part for library -->
	<?php }else{?>
	
			<main class="mn-inner"> <div class="example1">
									<center>
                    				<div class="nav">
									  <ul id="main-menu">
									  <?php if($show=="all"){?> 
										<li class="active"><a href="transfer_clearance.php?show=all">All Students<br></a></li>
										<li><a href="transfer_clearance.php?show=app">Approved Students</a></li>
										<li><a href="transfer_clearance.php?show=napp">Non-Approved Students</a></li>
									  <?php }else if($show=="app"){?>
										<li><a href="transfer_clearance.php?show=all">All Students<br></a></li>
										<li class="active"><a href="transfer_clearance.php?show=app">Approved Students</a></li>
										<li><a href="transfer_clearance.php?show=napp">Non-Approved Students</a></li>
									  <?php }else if($show=="napp"){?>
										<li><a href="transfer_clearance.php?show=all">All Students<br></a></li>
										<li><a href="transfer_clearance.php?show=app">Approved Students</a></li>
										<li class="active"><a href="transfer_clearance.php?show=napp">Non-Approved Students</a></li>
									  <?php }?>
									  </ul>
									</div>	</center>
									<br>
									<br>
									<div class="container">
									 <h2><?php if($show=="all")echo 'All '; elseif($show=="app")echo 'Approved '; elseif($show=="napp")echo 'Non-Approved ';?> Students </h2>
									  <p>Note: Click on any one SAVE button to save the changes.</p>

										<form method="POST" action=""> 	


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


						<input type="submit" value="Save"name="lib" style="float: right;" class="btn btn-success"> 												
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

	$cnt=1;
	$name_PRN=1;
	$name_remark=101;
	$name_text=201;
	$name_due=301;
	$name_check=401;
	$name_batch=501;
foreach($results1 as $result1)
{   
	$batch=$result1->batch;
	
	if($show=="all"){
		$sql ="SELECT * FROM $batch ORDER BY id ASC";
	}elseif($show=="app"){
		$sql ="SELECT * FROM $batch WHERE library_remark=1 ORDER BY id ASC";
	} elseif($show=="napp"){
		$sql ="SELECT * FROM $batch WHERE library_remark!=1 ORDER BY id ASC";
	}		
		
	$query = $dbh -> prepare($sql);
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	
	if($query->rowCount() > 0)
	{ 
	foreach($results as $result)
	{  
	   if($result->clearance=="transfer"){?> 
											<tr>
										    <td> <center><div>&nbsp <input type="checkbox" name="<?php echo ($name_check)?>" id="<?php echo ($name_check)?>" value="1"> <label for="<?php echo ($name_check)?>"></label></div></center></td>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->PRN);?></td>
											<?php echo '<input type="hidden" name='.$name_PRN.' value='.$result->PRN.'>'?>
											<td><?php echo htmlentities($result->name);?></td>
											<td>	<!--select--><?php $remark=$result->library_remark;?>
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
														<?php } $value=$result->library_t;?>
														
														<?php echo '<input type="hidden" name='.$name_batch.' value='.$batch.'>'?>
											<!--/select-->		
											</td>
											<td><input type="text" name="<?php echo ($name_text) ?>" value="<?php echo htmlspecialchars($value); ?>" ></td>
											<td><?php echo '<input type="number" name='.$name_due.' value='.$result->library_due.' >';?></td>
										  </tr>
   <?php $cnt++; $name_PRN++; $name_remark++; $name_text++; $name_due++;  $name_check++; $name_batch++;} } } }?>										 
										</tbody>
									  </table>
									   <?php echo '<input type="hidden" name="cnt" value='.$cnt.'>'; ?>
									   <br>
									  <input type="submit" value="Save" name="lib" style="float: right;" class="btn btn-success"> 
									  </form>
									</div>
	
		<br>
		<br>
		<br>
          </div>   </main>
	
	<?php }?>

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