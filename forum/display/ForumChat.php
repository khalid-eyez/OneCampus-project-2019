<?php
//create_cat.php
session_start();
include '../modal/DbConfig.php';
include 'header.php';


//including the database connection file
 
$connection = new DbConfig();
$conn = $connection->connect();
 
//fetching data in descending order (lastest entry first)
//$result = "SELECT * FROM thread ORDER BY create_date ASC";
//Post Data 
$id = $_GET['id'];
$query_topic = "SELECT thread.*, student_account.* 
                FROM thread, student_account 
                where thread.student_id = student_account.student_id 
                AND thread.th_id =$id";
$result_topic = mysqli_query($conn, $query_topic);

$result = "SELECT student_account.*, replies.* 
           FROM student_account, replies 
           WHERE replies.student_id = student_account.student_id AND replies.th_id =$id";

$result = mysqli_query($conn, $result);


?>

<div id="forum-list" class="forum-list">

                <?php

                        if(!$result_topic)
                        {
                            echo 'The Replies could not be displayed, please try again later.';
                        }
                        else
                        {
                            if(mysqli_num_rows($result_topic) == 0)
                            {
                                echo 'There are no Replies yet.';
                            }
                            else
                            {    
                                while($row_topic = mysqli_fetch_assoc($result_topic))
                                {     
                                    ?>
                                    <!-- Post -->
                                    <div id="post">
                                        <div class="row" id="thread-row">
                                            <div class="col" id="pfofile-img-col">
                                                <img class="rounded-circle" id="profile-img-thread" src="assets/img/man%20study.jpg">
                                                    <span id="username-post"><?php echo $row_topic['username']?></span>
                                            </div>
                                            <div class="col" id="title-thread-col">
                                                <h6 id="forum-title-heading"><?php echo $row_topic['th_title']?></h6>
                                            </div>
                                        </div>
                                        <div class="row" id="post-description">
                                            <div class="col">
                                                <p id="description"><?php echo $row_topic['th_content']?></p>
                                                <p id="time"><?php echo date('F j', strtotime($row_topic['create_date']))?></p>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <?php
                                }
                            }
                        }

                        if(!$result)
                        {
                            echo 'The Replies could not be displayed, please try again later.';
                        }
                        else
                        {
                            if(mysqli_num_rows($result) == 0)
                            {
                                echo 'There are no Replies yet.';
                            }
                            else
                            {    
                                while($row = mysqli_fetch_assoc($result))
                                {     
                                    ?>               
                                    <!-- Reply -->
                                    <div id="post" style="margin-bottom: 16px;margin-top: 0px;">
                                        <div class="row" id="thread-row">
                                            <div class="col" id="pfofile-img-col"><img class="rounded-circle" id="profile-img-thread" src="assets/img/man%20study.jpg"><span id="username-post"><?php echo $row['username']?></span></div>
                                            <div class="col" id="title-thread-col">
                                            </div>
                                        </div>
                                        <div class="row" id="post-description">
                                            <div class="col">
                                                <p id="description"><?php echo $row['rep_content']?></p>
                                                <p id="time"><?php echo date('F j', strtotime($row['rep_date']))?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                        }
                ?>

</div>
            <form action="../lib/Replies.php" method="post" name="reply-form" id="reply-form">
            <div class="row" id="InputText-Row" style="margin-left:20px">
                    <div class="col" id="Attachment-Col"><i class="material-icons" id="Attachment-Icon">attachment</i></div>
                    <div class="col-8 col-sm-9 col-md-9 col-lg-9 col-xl-10" id="TextInputArea-Col">
                        <textarea id="Chat-TextArea" name="ChatArea" placeholder="Type Something" autofocus=""></textarea>
                    </div>
                        <!-- Hidden value-->
                        <input type="hidden" id="thread_id" name="thread_id" value="<?php echo $id;?>">
                        <!--<input type="hidden" id="stud_id" name="stud_id" value="<?php echo $id;?>">-->
                        <input type="hidden" id="stud_id" name="stud_id" value="<?php echo $_SESSION['userid'];?>">
                        
                    <div class="col" id="SendIcon-Col">
                        <i class="la la-send" id="Send-Icon" onClick="document.getElementById('reply-form').submit();"></i>
                    </div>
            </div>
            </form>
        </div>

<?php
    include 'footer.php';
?>