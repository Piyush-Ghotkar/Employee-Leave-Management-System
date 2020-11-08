<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{
 $id2=$_SESSION['alogin'];

    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>HOD | Update Faculty</title>
        
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
		
		<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  
      <link rel="stylesheet" href="css/style.css">
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
	   
<h2><b>NOTICE SENT</b></h2>

<br><hr><br><div class="container">
    <ul class="responsive-table">
    <li class="table-header">
      <div class="col col-1">|Sr no.|</div>
      <div class="col col-2">| Title |</div>
      <div class="col col-3">| Link |</div>
      <div class="col col-4">| Date |</div>
    </li>


<?php

$sql ='SELECT * FROM notice WHERE Empid="'.$_SESSION['EmpId1'].'" or department="'.$_SESSION['dep'].'" ORDER BY date DESC';
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
if($result->sender_id==$id2){
?>              
    <li class="table-row">
      <div class="col col-1" data-label="sr"><?php echo htmlentities($cnt);?></div>
      <div class="col col-2" data-label="title"><?php echo htmlentities($result->title);?></div>
      <div class="col col-3" data-label="link"><a href="notice/download_notice.php?refno=<?php echo $result->refno?>&date=<?php echo $result->date?>&title=<?php echo $result->title?>&body=<?php echo $result->body?>">Download</a></div>
      <div class="col col-4" data-label="date"><?php echo htmlentities($result->date);?></div>
    </li>
  
               
<?php $cnt++; } } } ?>
    </div>
        </ul> 
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