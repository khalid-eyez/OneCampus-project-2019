$('document').ready(function(){
var serverchannel=io.connect('http://172.16.52.47:1000');
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

    serverchannel.emit('roomcreation',data);
    var myid; 
    $.get('getmyid.php',function(data){

        myid=data;
        //console.log(data);
    });
var messagearea=$('#usermessage');
$('#send').click(function(){

console.log('clicked');

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
    
    console.log("sender"+dataz.senderid+"receiver"+userid);
   
    
    if(dataz.senderid==userid)
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