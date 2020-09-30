<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['emplogin'])==0)
    {   
header('location:index.php');
}
else{
$eid=$_SESSION['emplogin'];
if(isset($_POST['update']))
{

$fname=$_POST['firstName'];
$lname=$_POST['lastName'];   
$gender=$_POST['gender']; 
$dob=$_POST['dob']; 
$department=$_POST['department']; 
$address=$_POST['address']; 
$city=$_POST['city']; 
$country=$_POST['country']; 
$mobileno=$_POST['mobileno']; 
$sql="update tblemployees set FirstName=:fname,LastName=:lname,Gender=:gender,Dob=:dob,Department=:department,Designation=:designation,Address=:address,City=:city,Country=:country,Phonenumber=:mobileno where EmailId=:eid";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':department',$department,PDO::PARAM_STR);
$query->bindParam(':designation',$designation,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
$msg="Employee record updated Successfully";
}
//$dbh->close();
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Faculty | Dashboard</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
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
table {
  border-collapse: collapse;
  width: 60%;
  border: 1px solid black;
  margin-left: 10px;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #ffff}

th {
  background-color: #4CAF50;
  color: white;
}
</style>



    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
	   
<main class="mn-inner">
	   
   



<h2> &nbsp Faculty Leaves</h2>



<?php
session_start();
$eid=$_SESSION['eid'];
//$sql1= 'SELECT CPL, T_CPL  from tblemployees WHRER id="'.$_SESSION['eid'].'"';

  
  


	$sql1= "SELECT CL, T_CL, EL, T_EL, DL, U_DL, FL, T_FL, CPL, U_CPL, OL, U_OL, LWP, U_LWP, ML, U_ML from tblemployees where id=$eid";
	$result1= $conn -> query($sql1);
	$row1 =$result1 -> fetch_assoc();
	$U_CL=$row1['T_CL']-$row1['CL'];
	$U_EL=$row1['T_EL']-$row1['EL'];
	$U_FL=$row1['T_FL']-$row1['FL'];
	
	$B_DL=$row1['DL']-$row1['U_DL'];
	$B_CPL=$row1['CPL']-$row1['U_CPL'];
	$B_OL=$row1['OL']-$row1['U_OL'];
	$B_LWP=$row1['LWP']-$row1['U_LWP'];
	
	
echo '<table>
	<tr>
	<th>Type of Leaves</th>
	<th>Available</th>
	<th>Availed</th> 
	<th>Balance</th>
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




<br><hr><br>

                <div class="row">
                    <div class="col s12">
                        <div class="page-title"></div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="updatemp">
                                    <div>
                                        <h3>Update Your Info</h3>
                                           <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">
<?php 
$eid=$_SESSION['emplogin'];
$sql = "SELECT * from  tblemployees where EmailId=:eid";
$query = $dbh -> prepare($sql);
$query -> bindParam(':eid',$eid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
 <div class="input-field col  s12">
<label for="empcode">Employee Code</label>
<input  name="empcode" id="empcode" value="<?php echo htmlentities($result->EmpId);?>" type="text" autocomplete="off" readonly required>
<span id="empid-availability" style="font-size:12px;"></span> 
</div>


<div class="input-field col m6 s12">
<label for="firstName">First name</label>
<input id="firstName" name="firstName" value="<?php echo htmlentities($result->FirstName);?>"  type="text" required>
</div>

<div class="input-field col m6 s12">
<label for="lastName">Last name </label>
<input id="lastName" name="lastName" value="<?php echo htmlentities($result->LastName);?>" type="text" autocomplete="off" required>
</div>

<div class="input-field col s12">
<label for="email">Email</label>
<input  name="email" type="email" id="email" value="<?php echo htmlentities($result->EmailId);?>" readonly autocomplete="off" required>
<span id="emailid-availability" style="font-size:12px;"></span> 
</div>

<div class="input-field col s12">
<label for="phone">Mobile number</label>
<input id="phone" name="mobileno" type="tel" value="<?php echo htmlentities($result->Phonenumber);?>" maxlength="10" autocomplete="off" required>
 </div>

</div>
</div>
                                                    
<div class="col m6">
<div class="row">
<div class="input-field col m6 s12">
<font size="1.999px">Gender: </font>
<select  name="gender" autocomplete="off">
<option value="<?php echo htmlentities($result->Gender);?>"><?php echo htmlentities($result->Gender);?></option>                                          
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
</div>
<label for="birthdate">Date of Birth</label>
<div class="input-field col m6 s12">

<input id="birthdate" name="dob"  class="datepicker" value="<?php echo htmlentities($result->Dob);?>" >
</div>

                                                    

<div class="input-field col m6 s12">
<font size="1.999px">Department: </font>
<select  name="department" autocomplete="off">
<option value="<?php echo htmlentities($result->Department);?>"><?php echo htmlentities($result->Department);?></option>
<?php $sql = "SELECT DepartmentName from tbldepartments";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $resultt)
{   ?>                                            
<option value="<?php echo htmlentities($resultt->DepartmentName);?>"><?php echo htmlentities($resultt->DepartmentName);?></option>
<?php }} ?>
</select>
</div>

<div class="input-field col m6 s12">
<font size="1.999px">Designation: </font>
<select  name="designation" autocomplete="off">
<option value="<?php echo htmlentities($result->Designation);?>"><?php echo htmlentities($result->Designation);?></option>
<?php $sql = "SELECT Designation from tbldesignation";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $resultt)
{   ?>                                            
<option value="<?php echo htmlentities($resultt->Designation);?>"><?php echo htmlentities($resultt->Designation);?></option>
<?php }} ?>
</select>
</div>

<div class="input-field col m6 s12">
<label for="address">Address</label>
<input id="address" name="address" type="text"  value="<?php echo htmlentities($result->Address);?>" autocomplete="off" required>
</div>



<div class="input-field col m6 s12">
<label for="city">City/Town</label>
<input id="city" name="city" type="text"  value="<?php echo htmlentities($result->City);?>" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="country">Country</label>
<input id="country" name="country" type="text"  value="<?php echo htmlentities($result->Country);?>" autocomplete="off" required>
</div>

                                                            

<?php }}?>
                                                        
<div class="input-field col s12">
<button type="submit" name="update"  id="update" class="waves-effect waves-light btn indigo m-b-xs">UPDATE</button>

</div>

                                                        </div>
                                                    </div>
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
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        <script src="assets/js/pages/form_elements.js"></script>
        
    </body>
</html>
<?php } ?> 