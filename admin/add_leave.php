<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{ 

if(isset($_POST['apply']))
{	
$leavetype=$_POST['leavetype'];
$empid=$_POST['empid'];
$no=$_POST['days'];



$sql1="INSERT INTO editleaves(id,LeaveType,no) VALUES(:empid,:leavetype,:no)";
$query1 = $dbh->prepare($sql1);
$query1->bindParam(':empid',$empid,PDO::PARAM_STR);
$query1->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
$query1->bindParam(':no',$no,PDO::PARAM_STR);
$query1->execute();


if($leavetype=="DL"){
	$sql="update tblemployees set DL=DL+:no where id=:empid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':no',$no,PDO::PARAM_STR);
	$query->bindParam(':empid',$empid,PDO::PARAM_STR);
	$query->execute();	    $msg="Leave Updated Successfully";
}	
else if($leavetype=="EL"){
	$sql="update tblemployees set EL=EL+:no,T_EL=T_EL+:no where id=:empid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':no',$no,PDO::PARAM_STR);
	$query->bindParam(':empid',$empid,PDO::PARAM_STR);
	$query->execute();		$msg="Leave Updated Successfully";
}
else if($leavetype=="CPL"){
	$sql="update tblemployees set CPL=CPL+:no where id=:empid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':no',$no,PDO::PARAM_STR);
	$query->bindParam(':empid',$empid,PDO::PARAM_STR);
	$query->execute();		$msg="Leave Updated Successfully";
}	
else if($leavetype=="FL"){
	$sql="update tblemployees set FL=FL+:no,T_FL=T_FL+:no where id=:empid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':no',$no,PDO::PARAM_STR);
	$query->bindParam(':empid',$empid,PDO::PARAM_STR);
	$query->execute();		$msg="Leave Updated Successfully";
}	
else if($leavetype=="CL"){
	$sql="update tblemployees set CL=CL+:no,T_CL=T_CL+:no where id=:empid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':no',$no,PDO::PARAM_STR);
	$query->bindParam(':empid',$empid,PDO::PARAM_STR);
	$query->execute();		$msg="Leave Updated Successfully";
}	
else if($leavetype=="OL"){
	$sql="update tblemployees set OL=OL+:no where id=:empid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':no',$no,PDO::PARAM_STR);
	$query->bindParam(':empid',$empid,PDO::PARAM_STR);
	$query->execute();		$msg="Leave Updated Successfully";
}	
else if($leavetype=="LWP"){
	$sql="update tblemployees set LWP=LWP+:no where id=:empid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':no',$no,PDO::PARAM_STR);
	$query->bindParam(':empid',$empid,PDO::PARAM_STR);
	$query->execute();		$msg="Leave Updated Successfully";
}	
	

	
else {
$error="Error: Unable to Update Leave";    
}
}
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin | Manage Leave</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

            
        <!-- Theme Styles -->
        <link href="../assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
<style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    </head>
    <body>
       <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
             <main class="mn-inner">
			
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Edit leave</div>
                    </div>
                    <div class="col s12 m12 l8">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" action="" method="post" name="addleave">
                                    <div>
                                        <h3>Edit Faculty Leave</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m12">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }										
				?>

<div class="input-field col  s12">
<select  name="leavetype" autocomplete="off">
<option value="1">Select leave type...</option>
<?php $sql = "SELECT  LeaveType from tblleavetype";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                                            
<option value="<?php echo htmlentities($result->LeaveType);?>"><?php echo htmlentities($result->LeaveType);?></option>
<?php } } ?>

</select>
</div>

<div class="input-field col m6 s12">
<label for="Emp_id">BIOM ID</label>
<input placeholder="" id="mask1" name="empid"  type="text"  required>
</div>
<div class="input-field col m6 s12">
<label for="days">Number of Leaves</label>
<input placeholder="" id="mask1" name="days" class="masked" type="number"  required>
</div>

</div>
      <button type="submit" name="apply" id="apply" class="waves-effect waves-light btn indigo m-b-xs">Apply</button>                                             

                                                </div>
                                            </div>
                                        </section>
                                     
                                    
                                        </section>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
				
            </main>
        </div>
         
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
        
    </body>
</html>
<?php } ?>