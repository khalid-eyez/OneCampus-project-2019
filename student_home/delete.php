<?php
    include("../lib/dbconnect.php");
   session_start();
   $conn=dbconnect();
   $a=$_SESSION['userid'];
    $sql1="delete from stud_partner";
   $re=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
   while($res=mysqli_fetch_array($re))
   {
       print($res['session_title']);
   }


?>