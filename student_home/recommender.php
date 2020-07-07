<!DOCTYPE html>
<html>
<head>
<title>recommended partners</title>
<link rel="stylesheet" type="text/css" href="display/styles/recommender.css"/>
<script type="text/javascript">
$('document').ready(function(){

var all=$('#prequest *');

for(var i=0;i<all.length;i++){
    
all.eq(i).click(function(){
var id=$(this).attr('id');
var clicked=$(this);
//console.log(id);

$.get('partner_requests.php',{preq:id},function(data)
{

clicked.text(data);
//console.log(data);

});


});
}

});



</script>
</head>
<body>
<?php

session_start();
include("../lib/dbconnect.php");
include("alluser_partners.php");
include("myakademix.php");
$id=$_SESSION['userid'];
$mypartners=getpartners($id);
$myacademic_details=myakademix($id);
//print_r($myacademic_details);
$pids=[];
//print(count($mypartners));
if(count($mypartners)>0)
{
$pids=$mypartners['student_id'];
} //my partners ids
//print_r($pids);
//my academic details
$myacademic_details=[];
$my_recommended=[]; //recommended ids partners
$my_recommended_firstnames=[];//first names for recommended partners
$my_recommended_lastnames=[];//last names for recommended partners
$my_recommended_degree=[];//their degree
$my_recommended_univ=[];//thier university
$my_recommended_profil=[];//thier profil images


//getting everyones partner in the system

//select all users

$conn=dbconnect();
$sql="select * from student_bio,student_academics where student_bio.student_id=student_academics.student_id";
$req1=mysqli_query($conn,$sql) or die(mysqli_error($conn));

while($user_ids=mysqli_fetch_array($req1))
{
$user_details=[];
 $dd=$user_ids['student_id'];
 $testp="select * from stud_partner where ((requester_id='$id' && student_id=".$dd.") || (requester_id=".$dd." && student_id='$id')) && (status='accepted' || status='pending')";
 $treq=mysqli_query($conn,$testp) or die(mysqli_error($conn));
 if(mysqli_num_rows($treq)<1){
//getting all patners for aach registers user in the system
if($user_ids['student_id']!=$id){
$user_partners=getpartners($user_ids['student_id']);
if($user_partners!=null){
//comparing the partners to mypartners
$common_partners=array_intersect($user_partners['student_id'],$pids);

//if the number of friends in common is greater than one, but we should
//also test if he is not my partner already
if(count($common_partners)>0)
{
    //is he already a partner?
    if(!in_array($user_ids['student_id'],$pids))
    {
    array_push($my_recommended,$user_ids['student_id']);
    array_push($my_recommended_firstnames,$user_ids['firstname']);
    array_push($my_recommended_lastnames,$user_ids['lastname']);
    array_push($my_recommended_degree,$user_ids['P_title']);
    array_push($my_recommended_univ,$user_ids['university']);
    array_push($my_recommended_profil,$user_ids['profil']);

    }//then he is added on the list of recommended partners;
}

}
    array_push($user_details,$user_ids['P_title']);
    array_push($user_details,$user_ids['college']);
    array_push($user_details,$user_ids['university']);
    array_push($user_details,$user_ids['country']);
    array_push($user_details,$user_ids['region']);

//comparing my elements with the other users
//print_r($user_details);
$common_partners_num=array_intersect($user_details,$myacademic_details);


//$common_partners_d=array_intersect($user_ids,$myacademic_details);

//print(empty($common_partners_num));
if(count($common_partners_num)>0)
{
    //must not be me
    //is he already a partner?

    if(!in_array($user_ids['student_id'],$pids))
    {
        //is he already in the recommendation list?
        if(!in_array($user_ids['student_id'],$my_recommended)){

            array_push($my_recommended,$user_ids['student_id']);
            array_push($my_recommended_firstnames,$user_ids['firstname']);
            array_push($my_recommended_lastnames,$user_ids['lastname']);
            array_push($my_recommended_degree,$user_ids['P_title']);
            array_push($my_recommended_univ,$user_ids['university']);
            array_push($my_recommended_profil,$user_ids['profil']);
                
        }
    }//then he is added on the list of recommended partners;
}
//print("myacademic details");
//print_r($myacademic_details);
//print_r($my_recommended);
//if($my_recommended!=null){
}
}
}
if(count($my_recommended)>0){
print('<div id="all_rec">');

for($i=0;$i<count($my_recommended);$i++)
{
  print('<div id="recommendedx">');
  print('<div id="image"><img src="../media_store/user_store/images/'.$my_recommended_profil[$i].'.jpg" /></div>');
  print('<div id="desc">');
  print('<center>');
  print('<div id="fullname">'.$my_recommended_firstnames[$i].' '.$my_recommended_lastnames[$i].'</div>');
  //print('<div id="degree">'.$my_recommended_degree[$i].'</div>');
  print('<div id="univ">'.$my_recommended_univ[$i].'</div>');
  print('</center>');
  print('</div>');
  print('<div id="requestx">');
  print('<div id="prequest"><p id="'.$my_recommended[$i].'">partner request</p></div>');
  print('</div>');
 
  print('</div>');
}
print('</div>');

}else{print("you have no recommended partners");}
?>
</body>
</html>