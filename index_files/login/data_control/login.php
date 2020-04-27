<?php
include("../../../lib/class.account.php");
include("../../../lib/class.student.php");
include("../../../lib/dbconnect.php");

session_start();


    $pass=$_POST['password'];
    $username=$_POST['username'];
    $account=new userAccount($username,$pass);
    $student=new student();
    $student->setAccount($account);
    $login=$student->login();
    if(!$login){print("false");}else{print("true");}








?>