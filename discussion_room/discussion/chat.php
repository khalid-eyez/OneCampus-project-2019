<!DOCTYPE html>
<html>
<head>
<title>chat room</title>
<link rel="stylesheet" type="text/css" href="styles/chat/text_chat.css"> 
<script src="../../ressources/jquery/jquery.js"></script>
<script src="lib/socketio/socket.io.js"></script>
<script src="scripts/chat/chat.js"></script>

</head>
<body bg-color="green">
<div id="chatbox">
<div id="messagedisplay">
<div id="messages"></div>
<div id="typo"></div>
</div>

<div id="typing">
<div id="typearea">
<img src="../../media_store/onecampus_store/onecampus_icons/attach.png" id="attach">
<input type="text" id="usermessage" placeholder="your message"></input>
<img src="../../media_store/onecampus_store/onecampus_icons/send.png" id="send">
</div>
</div>
</div>
</body>
</html>
