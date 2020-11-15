<?php					

$sql='SELECT firstName,lastName from tblemployees WHERE EmpId="'.$_SESSION["alogin"].'"';
$result=mysqli_query($conn,$sql);
$val=mysqli_fetch_row($result);


?>	   

   <aside id="slide-out" class="side-nav white fixed">
                <div class="side-nav-wrapper">
                    <div class="sidebar-profile">
                        <div class="sidebar-profile-image">
                            <img src="../assets/images/profile-image.png" class="circle" alt="">
                        </div>
                        <div class="sidebar-profile-info">
								<p><?php echo htmlentities ($val[0])." ". ($val[1])?></p>
                                <p>Principal</p>

                         
                        </div>
                    </div>
            
                <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
                    <li class="no-padding"><a class="waves-effect waves-grey" href="dashboard.php"><i class="material-icons">settings_input_svideo</i>Dashboard</a></li>
                    
					 <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">chat</i>Notice Management<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="notice/new_notice.php">Create New Notice</a></li>
								<li><a href="notice_sent.php">Sent Notices </a></li>
                                <li><a href="p_notice.php">History </a></li>
       
                            </ul>
                        </div>
                    </li>
					
					<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">apps</i>Department<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="adddepartment.php">Add Department</a></li>
                                <li><a href="managedepartments.php">Manage Department</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">code</i>Leave Type<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="addleavetype.php">Add Leave Type</a></li>
                                <li><a href="manageleavetype.php">Manage Leave Type</a></li>
                            </ul>
                        </div>
                    </li>
					<li class="no-padding">
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">account_box</i>HOD<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
                        <div class="collapsible-body">
                            <ul>	
                                <li><a href="manageHOD.php">Manage HOD</a></li>
       
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
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">call_received</i>Leave Management<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
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