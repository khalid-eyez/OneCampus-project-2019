<?php
//GET ID FROM URL


//KHALIDI PUT SESSION OF ONLINE USER HERE
// Starting session
session_start();

$group_creator = $_SESSION["userid"];


include '../modal/DbConfig.php';


//including the database connection file
 
$connection = new DbConfig();
$conn = $connection->connect();

$group_id = $_GET['groupid'];
$student_id =$_SESSION["userid"];
$query_for_grp_detail = "SELECT groups.group_id, groups.group_name, groups.group_icon, groups.group_desc FROM groups where groups.group_id = $group_id ";
$result_for_grp_detail  = mysqli_query($conn, $query_for_grp_detail) or die(mysqli_error($conn));
$query_for_grp_members = "SELECT student_bio.firstname, student_bio.profil FROM student_bio, group_member, groups where student_bio.student_id = group_member.student_id AND group_member.group_id = groups.group_id AND groups.group_id=$group_id";
$result_for_grp_members  = mysqli_query($conn, $query_for_grp_members) or die(mysqli_error($conn));
?>
<?php
    if(!$result_for_grp_detail)
    {
        echo 'server error.';
    }
    else
    {
        if(mysqli_num_rows($result_for_grp_detail) == 0)
        {
            echo 'no group found';
        }
        else
        {    
            while($row_for_grp_detail = mysqli_fetch_assoc($result_for_grp_detail))
            {
                ?>
                <div class="row" id="group_header_row">
                        <div class="col-sm-1 col-md-2 col-lg-3" id="grp_detail_icon_col"><img class="rounded-circle" id="grp_detail_icon_img" src="display/assets/images/<?php echo $row_for_grp_detail['group_icon'] ?>" onerror="this.src='display/assets/images/none.png'"></div>
                        <div class="col-sm-9 col-md-9 col-lg-7" id="grp_detail_desc_col">
                            <p id="grp_detail_name_paragraph"><?php echo $row_for_grp_detail['group_name'];?></p>
                            <p id="grp_detail_desc_paragraph"><?php echo $row_for_grp_detail['group_desc'];?></p>
                        </div>
                        <div class="col-sm-9 col-md-9 col-lg-1 col-xl-1" id="grp_detail_desc_col">
                            <span class="variable_group_id1" id="<?php echo $row_for_grp_detail['group_id']; ?>"></span>
                            <div class="dropdown show" id="grp_detail_btn"><button class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="true" type="button">&nbsp;<i class="fas fa-ellipsis-v" id="grp_detail_btn_icon"></i></button>
                                <div class="dropdown-menu show" role="menu"><a class="dropdown-item" role="presentation" id="grp_detail_menu_add_user" href="#" onclick="addGroupMembers($(this).index())">Add user</a><a class="dropdown-item"
                                        role="presentation" id="grp_detail_menu_create_session" href="#">Create Session</a></div>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                    
                    <div class="row" id="group_members_row">
                        <div class="col d-xl-flex align-items-xl-center" id="group_members_col">

                        <?php
                            if(!$result_for_grp_members)
                            {
                                echo 'The Members could not be displayed, please try again later.';
                            }
                            else
                            {
                                if(mysqli_num_rows($result_for_grp_members) == 0)
                                {
                                    echo 'You dont have Members yet. Request them first.';
                                }
                                else
                                {    
                                    while($row_for_grp_members = mysqli_fetch_assoc($result_for_grp_members))
                                    {
                                        ?>
                                        <div id="group_members_div">
                                            <div class="row" id="group_members_div_row">
                                                <div class="col" id="group_members_img_col"><img id="group_members_img"src="../media_store/user_store/images/<?php echo $row_for_grp_members['profil'] ?>" onerror="this.src='display/assets/images/user_none.png'"></div>
                                                <div class="col" id="group_members_name">
                                                    <p id="group_members_name"><?php echo $row_for_grp_members['firstname'];?></p>
                                                </div>
                                            </div>
                                            <?php include("groups/display/disc_request_form.php");?>
                                        </div>
                                        <?php
                                        }
                                    }
                                }
                            ?>
                            
                        </div>
                     <div id="alldics"><?php include("groups/display/alldisc.php");?></div>
                    </div>
                    <?php
            
            }
        }
    }
?>