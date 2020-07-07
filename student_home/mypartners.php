<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="display/styles/recommender.css"/>
</head>
<body>
<?php

session_start();
include("../lib/dbconnect.php");
$conn=dbconnect();
$me=$_SESSION['userid'];
$all=[];
$sql="select student_bio.student_id,student_bio.firstname,student_bio.lastname,student_bio.profil from stud_partner,student_bio where (student_bio.student_id=stud_partner.student_id or student_bio.student_id=stud_partner.requester_id) && (stud_partner.student_id=".$me." or stud_partner.requester_id=".$me.") && stud_partner.status='accepted';";
$req=mysqli_query($conn,$sql) or die(mysqli_error($conn));
if(mysqli_num_rows($req)>0){
while($allpartners=mysqli_fetch_array($req))
{

  if($allpartners['student_id']!=$me)
  {
    $all['student_id'][]=$allpartners['student_id'];
    $all['student_firstname'][]=$allpartners['firstname'];
    $all['student_lastname'][]=$allpartners['lastname'];
    $all['profil_img'][]=$allpartners['profil'];
  }
}
//read all partners here

print('<div id="all_rec">');
if($all['student_id']){
for($i=0;$i<count($all['student_id']);$i++)
{
  print('<div id="recommendedx">');
  print('<div id="image"><img src="../media_store/user_store/images/'.$all['profil_img'][$i].'.jpg" /></div>');
  print('<div id="desc">');
  print('<div id="fullname">'.$all['student_firstname'][$i].' '.$all['student_lastname'][$i].'</div>');
  print('</div>');
  print('<div id="requestx">');
  print('<div id="prequest"><p id="'.$all['student_id'][$i].'">Remove</p></div>');
  print('</div>');
 
  print('</div>');
}
print('</div>');


}
}
else
{
  print("you don't have any partner yet");
}












?>
</body>
</html>