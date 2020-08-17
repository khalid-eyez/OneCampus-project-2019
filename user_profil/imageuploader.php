<?php
  session_start();
       
include("../lib/dbconnect.php");
$conn=dbconnect();
       $userid=$_SESSION['userid'];
       $unique = substr(uniqid(rand(), true), 1, 6);
        $filename   = "grp-" . $unique; // gruopIcon-5dab1961e93a7
        $extension  = pathinfo( $_FILES["uploaded_file"]["name"], PATHINFO_EXTENSION ); // jpg
        $file_basename   = $filename . '.' . $extension; // gruopIcon-5dab1961e93a7.jpg

        $source = $_FILES["uploaded_file"]["tmp_name"];
        $destination  = "../media_store/user_store/images/" . $file_basename;
        
        // user Details
            

            if (move_uploaded_file( $source, $destination )) {
              print('uploaded');

            } else {
               //echo "File was not uploaded";
               print('not uploaded');
            } 
            $sql_for_grp ="update student_bio set profil='".$file_basename."' where student_id=$userid";
    
                $result_created_group = mysqli_query($conn, $sql_for_grp) or die(mysqli_error($conn));
                
                
                
                

                
                if(!$result_created_group)
                {
                    //something went wrong, display the error
                    echo 'internal server error';
                    //echo mysql_error(); //debugging purposes, uncomment when needed
                }else{ 
                  print('changes applied');
                }


          
            



?>