<!DOCTYPE html>
<html>
<head>
<title>video conference</title>
<link rel="stylesheet" type="text/css" href="styles/audiovisual/video_room.css">
<script src="../../ressources/jquery/jquery.js"></script>
<script src="scripts/audiovisual/audiovisual.js"></script>
<script src="lib/socketio/socket.io.js"></script>
<script type="text/javascript">
$('document').ready(function(){
var serverchannel=io.connect('http://localhost:1000');
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
var sender=true;
if(sender){
var video=document.getElementById('gvideo');
const peerConnection=new RTCPeerConnection(stan);
navigator.mediaDevices.getUserMedia(constraints).then(function(stream){
  
    //localStream=stream;
    //video.srcObject=stream;
    peerConnection.addStream(stream);
    peerConnection.createOffer()
    .then(sdp=>peerConnection.setLocalDescription(sdp))
    .then(function(){
     serverchannel.emit('offer',peerConnection.localDescription);

    })
    .catch(function (error) {
      console.log(error);
    });
})
sender=false;
}
else{


//receiving offer
//const peerConnection=new RTCPeerConnection(stan);
const peerConnection=new RTCPeerConnection();
serverchannel.on('offer',function(data){

peerConnection.setRemoteDescription(data)
.then(()=>peerConnection.createAnswer())
.then(sdp=>peerConnection.setLocalDescription(sdp))
.then(function(){
    serverchannel.emit('answer',peerConnection.localDescription);
})
peerConnection.onaddstream=function(e){
 
 video.srcObject=e.stream;
 console.log(e.stream);
}
})




//receiving answer

serverchannel.on('answer',function(d){

    peerConnection.setRemoteDescription(d);
})
sender=true;
}
})


</script>
</head>
<body>
<div id="myscreen">
<video id="gvideo" autoplay="autoplay"></video>
<div id="optionsx">
        <img src="../../media_store/onecampus_store/onecampus_icons/vidcam.png" title="video conference" id="video"/> 
        <img src="../../media_store/onecampus_store/onecampus_icons/sharescr2.png" title="share screen" id="screen"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/mike.png" title="switch microphone" id="mike"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/audio1.png" title="switch audio" id="audio"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/exit.png" title="exit discussion" id="exit"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/close.png" title="close discussion" id="close"/>
        
</div>
</div>
</body>
</html>
