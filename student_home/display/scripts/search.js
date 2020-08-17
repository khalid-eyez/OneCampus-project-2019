$('document').ready(function(){

    var all=$('#request *');
    
    for(var i=0;i<all.length;i++){
        
    all.eq(i).click(function(x){
    if(x.target.tagName=='P'){
    var id=$(this).attr('id');
    
    var clicked=$(this);
    console.log(x.target.tagName);
    
    $.get('partner_requests.php',{preq:id},function(data)
    {
    
    clicked.text(data);
    //console.log(data);
    //console.log(data);
    
    });
}
    
    });

    }
    
    });