<?php
require_once("db.php");
//~ $sql = "DELETE emp1 ,Salary FROM emp1 WHERE emp_id='" . $_GET["emp_id"] . "'";
$sql = "DELETE emp1 ,Salary,Dept_emp FROM emp1 INNER JOIN Salary ON emp1.emp_id = Salary.emp_no INNER JOIN Dept_emp on emp1.emp_id=Dept_emp.emp_id WHERE emp1.emp_id='" . $_GET["emp_id"] . "'";
mysqli_query($conn,$sql);
header("Location:index1.php");
?>
