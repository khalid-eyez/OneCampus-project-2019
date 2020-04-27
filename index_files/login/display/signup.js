$('document').ready(function()
{

//clicking next on the student bio, the student school info appears

$('#bionext').click(function()

{
  
  $('#studentbio').animate({marginLeft:'100%'},
  {
      duration:500,
      queue:false
  });
  


  $('#studentschool').animate(
    {
      marginLeft:'25%'
    },
  {
      duration:200,
      queue:false
  });
    $('#studentbio').fadeOut({
        duration:800,
        queue:false});
        $('#studentschool').fadeIn(
            {
                duration:2000,
            
            }
        );
 
  




});


//clicking the student school info next button, the student account info appears


$('#schoolnext').click(function()

{
  
  $('#studentschool').animate({marginLeft:'100%'},
  {
      duration:500,
      queue:false
  });
  


  $('#studentaccount').animate(
      {
      marginLeft:'25%'
    },
  {
      duration:200,
      queue:false
  });
    $('#studentschool').fadeOut({
        duration:800,
        queue:false});
        $('#studentaccount').fadeIn(
            {
                duration:1000,
            
            }
        );
 
  




});







}

)