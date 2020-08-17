

<div id="disc_head">All discussions</div>
<?php

include("../../lib/dbconnect.php");
$conn=dbconnect();
$me=$_SESSION['userid'];
$gp=$_GET['groupid'];
$sql="select * from group_session,groups where groups.group_id=group_session.group_id && group_id=$gp";
$req=mysqli_query($conn,$sql) or die(mysqli_error($conn));

print('<div id="discussionlist">');
while($alldiscs=mysqli_fetch_array($req))
{
    print('<div id="discplay">');
    if($alldiscs['status']=='upcoming')
    {
      if($alldiscs['student_id']==$me)
      {
       print('<div id="theimage"><img src="../../media_store/user_store/images/'.$alldiscs['group_icon'].'.jpg" /></div><div id="ddesc"><div id="dtitle">'.$alldiscs['session_title'].'</div><div id="ddate">'.$alldiscs['discdate'].'</div><div id="dstart">'.$alldiscs['start_time'].'</div><div id="dend">'.$alldiscs['finish_time'].'</div></div><div id="joindeci"><p id="'.$alldiscs['group_name'].'_'.$alldiscs['group_id'].'">Start</p></div>');
    
      }
      else{
            print('<div id="theimage"><img src="../media_store/user_store/images/'.$alldiscs['group_icon'].'.jpg" /></div><div id="ddesc"><div id="dtitle">'.$alldiscs['session_title'].'</div><div id="ddate">'.$alldiscs['date'].'</div><div id="dstart">'.$alldiscs['start_time'].'</div><div id="dend">'.$alldiscs['finish_time'].'</div></div><div id="joindeci"><p id="'.$alldiscs['group_name'].'_'.$alldiscs['group_id'].'">Join</p></div>');
          }
    }

     else{

            print('<div id="theimage"><img src="../media_store/user_store/images/'.$alldiscs['profil'].'.jpg" /></div><div id="ddesc"><div id="dtitle">'.$alldiscs['session_title'].'</div><div id="ddate">'.$alldiscs['date'].'</div><div id="dstart">'.$alldiscs['start_time'].'</div><div id="dend">'.$alldiscs['finish_time'].'</div></div><div id="acc_deci">'.$alldiscs['status'].'</div>');
         }
        
    


print('</div>');
}
print('</div>');
?>
