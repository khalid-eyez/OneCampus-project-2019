<!-- Start: Grouplist Page -->
<?php

//KHALIDI PUT SESSION OF ONLINE USER HERE
// Starting session
session_start();
$group_creator = $_SESSION["userid"];


include '../modal/DbConfig.php';


//including the database connection file
 
$connection = new DbConfig();
$conn = $connection->connect();


$student_id = $_SESSION["userid"];
$query_for_grp_list = "SELECT student_account.username, groups.group_id, groups.group_name, groups.group_desc, groups.group_icon FROM student_account, groups WHERE student_account.student_id = groups.student_id AND student_account.student_id=$student_id order by groups.group_id DESC";
$result_for_grp_list  = mysqli_query($conn, $query_for_grp_list);

?>

<div class="container" id="grp_container" style="background-color:white">
<i class="fa fa-plus-circle border rounded-circle" style="margin-left:30%;margin-top:2%;font-size:30px;color:blue;cursor:pointer" title="new group" onclick="openGroupCreate()"></i>
    <div class="row" id="group_row">
        <div class="col-sm-5 col-md-4 col-lg-4" id="group_left_col">
        
            <!--Group List -->  
            <?php
                if(!$result_for_grp_list)
                {
                    echo 'The Replies could not be displayed, please try again later.';
                }
                else
                {
                    if(mysqli_num_rows($result_for_grp_list) == 0)
                    {
                        echo 'You dont have partner yet. Request them first.';
                    }
                    else
                    {    
                        while($row_for_for_grp_list = mysqli_fetch_assoc($result_for_grp_list))
                        {
                            ?>
                            <div class="row" id="row_grp_list" style="cursor:pointer;" onclick="openGroupDetail($(this).index())">
                                <div class="col-4 col-sm-3 col-md-4 col-lg-4 col-xl-4" id="col_grp_list_img"><img class="rounded-circle" id="img_grp_list" src="display/assets/images/<?php echo $row_for_for_grp_list['group_icon'] ?>" onerror="this.src='display/assets/images/none.png'"></div>
                                <div class="col" id="col_grp_list_title">
                                    <p id="paragraph_grp_name"><?php echo $row_for_for_grp_list['group_name'] ?></p>
                                    <p id="paragraph_grp_creator">Created by <?php echo $row_for_for_grp_list['username'] ?></p>
                                    <span class="variable_group_id" id="<?php echo $row_for_for_grp_list['group_id']; ?>"></span>
                                    
                                </div>
                            </div>
                
                            <?php
                        }
                    }
                }
            ?>
       
        </div>
        <div class="col" id="group_right_col">
            <div class="d-lg-flex justify-content-lg-center align-items-lg-start" id="no_group_div"><i class="fas fa-users" id="no_grp_icon"></i>
                <p id="no_group_paragraph">Welcome To OneCampus Group Discussion</p>
                
            </div>
            
        </div>
       
    </div>
</div>