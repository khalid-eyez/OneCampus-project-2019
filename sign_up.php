<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration</title>
<link rel="stylesheet" type="text/css" href="index_files/login/display/signup.css"/>
<script src="ressources/jquery/jquery.js"></script>
<script src="index_files/login/display/signup.js"></script>
</head>
<body>
<center>
<div id="logo">
<img src="media_store/onecampus_store/onecampus_logo/onecampuslogo.png" />
</div>
</center>
<div id="bluearea">
<div id="registration">
<center>
<div id="infologo"><img src="media_store/onecampus_store/onecampus_icons/user2.png" /></div>
<div id="heading">Student registration</div>
</center>

<fieldset><legend>personal information</legend>
<form id="regform" action="registration.php" method="POST">
<input type="text" id="fname" name="fname" placeholder="First name"></input>
<input type="text" id="lname" name="lname" placeholder="Last name"></input>   
<input type="text" id="countrys" name="country" placeholder="country of residence"></input>
<input type="text" id="regions" name="region" placeholder="region of residence"></input>
female<input type="radio" name="gender" id="female" value="female" checked="checked"/>
Male<input type="radio" name="gender" id="male" value="male"/>
<label for="age">birth date</lable><input type="date" id="date" name="date" placeholder="date of birth"></input>
</fieldset>
<fieldset><legend>Account information</legend>
<input type="text" id="username" name="username" placeholder="username"></input>
<input type="text" id="email" name="email" placeholder="email"></input>   
<input type="password" id="password" name="password" placeholder="password"></input>
<input type="password" id="confirm_pass" name="confirm_pass" placeholder="confirm password"></input></fieldset>

<fieldset><legend>Academic information</legend>
<input type="text" id="univ" name="univ" placeholder="univerdity"></input>
<input type="text" id="college" name="college" placeholder="college"></input>   
<input type="text" id="degree" name="degree" placeholder="degree program"></input>
<input type="text" id="yos" name="yos" placeholder="year of study"></input></fieldset>
<input type="submit"  name="submit" value="Send details" id="submit"></input>
</form>
</div>
<div id="response">
<div id="text"></div>
<a href="index.php"><div id="login">Login</div></a>
</div>
</div>
<center>
<div id="footer">
<img src="media_store/onecampus_store/onecampus_icons/copyright.png"/>
OneCampus team 2020. All rights reserved.
</div>
</center>
</body>
</html>
