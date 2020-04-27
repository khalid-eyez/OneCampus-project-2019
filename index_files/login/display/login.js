$(document).ready(function(){
var pass=$('#password');
var username=$('#username');
var submitb=$('#submit');
var formobj=$('#loginform');

//password field focus handle
pass.on({
    focus:function(){
    $(this).parent().css('backgroundColor','#006aff');  
    $(this).css('borderColor','blue');
    },

    focusout:function(){
    $(this).parent().css('backgroundColor','white');
    $(this).css('borderColor','white');  
    }
});
//username field focus handle
username.on({
    focus:function(){
    $(this).parent().css('backgroundColor','#006aff');  
    $(this).css('borderColor','blue');
    },

    focusout:function(){
    $(this).parent().css('backgroundColor','white');
    $(this).css('borderColor','white');
        
    }
});

//submit button mouse hover
submitb.on(
    {
        mouseenter:function()
        {
            $(this).css('backgroundColor','#0055ff');
            $(this).css('color','#ffffff');
        },
        mouseleave:function()
        {
            $(this).css('backgroundColor','');
            $(this).css('color','#0000ff');
        },
    }
    );


//on submit input checking

   formobj.on(
       {
          
           submit:function(t)
           {
            
            //if the fields are not empty, then we call ajax for sending the data
           if(username.val().length>1 && pass.val()!="")
           {
            t.preventDefault();
               var usernamedata=username.val();
               var passdata=pass.val();
               $.ajax({
                  url:'index_files/login/data_control/login.php',
                  type:'POST',
                  data:'username='+usernamedata+'&password='+passdata,
                  datatype:'text',
                  success:function(data){
                   if(data=="false"){
                   
                   $('#text').html('invalid username or password');
                   $('#response').css('display','block');
                   }
                   else
                   {
                       window.location.replace("student_home");
                   }
                  }


               }
               )
           }
            
            if(username.val().length==""){
                t.preventDefault();
                username.css('borderColor','red');
                username.css('color','red');
                username.attr('placeholder','please type your username here');
                username.keydown(
                    function(){
                        $(this).css('color','blue');
                    }
                )
             }
              
            //for the username input

            if(pass.val()==""){
                t.preventDefault();
                pass.css('borderColor','red');
                pass.css('color','red');
                pass.attr('placeholder','please type your password here');
                pass.keydown(
                    function(){
                        $(this).css('color','blue');
                    }
                )
             }

           


            
          
           }
       }
   )   



//try again button
$('#tryagain').on(
    {
        click:function()
        {
            $(this).parent().css('display','none');
        }
    })


});

















