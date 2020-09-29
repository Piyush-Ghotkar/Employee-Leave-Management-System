<?php
session_start();
error_reporting(0);

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
$sql ="SELECT EmailId,Password,Status,id,EmpId,Department FROM tblemployees WHERE EmailId=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $status=$result->Status;
	$_SESSION['EmpId1']=$result->EmpId;
    $_SESSION['eid']=$result->id;
	$_SESSION['dep']=$result->Department;
  } 
if($status==0)
{
$msg="Your account is Inactive. Please contact admin";
} else{
$_SESSION['emplogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'myprofile.php'; </script>";
} }

else{
  
  echo "<script>alert('Invalid Details');</script>";

}
}

?><!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Title -->
        <title>Home Page</title>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.min.css"/>
             <link href="assets/css/materialdesign.css" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        

        	
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body background="mountains2.jpg">
        <div class="loader-bg"></div>
        <div class="loader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-spinner-teal lighten-1">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                    <div class="circle"></div>
                    </div><div class="circle-clipper right">
                    <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mn-content fixed-sidebar">
            <header class="mn-header navbar-fixed">
                <nav class="cyan darken-1">
                    <div class="nav-wrapper row">
                        <section class="material-design-hamburger navigation-toggle">
                            <a href="#" data-activates="slide-out" class="button-collapse show-on-large material-design-hamburger__icon">
                                <span class="material-design-hamburger__layer"></span>
                            </a>
                        </section>
                        <div class="header-title col s3">      
                            <span class="chapter-title">BIT Login</span>
                        </div>
                      
                           
                        </form>
                     
                        
                    </div>
                </nav>
            </header>
           
           
            <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                   
                 
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion" style="">
                    <li>&nbsp;</li>
					<li class="no-padding"><a class="waves-effect waves-grey" href="Principal/">Principal Login</a></li>
					<li class="no-padding"><a class="waves-effect waves-grey" href="HOD/">HOD Login</a></li>
					<li class="no-padding"><a class="waves-effect waves-grey" href="student.php">Student Login</a></li>
                    <li class="no-padding"><a class="waves-effect waves-grey" href="index.php">Faculty Login</a></li>
					<li class="no-padding"><a class="waves-effect waves-grey" href="admin/">Admin Login</a></li>
					
					
					
                    
                </ul>
          <div class="footer">
                                    
                </div>
               
            </aside>
            <main class="mn-inner">
                <div class="row">
                    <div class="col s12">

                       <center><h4>Welcome!</h4></center>
						<br>
                          <div class="col s12 m6 l8 offset-l2 offset-m3">
                              <div class="card white darken-1">

                                  <div class="card-content ">
                                      <span class="card-title" style="font-size:20px;">Faculty Login</span>
                                         <?php if($msg){?><div class="errorWrap"><strong>Error</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                       <div class="row">
                                           <form class="col s12" name="signin" method="post" action="">
                                               <div class="input-field col s12">
                                                   <input id="username" type="text" name="username" class="validate" autocomplete="off" required >
                                                   <label for="email">Email Id</label>
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
        <div class="left-sidebar-hover"></div>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        
    </body>
</html>
