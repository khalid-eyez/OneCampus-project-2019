$('document').ready(function(){
var id;
var clicked;
var start;
var end;
var title;
var all=$('#drequest *');
for(var i=0;i<all.length;i++){
    
all.eq(i).click(function(){
id=$(this).attr('id');
clicked=$(this);
//console.log(id);
$('#repop').css('display','block');
});
}
$('#reqform').on('submit',function(d){
d.preventDefault();
if($('#disctitle').val()!=""){title=$('#disctitle').val();}else{title="untitled";}
var stime=$('#start').val();
var etime=$('#end').val();
var sdate=$('#sdate').val();
console.log(stime);

//sending data

$.get('disc_request.php',{sid:id,start:stime,end:etime,dtitle:title,stdate:sdate},function(data)
{

clicked.text(data);
$('#repop').css('display','none');

});

})

})









