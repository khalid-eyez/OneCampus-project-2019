<?php
session_start();

session_regenerate_id(true);
include('includes/config.php');
if(isset($_POST['login']))
{
    $your_name=$_POST['your_name'];
    $password=md5($_POST['your_pass']);
    $sql ="SELECT phonenumber,password,level FROM admin WHERE phonenumber=:your_name and Password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':your_name', $your_name, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $result=$query->fetch(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {

        $sql2 = "SELECT phonenumber,password,level FROM admin WHERE phonenumber=:your_name and Password=:password";
        $query2 = $dbh -> prepare($sql2);
        $query2= $dbh -> prepare($sql);
        $query2-> bindParam(':your_name', $your_name, PDO::PARAM_STR);
        $query2-> bindParam(':password', $password, PDO::PARAM_STR);
        $query2-> execute();
        $result=$query2->fetch(PDO::FETCH_OBJ);

        if($result->level == "1"){
            $_SESSION['alogin']=$_POST['your_name'];
            $_SESSION['alevel']='1';

            $uname = $_SESSION['alogin'];
            $sql = "SELECT * from admin where phonenumber = (:uname);";
            $query = $dbh -> prepare($sql);
            $query-> bindParam(':uname', $uname, PDO::PARAM_STR);
            $query->execute();
            $result=$query->fetch(PDO::FETCH_OBJ);
            $full_name = $result->full_name;

            $_SESSION['fname'] = $full_name;

            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        }


    } else{

       echo "<script>alert('Invalid Details 2');</script>";

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
			<form action="login.php" method="POST" class="login100-form validate-form">
				<span class="login100-form-title p-b-37">
					<img src="images1/logo.png" width="200">
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" name="your_name" placeholder="Username">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" name="your_pass" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" name="login"  class="login100-form-btn">
						Sign In
					</button>
				</div><br/>

                <div class="container-login100-form-btn">
                   <a href="recovery.php">Recovery Password...</a>
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