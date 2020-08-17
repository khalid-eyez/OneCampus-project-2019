<?php
session_start();
session_regenerate_id(true);
include('includes/config.php');
if(isset($_POST['login']))
{
    $your_email=$_POST['your_email'];
    $sql ="SELECT email FROM student_account WHERE email=:your_email";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':your_email', $your_email, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $result=$query->fetch(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {

        $to = $your_email;
        $subject = 'PASSWORD RECOVERY ONECAMPUS';
        $message = 'This Message has been sent to you for aim to allow you to reset password if this message has been sent to you wrongly please ignore it Please Click This Link To Reset Password';
        $from = "From: OneCampus System <OneCampus@mail.com>";
        mail($to,$subject,$message,$from);

     echo "<script>alert('All Information To Reset Password Has Been Sent To Your Email Box!!..');</script>";
     echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        
    } else{
     echo "<script>alert('Email Provided Not Found In Our Database');</script>";
     echo "<script type='text/javascript'> document.location = 'recovery.php'; </script>";

 }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>One Campus</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
    <link rel="icon" type="image/png" href="images1/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor1/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts1/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts1/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor1/animate/animate.css">
    <!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="vendor1/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor1/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor1/select2/select2.min.css">
    <!--===============================================================================================-->	
    <link rel="stylesheet" type="text/css" href="vendor1/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css1/util.css">
    <link rel="stylesheet" type="text/css" href="css1/main.css">
    <!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images1/backone.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form action="recovery.php" method="POST" class="login100-form validate-form">
				<span class="login100-form-title p-b-37">
					Recovery Password
				</span>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="email" name="your_email" placeholder="Enter Your Email">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" name="login" class="login100-form-btn">
						Send Recovery Detail
					</button>
				</div>
			</form>

			
		</div>
	</div>
	
	<div id="dropDownSelect1"></div>
	
    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>