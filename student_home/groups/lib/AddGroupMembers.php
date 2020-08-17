<?php

//including the database connection file
include_once("../modal/Crud.php");
include_once("../modal/DbConfig.php");
session_start();
class AddGroupMembers {
    //Add Members into the DB
    function addMembers(){
        $connection = new DbConfig();
        $conn = $connection->connect();

        $createdate = date("Y-m-d H:i:s");
        $gmember_id = $_POST['gmember_id'];
        if(isset($_POST['group_id'])){$grp_id=$_POST['group_id'];}
        else{$grp_id = $_SESSION['g_id'];}
            
            
            //Insert Each Member Id into group_member Table
            
                foreach ($gmember_id as $member_id){
                    $sql_for_grp_member = "INSERT INTO `group_member` (group_id, student_id, membertime) VALUES ('$grp_id', '$member_id', '$createdate')";
                    $sql_for_grp_member = rtrim($sql_for_grp_member,',');

                    $result_created_member = mysqli_query($conn, $sql_for_grp_member) or die(mysqli_error($conn));
                }

            
            

            
            if(!$result_created_member)
            {
                //something went wrong, display the error
                echo 'Something went wrong while inserting members. Please try again later.';
                //echo mysql_error(); //debugging purposes, uncomment when needed
            }
            else
            {
                
            }
        //return true;
    }
}

$add = new AddGroupMembers();
$add->addMembers();

?>

