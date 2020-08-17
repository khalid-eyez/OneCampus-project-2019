<?php
    include("../lib/dbconnect.php");
   session_start();
   $conn=dbconnect();
   $a=$_SESSION['userid'];
    $sql1="select * from student_bio where student_id=$a";
   $re=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
   while($res=mysqli_fetch_array($re))
   {
       print('<img src="../media_store/user_store/images/'.$res['profil'].'" class="rounded-circle" id="userwall" style="width:80px;height:80px;"/>');
   }


?>