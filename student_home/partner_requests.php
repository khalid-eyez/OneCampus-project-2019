<?php

//this file handles requests and responses for partnerships
//handling partnering requests
include("../lib/dbconnect.php");
session_start();

if(isset($_GET['preq']))
{
  $req=$_GET['preq'];
  $requester=$_SESSION['userid'];
  $time=$_SERVER['REQUEST_TIME'];

  $conn=dbconnect();
  $testex="select * from stud_partner where requester_id='$requester' && student_id='$req';";
  $testreq=mysqli_query($conn,$testex) or die(mysqli_error());
  if(mysqli_num_rows($testreq)>0){print('already sent');}
  else{
  $tr="START TRANSACTION;";
  $rqsql="insert into stud_partner values('','$requester','$req','pending','$time','');";
  $rqsql2="insert into notification values('','$requester','$req','pr','$time','unseen');";

  $query1=mysqli_query($conn,$tr) or die(mysqli_error($conn));
  $query2=mysqli_query($conn,$rqsql) or die(mysqli_error($conn));
  $query3=mysqli_query($conn,$rqsql2) or die(mysqli_error($conn));

  if($query2 AND $query3){$query4=mysqli_query($conn,"COMMIT;")or die(mysqli_error($conn));if($query4){print("request sent");}}
  else{$query5=mysqli_query($conn,"ROLLBACK;")or die(mysqli_error($conn));if($query5){print("request not sent");}}

  closedb($conn);
}
}
//handling the responses
if(isset($_GET['pres']))
{
  $res=$_GET['pres'];


  $conn=dbconnect();

  $sql1="START TRANSACTION";
  $sql2="update stud_partner set status='accepted' where student_id=".$_SESSION['userid']." && requester_id=".$res.";";
  $sql3="insert into notification (not_id,init_id,target_id,not_type,created_date,status) values('',".$_SESSION['userid'].",".$res.",'pres','','unseen')";

  $query1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
  $query2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
  $query3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));

  if($query2 AND $query3){
   mysqli_query($conn,"COMMIT") or die(mysql_error());
   print("request accepted");
 
  }
  else{
     mysqli_query($conn,"ROLLBACK") or die(mysql_error());
     print("not accepted");

  }


}

?>