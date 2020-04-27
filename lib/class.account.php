<?php
class userAccount
{
    private $email;
    private $username;
    private $password;
    private $userid;
// a constructor makes sure the student account has all information is can validate them
//the setters and getters are used to set values one by one
   function __construct($user,$pass)
    {
      
      $this->username=$user;
      $this->password=$pass;
      $this->loadId($user);
      $this->loadEmail($user);
      
    }
   public function setEmail($em)
   {
       $this->email=$em;
   }
   public function setUsername($name)
   {
       $this->username=$name;
   }
   public function setPassword($pass)
   {
       $this->password=$pass;
   }
   public function getPass()
   {
       return $this->password;
   }
   public function getEmail()
   {
       return $this->email;
   }
   public function getUsername()
   {
       return $this->username;
   }
   public function getUserid()
   {
       return $this->userid;
   }
   //loads the user email by using the provided username
   public function loadEmail($username)
   {
    $conn=dbconnect();
    $query='select * from student_account where username="'.$username.'"';
    $req=mysqli_query($conn,$query) or die(mysqli_error($conn));
    $result=mysqli_fetch_array($req);
    if($result!=null){
    $this->email=$result['email'];
    }
    closedb($conn);

   }
   //loads the user id based on the supplied useername
   public function loadId($username)
   {
    $conn=dbconnect();
    $query='select * from student_account where username="'.$username.'"';
    $req=mysqli_query($conn,$query) or die(mysqli_error($conn));
    $result=mysqli_fetch_array($req);
    if($result!=null){
    $this->userid=$result['student_id'];
    } //the future needs to load the student id instead
    closedb($conn);
   }
   //verifies if the password supplied is valid by comparing it with the database prior registration
   public function isPasswordValid()
   {
     $conn=dbconnect();
     $query='select * from student_account where username="'.$this->username.'"';
     $req=mysqli_query($conn,$query) or die(mysqli_error($conn));
     $result=mysqli_fetch_array($req);
     if($result!=null){
     if(password_verify($this->password,$result['password']))
     {return true;}else{return false;}
     }
     closedb($conn);

   }
   //verifies if the supplied username is valid by comparig to the prior egistration in
   //the database
   public function isUsernameValid()
   {
    $conn=dbconnect();
    $query='select * from student_account where username="'.$this->username.'"';
    $req=mysqli_query($conn,$query) or die(mysqli_error($conn));
    $result=mysqli_fetch_array($req);
    if($result!=null){return true;}else{return false;}
    closedb($conn);
   }
    //the future must include the uniqueness check if the email
    //and the username is not already taken
}






?>