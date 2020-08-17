<?php
//create_cat.php
session_start();
include '../modal/DbConfig.php';


//including the database connection file
 
$connection = new DbConfig();
$conn = $connection->connect();
 
//fetching data in descending order (lastest entry first)
//$result = "SELECT * FROM thread ORDER BY create_date ASC";
//Post Data 
$id;
if(isset($_GET['id'])){$_SESSION['t_id']=$_GET['id'];$id=$_GET['id'];}
else{$id =$_SESSION['t_id'];}
$query_topic = "SELECT *
                FROM thread, student_account,student_bio 
                where thread.student_id = student_account.student_id && student_bio.student_id=student_account.student_id
                AND thread.th_id =$id";
$result_topic = mysqli_query($conn, $query_topic);

$result = "SELECT *
           FROM student_account, replies, student_bio 
           WHERE (replies.student_id = student_account.student_id && student_bio.student_id=student_account.student_id) && replies.th_id =$id";

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
                                                <img class="rounded-circle" id="profile-img-thread" src="../../media_store/user_store/images/<?php print($row_topic['profil']);?>">
                                                    <span id="username-post"><b><?php echo $row_topic['username']?></b></span>
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
                                            <div class="col" id="pfofile-img-col"><img class="rounded-circle" id="profile-img-thread" src="../../media_store/user_store/images/<?php print($row['profil']);?>"><span id="username-post"><b><?php echo $row['username']?></b></span></div>
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