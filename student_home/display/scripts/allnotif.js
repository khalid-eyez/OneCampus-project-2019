$('document').ready(function(){

    var all=$('#nrequest *');
    
    for(var i=0;i<all.length;i++){
        
    all.eq(i).click(function(){
    var id=$(this).attr('id');
    var clicked=$(this);
    //console.log(id);
    
    $.get('../../partner_requests.php',{pres:id},function(data)
    {
    
    clicked.text(data);
    //console.log(data);
    
    });
    
    
    });
    }
    
    });