<?php
require_once("db.php");
$yes = mysqli_query($conn,"SELECT * FROM department dept_name");
$Salary= $_POST['Salary']; 
$departmenta= $_POST['departm'];
if($_POST) {

$sql = "INSERT INTO emp1 (First_name,Last_name, gender, dob,hiredate) VALUES ('" . $_POST["First_Name"] . "','" . $_POST["Last_name"] . "','" . $_POST["gender"] . "','" . $_POST["dob"] . "','" . $_POST["joindate"] . "')";
	
	$conn->query($sql) or die($conn->error);
		
		$id = $conn->insert_id;

	    if($id)
	    {
			$query="INSERT INTO Salary (emp_no, salary) values($id,$Salary)";
	    
			$conn->query($query) or die($conn->error);

		}		 

	    if($id)
	    {
			$query1="INSERT INTO Dept_emp (dept_id,emp_id) values($departmenta,$id)";
	    
			$conn->query($query1) or die($conn->error);

		}		 		
     }
   
	

	
?>

<html>
<html lang="en"> 
<head>
<title>Form Employee</title> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 <link rel="stylesheet" href="assets/css/ilmudetil.css">
 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
input
{ margin-bottom:30px;
}

</style>
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
  <script>
    
function myFunction() {
  alert("Data inserted sucessully");
}
  
  </script>
</head> 
<body> 
<nav class="navbar navbar-default navbar-fixed-top">
 <div class="container">
  <div class="navbar-header">
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
   </button>
   <a class="navbar-brand" href="index.php">
   JSON CRUD</a>
  </div>
  <div class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-left">
     <li class=""><a href="index.php">Home</a></li>
   <li class="clr1 active"><a href="index1.php">Employee</a></li>
   </ul>
  </div>
 </div>
</nav>
<?php ?>
	<div class="container">  
	<div class="container" style="color:green"> 
	<h1 class="text-center" style="margin-top:100px;">Employee Details</h1> 
	</div> 
<div class="container"  style="width:50%; height:110%; solid gray;padding:20px;"> 
	<form name="frmUser" method="post" action=""> 
		<div class="form-group"> 
			<label for="id1">First_Name</label> 
			<input class="form-control" autocomplete="off" type="text"   required="required" name="First_Name" placeholder="Enter Name"> 
		</div> 
		 		<div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" autocomplete="off" name="Last_name" placeholder="Last_Name">
                        <span class="help-block"></span>
                    </div>
		  <div class="form-group">
                       <label for="inputAge">Gender</label>
                       <select class="form-control" name="gender">
                       <option value="">Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                     </select> <span class="help-block"></span>
                   </div>

		 <div class="form-group ">
                        <label for="inputLName">birth_date</label>
                        <input type="text" class="form-control" autocomplete="off" id="datepicker" name="dob" placeholder="Date Of Birth (YYYY-MM-DD)">
                        <span class="help-block"></span>
                    </div>
		<div class="form-group"> 
			<label for="id2">Salary</label> 
			<input class="form-control" autocomplete="off" type="text"  required="required" name="Salary" id="id2" placeholder="Enter SAlary"> 
		</div>
		   <div class="form-group ">
                       <label for="inputLName">Department</label>
                      <select class="form-control" name="departm">
                       <option>  Select Department  </option>

<?php
while($data = mysqli_fetch_array($yes)){ ?>
<option value="<?php echo $data['dept_id'];?>"> <?php echo $data['dept_name'];?>

</option>
<?php }?>

</select>
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
                        <label for="inputAge">Hire Date</label>
                       <input type="text" class="form-control" autocomplete="off" name="joindate" id="datepicker1" placeholder="Join Date (YYYY-MM-DD)">
                        <span class="help-block"></span>
                    </div>
			 <div style="text-align:center">
			<button type="submit" name="submit" value="Submit" class="btn 
			btn-primary" >Submit</button> 
			<a class="btn btn btn-default" href="index1.php">Back</a>
		    </div>
	</form> 
	</div>
	</div>
	<br>
	<br>
	<?php 
include ("footer.php");
?>
</body>

</html>
