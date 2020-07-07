$(document).ready(function () {
    
    
    //Open Forum List from the Side bar Forum Button
    $("#row-6-main-left-col").click(function(){
        $("#main").load("../forum/Display/ForumList.php");
        $("#page-name").text('forum');
    });

    //Open Forum List from the Side bar Forum Button
    $("#replies-buttton").click(function(){
        $("#content").load("http://localhost/onecampus/Display/ForumChat.php");
    });
    
    

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