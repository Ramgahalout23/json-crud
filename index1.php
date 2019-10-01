<?php
require_once("db.php");
$sql = mysqli_query($conn,"SELECT emp1.*, Dept_emp.dept_id ,Salary.salary ,department.dept_name FROM emp1 
INNER JOIN Salary ON emp1.emp_id = Salary.emp_no
INNER JOIN Dept_emp ON emp1.emp_id = Dept_emp.emp_id
INNER JOIN department ON department.dept_id = Dept_emp.dept_id  ORDER BY emp_id DESC
");
$records = mysqli_num_rows($sql);
?>




<?php

// pagination code
$limit =05;
  if (isset($_GET["page"])) {  
      $pn  = $_GET["page"];  
    }  
    else {  
      $pn=1;  
    };  
    
    $start_from = ($pn-1) * $limit; 
?>



<html>
<head>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="author" content="ilmu-detil.blogspot.com">
 <title>Tutorial CRUD  JSON DATA</title>
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 <link rel="stylesheet" href="assets/css/ilmudetil.css">
</head>
<body style="background-color: white;font-famiconfirmly: sans-serif;">
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

<div class="container " style="margin-top:100px;">
 <div class="jumbotron">
  <h3>Welcome to Employee </h3>      
  <p>Create, Read, Update and Delete Data from Database</p>      
 </div>
</div>
<div class="container ">
<form name="" method="post">
 <div style="text-align:center">
  <a class="btn btn-primary " href="add_user.php"><i class="icon-plus"></i> Add new Employee</a>
  </div>
  <br>
  <br><br>
  <div class="container">
 <div class ="row">
  <div class="col-md-13">
<table class="table table-striped table-bordered table-hover">
<tr>
<td >First_name</td>
<td>Last_name</td>
<td>gender</td>
<td >DOB</td>
<td >Salary</td>
<td >Department</td>
<td >Department Manager</td>
<td > Hire date</td>
<td>Actions</td>
</tr>
<?php
if($records>0){
while($row = mysqli_fetch_array($sql)) { 
?>
<tr>
<td><?php echo $row["First_name"]; ?></td>
<td><?php echo $row["Last_name"]; ?></td>
<td><?php echo $row["gender"]; ?></td>
<td><?php echo $row["dob"]; ?></td>
<td><?php echo $row["salary"]; ?></td>
<td><?php echo $row["dept_name"]; ?></td>
<td><?php echo $row["department"];?></td>
<td><?php echo $row["hiredate"]; ?></td>
<td>
<a class="btn btn-xs btn-primary"  href="edit_user.php?emp_id=<?php echo $row["emp_id"]; ?>">Edit</a>
<a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure Delete?')" href="delete_user.php?emp_id=<?php echo $row["emp_id"]; ?>">Delete</a>
</td>
</tr>
<?php } }else{ ?>
<tr><td>No record found. </td></tr>	
<?php } ?>
</table><br>
</div>
</div>
</div>

</form>
</div>

<?php
 include ("footer.php");
?>
</body></html>
