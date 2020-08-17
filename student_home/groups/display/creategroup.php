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
<script type="text/javascript">
$('#create_grp_form').on('submit',function(z){

z.preventDefault();
var gname=$('#grp_detail_page_name_text_input').val();
var gdesc=$('#grp_detail_page_descrption_text_input').val();
var id=$('#stud_id').val();
var form=$('#create_grp_form')[0];
var formdata=new FormData(form);

//sending data

//$.post('groups/lib/Groups.php',{group_name:gname,group_description:gdesc,stud_id:id},function(data)
//{

//});
$.ajax({
    url : "groups/lib/Groups.php",
    type: "POST",
    data : formdata,
    processData: false,
    contentType: false,
    }),
    z.preventDefault();
});

</script>
<form id="create_grp_form" method="post" action="./lib/Groups.php" enctype="multipart/form-data">
    <div class="row" id="grp_detail_page_image_row">
            <div class="col d-lg-flex justify-content-lg-center align-items-lg-center" id="grp_detail_page_img_col">
                <img class="rounded-circle" id="grp_detail_page_img" src="display/assets/images/none.png">
                    <i class="la la-camera" id="grp_detail_page_camera_icon" onclick="uploadIcon()"></i>
                    <input id="file_input" style="display:none" type="file" name="uploaded_file" accept="image/*"/>
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
                    <input class="btn btn-primary" style="margin-top: 5%; margin-right:7%" id="grp_detail_page_next_btn" name="submit" value="Create" type="submit" onclick="openGroupMembers()"/>
                    
                </div>
            </div>
    </div>
</form>
<?php
$getid="select * from groups where student_id=$group_creator order by group_id DESC limit 1";
$idreq=mysqli_query($conn,$getid) or die(mysli_error($conn));
while($gid=mysqli_fetch_array($idreq))
{
    $_SESSION['g_id']=$gid['group_id']+1;
    print($gid['group_id']);
}
?>