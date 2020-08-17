<?php
function myakademix($i)
{

$id=$i;
$myacademic_details=[];

$conn=dbconnect();
$sql="select * from student_bio,student_academics where student_bio.student_id=student_academics.student_id && student_bio.student_id='$id'";
$req1=mysqli_query($conn,$sql) or die(mysqli_error($conn));

while($user_ids=mysqli_fetch_array($req1))
{
 
    array_push($myacademic_details,$user_ids['P_title']);
    array_push($myacademic_details,$user_ids['college']);
    array_push($myacademic_details,$user_ids['university']);
    array_push($myacademic_details,$user_ids['country']);
    array_push($myacademic_details,$user_ids['region']);
    
}

return $myacademic_details;
}