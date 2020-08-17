<?php
session_start();
include("../lib/dbconnect.php");
if(isset($_GET['delete']))
{

   $myid=$_SESSION['userid'];

   $delete_id=$_GET['delete'];

   $conn=dbconnect();

   $sql="update stud_partner set status='removed' where (requester_id=$myid && student_id=$delete_id) or (student_id=$myid && requester_id=$delete_id);";
   $req=mysqli_query($conn,$sql) or die(mysqli_error($conn));
  if($req)
  {
  print('removed');
  }
  else{
  print("oops!!");
   }











}



?>