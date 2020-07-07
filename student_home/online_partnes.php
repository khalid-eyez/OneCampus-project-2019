<!DOCTYPE html>
<html>
<head>
<title>online partners</title>
<link rel="stylesheet" type="text/css" href="display/styles/online.css" />
<script src="display/scripts/jquery.js"></script>
<script src="display/online_partners.js"></script>
</head>
<body>
<?php

session_start();
include("../lib/dbconnect.php");
$conn=dbconnect();
$me=$_SESSION['userid'];
$all=[];
$sql="select student_bio.student_id,student_bio.firstname,student_bio.lastname,student_bio.profil,student_account.acc_status from stud_partner,student_bio,student_account where (student_bio.student_id=stud_partner.student_id or student_bio.student_id=stud_partner.requester_id) && student_bio.student_id=student_account.student_id && (stud_partner.student_id=".$me." or stud_partner.requester_id=".$me.") && stud_partner.status='accepted';";
$req=mysqli_query($conn,$sql) or die(mysqli_error($conn));
print('<div id="onlinep">');
while($allpartners=mysqli_fetch_array($req))
{
  
  if($allpartners['student_id']!=$me)
  {
    
    
    if($allpartners['acc_status']=='active'){
    print('<div id="apartner">');
    print('<div id="img"><img src="../media_store/user_store/images/'.$allpartners['profil'].'.jpg" /></div>');
    print('<div id="fullnamexx">'.$allpartners['firstname'].'</div>');
    print('<div id="drequest"><p id="'.$allpartners['student_id'].'">Disc request</p></div>');
    print('</div>');
  }

}

}
print('</div>');
?>
</body>
</html>