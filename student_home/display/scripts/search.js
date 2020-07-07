$('document').ready(function(){

    var all=$('#request *');
    
    for(var i=0;i<all.length;i++){
        
    all.eq(i).click(function(){
    var id=$(this).attr('id');
    console.log(id);
    var clicked=$(this);
    //console.log(id);
    
    $.get('partner_requests.php',{preq:id},function(data)
    {
    
    clicked.text(data);
    console.log(data);
    //console.log(data);
    
    });
    
    
    });
    }
    
    });