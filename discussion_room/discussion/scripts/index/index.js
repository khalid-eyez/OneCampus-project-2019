$('document').ready(function(){


//handling the chat messages
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
    $.get('getmyid.php',function(data){

        myid=data;
        //console.log(data);
    });
 //var send=document.getElementById('send');

 var messagearea=$('#usermessage');
 $('#usermessage').focus(function(){
 $('body').keyup(function(e){
 
var key=e.keyCode || e.which;
if(key==13)
{
  if(messagearea!="")
  {
      data.message=messagearea.val();
      data.senderid=userid;
      data.sendername=username;
      //console.log(data.message);
     
      serverchannel.emit('new_message',data);
      messagearea.val("");
  } 
}
 });
 });
$('#send').click(function(){

console.log('clicked');

if(messagearea.val()!="")
{
    data.message=messagearea.val();
    data.senderid=userid;
    data.sendername=username;
    //console.log(data.message);
   
    
    serverchannel.emit('new_message',data);
    messagearea.val("");
}

});
var count=0;
serverchannel.on('new_message',getnewmessage);
function getnewmessage(dataz)
{
    
    count++;
    $('#messages').append('<div id="messagesect"><div id="newmessage'+count+'" class="new"><div id="headbar"><div id="userimg"><img src="../../media_store/user_store/images/img2.jpg" /></div><div id="senderr">~'+dataz.sendername+'</div></div><div id="textm">'+dataz.message+'</div></div></div>');
    //console.log(dataz.message);
    
    //console.log("sender"+dataz.senderid+"receiver"+userid);
   
  var scrol=$("#messages");
  scrol.scrollBottom =scrol.scrollHeight;
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

//handling the video conference
//................................................

var source="video";
var stan={
  'iceServers': [
    {
      'urls': 'stun:stun.l.google.com:19302'
    },
    {
      'urls': 'turn:192.158.29.39:3478?transport=udp',
      'credential': 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
      'username': '28224511:1379330808'
    },
    {
      'urls': 'turn:192.158.29.39:3478?transport=tcp',
      'credential': 'JZEOEt2V3Qb0y27GRntt2u2PAYA=',
      'username': '28224511:1379330808'
    }
  ]
};
var constraints={
    video:true,
    audio:true
}

const peerConnection=new RTCPeerConnection(stan);

var media=navigator.mediaDevices;
if(navigator.mediaDevices.getUserMedia){
navigator.mediaDevices.getUserMedia(constraints).then(function(stream){
  var video=document.getElementById('gvideo');
  console.log(video)
    localStream=stream;
    video.srcObject=stream;
    peerConnection.addStream(stream);
    peerConnection.createOffer()
    .then(sdp=>peerConnection.setLocalDescription(sdp))
    .then(function(){
     serverchannel.emit('offer',peerConnection.localDescription);

    })
    .catch(function (error) {
      console.log(error);
    });
});
}
   peerConnection.onaddatream=function(e){
    
    video.srcObject=e.stream;
}


//receiving offer
//const peerConnection=new RTCPeerConnection(stan);

serverchannel.on('offer',function(data){

peerConnection.setRemoteDescription(data)
.then(()=>peerConnection.createAnswer())
.then(sdp=>peerConnection.setLocalDescription(sdp))
.then(function(){
    serverchannel.emit('answer',peerConnection.localDescription);
});
});



//receiving answer

serverchannel.on('answer',function(d){

    peerConnection.setRemoteDescription(d);
})




})