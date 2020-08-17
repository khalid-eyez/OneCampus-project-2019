<!DOCTYPE html>
<html>
<head>
     <script src="../ressources/jquery/jquery.js"></script>
    <script src="display/scripts/search.js"></script>
</head>
<body>
<?php
include("../lib/dbconnect.php");
session_start();
if(isset($_GET["searchkey"]))
{
    $key=$_GET["searchkey"];
    $me=$_SESSION['userid'];
    ///print($me);
    $conn=dbconnect();

    $sql="select*from student_bio,student_academics where (student_bio.student_id=student_academics.student_id) && (firstname like '%$key%' or lastname like '%$key%')";

    $query=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    print('<div id="searchpage">');
    if(mysqli_num_rows($query)>0){
    while($result=mysqli_fetch_array($query))
    {
        //print($result['student_id']);
           //print($result['student_id']);
          if($result['student_id']==$me){//print('no result found');
        } //i can't search myself
            else{
                //checking if there are pending requests
            $stud_id=$result['student_id'];
            //print($stud_id);
         
            $test_pending_requests="select * from stud_partner where (requester_id='$me' && student_id='$stud_id') or (requester_id='$stud_id' && student_id='$me');";
            $treq=mysqli_query($conn,$test_pending_requests) or die(mysqli_error());
            if(mysqli_num_rows($treq)==null) //no pending or partnership already exist
            {
        print('<div id="result">');
        print('<div id="pix"><img src="../media_store/user_store/images/'.$result['profil'].'"/></div>');
        print('<div id="sideinfo">');
        print('<div id="fullname">'.$result['firstname'].' '.$result['lastname'].'</div><div id="details">'.$result['P_title'].','.$result['university'].'</div></div>');
        print('<div id="request"><div id="reimg"><img src="../media_store/onecampus_store/onecampus_icons/connect.jpg"/></div><p id="'.$result['student_id'].'">Partner request</p></div>');
        //print('</div>');
        print('</div>');
            }
            else{
       
                    while($test=mysqli_fetch_array($treq))
                    {

                        print('<div id="result">');
                        print('<div id="pix"><img src="../media_store/user_store/images/'.$result['profil'].'"/></div>');
                        print('<div id="sideinfo">');
                        print('<div id="fullname">'.$result['firstname'].' '.$result['lastname'].'</div><div id="details">'.$result['P_title'].','.$result['university'].'</div>'); 
                        print('</div>');            
        if($test['status']=='pending'){
        print('<div id="norequest">Pending request</div>');
        }
        else if($test['status']=='accepted')
        {
            print('<div id="norequest">Already partners</div>');  
        }
        else
        {
            print('<div id="request"><div id="reimg"><img src="../media_store/onecampus_store/onecampus_icons/connect.jpg"/></div><p id="'.$result['student_id'].'">Partner request</p></div>');

        }
        print('</div>');
}
}    
       
    }
}
print("</div>");
}

        else{
            print('no result found');
        }
       
    
    



print('</div>');
//}//
    //}
}

?>
</body>
</html>