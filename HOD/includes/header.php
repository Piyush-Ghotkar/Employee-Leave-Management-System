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
                            <span class="chapter-title">| HOD |</span>
                        </div>
                      
                        <ul class="right col s9 m3 nav-right-menu">
                        
                            <li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">notifications_none</i>
<?php 
$aid1=$_SESSION['adminid'];
$dept1=$_SESSION['thisdep'];
$isread=0;
$unreadcount=0;
$sql = "SELECT * FROM tblleaves WHERE IsRead=:isread";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
//$unreadcount=$query->rowCount();
foreach($results as $result){
	$t=$result->empid;
	$sql1="SELECT Department from tblemployees WHERE id='$t'";
	$r2=$conn -> query($sql1);
	$r1=$r2 -> fetch_assoc();
	if ($r1['Department']==$dept1){
		$unreadcount=$unreadcount+1;	
	}
}

$sql = "SELECT * FROM tblleaves WHERE IsRead=2";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result){
	if($result->aid==$aid1){
		$unreadcount=$unreadcount+1;
	}
}
?>


                                <span class="badge"><?php echo htmlentities($unreadcount);?></span></a></li>
                            <li class="hide-on-med-and-up"><a href="javascript:void(0)" class="search-toggle" OnClick="read(<?php echo $result->id;?>);"><i class="material-icons">search</i></a></li>
                        </ul>
                        
                        <ul id="dropdown1" class="dropdown-content notifications-dropdown">
                            <li class="notificatoins-dropdown-container">
                                <ul>
                                    <li class="notification-drop-title">Notifications <font size="3px"><sub>(Click to mark as read)</sub></font></li>
<?php 
$isread=0;
$sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.Department,tblemployees.LastName,tblemployees.EmpId,tblleaves.PostingDate,tblleaves.P_Status,tblleaves.IsRead from tblleaves join tblemployees on tblleaves.empid=tblemployees.id where tblleaves.IsRead=:isread ";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{ 
foreach($results as $result)
{  
   if($result->Department==$dept1 ){     
      ?>  
                                    <li>
                                        <a href="leave-details.php?leaveid=<?php echo htmlentities($result->lid);?>">
                                        <div class="notification">
                                            <div class="notification-icon circle cyan"><i class="material-icons">done</i></div>
                                            <div class="notification-text"><p><b><?php echo htmlentities($result->FirstName." ".$result->LastName);?><br />(<?php echo htmlentities($result->EmpId);?>)</b> applied for leave</p><span>at <?php echo htmlentities($result->PostingDate);?></b</span></div>
                                        </div>
                                        </a>
                                    </li>
<?php  } 
}
$sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.Department,tblemployees.LastName,tblemployees.EmpId,tblleaves.PostingDate,tblleaves.P_Status,tblleaves.aid,tblleaves.IsRead from tblleaves join tblemployees on tblleaves.aid=tblemployees.id where tblleaves.IsRead=2";
$query = $dbh -> prepare($sql);
$query->bindParam(':isread',$isread,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result)
{ 
    if( $result->IsRead==2 and $result->aid==$aid1){ ?>
									<li>
                                        <a href="leave-details.php?leaveid=<?php echo htmlentities($result->lid);?>">
                                        <div class="notification">
                                            <div class="notification-icon circle cyan"><i class="material-icons">done</i></div>
                                            <div class="notification-text"><p><b>Your Request for leave has been<br /> <?php if($result->P_Status==1){echo "Approved.";} if($result->P_Status==2){echo "Rejected.";} ?></b></p><span> at <?php echo htmlentities($result->PostingDate);?></b</span></div>
                                        </div>
                                        </a>
                                    </li>
<?php  } } } ?>
                                 
								 
                                  
                        </ul>
                    </div>
                </nav>
            </header>
			<script>
			function read(val){
				$.ajax({
				type: "POST",
				url: "read.php",
				data: 'id='+val,
			});
			}
			</script>