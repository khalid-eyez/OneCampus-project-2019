$('document').ready(function(){

//connecting to node server


$('#setimg').mouseover(function(){
$(this).css('border','solid 1px #ccc');

$('#setoptionsx').css({
    
    'display':'inline-Block',
    'position':'absolute',
    
    
});

$('#setimg').mouseleave(function(){

    $(this).css('border','none');
    $('#setoptionsx').css('display','none');

$('#setoptionsx').mouseover(function(){
    $(this).css('display','inline-Block');
})
$('#setoptionsx').css('display','none');
       

    $('#setoptionsx').mouseleave(function(){

        $(this).css({
    
            'display':'none'
            
            
            
        });

    })


   

   
})


});


$('#optionsx img').mouseover(function(){

    $(this).css({

        'background':'rgba(200,200,230,.3)',
        'cursor':'pointer',
    });

    $(this).animate({

        'width':'35px',
        'height':'35px'
    })
});

$('#optionsx img').mouseleave(function(){

    $(this).css({

        'background':'none',
        'border':'none'
    });
    $(this).animate({

        'width':'30px',
        'height':'30px'
    })
});

//loading the pages

$('#video').click(function(){

  $('#disc_areax').load('audiovisual.php');

});

$('#board').click(function(){

    $('#disc_areax').load('../discussion_room_1/index.php');
  
  });

  $('#chat').click(function(){

    $('#disc_areax').load('chat.php');
  
  })



})