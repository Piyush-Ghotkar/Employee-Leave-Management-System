   
<?php					
$conn = mysqli_connect("localhost", "root", "", "elms");
$sql1='SELECT firstName,lastName from tblemployees WHERE EmpId="'.$_SESSION["alogin"].'"';
$result1=mysqli_query($conn,$sql1);
$val=mysqli_fetch_row($result1);
?>	

<div class="over">
 <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="../assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">                    
                                <p><?php echo htmlentities ($val[0])." ". ($val[1])?></p>
                        </div>
                    </div>
				

  
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding"><a class="waves-effect waves-grey" href="dashboard.php"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>
                    

						<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">chat</i>Notice Management<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="notice/new_notice.php">Create New Notice</a></li>
								<li><a href="notice_sent.php">Sent Notices</a></li>
                                <li><a href="hod_notice.php">History </a></li>
       
                            </ul>
                        </div>
                    </li>
					
					
					
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">account_box</i>Faculty<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="addemployee.php">Add Faculty</a></li>
                                <li><a href="manageemployee.php">Manage Faculty</a></li>
       
                            </ul>
                        </div>
                    </li>

   <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">call_received</i>Faculty Leaves<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="leaves.php">All Leaves </a></li>
                                <li><a href="pending-leavehistory.php">Pending Leaves </a></li>
                                <li><a href="approvedleave-history.php">Approved Leaves</a></li>
                                  <li><a href="notapproved-leaves.php">Not Approved Leaves</a></li>
       
                            </ul>
                        </div>
                    </li>
                         <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">desktop_windows</i>Leave<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="apply-leave.php">Apply Leave </a></li>
                                <li><a href="leavehistory.php">History</a></li>
       
                            </ul>
                        </div>
                    </li>


				 <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">library_books</i> Hall Ticket Clearence<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="HOD_clearence.php?year=1">First Year</a></li>
								<li><a href="HOD_clearence.php?year=2"> Second Year</a></li>
                                <li><a href="HOD_clearence.php?year=3">Third Year</a></li>
                                <li><a href="HOD_clearence.php?year=4">Fourth Year</a></li>
                                <li><a href="HOD_clearence.php?year=0">DC Students</a></li>
       
                            </ul>
                        </div>
                    </li>
					
					
					
				 <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">library_books</i>Other Clearence<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="HOD_clearence.php?year=1">Passout Clearence</a></li>
								<li><a href="HOD_clearence.php?year=2"> TC Clearence</a></li>
                                <li><a href="HOD_clearence.php?year=3">Other</a></li>
							</ul>
                        </div>
                    </li>
					
					
  <li class="no-padding"><a class="waves-effect waves-grey" href="changepassword.php"><i class="material-icons">settings_input_svideo</i>Change Password</a></li>

                        <li class="no-padding">
                                <a class="waves-effect waves-grey" href="logout.php"><i class="material-icons">exit_to_app</i>Sign Out</a>
                            </li>  

                </ul>
                   <div class="footer">
                    
                
                </div>
                </div>
            </aside>
		</div>	
<style>
.over{
 overflow: hidden;
}
</style>