<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:index.php');
}
else{

// code for update the read notification status
$isread=2;
$did=intval($_GET['leaveid']);  
date_default_timezone_set('Asia/Kolkata');
$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
$sql="update tblleaves set IsRead=:isread where id=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();

// code for action taken on leave
if(isset($_POST['update']))
{ 
$did=intval($_GET['leaveid']);
$description=$_POST['description'];
$status=$_POST['status'];   
date_default_timezone_set('Asia/Kolkata');
$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
$sql="update tblleaves set AdminRemark=:description,P_Status=:status,AdminRemarkDate=:admremarkdate where id=:did";
$query = $dbh->prepare($sql);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->bindParam(':admremarkdate',$admremarkdate,PDO::PARAM_STR);
$query->bindParam(':did',$did,PDO::PARAM_STR);
$query->execute();
$msg="Leave updated Successfully";
}
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>Principal | Leave Details </title>
        
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

                <link href="../assets/plugins/google-code-prettify/prettify.css" rel="stylesheet" type="text/css"/>  
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
                        <div class="page-title" style="font-size:24px;">Leave Details</div>
                    </div>
                   
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Leave Details</span>
                                <?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                <table id="example" class="display responsive-table ">
                               
                                 
                                    <tbody>
<?php 
$lid=intval($_GET['leaveid']);
$sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.LastName,tblemployees.EmpId,tblemployees.id,tblemployees.Department,tblemployees.Designation,tblemployees.Gender,tblemployees.Phonenumber,tblemployees.EmailId,tblleaves.LeaveType,tblleaves.ToDate,tblleaves.FromDate,tblleaves.Full_Leave,Half_Leave,Duty_Adj,tblleaves.Description,tblleaves.PostingDate,tblleaves.Status,tblleaves.P_Status,tblleaves.AdminRemark,tblleaves.AdminRemarkDate from tblleaves join tblemployees on (tblleaves.aid=tblemployees.id) OR (tblleaves.empid=tblemployees.id) where tblleaves.id=:lid";
$query = $dbh -> prepare($sql);
$query->bindParam(':lid',$lid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

if($query->rowCount() > 0)
{
foreach($results as $result)
{         
      ?>  

                                        <tr>
                                            <td style="font-size:16px;"> <b>Faculty Name :</b></td>
                                              <td><a href="editemployee.php?empid=<?php echo htmlentities($result->id);?>" target="_blank">
                                                <?php echo htmlentities($result->FirstName." ".$result->LastName);?></a></td>
                                              <td style="font-size:16px;"><b>Faculty Id :</b></td>
                                              <td><?php echo htmlentities($result->EmpId);?></td>
                                              <td style="font-size:16px;"><b>Designation:</b></td>
                                              <td><?php echo htmlentities($result->Designation);?></td>
                                          </tr>

                                          <tr>
                                            <td style="font-size:16px;"><b>Faculty Email id:</b></td>
                                            <td><?php echo htmlentities($result->EmailId);?></td>
                                             <td style="font-size:16px;"><b>Faculty Contact No.:</b></td>
                                            <td><?php echo htmlentities($result->Phonenumber);?></td>
                                            <td style="font-size:16px;"><b>Department:</b></td>
                                            <td><?php echo htmlentities($result->Department);?></td>
                                        </tr>

  <tr>
                                            <td style="font-size:16px;"><b>Leave Type:</b></td>
                                            <td><?php echo htmlentities($result->LeaveType);?></td>
                                             <td style="font-size:16px;"><b>Leave Date:</b></td>
                                            <td>From &nbsp <?php echo htmlentities($result->FromDate);?> &nbsp to &nbsp <?php echo htmlentities($result->ToDate);?></td>
                                            <td style="font-size:16px;"><b>Posting Date:</b></td>
                                           <td><?php echo htmlentities($result->PostingDate);?></td>
                                        </tr>
													<tr>											<td style="font-size:16px;"><b>Half/Full Leave: </b></td>
											<?php if($result->Full_Leave==1){?> 
                                            <td>Full Leave</td>
											<?php }else{ ?> <td> Half Leave <?php echo htmlentities(" (".$result->Half_Leave).")";?></td><?php }?>
                                      
											 <td style="font-size:16px;"><b>Duty Adjustment: </b></td>
                                            <td ><?php echo htmlentities($result->Duty_Adj);?></td>
											
											<td>&nbsp </td>
											<td>&nbsp </td>
										</tr>

<tr>
                                             <td style="font-size:16px;"><b>Faculty Leave Description </b></td>
                                            <td colspan="5"><?php echo htmlentities($result->Description);?></td>
                                          
                                        </tr>

<tr>
<td style="font-size:16px;"><b>leave Status :</b></td>
<td colspan="5"><?php $stats=$result->P_Status;
if($stats==1){
?>
<span style="color: green">Approved</span>
 <?php } if($stats==2)  { ?>
<span style="color: red">Not Approved</span>
<?php } if($stats==0)  { ?>
 <span style="color: blue">waiting for approval</span>
 <?php } ?>
</td>
</tr>

<tr>
<td style="font-size:16px;"><b>Principal Remark: </b></td>
<td colspan="5"><?php
if($result->AdminRemark=="" or $stats==0){
  echo "waiting for Approval";  
}
else{
echo htmlentities($result->AdminRemark);
}
?></td>
 </tr>

 <tr>
<td style="font-size:16px;"><b>Principal Action taken date : </b></td>
<td colspan="5"><?php
if($result->AdminRemarkDate=="" or $stats==0){
  echo "NA";  
}
else{
echo htmlentities($result->AdminRemarkDate);
}
?></td>
 </tr>
<?php 
if($stats==0)
{

?>
<tr>
 <td colspan="5">
  <a class="modal-trigger waves-effect waves-light btn" href="#modal1">Take&nbsp;Action</a>
<form name="adminaction" method="post">
<div id="modal1" class="modal modal-fixed-footer" style="height: 60%">
    <div class="modal-content" style="width:90%">
        <h4>Leave take action</h4>
          <select class="browser-default" name="status" required="">
                                            <option value="">Choose your option</option>
                                            <option value="1">Approved</option>
                                            <option value="2">Not Approved</option>
                                        </select></p>
                                        <p>Remark<textarea id="textarea1" name="description" class="materialize-textarea" name="description" length="500" maxlength="500" >NA</textarea></p>
    </div>
    <div class="modal-footer" style="width:90%">
       <input type="submit" class="waves-effect waves-light btn blue m-b-xs" name="update" value="Submit">
    </div>

</div>   

 </td>
</tr>
<?php } ?>
   </form>                                     </tr>
                                         <?php $cnt++;    $empid=$result->EmpId;} }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
				
				
	<style>
.abc{
  border-collapse: collapse;
  width: 60%;
  border: 1px solid black;
  margin-left: 10px;
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
</style>
<h5> &nbsp Leave record (<?php echo htmlentities($result->FirstName." ".$result->LastName);?>)</h5>
<?php
session_start();

$eid=$empid;
$_SESSION['empid']=$empid;
//$sql1= 'SELECT CPL, T_CPL  from tblemployees WHRER id="'.$_SESSION['eid'].'"';

  
  
	$sql1= "SELECT CL, T_CL, EL, T_EL, DL, U_DL, FL, T_FL, CPL, U_CPL, OL, U_OL, LWP, U_LWP, ML, U_ML from tblemployees where EmpId='{$_SESSION['empid']}'";
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
unset($_SESSION['empid']);
?>			
				
				
				
            </main>
         
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
         <script src="assets/js/pages/ui-modals.js"></script>
        <script src="assets/plugins/google-code-prettify/prettify.js"></script>
        
    </body>
</html>
<?php } ?>