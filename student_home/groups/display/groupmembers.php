<!-- Start: Add Members Page -->
<?php

//KHALIDI PUT SESSION OF ONLINE USER HERE
// Starting session
session_start();
$group_creator = $_SESSION["userid"];
include '../modal/DbConfig.php';
//including the database connection file
 
$connection = new DbConfig();
$conn = $connection->connect();
if(isset($_GET['groupid'])){$group_id=$_GET['groupid'];}
else{$group_id=$_SESSION['g_id'];}



$query_for_member_id = "select student_bio.student_id,student_bio.profil, student_bio.firstname, student_bio.lastname from stud_partner,student_bio where (student_bio.student_id=stud_partner.student_id or student_bio.student_id=stud_partner.requester_id) && (stud_partner.student_id=$group_creator or stud_partner.requester_id=$group_creator) && stud_partner.status='accepted';";
$result_for_member_id  = mysqli_query($conn, $query_for_member_id) or die(mysqli_error($conn));

?>
<script type="text/javascript">
$('#add_member_form').on('submit',function(z){
z.preventDefault();
var form=$('#add_member_form')[0];
console.log(form);

var formdata=new FormData(form);
console.log(formdata);
//sending data

//$.post('groups/lib/AddGroupMembers.php',formdata,function(data)
//{
 //console.log(data);
//});
$.ajax({
    url : "groups/lib/AddGroupMembers.php",
    type: "POST",
    data : formdata,
    processData: false,
    contentType: false,
    }),
    z.preventDefault();
});

</script>
<!-- Start -->
<div class="row" id="grp_detail_page_num_row">
    </div>
    <div class="row" id="grp_detail_page_name_row">
        <div class="col d-lg-flex justify-content-lg-center justify-content-xl-start align-items-xl-center" id="grp_detail_page_name_col">
            <p id="grp_detail_page_name_pararaph">Add Group Members</p>
        </div>
    </div>
    <div class="row" id="grp_detail_page_name_input_row">
        <div class="col d-lg-flex justify-content-lg-center justify-content-xl-start align-items-xl-center" id="grp_detail_page_name_col">
            <i class="fa fa-search" id="member_search_icon"></i>
            <input type="text" id="grp_member_search_text_input" name="grp_member" placeholder="Search......." required="" autofocus="" onkeyup="searchMember()">
        </div>
    </div>
    <form id="add_member_form" method="post" action="" enctype="multipart/form-data">
        <section id="grp_member_list_section">
            <?php
                if(!$result_for_member_id)
                {
                    echo 'The Replies could not be displayed, please try again later.';
                }
                else
                {
                    if(mysqli_num_rows($result_for_member_id) == 0)
                    {
                        echo 'You dont have partner yet. Request them first.';
                    }
                    else
                    {    
                        while($row_for_member_id = mysqli_fetch_assoc($result_for_member_id))
                        {
                            if($row_for_member_id['student_id']!=$group_creator){
                            ?>
                                <ul id="username_list" onload="createMember()">
                                    <li class="user_li" id="username_li">
                                        <img class="rounded-circle" id="username_list_image" src="../media_store/user_store/images/<?php echo $row_for_member_id['profil']; ?>" />
                                        <a href="#"><?php echo $row_for_member_id['firstname'];?></a>
                                        <input id="username_list_checkbox" type="checkbox" name="gmember_id[]" value="<?php echo $row_for_member_id['student_id'];?>">
                                    </li>
                                </ul>
                            <?php
                        }
                        }
                    }
                }
            ?>
        </section>
        <div class="row d-xl-flex" id="grp_detail_page_submit_btn_row">
            <div class="col d-xl-flex justify-content-xl-end" id="grp_detail_page_submit_btn_col">
                <!-- GROUP ID -->
                <input id="group_id" name="group_id" type="hidden" value="<?php echo $group_id ?>">
                <input class="btn btn-primary" id="grp_member_submit_btn" type="submit" value="Add" onclick="addMembers()"/>
            </div>
        </div>
    </form>
</div>
<!--End -->