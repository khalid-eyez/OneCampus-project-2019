<?php

//including the database connection file
include_once("../modal/Crud.php");
include_once("../modal/DbConfig.php");

class Threads {
    
    function addThread(){
        $connection = new DbConfig();
        $conn = $connection->connect();
            $topic = $_POST['topic'];
            $user_id = $_POST['user_id'];
            $message = $_POST['message'];
            $create_date = date("Y-m-d H:i:s");

                if (empty($_POST["topic"]) || empty($_POST["message"])) {
                echo "<div style='color:red'>Please fill all field<a href='../../student_home/index.php'>Go back</a></div>";
            } else {
                        $sql = "INSERT INTO `thread` (th_title, student_id, th_content, create_date) VALUES('$topic', '$user_id', '$message', '$create_date')";
                         
                        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        if(!$result)
                            {
                                //something went wrong, display the error
                                echo 'Something went wrong while creating Topic. Please try again later.';
                                //echo mysql_error(); //debugging purposes, uncomment when needed
                            }
                            else
                            {
                                header("Location: ../../student_home/index.php");
                            }
                        return true;
                    }
            }
}

$thread = new Threads();
$thread->addThread();
?>