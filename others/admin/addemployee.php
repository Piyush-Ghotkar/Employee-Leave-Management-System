<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
if(isset($_POST['add']))
{
	
$empid=$_POST['empcode'];
$BIOM=$empid;
$fname=$_POST['firstName'];
$lname=$_POST['lastName'];   
$email=$_POST['email']; 
$password=md5($_POST['password']); 
$gender=$_POST['gender']; 
$dob=$_POST['dob']; 
$teaching=$_POST['teaching']; 
$department=$_POST['department']; 
$designation=$_POST['designation']; 
$address=$_POST['address']; 
$city=$_POST['city']; 
$country=$_POST['country']; 
$mobileno=$_POST['mobileno']; 
$status=1;


$CL=$_POST['CL'];
$T_CL=$_POST['T_CL'];
$EL=$_POST['EL'];
$T_EL=$_POST['T_EL'];
$DL=$_POST['DL'];
$U_DL=$_POST['U_DL'];
$FL=$_POST['FL'];
$T_FL=$_POST['T_FL'];
$CPL=$_POST['CPL'];
$U_CPL=$_POST['U_CPL'];
$OL=$_POST['OL'];
$U_OL=$_POST['U_OL'];
$LWP=$_POST['LWP'];
$U_LWP=$_POST['U_LWP'];


$sql="INSERT INTO tblemployees(id,EmpId,FirstName,LastName,EmailId,Password,Gender,Dob,Teaching,Department,Designation,Address,City,Country,Phonenumber,Status,CL,T_CL,EL,T_EL,DL,U_DL,FL,T_FL,CPL,U_CPL,OL,U_OL,LWP,U_LWP) VALUES(:BIOM,:empid,:fname,:lname,:email,:password,:gender,:dob,:teaching,:department,:designation,:address,:city,:country,:mobileno,:status,:CL,:T_CL,:EL,:T_EL,:DL,:U_DL,:FL,:T_FL,:CPL,:U_CPL,:OL,:U_OL,:LWP,:U_LWP)";
$query = $dbh->prepare($sql);
$query->bindParam(':BIOM',$BIOM,PDO::PARAM_STR);
$query->bindParam(':empid',$empid,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':dob',$dob,PDO::PARAM_STR);
$query->bindParam(':teaching',$teaching,PDO::PARAM_STR);
$query->bindParam(':department',$department,PDO::PARAM_STR);
$query->bindParam(':designation',$designation,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':country',$country,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);


$query->bindParam(':CL',$CL,PDO::PARAM_STR);
$query->bindParam(':T_CL',$T_CL,PDO::PARAM_STR);
$query->bindParam(':EL',$EL,PDO::PARAM_STR);
$query->bindParam(':T_EL',$T_EL,PDO::PARAM_STR);
$query->bindParam(':DL',$DL,PDO::PARAM_STR);
$query->bindParam(':U_DL',$U_DL,PDO::PARAM_STR);
$query->bindParam(':FL',$FL,PDO::PARAM_STR);
$query->bindParam(':T_FL',$T_FL,PDO::PARAM_STR);
$query->bindParam(':CPL',$CPL,PDO::PARAM_STR);
$query->bindParam(':U_CPL',$U_CPL,PDO::PARAM_STR);
$query->bindParam(':OL',$OL,PDO::PARAM_STR);
$query->bindParam(':U_OL',$U_OL,PDO::PARAM_STR);
$query->bindParam(':LWP',$LWP,PDO::PARAM_STR);
$query->bindParam(':U_LWP',$U_LWP,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Employee record added Successfully";
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
        <title>Admin | Add Faculty</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
		 <link type="text/css" rel="stylesheet" href="../assets/plugins/materialize/css/materialize.min.css"/>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="../assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet"> 
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
    <script type="text/javascript">
function valid()
{
if(document.addemp.password.value!= document.addemp.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.addemp.confirmpassword.focus();
return false;
}
return true;
}
</script>

<script>
function checkAvailabilityEmpid() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'empcode='+$("#empcode").val(),
type: "POST",
success:function(data){
$("#empid-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<script>
function checkAvailabilityEmailid() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#emailid-availability").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>





    </head>
    <body>
  <?php include('includes/header.php');?>
            
       <?php include('includes/sidebar.php');?>
   <main class="mn-inner">
                <div class="row">
                    <div class="col s12">
                        <div class="page-title">Add Faculty</div>
                    </div>
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form id="example-form" method="post" name="addemp">
                                    <div>
                                        <h3>Faculty Info</h3>
                                        <section>
                                            <div class="wizard-content">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <div class="row">
     <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>


 <div class="input-field col  s12">
<label for="empcode">BIOM ID(Must be unique)</label>
<input  name="empcode" id="empcode" onBlur="checkAvailabilityEmpid()" type="text" autocomplete="off" required>
<span id="empid-availability" style="font-size:12px;"></span> 
</div>


<div class="input-field col m6 s12">
<label for="firstName">First name</label>
<input id="firstName" name="firstName" type="text" required>
</div>

<div class="input-field col m6 s12">
<label for="lastName">Last name</label>
<input id="lastName" name="lastName" type="text" autocomplete="off" required>
</div>

<div class="input-field col s12">
<label for="email">Email</label>
<input  name="email" type="email" id="email" onBlur="checkAvailabilityEmailid()" autocomplete="off" required>
<span id="emailid-availability" style="font-size:12px;"></span> 
</div>

<div class="input-field col s12">
<label for="password">Password</label>
<input id="password" name="password" type="password" autocomplete="off" required>
</div>

<div class="input-field col s12">
<label for="confirm">Confirm password</label>
<input id="confirm" name="confirmpassword" type="password" autocomplete="off" required>
</div>


<div class="input-field col m6 s12">
<select  name="gender" autocomplete="off">
<option value="">Gender...</option>                                          
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select>
</div>

<div class="input-field col m6 s12">
<label for="birthdate">Birthdate</label>
<input id="birthdate" name="dob" type="date" class="datepicker" autocomplete="off" >
</div>

   

<div class="input-field col m6 s12">
<select  name="teaching" autocomplete="off">
<option value="">Teaching/Non-Teaching</option>                                          
<option value="Teaching">Teaching</option>
<option value="Non-Teaching">Non-Teaching</option>
</select>
</div>   

<div class="input-field col m6 s12">
<select  name="department" autocomplete="off">
<option value="">Department...</option>
<?php $sql = "SELECT DepartmentName from tbldepartments";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                                            
<option value="<?php echo htmlentities($result->DepartmentName);?>"><?php echo htmlentities($result->DepartmentName);?></option>
<?php }} ?>
</select>
</div>


<div class="input-field col m6 s12">
<select  name="designation" autocomplete="off">
<option value="">Designation...</option>
<?php $sql = "SELECT Designation from tbldesignation ORDER BY designation";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{   ?>                                            
<option value="<?php echo htmlentities($result->Designation);?>"><?php echo htmlentities($result->Designation);?></option>
<?php }} ?>
</select>
</div>



<div class="input-field col m6 s12">
<label for="address">Address</label>
<input id="address" name="address" type="text" autocomplete="off" required>
</div>

<div class="input-field col m6 s12">
<label for="city">City/Town</label>
<input id="city" name="city" type="text" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="country">Country</label>
<input id="country" name="country" type="text" autocomplete="off" required>
</div>

                                                            
<div class="input-field col s12">
<label for="phone">Mobile number</label>
<input id="phone" name="mobileno" type="tel" maxlength="10" autocomplete="off" required>
 </div>

                                                        



</div>
</div>
                                                    
<div class="col m6">
<div class="row">

<div class="input-field col m6 s12">
<label for="T_CL">Enter Total Casual Leaves(CL)</label>
<input id="T_CL" name="T_CL" type="text" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="CL">Enter Available Casual Leaves(CL)</label>
<input  id="CL" name="CL" type="text" autocomplete="off" required>
</div>

<div class="input-field col m6 s12">
<label for="T_EL">Enter Total Earned Leaves(EL)</label>
<input id="T_EL" name="T_EL" type="text" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="EL">Enter Available Earned Leaves(EL)</label>
<input id="EL" name="EL" type="text" autocomplete="off" required>
</div>





<div class="input-field col m6 s12">
<label for="T_FL">Enter Total Festival Leave(FL)</label>
<input id="T_FL" name="T_FL" type="text" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="FL">Enter Available Festival Leave(FL)</label>
<input id="FL" name="FL" type="text" autocomplete="off" required>
</div>
<div class="input-field col m6 s12">
<label for="U_DL">Enter Used Duty  Leaves(DL)</label>
<input id="U_DL" name="U_DL" type="text" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="DL">Enter Available Duty Leaves(DL)</label>
<input  id="DL" name="DL" type="text" autocomplete="off" required>
</div>



<div class="input-field col m6 s12">
<label for="U_CPL">Enter Used Compensatory Leaves(CPL)</label>
<input id="U_CPL" name="U_CPL" type="text" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="CPL">Enter Available Compensatory Leaves(CPL)</label>
<input  id="CPL" name="CPL" type="text" autocomplete="off" required>
</div>

<div class="input-field col m6 s12">
<label for="U_OL">Enter Used Outdoor Leavs(OL)</label>
<input id="U_OL" name="U_OL" type="text" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="OL">Enter Available Outdoor Leaves(OL)</label>
<input id="OL" name="OL" type="text" autocomplete="off" required>
</div>	




<div class="input-field col m6 s12">
<label for="U_LWP">Enter Used Leave Without Pay(LWP)</label>
<input id="U_LWP" name="U_LWP" type="text" autocomplete="off" required>
 </div>
   
<div class="input-field col m6 s12">
<label for="LWP">Enter Available Leave Without Pay(LWP)</label>
<input  id="LWP" name="LWP" type="text" autocomplete="off" required>
</div>





<div class="input-field col s12">
<button type="submit" name="add" onclick="return valid();" id="add" class="waves-effect waves-light btn indigo m-b-xs">ADD</button>

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
        <script src="../assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="../assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="../assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/js/alpha.min.js"></script>
        <script src="../assets/js/pages/form_elements.js"></script>
        
    </body>
</html>
<?php } ?> 