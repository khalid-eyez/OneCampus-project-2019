$(document).ready(function() {

    //$('#grp_detail_page_next_btn').click(function(e){
       //e.preventDefault();
        
   // })

    $('#row_grp_list').hover(function(){

    $('#row_grp_list').css('background-color','lightblue');

    });
    //open new GroupList Page
    $("#row-5-main-left-col").click(function() {
        $("#main").load("groups/display/grouplist.php");
    });

    //open new GroupDetail Page
    openGroupDetail = function(index) {
        var group_id = $('#row_grp_list span').get(index).id;
        var mylink = "groups/display/groupdetail.php?groupid=" + group_id + "";
        $("#group_right_col").load(mylink);
        $('#alldiscs').load('groups/display/alldisc.php');
        console.log(group_id);

    };

    //Open creategroup Page
    openGroupCreate = function() {
        $("#group_right_col").load("groups/display/creategroup.php");
    };

    //Open groupmembers Page
    addGroupMembers = function(index1) {
        var group_id1 = $('.variable_group_id1').get(index1).id;
        var mylink1 = "groups/display/groupmembers.php?groupid=" + group_id1 + "";
        $("#group_right_col").load(mylink1);
        console.log(group_id1);


    };
    //When Add Member Submit button clicked
    addMembers = function() {
        $("#add_member_form").submit(function() {
            //Open Add Members Page
            $("#main").load("groups/display/grouplist.php");
        });
    }

    //ON CLICK CAMERA ICON TO UPLOAD IMAGE
    $("group_icon_img").click(function() {
        console.log("Clickable");

    });

    //Members filter Search in CREATE GROUP 
    searchMember = function() {
        createMembers();
    };

    createMembers = function() {
        // Declare variables
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('grp_member_search_text_input');
        filter = input.value.toUpperCase();
        li = document.getElementsByClassName('user_li');
        //ul = document.getElementById("username_list");
        //li = ul.getElementsByTagName('li');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }

    };

    //Upload Group Image
    uploadIcon = function() {
        $('#file_input').click();
    };

    //Submit Group Detail form
    openGroupMembers = function() {
        $("#create_grp_form").submit(function() {
            //Open Add Members Page
            $("#group_right_col").load("groups/display/groupmembers.php");
        });
    };

    //Submit Created Thread
    //$("#reply-form").on("#submit", function(e) {
    $("#SubmitButton-Modal").click(function() {

        //e.preventDefault();
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
    });



    //Submit Reply
    $("#NewThread_Form").on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {
                $('#NewTopic-Modal .modal-header .modal-title').html("Result");
                $('#NewTopic-Modal .modal-body').html(data);
                $("#NewThread_Form").remove();
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
        e.preventDefault();
    });

});