<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
	


$sql1='SELECT id from tblemployees WHERE EmpId="'.$_SESSION["alogin"].'"';
$result1=mysqli_query($conn,$sql1);
$val =mysqli_fetch_row($result1);
$_SESSION['aid']=$val;
	
$msg=$_GET['msg'];	
if(isset($_POST['apply']))
{	

$empid=NULL;
$aid=$val[0];

$leavetype=$_POST['leavetype'];
$fromdate=$_POST['fromdate'];  
$todate=$_POST['todate'];
$radio=$_POST['radio'];
$half=$_POST['half'];
$adj=$_POST['adj'];
$description=$_POST['description'];  
$status=0;
$isread=0;
if($fromdate > $todate){
                $error=" ToDate should be greater than FromDate ";
           }
$sql="INSERT INTO tblleaves(LeaveType,ToDate,FromDate,Full_Leave,Half_Leave,Duty_Adj,Description,Status,IsRead,empid,aid) VALUES(:leavetype,:todate,:fromdate,:radio,:half,:adj,:description,:status,:isread,:empid,:aid)";
$query = $dbh->prepare($sql);
$query->bindParam(':leavetype',$leavetype,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':radio',$radio,PDO::PARAM_STR);
$query->bindParam(':half',$half,PDO::PARAM_STR);
$query->bindParam(':adj',$adj,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->bindParam(':aid',$aid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

$up= $conn->query('UPDATE tblleaves SET Status=1');	
$msg="Leave applied successfully";

}
else 
{
$error="Something went wrong. Please try again";
}

}

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Employee | Apply Leave</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize1.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
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
@media only screen and (max-width: 600px) {
.newline{
	display: inline-block;
}
}
</style>

    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
   <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Apply for Leave</div>
                    </div>
					
					<table  class="temp"><tr><td class="newline">
					
                    <div class="col s12 m12 l11">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                                        <h3>Apply for Leave</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m12">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR </strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>


 <div class="input-field col  s12">
<select  name="leavetype" autocomplete="off">
<option value="">Select leave type...</option>
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
<?php }} ?>
</select>
</div>


<!--
<div class="input-field col m6 s12">
<label for="fromdate">From  Date</label>
<input placeholder="" id="mask1" name="fromdate" class="masked" type="text" data-inputmask="'alias': 'date'" required>
</div>
<div class="input-field col m6 s12">
<label for="todate">To Date</label>
<input placeholder="" id="mask1" name="todate" class="masked" type="text" data-inputmask="'alias': 'date'" required>
</div>
-->
<div class="input-field col m6 s12">
Fromdate:
<input type="date" name="fromdate">
</div>

<div class="input-field col m6 s12">
Todate:
<input type="date" name="todate">
</div>


<!--
<div class="input-field col m6 s12">
<label for="todate">Number of Leaves</label>
<input placeholder="e.g 1, 2, 4.5 etc" name="no" class="masked" type="text" required>
</div>
-->
<div class="input-field col m6 s12">
<input type="radio" value="1" name="radio" checked> &nbsp Full Leave &nbsp &nbsp &nbsp &nbsp
<input type="radio" value="0" name="radio"> &nbsp  Half Leave
</div>

<div class="input-field col m6 s12">
<select  name="half" autocomplete="off">
<option value="">First Half/Second Half (only for Half Leave)</option>
<option value="First Half">First Half</option>
<option value="Second Half">Second Half</option>
</select>
</div>

<div class="input-field col m6 s12">
<label for="adj">Duty Adjustment</label>
<input id="adj" name="adj" class="masked" type="text" required>
</div>


<div class="input-field col m12 s12">
<label for="birthdate">Detail Reason</label>    

<textarea id="textarea1" name="description" class="materialize-textarea" length="500" required></textarea>
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
				
				
				
</td>					
<td class="newline">					
<div class="col s12 m12 l8">						
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
				
</div>					
		</td>	</table>		
									
				
				
				
				
				
            </main>
        </div>
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>
          <script src="assets/js/pages/form-input-mask.js"></script>
                <script src="assets/plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    </body>
</html>
<?php } ?> 