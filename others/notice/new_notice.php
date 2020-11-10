
<?php

$connect = new PDO('mysql:host=localhost;dbname=elms', 'root', '');
/*
$sql ='SELECT id FROM admin WHERE EMPID=".$_SESSION['alogin']."';
$query= $dbh -> prepare($sql);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0){}*/


$query = "
SELECT DepartmentName FROM tbldepartments 
ORDER BY DepartmentName ASC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();




$query1 = "
SELECT year FROM tblyears 
ORDER BY id ASC
";

$statement1 = $connect->prepare($query1);

$statement1->execute();

$result1 = $statement1->fetchAll();

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Create Notice</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
  
  <style>
  textarea{
   white-space: pre-wrap; 
}
  
  </style>
 </head>
 <body background="bg.jpg">
  <br />
  <div class="container">
   <h2 align="center">Create New Notice</h2>
   <br /><br />
  
   
   <!-- FPDF -->
   
   
   
   


<form method="post" name=f1 action="pdf.php" target="_blank">
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	<div class="row">
		<div class="col-sm-4"><font size='4px'><b>Enter Ref. No.</b></font></div>
		<div class="col-sm-5">
		<input type="text" name="refno" class="form-control"/></div>
	</div>
	
	<br>
	<div class="row">
		<div class="col-sm-4"><font size='4px'><b>Enter Title*</b></font></div>
		<div class="col-sm-5">
		<input type="text" name="title" class="form-control" required></div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
	</div>	
	
	<div class="row">
		<div class="col-sm-4">&nbsp;&nbsp;&nbsp;&nbsp;<font size='4px'><b>Enter Details*</b></font></div>
		<div class="col-sm-5">
		<textarea name="body" class="form-control" cols="50" rows="10" required></textarea></div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-4">&nbsp;&nbsp;&nbsp;&nbsp;<font size='4px'><b>Copy To:</b></font></div>
		<div class="col-sm-5">
		<textarea name="copyto" class="form-control"  cols="50" rows="5" placeholder="For Example:&#10 1.Students Notice Board &#10 2.Library Notice Board &#10 etc."></textarea></div>
	</div>
	<br>
	
	<div class="row">
		<div class="col-sm-15"><center><input type="submit" value="Download Notice" name=submit[download] class="btn btn-success"> 
		<input type="reset" class="btn btn-success"/></center></div>
		<div class="col-sm-8">
	</div>	


   
   
   
   <br>
   <br>
   <br>
   <br>
   <h2 align="left">CC to Faculty</h2>
   <!-- FPDF --> <div style="width: 500px; margin:0 left">
    <div class="form-group">
     <label>Select Department(s)*</label><br />
     <select id="first_level" name="first_level[]" multiple class="form-control">
     <?php echo '<option value="all_dept">All Departments</option>';
     foreach($result as $row)
     {
      echo '<option value="'.$row["DepartmentName"].'">'.$row["DepartmentName"].'</option>';
     }
     ?>
     </select>
    </div>
    <div class="form-group">
     <label>Select Faculty(s)*</label><br />
     <select id="second_level" name="second_level[]" multiple class="form-control">

     </select>
    </div> 

	
   </div>
   
   
   
   
   
   <br>
    <h2 align="left">CC to Students</h2>
   <!-- FPDF --> <div style="width: 500px; margin:0 left">
    <div class="form-group">
     <label>Select Year(s)</label><br />
     <select id="first_level1" name="first_level1[]" multiple class="form-control">
     <?php echo '<option value="all_year">All Years</option>';
     foreach($result1 as $row1)
     {
      echo '<option value="'.$row1["year"].'">'.$row1["year"].'</option>';
     }
     ?>
     </select>
    </div>
    <div class="form-group">
     <label>Select Department(s)</label><br />
     <select id="second_level1" name="second_level1[]" multiple class="form-control">

     </select>
    </div> 

	
   </div>
   
   
   
   
   
   	</div>
	</div>
	
	
	
		
		 
		<div class="row" style="margin-top:10px center">
		
		
		<input type="submit" value="Send Notice" name=submit[send] class="btn btn-success"/>
		
		 <br>
   <br>
   <br>
   <br> <br>
   <br>

	</div></div>
</form>	

   
   
  
 </body>
</html>
<script>
$(document).ready(function(){

 $('#first_level').multiselect({
  nonSelectedText:'Select',
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
  nonSelectedText: 'Select',
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


});
</script>
<script>
$(document).ready(function(){

 $('#first_level1').multiselect({
  nonSelectedText:'Select',
  buttonWidth:'400px',
  onChange:function(option, checked){
   $('#second_level1').html('');
   $('#second_level1').multiselect('rebuild');
   $('#third_level1').html('');
   $('#third_level1').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_second_level_category1.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#second_level1').html(data);
      $('#second_level1').multiselect('rebuild');
     }
    })
   }
  }
 });

 $('#second_level1').multiselect({
  nonSelectedText: 'Select',
  buttonWidth:'400px',
  onChange:function(option, checked)
  {
   $('#third_level1').html('');
   $('#third_level1').multiselect('rebuild');
   var selected = this.$select.val();
   if(selected.length > 0)
   {
    $.ajax({
     url:"fetch_third_level_category1.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
      $('#third_level1').html(data);
      $('#third_level1').multiselect('rebuild');
     }
    });
   }
  }
 });


});
</script>
