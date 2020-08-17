<?php

//this file handles requests and responses for partnerships
//handling partnering requests
include("../lib/dbconnect.php");
session_start();

  $title=$_GET['disctitle'];
  print($title);
  $sdate=$_GET['sdate'];
  $start=$_GET['start'];
  print($start);
  $end=$_GET['end'];
  $creator=$_SESSION['userid'];
  //$group=$_SESSION['groupid'];
  //$time=$_SERVER['REQUEST_TIME'];
$group=20;
  $conn=dbconnect();
  //$sql_try="select * from stud_session where end_time<=$end and end_time"
  $rqsql2="insert into group_session (session_title,group_id,discdate,start_time,finish_time,status)values('$title','$group','$sdate','$start','$end','upcoming');";

  $query3=mysqli_query($conn,$rqsql2) or die(mysqli_error($conn));

 if($query3){print('session created');}else{print('not created');}

  closedb($conn);
//handling the responses

?>