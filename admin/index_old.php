<?php
session_start();

//paste
$curr_month=date('m');


$conn = mysqli_connect("localhost", "root", "", "elms");
$sql1= "SELECT month  from tblemployees";
$result1=mysqli_query($conn,$sql1);
$row1 =mysqli_fetch_row($result1);

$diff=$curr_month-$row1[0];

$result= $conn->query('UPDATE tblemployees SET CL= CL+'.$diff.'');
$result= $conn->query('UPDATE tblemployees SET T_CL= T_CL+'.$diff.'');
$result= $conn->query('UPDATE tblemployees SET EL= EL+(1.5*'.$diff.')');
$result= $conn->query('UPDATE tblemployees SET T_EL= T_EL+(1.5*'.$diff.')');
$result= $conn->query('UPDATE tblemployees SET month='.$curr_month.'');

//for setting FL to 2 on january
$sql2= "SELECT annual_status  from tblemployees";
$result2=mysqli_query($conn,$sql2);
$row2 =mysqli_fetch_row($result2);

if($curr_month==6){
	$result= $conn->query('UPDATE tblemployees SET annual_status=1');
}
if($curr_month==7 and $row2[0]==1){
	$result= $conn->query('UPDATE tblemployees SET annual_status=0');
	$result= $conn->query('UPDATE tblemployees SET FL=FL+2');
	$result= $conn->query('UPDATE tblemployees SET T_FL=T_FL+2');
}

$conn->close();
//upto here


include('includes/config.php');
if(isset($_POST['signin']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Admin</title>
        
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
    </head>
    <body class="signin-page">

        <div class="mn-content valign-wrapper">

            <main class="mn-inner container">
  <h4 align="center"><a href="../index.php">Admin Login</a></h4>
                <div class="valign">
                      <div class="row">

                          <div class="col s12 m6 l4 offset-l4 offset-m3">
                              <div class="card white darken-1">
                                  <div class="card-content ">
                                      <span class="card-title">Sign In</span>
                                       <div class="row">
                                           <form class="col s12" name="signin" method="post">
                                               <div class="input-field col s12">
                                                   <input id="username" type="text" name="username" class="validate" autocomplete="off" required >
                                                   <label for="email">Username</label>
                                               </div>
                                               <div class="input-field col s12">
                                                   <input id="password" type="password" class="validate" name="password" autocomplete="off" required>
                                                   <label for="password">Password</label>
                                               </div>
                                               <div class="col s12 right-align m-t-sm">
                                                
                                                   <input type="submit" name="signin" value="Sign in" class="waves-effect waves-light btn teal">
                                               </div>
                                           </form>
                                      </div>
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
        <script src="../assets/js/alpha.min.js"></script>
        
    </body>
</html>