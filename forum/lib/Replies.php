<?php

//including the database connection file
include_once("../modal/Crud.php");
include_once("../modal/DbConfig.php");

class Replies {
    function addReply(){
        $connection = new DbConfig();
        $conn = $connection->connect();
            $rep_content = $_POST['ChatArea'];
            $rep_date = date("Y-m-d H:i:s");
            $stud_id = $_POST['stud_id'];
            $thread_id = $_POST['thread_id'];

            $sql = "INSERT INTO `replies` (rep_content, rep_date, student_id, th_id) VALUES('$rep_content','$rep_date', '$stud_id', '$thread_id')";
                         
                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                if(!$result)
                {
                    //something went wrong, display the error
                    echo 'Something went wrong while replying. Please try again later.';
                    //echo mysql_error(); //debugging purposes, uncomment when needed
                }
                else
                {
                    header("Location: ../Display/ForumChat.php?id=$thread_id");
                }
            return true;
    }
}

$reply = new Replies();
$reply->addReply();

?>