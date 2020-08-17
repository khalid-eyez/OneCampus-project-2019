<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>discussions</title>
<link rel="stylesheet" type="text/css" href="display/assets/css/alldisc.css"/>
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
<div id="disc_head">All discussions</div>
<?php

include("../lib/dbconnect.php");
$conn=dbconnect();
$me=$_SESSION['userid'];
$sql="select * from group_session,groups where groups.group_id=group_session.group_id";
$req=mysqli_query($conn,$sql) or die(mysqli_error($conn));

print('<div id="discussionlist">');
while($alldiscs=mysqli_fetch_array($req))
{
    print('<div id="discplay">');
    if($alldiscs['status']=='upcoming')
    {
      if($alldiscs['student_id']==61)
      {
       print('<div id="theimage"><img src="../media_store/user_store/images/'.$alldiscs['group_icon'].'.jpg" /></div><div id="ddesc"><div id="dtitle">'.$alldiscs['title'].'</div><div id="ddate">'.$alldiscs['discdate'].'</div><div id="dstart">'.$alldiscs['start_time'].'</div><div id="dend">'.$alldiscs['finish_time'].'</div></div><div id="joindeci"><p id="'.$alldiscs['group_name'].'_'.$alldiscs['group_id'].'">Start</p></div>');
    
      }
      else{
            print('<div id="theimage"><img src="../media_store/user_store/images/'.$alldiscs['group_icon'].'.jpg" /></div><div id="ddesc"><div id="dtitle">'.$alldiscs['title'].'</div><div id="ddate">'.$alldiscs['date'].'</div><div id="dstart">'.$alldiscs['start_time'].'</div><div id="dend">'.$alldiscs['finish_time'].'</div></div><div id="joindeci"><p id="'.$alldiscs['group_name'].'_'.$alldiscs['group_id'].'">Join</p></div>');
          }
    }

     else{

            print('<div id="theimage"><img src="../media_store/user_store/images/'.$alldiscs['profil'].'.jpg" /></div><div id="ddesc"><div id="dtitle">'.$alldiscs['title'].'</div><div id="ddate">'.$alldiscs['discdate'].'</div><div id="dstart">'.$alldiscs['start_time'].'</div><div id="dend">'.$alldiscs['finish_time'].'</div></div><div id="acc_deci">'.$alldiscs['status'].'</div>');
         }
        
    


print('</div>');
}
print('</div>');
?>
</body>
</html>