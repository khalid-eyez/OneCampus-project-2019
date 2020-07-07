$('document').ready(function(){

var all=$('#drequest *');

for(var i=0;i<all.length;i++){
    
all.eq(i).click(function(){
var id=$(this).attr('id');
var clicked=$(this);
//console.log(id);

$.get('disc_request.php',{sid:id},function(data)
{

clicked.text(data);
//console.log(data);

});


});
}













})