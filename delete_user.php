<?php
require_once("db.php");
$sql = "DELETE FROM emp1 WHERE emp_id='" . $_GET["emp_id"] . "'";
mysqli_query($conn,$sql);
header("Location:index1.php");
?>
