<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>update information</title>
<link rel="stylesheet" type="text/css" href="../user_profil/signup.css"/>
<script src="jquery.js"></script>
<script src="profil.js"></script>
<script src="index_files/login/display/signup.js"></script>
</head>
<body id="thebody">
<div id="bluearea">
<div id="registration">
<fieldset><legend></legend>
<form id="regform" action="registration.php" method="POST">
<input type="text" id="fname" name="fname" placeholder="First name"></input>
<input type="text" id="lname" name="lname" placeholder="Last name"></input>   
<input type="text" id="countrys" name="country" placeholder=" your country of residence"></input>
<input type="text" id="regions" name="region" placeholder="the region of residence"></input><br>
female<input type="radio" name="gender" id="female" value="female"/>
Male<input type="radio" name="gender" id="male" value="male"/>
<label for="age"></lable><input type="date" id="date" name="date" placeholder="your date of birth"></input>
</fieldset>
<fieldset><legend></legend>
<input type="text" id="username" name="username" placeholder=" your user name"></input>
<input type="text" id="email" name="email" placeholder="your email"></input>   
<input type="text" id="password" name="password" placeholder="your password"></input>
<input type="text" id="confirm_pass" name="confirm_pass" placeholder="confirm your password"></input></fieldset>

<fieldset><legend></legend>
<input type="text" id="univ" name="univ" placeholder="your univerdity or institution"></input>
<input type="text" id="college" name="college" placeholder="your college"></input>   
<input type="text" id="degree" name="degree" placeholder="your degree "></input>
<input type="text" id="yos" name="yos" placeholder="your year of study"></input></fieldset>
<input type="submit"  name="submit" value="Save" id="submit"></input>
</form>
</div>
</div>
</body>
</html>
