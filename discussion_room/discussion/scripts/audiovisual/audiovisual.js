$('document').ready(function(){

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
        
                'width':'7%',
                'height':'60%'
            })
        });
        
        $('#optionsx img').mouseleave(function(){
        
            $(this).css({
        
                'background':'none',
                'border':'none'
            });
            $(this).animate({
        
                'width':'5%',
                'height':'50%'
            })
        });




})