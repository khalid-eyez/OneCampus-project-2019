<?php

//including the database connection file
include_once("../modal/Crud.php");
include_once("../modal/DbConfig.php");

class Groups {
    function groupCreate(){
        $connection = new DbConfig();
        $conn = $connection->connect();
        /* create new name file */
        $unique = substr(uniqid(rand(), true), 1, 6);
        $filename   = "grp-" . $unique; // gruopIcon-5dab1961e93a7
        $extension  = pathinfo( $_FILES["uploaded_file"]["name"], PATHINFO_EXTENSION ); // jpg
        $file_basename   = $filename . '.' . $extension; // gruopIcon-5dab1961e93a7.jpg

        $source       = $_FILES["uploaded_file"]["tmp_name"];
        $destination  = "../display/assets/images/" . $file_basename;
        // Group Details
        $group_name = $_POST['group_name'];
        $group_desc = $_POST['group_description'];
        $createdate = date("Y-m-d H:i:s");
        $stud_id = $_POST['stud_id'];
            

            if (move_uploaded_file( $source, $destination )) {

            } else {
               //echo "File was not uploaded";
            } 
            $sql_for_grp = "INSERT INTO `groups` (student_id, group_name, group_icon, group_desc, createdate) VALUES ('$stud_id', '$group_name', '$file_basename', '$group_desc', '$createdate')";
    
                $result_created_group = mysqli_query($conn, $sql_for_grp) or die(mysqli_error($conn));
                
                
                
                

                
                if(!$result_created_group)
                {
                    //something went wrong, display the error
                    echo 'Something went wrong while replying. Please try again later.';
                    //echo mysql_error(); //debugging purposes, uncomment when needed
                }else{
                }
                
            //return true;
        }
}

$create = new Groups();
$create->groupCreate();

?>

