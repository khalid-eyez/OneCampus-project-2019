<?php
include('lib/dbconnect.php');
if(isset($_POST['submit']))
{
    //($_POST['submit']);
    //$data=explode('&',$_POST['submit']);
    //print_r($data);
    //personal information
    $fname=trim(stripslashes(htmlspecialchars($_POST['submit'][0]['value'])));
    $lname=trim(stripslashes(htmlspecialchars($_POST['submit'][1]['value'])));
    $gender=trim(stripslashes(htmlspecialchars($_POST['submit'][4]['value'])));
    $date=trim(stripslashes(htmlspecialchars($_POST['submit'][5]['value'])));
    $country=trim(stripslashes(htmlspecialchars($_POST['submit'][2]['value'])));
    $region=trim(stripslashes(htmlspecialchars($_POST['submit'][3]['value'])));

    //account information


    $username=trim(stripslashes(htmlspecialchars($_POST['submit'][6]['value'])));
    $email=trim(stripslashes(htmlspecialchars($_POST['submit'][7]['value'])));
    $password=password_hash($_POST['submit'][8]['value'],PASSWORD_DEFAULT);

    //university information

    $univ=trim(stripslashes(htmlspecialchars($_POST['submit'][10]['value'])));
    $college=trim(stripslashes(htmlspecialchars($_POST['submit'][11]['value'])));
    $degree=trim(stripslashes(htmlspecialchars($_POST['submit'][12]['value'])));
    $yos=trim(stripslashes(htmlspecialchars($_POST['submit'][13]['value'])));


    //testing the availability of the username and the email
    $conn=dbconnect();

    $chekemail="select * from student_account where email='$email';";
    $checkusername="select * from student_account where username='$username';";

    $emailquery=mysqli_query($conn,$chekemail) or die(mysqli_error($conn));
    $usernamequery=mysqli_query($conn,$checkusername) or die(mysqli_error($conn));

    if($emailquery->num_rows>0){print("the email is already used, try another one");}
    elseif($usernamequery->num_rows>0){print("the username is already taken,try another one");}


    //if the account is available

    else{


    
    $sql="START TRANSACTION;";
    $sql1="INSERT INTO student_bio(student_id,firstname,lastname,gender,DOB,country,profil)";
    $sql1.="VALUES('','".$fname."','".$lname."','".$gender."','".$date."','".$country."','img');";
    $sql3="SELECT @id:=MAX(student_id) from student_bio;";
    $sql4="INSERT INTO student_account (acc_id,student_id,username,password,email,acc_status)";
    $sql4.="VALUES ('',@id,'".$username."','".$password."','".$email."','');";
    $sql6="INSERT INTO student_academics(school_id,student_id,university,college,P_title,yos)";
    $sql6.="VALUES('',@id,'".$univ."','".$college."','".$degree."','".$yos."');";
    $sql7='COMMIT;';
     //print($sql);
     
     $query1=mysqli_query($conn,$sql) or die(mysqli_error($conn));
     $query2=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
     $query4=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
     $query5=mysqli_query($conn,$sql4) or die(mysqli_error($conn));
     $query6=mysqli_query($conn,$sql6) or die(mysqli_error($conn));
     

     if($query1 AND $query2 AND $query4 AND $query5 AND $query6)
     {
        $query7=mysqli_query($conn,$sql7) or die(mysqli_error($conn));
        if($query7){print("registration successful");}
     }
     else{
         $query8=mysqli_query("ROLLBACK");
         if($query8){print("registration not successful, please try again");}

     }



     closedb($conn);





}
}

?>