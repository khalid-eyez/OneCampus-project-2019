<DOCTYPE html>
<html>
<head>
<title>login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="index_files/login/display/login.css"/>
<script src="ressources/jquery/jquery.js"></script>
<script src="index_files/login/display/login.js"></script>
</head>
<body>
<center>
<div id="response">
<div id="text"></div>
<div id="tryagain">try again</div>
</div>
<div id="logo">
<img src="media_store/onecampus_store/onecampus_logo/onecampuslogo.png"></img>
</div>
<div id="loginarea">
<div id="loginheader">
<img src="media_store/onecampus_store/onecampus_icons/user1.png" />  
</div>
<div id="logininputs">
<form id="loginform" action="index_files/login/data_control/login.php" method="POST">
<div id="usernameinput">
<img src="media_store/onecampus_store/onecampus_icons/user2.png" />
<input type="text" name="username" id="username" placeholder="username"></input>
</div>
<div id="passinput">
<img src="media_store/onecampus_store/onecampus_icons/pass1.png" />
<input type="password" name="password"  id="password" placeholder="password"></input>
</div>
<div id="loginbutton">
<img src="media_store/onecampus_store/onecampus_icons/login.png" />
<input type="submit" name="submit" value="Login" id="submit"></input>

</div>
</form>
</div>
<div id="otheroptions">
<div id="forgotpassword">
<a href="passrecover.php">
<img src="media_store/onecampus_store/onecampus_icons/forgotpass2.png" />
Forgot password?
</a>
</div>
<div id="register">
<a href="sign_up.php">
<img src="media_store/onecampus_store/onecampus_icons/register.png" />
Register
</a>
</div>
</div>
</div>
<div id="footer">
<img src="media_store/onecampus_store/onecampus_icons/copyright.png"/>
OneCampus team 2020. All rights reserved.
</div>
</center>
</body>
</html>
