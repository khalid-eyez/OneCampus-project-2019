<?php
session_start();
include("../lib/dbconnect.php");
$conn=dbconnect();
$sql="update student_account set acc_status='off' where student_id=".$_SESSION['userid'].";";
mysqli_query($conn,$sql) or die(mysqli_error());

session_destroy();
session_unset();
$conn=dbconnect();
header("location:../");


?>