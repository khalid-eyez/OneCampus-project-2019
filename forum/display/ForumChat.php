
<script type="text/javascript">

$('document').ready(function(){

$('#Send-Icon').click(function(){
var id=$('#thread_id').val();
var st_id=$('#stud_id').val();
var comment=$('#Chat-TextArea').val();

$.post('../forum/lib/replies.php', { thread_id:id, stud_id:st_id,ChatArea:comment}, 
    function(returnedData){
        $('#replies').load('../forum/display/allreplies.php');
     });


})


})

</script>
<div id="replies">
<?php include_once("allreplies.php");?>
</div>
<div id="replform">
            <form action="../lib/Replies.php" method="post" name="reply-form" id="reply-form">
            <div class="row" id="InputText-Row" style="margin-left:20px">
                    <div class="col-8 col-sm-9 col-md-9 col-lg-9 col-xl-10" id="TextInputArea-Col">
                        <textarea id="Chat-TextArea" name="ChatArea" placeholder="Type Something" autofocus=""></textarea>
                    </div>
                        <!-- Hidden value-->
                        <input type="hidden" id="thread_id" name="thread_id" value="<?php echo $id;?>">
                        <!--<input type="hidden" id="stud_id" name="stud_id" value="<?php echo $id;?>">-->
                        <input type="hidden" id="stud_id" name="stud_id" value="<?php echo $_SESSION['userid'];?>">
                        
                    <div class="col" id="SendIcon-Col">
                        <i class="la la-send" id="Send-Icon"></i>
                    </div>
            </div>
            </form>
                    </div>
