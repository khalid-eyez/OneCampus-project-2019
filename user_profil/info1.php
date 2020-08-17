<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>student information</title>
<link rel="stylesheet" type="text/css" href="../user_profil/signup.css"/>
<script src="../student_home/display/scripts/jquery.js"></script>
<script src="profil.js"></script>
<script type="text/javascript">
$('document').ready(function(){
	
    $('#edit').click(function(){
        
    $('#info').load('../lib/update_info.php');
    
    });
    $('#go').click(function(){
    
      $('#user_profil').css('display','none');

    })
    $('#thisimage').click(function(){
        if($('#myimage').val()=="")
        {
        $('#myimage').click();
        }
        else
        {
        $('#uploader').click();
      
        }
        
    })
    $('#uploader').click(function(e){
        //e.preventDefault();
        var formData = new FormData(this);    
    alert(formdata);
    $('#uploadform').on('submit',function(z){
    //z.preventDefault();

    $.post("../user_profil/imageuploader.php", formData, function(data) {
    alert(data);
     });

    })



   
    })
     


    })
</script>
</head>
<body id="thebody">
<div id="registration">
    <div id="infoim">
<div id="images"><img src="../user_profil/thewinner.jpg" id="thisimage"/><div id="choose"></div></div>
<form action="../user_profil/imageuploader.php" method="POST" enctype="multipart/form-data" id="uploadform"><input type="file" name="uploaded_file" id="myimage"></input><input type="submit" value="uploadfile" id="uploader" name="uploader"></input><form>
<div id="go">close</div></div>
</div>
</div>

</div>
</body>
</html>
