
<?php

include('../includes/config.php');

$query = "
SELECT * FROM tbldepartments 
ORDER BY id ASC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Report Generation | Admin </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  
  
  <script>
  function radio(val){
	
	$.ajax({
	type: "POST",
	url: "radio.php",
	data:'country_id='+val,
	});
}
  
  </script>
  
  <style>
     .button {
  background-color:indigo; /* black */
  border: none;
  color: white;
  padding: 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button3 {border-radius: 8px;}

  </style>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
 </head>
 <body>
  <br />

  <div class="container">
   <h2 align="center">Leave Report Generation</h2>
   <br /><br />
   <div style="width: 500px; margin:0 auto"><center>
   <input type="radio" name="radio" value="Teaching" onChange="radio(this.value);"> &nbsp Teaching &nbsp
   <input type="radio" name="radio" value="Non-Teaching"  onChange="radio(this.value);"> &nbsp Non-Teaching &nbsp
   <input type="radio" name="radio" value="all"  onChange="radio(this.value);"> &nbsp Both &nbsp
   </center><br>
   <br>  <form method="POST" action="report2.php">
    <div class="form-group">
     <label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Department</label><br /><center>
     <select id="first_level" name="first_level[]" multiple class="form-control">
	 <?php
     foreach($result as $row)
     {
      echo '<option value="'.$row["DepartmentName"].'">'.$row["DepartmentName"].'</option>';
     }
     ?>
     </select></center>
    </div>
    <div class="form-group">
     <label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Designation</label><br /><center>
     <select id="second_level" name="second_level[]" multiple class="form-control">
		
     </select></center>
    </div>
    <div class="form-group">
     <label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Employees</label><br /><center>
     <select id="third_level" name="third_level[]" multiple class="form-control">
		
     </select></center>
    </div> <center><br>
			Fromdate:<input type="date" name="fromdate" required> &nbsp &nbsp &nbsp
			Todate:<input type="date" name="todate" required>
			</center>
   </div>
  </div><center><br>
	
	 <button style="background-color:#3594ec;" class="button button3">Generate</button> </form> <a href="../dashboard.php"><button class="button button3">Back</button></a>	
	 </center>
 </body>
</html>
<script>
$(document).ready(function(){

 $('#first_level').multiselect({
  nonSelectedText:'Select Department',
  buttonWidth:'400px',
  onChange:function(option, checked){
   $('#second_level').html('');
   $('#second_level').multiselect('rebuild');
   $('#third_level').html('');
   $('#third_level').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_second_level_category.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#second_level').html(data);
      $('#second_level').multiselect('rebuild');
     }
    })
   }
  }
 });

 $('#second_level').multiselect({
  nonSelectedText: 'Select Designation',
  buttonWidth:'400px',
  onChange:function(option, checked)
  {
   $('#third_level').html('');
   $('#third_level').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_third_level_category.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#third_level').html(data);
      $('#third_level').multiselect('rebuild');
     }
    });
   }
  }
 });

 $('#third_level').multiselect({
  nonSelectedText: 'Select Employees',
  buttonWidth:'400px'
 });

});
</script>