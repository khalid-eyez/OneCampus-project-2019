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
$not_num=0;

$conn=dbconnect();

//handling requesting notifications
$getall="select * from notification,stud_partner where notification.target_id=stud_partner.student_id && notification.target_id=".$myid." && notification.not_type='pr' && stud_partner.status='pending';";
$getall2="select * from notification where target_id=".$myid." && not_type='pres';";
$req=mysqli_query($conn,$getall) or die(mysqli_error($conn));
$reqz=mysqli_query($conn,$getall2) or die(mysqli_error($conn));
while($notif=mysqli_fetch_array($req))
{
    $test="select * from notification,stud_partner where notification.target_id=stud_partner.student_id && notification.init_id=".$myid." && target_id=".$notif['init_id']." && notification.not_type='pres' && stud_partner.status='accepted';";
    $testr=mysqli_query($conn,$test) or die(mysqli_error());
    if(mysqli_num_rows($testr)<1){
    
        $not_num++;  
}
}
while($notif3=mysqli_fetch_array($reqz))
{
   $not_num++;
}

print($not_num);
?>
</body>
</html>