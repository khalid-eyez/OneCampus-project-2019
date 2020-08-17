<?php

//this file handles requests and responses for partnerships
//handling partnering requests
include("../lib/dbconnect.php");
session_start();

if(isset($_GET['sid']))
{
  $req=$_GET['sid'];
  $title=$_GET['dtitle'];
  $sdate=$_GET['stdate'];
  $start=$_GET['start'];
  $end=$_GET['end'];
  $requester=$_SESSION['userid'];
  //$time=$_SERVER['REQUEST_TIME'];

  $conn=dbconnect();
  //$sql_try="select * from stud_session where end_time<=$end and end_time"
  $rqsql2="insert into stud_session values('','$requester','$req','$start','$end','pending','$title','$sdate');";

  $query3=mysqli_query($conn,$rqsql2) or die(mysqli_error($conn));

 if($query3){print('request sent');}else{print('request not sent');}

  closedb($conn);
}

//handling the responses
if(isset($_GET['dr']))
{
  $res=$_GET['dr'];


  $conn=dbconnect();

  $sql2="update stud_session set status='accepted' where student_id=".$res." && partner_id=".$_SESSION['userid'].";";
  $query2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));

  if($query2){
   print('accepted');
  }
  else{
     print("try again");

  }


}
if(isset($_GET['dn']))
{
  $res=$_GET['dn'];


  $conn=dbconnect();

  $sql2="update stud_session set status='denied' where student_id=".$res." && partner_id=".$_SESSION['userid'].";";
  $query2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));

  if($query2){
   print('denied');
  }
  else{
     print("try again");

  }


}

?>