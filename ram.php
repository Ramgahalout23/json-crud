<?php
if(count($_POST)>0) {
	require_once("db.php");
	
$sql = "INSERT INTO emp1 (First_name,Last_name, gender, dob, salary, department ,departmanager ,hiredate) VALUES ('" . $_POST["First_Name"] . "','" . $_POST["Last_name"] . "','" . $_POST["gender"] . "','" . $_POST["dob"] . "','" . $_POST["salary"] . "','" . $_POST["depart"]  . "','" . $_POST["manager"]. "','" . $_POST["joindate"] . "')";
	echo $sql;
	mysqli_query($conn,$sql);
	$current_id = mysqli_insert_id($conn);
	if(!empty($current_id)) {
		 $message = "New Employee Details are Added Successfully";
	}
}
?>                       
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="tutorial-boostrap-merubaha-warna">
    <meta name="author" content="ilmu-detil.blogspot.com">
    <title>Tutorial CRUD JSON DATA</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
  
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>

  </script>

    <style type="text/css">
    .navbar-default {
        background-color: #3b5998;
        font-size: 18px;
        color: #ffffff;
    }
    </style>

</head> 
<body> 
<?php
include ("Header.php");
?>
	<div class="container">  
	<div class="container" style="color:green"> 
	<h1 class="text-center" style="margin-top:100px;">Employee Details</h1> 
	</div> 

<div class="container"  style="width:50%; height:83%; solid gray;padding:20px;"> 
	<form name="frmUser" method="post" action=""> 
		<div class="form-group"> 
			<label for="id1">First_Name</label> 
			<input class="form-control" type="text"   required="required" name="First_Name" placeholder="Enter Name"> 
		</div> 
		
		<div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="Last_name" placeholder="Last_Name">
                        <span class="help-block"></span>
                    </div>
		  <div class="form-group">
                       <label for="inputAge">Gender</label>
                       <select class="form-control" name="gender">
<option value="">Gender</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
</select> <span class="help-block"></span>
                   </div>

		 <div class="form-group ">
                        <label for="inputLName">D.O.B</label>
                        <input type="text" class="form-control" id="datepicker" name="dob" placeholder="Date Of Birth (YYYY-MM-DD)">
                        <span class="help-block"></span>
                    </div>
		<div class="form-group"> 
			<label for="id2">Salary</label> 
			<input class="form-control" type="text"  required="required" name="salary" id="id2" placeholder="Enter SAlary"> 
		</div>
		<div class="form-group ">
                        <label for="inputLName">Department</label>
                        <input type="text" class="form-control" name="depart" placeholder="department">
                        <span class="help-block"></span>
                    </div>
		 <div class="form-group">
                        <label for="inputAge">Department Manager</label>
                        <select class="form-control" name="manager">
                            <option value="">Manager</option>
                            <option value="self">Self</option>
                            
                        </select>
                        <span class="help-block"></span>
                    </div>
		<div class="form-group">
                        <label for="inputAge">Join Date</label>
                       <input type="text" class="form-control" name="joindate" id="datepicker1" placeholder="Join Date (YYYY-MM-DD)">
                        <span class="help-block"></span>
                    </div>
		<br>
			 <div style="text-align:center">
			<button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button> 
			<a class="btn btn btn-default" href="index1.php">Back</a>
		</div> 
		</div>
		</div>
		
	</form> 
	</div>
	<br>
	<br>
	<br>
	<?php
include ("footer.php");
?>
</body></html>
