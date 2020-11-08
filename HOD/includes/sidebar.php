   
<?php					
$sql='SELECT FirstName,LastName,Designation from tblemployees WHERE EmpId="'.$_SESSION["alogin"].'"';
$result=mysqli_query($conn,$sql);
$val =mysqli_fetch_row($result);


$sql1='SELECT account from admin WHERE UserName="'.$_SESSION["alogin"].'"';
$result1=mysqli_query($conn,$sql1);
$val1 =mysqli_fetch_row($result1);
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
								<?php echo htmlentities ("(".$val[2]." )")?> <br><?php echo htmlentities ($_SESSION['thisdep'])?>
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
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">account_box</i>Staff<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                
                                <li><a href="manageemployee.php">Manage Staff</a></li>
       
                            </ul>
                        </div>
                    </li>

   <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">call_received</i>Staff Leaves<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
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
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">desktop_windows</i>Personal Leaves<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="apply-leave.php">Apply Leave </a></li>
                                <li><a href="leavehistory.php">History</a></li>
       
                            </ul>
                        </div>
                    </li>

<?php 
if($val1[0]==NULL){

?>
				 <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">library_books</i> Hall Ticket Clearence<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
								<li><a href="HOD_clearence.php?year=2&show=all">Second Year</a></li>
                                <li><a href="HOD_clearence.php?year=3&show=all">Third Year</a></li>
                                <li><a href="HOD_clearence.php?year=4&show=all">Fourth Year</a></li>
                                <li><a href="dc_stu_clearance.php?show=all">DC Students</a></li>
       
                            </ul>
                        </div>
                    </li>
					
				 <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">library_books</i>Other Clearence<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="tc_clearance.php?show=all">Passout/TC Clearence</a></li>
								<li><a href="transfer_clearance.php?show=all">Transfer Clearence</a></li>
							</ul>
                        </div>
                    </li>
					
				<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">featured_play_list</i> Issue Hall Ticket<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
								<li><a href="issue_hall.php?year=2">Second Year</a></li>
                                <li><a href="issue_hall.php?year=3">Third Year</a></li>
                                <li><a href="issue_hall.php?year=4">Fourth Year</a></li>
                                <li><a href="issue_hall.php?year=0">DC Students</a></li>
       
                            </ul>
                        </div>
                    </li>
				
			 
                    <li class="no-padding"><a class="waves-effect waves-grey" href="promote_demote.php?branch=<?php echo $_SESSION['thisdep'];?>"><i class="material-icons">unfold_more</i>Promote/Demote Students</a></li>
				
				
<?php }
else if($val1[0]=='LIB'){
?>	
				 <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">library_books</i> Hall Ticket Clearence<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="HOD_clearence.php?year=1&show=all">First Year</a></li>
								<li><a href="HOD_clearence.php?year=2&show=all">Second Year</a></li>
                                <li><a href="HOD_clearence.php?year=3&show=all">Third Year</a></li>
                                <li><a href="HOD_clearence.php?year=4&show=all">Fourth Year</a></li>
                                 <li><a href="dc_stu_clearance.php?show=all">DC Students</a></li>
       
                            </ul>
                        </div>
                    </li>	

				<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">library_books</i>Other Clearence<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="tc_clearance.php?show=all">Passout/TC Clearence</a></li>
								<li><a href="transfer_clearance.php?show=all">Transfer Clearence</a></li>
            				</ul>
                        </div>
                    </li>
<?php }
else if($val1[0]=="FE"){
?>	
				 <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">library_books</i> Hall Ticket Clearence<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="FE_clearence.php?branch=Civil Engineering">Civil Engineering</a></li>
								<li><a href="FE_clearence.php?branch=Mechanical Engineering">Mechanical Engineering</a></li>
                                <li><a href="FE_clearence.php?branch=Computer Engineering">Computer Engineering</a></li>
                                <li><a href="FE_clearence.php?branch=Electrical Engineering">Electrical Engineering</a></li>
                              </ul>
                        </div>
                    </li>
					
				<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">library_books</i>Other Clearence<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="HOD_clearence.php?year=1">Passout/TC Clearence</a></li>
								<li><a href="transfer_clearance.php?show=all">Transfer Clearence</a></li>
							</ul>
                        </div>
                    </li>
					
				<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">featured_play_list</i> Issue Hall Ticket<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="FE_issue_hall.php?branch=Civil Engineering">Civil Engineering</a></li>
								<li><a href="FE_issue_hall.php?branch=Mechanical Engineering">Mechanical Engineering</a></li>
                                <li><a href="FE_issue_hall.php?branch=Computer Engineering">Computer Engineering</a></li>
                                <li><a href="FE_issue_hall.php?branch=Electrical Engineering">Electrical Engineering</a></li>
                                </ul>
                        </div>
                    </li>
<?php }
?>				
				
			<li class="no-padding"><a class="waves-effect waves-grey" href="updateprofile.php"><i class="material-icons">folder_shared</i>Update Profile</a></li>
                    		
			
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