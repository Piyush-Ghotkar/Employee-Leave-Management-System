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
                            <span class="chapter-title">Admin</span>
                        </div>
                      
                        <ul class="right col s9 m3 nav-right-menu">
                        
                            <li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown1" class="dropdown-button dropdown-right show-on-large"><i class="material-icons">notifications_none</i>





<?php 
$dept1=$_SESSION['thisdep'];
$unreadcount=0;
$sql = "SELECT * FROM tblleaves WHERE IsRead=2 and P_Status=1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result){
		$unreadcount=$unreadcount+1;
}
?>


                                <span class="badge"><?php echo htmlentities($unreadcount);?></span></a></li>
                            <li class="hide-on-med-and-up"><a href="javascript:void(0)" class="search-toggle" OnClick="read(<?php echo $result->id;?>);"><i class="material-icons">search</i></a></li>
                        </ul>
                        
                        <ul id="dropdown1" class="dropdown-content notifications-dropdown">
                            <li class="notificatoins-dropdown-container">
                                <ul>
                                    <li class="notification-drop-title">Notifications (Click to mark as read)</li>


<?php 
$sql = "SELECT tblleaves.id as lid,tblemployees.FirstName,tblemployees.Department,tblemployees.LastName,tblemployees.EmpId,tblleaves.AdminRemarkDate,tblleaves.P_Status,tblleaves.empid,tblleaves.IsRead,tblleaves.FromDate,tblleaves.ToDate from tblleaves join tblemployees on (tblleaves.empid=tblemployees.id) or (tblleaves.aid=tblemployees.id) where tblleaves.IsRead=2 and tblleaves.P_Status=1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
foreach($results as $result){
	$Date = date('Y-m-d');
	$Date = date('Y-m-d', strtotime($Date));
	$FromDate = date('Y-m-d', strtotime($result->FromDate));
	$ToDate = date('Y-m-d', strtotime($result->ToDate));
	if (($Date > $FromDate) && ($Date < $ToDate)){ ?>
									<li>
                                        <a href="leave-details.php?leaveid=<?php echo htmlentities($result->lid);?>">
                                        <div class="notification">
                                            <div class="notification-icon circle cyan"><i class="material-icons">done</i></div>
                                            <div class="notification-text"><p><b><?php echo htmlentities ($result->FirstName) ?> <?php echo htmlentities ($result->LastName)?> has Requested for leave<br />  between <?php echo htmlentities ($FromDate) ?> to <?php echo htmlentities ($ToDate) ?></div>
                                        </div>
                                        </a>
                                    </li>

<?php  } }  ?>					 
                                  
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