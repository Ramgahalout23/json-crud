<?php
require_once("db.php");
$sql = "UPDATE emp1 set First_name ='" . $_POST["First_name"] . "',Last_name ='" . $_POST["Last_name"] . "', gender ='" . $_POST["gender"] . "', dob='" . $_POST["dob"] . "',hiredate='" . $_POST["joindate"]  ."' WHERE emp_id='" . $_POST["emp_id"] . "'" or die("error");
$sql2 = "UPDATE Salary set salary ='" . $_POST["salary"] . "'  WHERE emp_no='" . $_POST["emp_no"] . "'" or die("error");
	mysqli_query($conn,$sql);
$message = "Employee Details Successfully Updated.";
$select_query = "SELECT emp1.*, Dept_emp.dept_id ,Salary.salary ,department.dept_name FROM emp1 INNER JOIN Salary ON emp1.emp_id = Salary.emp_no INNER JOIN Dept_emp ON emp1.emp_id = Dept_emp.emp_id INNER JOIN department ON department.dept_id = Dept_emp.dept_id WHERE emp1.emp_id='" . $_GET["emp_id"] . "'";

$result = mysqli_query($conn,$select_query);
$row = mysqli_fetch_array($result);
?>
<html>
<head>
<title>Edit Employee Details</title>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> 
 <link rel="stylesheet" href="assets/css/ilmudetil.css">

 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
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
    <li><a  class="clr1 active"href="index1.php">Employee Detail</a></li>
   </ul>
  </div>
 </div>
</nav>

	<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Udate User</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <div class="container">  
	<div class="container" style="color:green"> 
	<h1 class="text-center" style="margin-top:25px;">Employee Update Details</h1> 
	</div> 
      <div class="container"  style="width:49%; height:93%; solid gray;padding:20px;"> 
      <form method="post">
        <div class="form-group">
	  <label for="name">emp Id</label>
          <input value="<?php echo $row['emp_id']; ?>" type="text" name="emp_id"  class="form-control">
        </div>
        <div class="form-group">
          <label for="name">First_name</label>
          <input value="<?php echo $row['First_name']; ?>" type="text" name="First_name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Last_name</label>
          <input value="<?php echo $row['Last_name']; ?>" type="text" name="Last_name" id="name" class="form-control">
        </div>
         <div class="form-group">
                       <label for="inputAge">Gender</label>
                       <select class="form-control" name="gender">
<option value="<?php echo $row['gender']; ?>">Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
</select> <span class="help-block"></span>
                   </div>
        <div class="form-group">
          <label for="name"> dob </label>
          <input value="<?php echo $row['dob']; ?>" type="text" name="dob"  class="form-control">
        </div>
        <div class="form-group">
          <label for="name"> SAlary </label>
          <input value="<?php echo $row['salary']; ?>" type="text" name="salary"  class="form-control">
        </div>
        <div class="form-group">
          <label for="name">joining Date</label>
          <input value="<?php echo $row['hiredate']; ?>" type="text" name="joindate"  class="form-control">
        </div>
      
        <div class="form-group " >
			 <div style="text-align:center">
          <button type="submit" class="btn btn-primary">Update person</button>
          <a class="btn btn btn-default" href="index1.php">Back</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
   <br>   <br>   <br>   <br>
   <br>   <br>   <br>   <br>
<?php
include ("footer.php");
?>
</body></html>
