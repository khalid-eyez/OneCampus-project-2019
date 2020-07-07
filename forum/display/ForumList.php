<!DOCTYPE html>
<html>
<head>
</head>
<script type="text/javascript">

 //$('document').ready(function()
   // {

     //$('#num-of-replies').click(function(d){


        //d.preventDefault();

        //$('#main').load('ForumChat.php')
    // })


   
// })
    </script>
<body>
<?php
//including the database connection file
include_once("../modal/DbConfig.php");

// Start the session
session_start();

// Set session variables
//$_SESSION["user_id"] = 2;
 
$connection = new DbConfig();
$conn = $connection->connect();
 
//fetching data in descending order (lastest entry first)
//$query_topic = "SELECT * FROM thread ORDER BY create_date ASC";
$query_topic = "SELECT thread.*, student_account.* FROM thread, student_account where thread.student_id = student_account.student_id ORDER BY create_date ASC";
$result_topic = mysqli_query($conn, $query_topic);
//echo '<pre>'; print_r($result); exit;



?>


<div id="forum-list" class="forum-list">
    
        
                <?php
                        if(!$result_topic)
                        {
                            echo 'The topics could not be displayed, please try again later.';
                        }
                        else
                        {
                            if(mysqli_num_rows($result_topic) == 0)
                            {
                                echo 'There are no topics yet.';
                            }
                            else
                            {    
                                while($row_topic = mysqli_fetch_assoc($result_topic))
                                {   

                                $th_id = $row_topic['th_id'];
                                   $result = "SELECT student_account.*, replies.* 
                                   FROM student_account, replies 
                                   WHERE replies.student_id = student_account.student_id 
                                   AND replies.th_id =$th_id";
                                   $result_replies = mysqli_query($conn, $result);
                                   $number_replies = mysqli_num_rows($result_replies);  
                                    ?>
                                    <div id="thread">
                                        <div class="row" id="thread-row">
                                            <div class="col" id="pfofile-img-col"><img class="rounded-circle" id="profile-img-thread" src="../forum/assets/img/myimage.jpg"></div>
                                            <div class="col" id="title-thread-col">
                                                <h6 id="forum-title-heading" style="display: block;  width: 90%; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"><?php echo $row_topic['th_title']?></h6>
                                                <p id="subtitle-thread-list" style="padding-Bottom: 1px"><?php echo 'Created by '. $row_topic['username'].' '. date('F j', strtotime($row_topic['create_date'])) ?></p>
                                            </div>
                                            <div class="col align-self-center" id="replies-buttton" onclick="location.href='../forum/Display/ForumChat.php?id=<?php echo $row_topic['th_id']; ?>';" style="cursor: pointer;">
                                                <div id="num-of-replies">
                                                    <h6 id="reply-word">Replies</h6>
                                                    <h6 id="reply-num"><?php echo $number_replies; ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                ?>
        
            <!-- NEW TOPIC BUTTON -->
               
            <div id="NewTopic-Div"><a class="btn btn-primary btn-lg" role="button" id="NewTopic-Button" data-toggle="modal" href="#NewTopic-Modal">New Topic</a>
                <div class="modal fade" role="dialog" tabindex="-1" id="NewTopic-Modal">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 id="Heading-Modal">Create New Topic</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <form action="../forum/lib/Threads.php" method="post" name="NewThread" id="NewThread_Form">
                                        <h4 class="modal-title" id="Topic-Heading">Topic</h4>
                                            <input type="text" id="Topic-TextInput" name="topic" placeholder="Enter Your Topic" autofocus="" required="">
                                        
                        <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION["userid"];?>">

                                        <h4 id="Message-Heading">Message</h4><textarea id="Message-TextArea" name="message"></textarea></div>
                                    
                                </form>
                            <div  class="modal-footer">
                                    <button class="btn btn-light" id="Cancel-Modal" data-dismiss="modal" type="button">Cancel</button>
                                    <input type="button" class="btn btn-primary" id="SubmitButton-Modal" value="Submit" onClick="document.getElementById('NewThread_Form').submit();"/>
                            </div>   
                    </div>
                </div>
            </div>
        </div>

    </body>
    </html>