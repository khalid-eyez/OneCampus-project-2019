<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>student information</title>
<link rel="stylesheet" type="text/css" href="../user_profil/signup.css"/>
<script src="../student_home/display/scripts/jquery.js"></script>
<script src="profil.js"></script>
<script type="text/javascript">
$('document').ready(function(){
	
    $('#edit').click(function(){
        
    $('#info').load('../lib/update_info.php');
    
    });
    
    })
</script>
</head>
<body id="thebody">
<div id="registration">
    <div id="infoim">
<div id="images"><img src="../user_profil/thewinner.jpg" /></div>
<div id="info">
<p>first name:IDA R</p>
<p>last name: MSAKY</p>
<p>Marital status:single</p>
<p>gender: female</p>
<p>email: idaframsaky@gmail.com</p>
<p>contact: 06249019013</p>
<p>program: Bachelor of science in computer science</p>
<p>department:CSE</p>
<p>college:CIVE</p>
<p>university: the university</p>
<div id="controls"><div id="edit">Edit</div><div id="go">close</div></div>
</div>
</div>

</div>
</body>
</html>
