   
<?php					

$sql='SELECT firstName,lastName,Designation from tblemployees WHERE EmpId="'.$_SESSION["alogin"].'"';
$result=mysqli_query($conn,$sql);
$val=mysqli_fetch_row($result);

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
								<?php echo htmlentities ("(".$val[2]." )")?> 
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
                        <a class="collapsible-header waves-effect waves-grey"><i class="material-icons">desktop_windows</i>Leave<i class="nav-drop-icon material-icons">keyboard_arrow_right</i></a>
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
		</div>	
		


<style>
.over{
 overflow: hidden;
}
</style>