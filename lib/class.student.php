<?php

//the future wants this class inherit the abstract class user,
//some of the methods will move to the parent class to make them available to 
//all users
class student
{

public $student_bio; //the student personal information object to be created appart
public $student_account; //the student account object
public $student_school;  //the student school info to be created


//the constructor to initialize the student

function __construct($bio=null,$account=null,$school=null)
{
    $this->student_bio=$bio;
    $this->student_account=$account;
    $this->student_school=$school;

}

//the individual setters

public function setBio($bio)
{
    $this->student_bio=$bio;
}
public function setAccount($acc)
{
    $this->student_account=$acc;
}
public function setSchool($sc)
{
    $this->student_school=$sc;
}

//the getters

public function getBio()
{
    return $this->student_bio;
}
public function getAccount()
{
    return $this->student_account;
}
public function getSchool()
{
    return $this->student_school;
}

//the login of the user

public function login()
{
    $acc=$this->student_account;
    //test the validity of the password and the username
    if($acc->isPasswordValid() && $acc->isUsernameValid())
    {
     //setting up the user session
     $_SESSION['userid']=$acc->getUserid();
     $_SESSION['username']=$acc->getUsername();//the future requires setting the real name as well,after having implemnted the bio
     $conn=dbconnect();
     $sql="update student_account set acc_status='active' where student_id=".$acc->getUserid().";";
     mysqli_query($conn,$sql) or die(mysqli_error());
     //we set this account active in the database


     
     //header("location:../../../student_home");

     return true;
    }
    else{
        return false;
    }
}
//the future requires implementing other methods for this class 
//as per design,this class will turn into the superclass "user" to make
//these methods common to all user and another class "student" will be created
 
}
?>