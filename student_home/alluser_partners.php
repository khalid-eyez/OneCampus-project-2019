<?php

//session_start();
//include("../lib/dbconnect.php");
function getpartners($id){
$conn=dbconnect();
$me=$id;
$all=[];
$sql="select student_bio.student_id,student_bio.firstname,student_bio.lastname,student_bio.profil from stud_partner,student_bio where (student_bio.student_id=stud_partner.student_id or student_bio.student_id=stud_partner.requester_id) && (stud_partner.student_id=".$me." or stud_partner.requester_id=".$me.") && stud_partner.status='accepted';";
$req=mysqli_query($conn,$sql) or die(mysqli_error($conn));

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
closedb($conn);


return $all;

}
?>