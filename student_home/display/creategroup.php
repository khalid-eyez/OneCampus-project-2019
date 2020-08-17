<!-- Start: Create Group Page -->
<?php

//KHALIDI PUT SESSION OF ONLINE USER HERE
// Starting session
session_start();
$group_creator = $_SESSION["userid"];


include '../modal/DbConfig.php';


//including the database connection file
 
$connection = new DbConfig();
$conn = $connection->connect();

$query_for_member_id = "SELECT stud_partner.requester_id, student_account.username FROM `stud_partner`, `student_account` WHERE stud_partner.requester_id = student_account.student_id AND stud_partner.student_id=$group_creator";
$result_for_member_id  = mysqli_query($conn, $query_for_member_id);

?>
<form id="create_grp_form" method="post" action="./lib/Groups.php" enctype="multipart/form-data">
    <div class="row" id="grp_detail_page_image_row">
            <div class="col d-lg-flex justify-content-lg-center align-items-lg-center" id="grp_detail_page_img_col">
                <img class="rounded-circle" id="grp_detail_page_img" src="display/assets/images/none.png">
                    <i class="la la-camera" id="grp_detail_page_camera_icon" onclick="uploadIcon()"></i>
                    <input id="file_input" style="display:none;" type="file" name="uploaded_file" accept="image/*"/>
            </div>
            </div>
            <div class="row" id="grp_detail_page_name_row">
                <div class="col d-lg-flex justify-content-lg-center justify-content-xl-start align-items-xl-center" id="grp_detail_page_name_col">
                    <p id="grp_detail_page_name_pararaph">Group Name</p>
                </div>
            </div>
            <div class="row" id="grp_detail_page_name_input_row">
                <div class="col d-lg-flex justify-content-lg-center justify-content-xl-start align-items-xl-center" id="grp_detail_page_name_col">
                    <input type="text" id="grp_detail_page_name_text_input" name="group_name" placeholder="Enter group name" required="" maxlength="25" autofocus="">
                </div>
            </div>
            <div class="row" id="grp_detail_page_name_row">
                <div class="col d-lg-flex justify-content-lg-center justify-content-xl-start align-items-xl-center" id="grp_detail_page_name_col">
                    <p id="grp_detail_page_name_pararaph">Group Description</p>
                </div>
            </div>
            <div class="row" id="grp_detail_page_name_input_row">
                <div class="col d-lg-flex justify-content-lg-center justify-content-xl-start align-items-xl-center" id="grp_detail_page_name_col">
                    <input type="text" id="grp_detail_page_descrption_text_input" name="group_description" placeholder="Enter group description" required="" maxlength="40">
                </div>
            </div>
            <div class="row" id="grp_detail_page_btn_next_row">
                <div class="col d-lg-flex justify-content-lg-center justify-content-xl-end align-items-xl-center" id="grp_detail_page_name_col">
                    <input type="hidden" id="stud_id" name="stud_id" value="<?php echo $group_creator;?>">
                    <input class="btn btn-primary" id="grp_detail_page_next_btn" name="submit" value="Next" type="submit" onclick="openGroupMembers()"/>
                    
                </div>
            </div>
    </div>
</form>