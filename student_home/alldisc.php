<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>discussions</title>
<link rel="stylesheet" type="text/css" href="display/styles/alldisc.css"/>
<script src="display/scripts/jquery.js"></script>
<script type="text/javascript">
$('document').ready(function(){

var all=$('#acc_deci *');

for(var i=0;i<all.length;i++){
    
all.eq(i).click(function(){
var id=$(this).attr('id');
var clicked=$(this);
//console.log(id);

$.get('disc_request.php',{dr:id},function(data)
{

clicked.text(data);
clicked.parent().parent().find('p').eq(1).text('deny');
//console.log(data);

});


});
}
var deny=$('#deny *');

for(var i=0;i<all.length;i++){
    
deny.eq(i).click(function(){
var id=$(this).attr('id');
var clicked=$(this);
//console.log(id);

$.get('disc_request.php',{dn:id},function(data)
{

clicked.text(data);
clicked.parent().parent().find('p').eq(0).text('accept');
//console.log(data);

});


});
}

//handling joining discussion

var all=$('#joindeci *');

      for(var i=0;i<all.length;i++){
    
      all.eq(i).click(function(){
      var id=$(this).attr('id');
      var clicked=$(this);
//console.log(id);

    
      var partners;
   
    //console.log(partners.student_firstname);
    //var serverchannel=io('http://localhost:1000')
    var username='<?php echo $_SESSION['username'];?>';
    var userid=<?php echo $_SESSION['userid'];?>;
    var data={
        userid:0,
        username:""
    };
    data.userid=userid;
    data.username=username;
    //$.get("getallpartners.php", function(part){
      
     // data.mypartners=JSON.parse(part);
      //serverchannel.emit('mydetails',data);
      //console.log(data.mypartners.student_firstname[0]);
      window.open('../discussion_room/discussion/index.php?userid='+userid+'&&username='+username+'&&disc='+id);
        // });
          
         
    
  });

} 
   
})
</script>
</head>
<body>
<?php

include("../lib/dbconnect.php");
$conn=dbconnect();
$me=$_SESSION['userid'];
$sql="select * from stud_session,student_bio where (student_bio.student_id=stud_session.student_id or student_bio.student_id=stud_session.partner_id);";
$req=mysqli_query($conn,$sql) or die(mysqli_error($conn));

print('<div id="discussionlist">');
while($alldiscs=mysqli_fetch_array($req))
{
    print('<div id="discplay">');
    if($alldiscs['status']=='accepted')
    {
      if($alldiscs['student_id']!=$me || $alldiscs['partner_id']!=$me)
      {
       print('<div id="theimage"><img src="../media_store/user_store/images/'.$alldiscs['profil'].'.jpg" /></div><div id="discpart">'.$alldiscs['firstname'].' '.$alldiscs['lastname'].'</div><div id="joindeci"><p id="'.$alldiscs['firstname'].'_'.$alldiscs['student_id'].'">Join</p></div>');
    
      }
      else
          {

          }
    }
    else if($alldiscs['status']=='pending'){

         if($alldiscs['partner_id']==$me && $alldiscs['student_id']!=$me) 
         {
            print('<div id="theimage"><img src="../media_store/user_store/images/'.$alldiscs['profil'].'.jpg" /></div><div id="discpart">'.$alldiscs['firstname'].' '.$alldiscs['lastname'].'</div><div id="acc_deci"><p id="'.$alldiscs['student_id'].'">Accept</p></div><div id="deny"><p id="'.$alldiscs['student_id'].'">Deny</p></div></div>');
         }
         else if($alldiscs['student_id']==$me && $alldiscs['partner_id']!=$me){
           print('<div id="theimage"><img src="../media_store/user_store/images/'.$alldiscs['profil'].'.jpg" /></div><div id="discpart">'.$alldiscs['firstname'].' '.$alldiscs['lastname'].'</div id="acc_deci"><div id=""><p >pending</p></div></div></div>');
         }
        }
    else{
        print('<div id="theimage"><img src="../media_store/user_store/images/'.$alldiscs['profil'].'.jpg" /></div><div id="discpart">'.$alldiscs['firstname'].' '.$alldiscs['lastname'].'</div><div id="deci"><p id="denied">Denied</p></div>');
    }
    


print('</div>');
}
print('</div>');
?>
</body>
</html>