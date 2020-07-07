$('document').ready(function(){
var serverchannel=io.connect('http://localhost:1000');
var params = new window.URLSearchParams(window.location.search);
var room=params.get('disc');
var username=params.get('username');
var userid=params.get('userid');
//var userdata=params.get('data');
//console.log(userdata);
///serverchannel.emit('mydetails',userdata);
console.log(userid);
var data={
room:"",
senderid:"",
username:"",
message:""
}
data.room=room;
var messagearea=$('#usermessage');
console.log( messagearea.val());

    serverchannel.emit('roomcreation',data);
   
    var myid; 
    $.get('getmyid.php',function(data){

        myid=data;
        //console.log(data);
    });
   
$('#send').click(function(){

   

if(messagearea!="")
{
    data.message=messagearea.val();
    data.senderid=userid;
    data.sendername=username;
    //console.log(data.message);
   
    
    serverchannel.emit('new_message',data);
}

});
var count=0;
serverchannel.on('new_message',getnewmessage);
function getnewmessage(dataz)
{
    
    count++;
    $('#messages').append('<div id="messagesect"><div id="newmessage'+count+'">'+dataz.message+' '+dataz.sendername+'</div></div>');
    console.log(dataz.message);
    
    console.log("sender"+dataz.senderid+"receiver"+myid);
   
    
    if(dataz.senderid==myid)
    {
        $('#newmessage'+count).css({
            marginLeft:'60%',

        });
    }
    else
    {
        $('#newmessage'+count).css({
            marginLeft:'6%',

        });
    }
}


})