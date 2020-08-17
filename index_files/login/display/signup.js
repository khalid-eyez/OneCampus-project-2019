
$('document').ready(function(){
  var pass=$('#password');
  var username=$('#username');
  var submitb=$('#submit');
  var formobj=$('#regform');
  var fname=$('#fname');
  var lname=$('#lname');
  var gender=$('#gender');
  var date=$('#date');
  var country=$('#countrys');
  var region=$('#regions');
  var pass1=$('#password');
  var pass2=$('#confirm_pass');
  var email=$('#email');
  var univ=$('#univ');
  var college=$('#college');
  var degree=$('degree');
  var yos=$('#yos');
 
  
      
    
     

  var send=false;

$('#regform').on('submit',function(f)
  {
//checking the emptyness
//$('#form_submit_btn').click(function(){
  
  $('input[type="text"],input[type="password"]').each(function() {
       
      if(!$(this).val()){
      f.preventDefault();
      send=false;
      //console.log($(this).attr('id'));
      var atr=$(this).attr('placeholder');
      var res=atr+' must be filled in';
      $(this).attr('placeholder',res);
      $(this).css({

       'borderColor':'red',
       'color':'red'

      });
      $(this).focus(function(){

      $(this).css({
      'borderColor':'white',
      'color':'black'

      });


      });
      }
     

//validating inputs
//username can contain letters and numbers 
//password must be less or equal to 6 and must match with its confirmation
//an email must have an email format, but in the future we must test if it is a valid email too

  else if($(this).attr('id')=='email')//start validating the email
  {
    f.preventDefault();
    
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var email=$(this).val();
    if(!emailReg.test(email))
    {
      send=false;
      $(this).val("");
      $(this).attr('placeholder','invalid email');
      $(this).css({
      'borderColor':'red',
      'color':'red'
      

      });
      $(this).focus(function(){

        $(this).css({
        'borderColor':'white',
        'color':'black'
  
        });
  
  
        });
    }else{send=true;}
    

    
  }
    //testing the password length, in the future we must also test the strength of a password
  else if($(this).attr('id')=='password')
  {
    f.preventDefault();
     var pass=$(this).val();

     if(pass.length!=6)
     {
      send=false;
      $(this).val(""); 
      $(this).attr('placeholder','6 characters only');
      $(this).css({
      'borderColor':'red',
      'color':'red'


      });


      $(this).focus(function(){

        $(this).css({
        'borderColor':'white',
        'color':'black'
  
        });
      });

     }
     else{

      var confirm=$('#confirm_pass').val();
      if(pass!==confirm)
      {
        send=false;
        $(this).val("");
        $(this).attr('placeholder','both passwords must match');
        $(this).css({
        'borderColor':'red',
        'color':'red'
  
  
        });
        $(this).focus(function(){

          $(this).css({
          'borderColor':'white',
          'color':'black'
    
          });
        });
      }
      else{ //now check the password strength

        var letterNumber = /^[0-9a-zA-Z]+$/; //now we check if it contains letters and numbers, the future can include some alpha num charactors as well

        if(!pass.match(letterNumber))
        {
        send=false;
        $(this).val("");
        $(this).attr('placeholder','must contain number and letters');
        $(this).css({
        'borderColor':'red',
        'color':'red'
  
  
        });
        $(this).focus(function(){

          $(this).css({
          'borderColor':'white',
          'color':'black'
    
          });
        });
        //the confirmation field
        var confirmx=$('#confirm_pass')
        confirmx.val("");
        confirmx.attr('placeholder','must contain number and letters');
        confirmx.css({
        'borderColor':'red',
        'color':'red'
  
  
        });
        confirmx.focus(function(){

          $(this).css({
          'borderColor':'white',
          'color':'black'
    
          });
        });
        }else{ send=true;}


      }


     }







  }
});
if(send==true){
//now sending the data to the server
var data=$('#regform').serializeArray();
//console.log(data);
//var submit=JSON.stringify(data);
//console.log(JSON.parse(submit));
$.post("registration.php",{submit:data})
.done(function(response){
  //console.log(response);
  $('#text').text(response);
  $('#response').css('display','block');
  $('#registration').css({
    'backgroundColor':'rgba(0,0,255,.7)',
  })
  $('#bluearea').css({
    'backgroundColor':'rgba(0,0,255, .7)',
  })
  //$('#myform').fadeOut('slow',function(){
  //$('#correct').html(response);
  //$('#correct').fadeIn('slow');
})
.fail(function(xhr,status,error){

  console.log(error);

})
}














      });
    })







  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  

  











