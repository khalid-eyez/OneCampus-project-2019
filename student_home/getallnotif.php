<!DOCTYPE html>
<html>
<head>
<script src="../ressources/jquery/jquery.js"></script>
<script src="display/scripts/allnotif.js"></script>
<script type="text/javascript">
$('document').ready(function(){

var all=$('#nrequest *');

for(var i=0;i<all.length;i++){
    
all.eq(i).click(function(){
var id=$(this).attr('id');
var clicked=$(this);
//console.log(id);

$.get('partner_requests.php',{pres:id},function(data)
{

clicked.text(data);
//console.log(data);

});


});
}

});
</script>

<title></title>
</head>
<body>
<?php
include("../lib/dbconnect.php");


session_start();

$myid=$_SESSION['userid'];

$conn=dbconnect();

//handling requesting notifications
$getall="select * from notification,stud_partner where notification.target_id=stud_partner.student_id && notification.target_id=".$myid." && notification.not_type='pr' && stud_partner.status='pending';";
$getall2="select * from notification where target_id=".$myid." && not_type='pres';";
$req=mysqli_query($conn,$getall) or die(mysqli_error($conn));
$reqz=mysqli_query($conn,$getall2) or die(mysqli_error($conn));
print('<div id="allnotif">');

while($notif=mysqli_fetch_array($req))
{
    $test="select * from notification,stud_partner where notification.target_id=stud_partner.student_id && notification.init_id=".$myid." && target_id=".$notif['init_id']." && notification.not_type='pres' && stud_partner.status='accepted';";
    $testr=mysqli_query($conn,$test) or die(mysqli_error());
    if(mysqli_num_rows($testr)<1){
    $getinit="select * from student_bio where ";
    $getinit.="student_id=".$notif['init_id'].";";

    $req2=mysqli_query($conn,$getinit) or die(mysqli_error($conn));

    while($notif2=mysqli_fetch_array($req2))
    {
    //print($notif['init_id']);
    print('<div id="notifres"><div id="userimg"><img src="../media_store/user_store/images/'.$notif2['profil'].'.jpg"/></div><div id="info">'.$notif2['firstname'].' sent you a partner request</div><div id="nrequest"><p id='.$notif['init_id'].'>accept</p></div></div>');
    }
}
}
while($notif3=mysqli_fetch_array($reqz))
{
    $getinit="select * from student_bio where ";
    $getinit.="student_id=".$notif3['init_id'].";";

    $req3=mysqli_query($conn,$getinit) or die(mysqli_error($conn));

    while($notif4=mysqli_fetch_array($req3))
    {
    //print($notif['init_id']);
    print('<div id="notifres"><div id="userimg"><img src="../media_store/user_store/images/'.$notif4['profil'].'.jpg"/></div><div id="info">'.$notif4['firstname'].' accepted your partner request</div><div id="nrequest"></div></div>');
  
}

}


print("</div>");


?>
</body>
</html>