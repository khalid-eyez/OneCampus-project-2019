<DOCTYPE html>
<html>
<head>
<title>discussion</title>
<link rel="stylesheet" type="text/css" href="../discussion_room_1/styles/index.css"/>
<script  src="lib/p5/p5.js"></script>
<script  src="lib/p5/addons/p5.sound.min.js"></script>
<script  src="scripts/smartboard/tools.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="lib/socketio/socket.io.js"></script>
</head>
<body>

<!--the whiteboard starts -->
<div id="board">
    
    <div id="canvasarea"></div>
  

    <div id="toolbar">
        <img src="../../media_store/onecampus_store/onecampus_icons/markerpen.png" onclick="updateshape('line')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/blueicon1.png" title="blue stroke" onclick="update_stroke_color('blue')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/greenicon.png" title="green stroke" onclick="update_stroke_color('green')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/redicon2.png" title="red stroke" onclick="update_stroke_color('red')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/yellow.png" title="yellow stroke" onclick="update_stroke_color('yellow')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/whitecircle.png" title="white stroke" onclick="update_stroke_color('white')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/blueicon1.png" title="blue fill" onclick="update_fill('blue')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/greenicon.png" title="green fill" onclick="update_fill('green')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/redicon2.png" title="red fill" onclick="update_fill('red')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/yellow.jpg" title="yellow fill" onclick="update_fill('yellow')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/whitecircle.png" title="white fill" onclick="update_fill('white')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/whitefill.png" />
        <img src="../../media_store/onecampus_store/onecampus_icons/size.png"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/text.png"/>
        
        <img src="../../media_store/onecampus_store/onecampus_icons/line.png" onclick="updateshape('sline')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/rect.png"  onclick="updateshape('recta')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/bluetriangle3.jpg" onclick="updateshape('tri')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/oval2.png" title="oval" onclick="updateshape('ellipse')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/whitecircle2.png" title="circle"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/eraser.png" title="erase"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/clearall.png" title="clear all" onclick="clearall()"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/whitebg.jpg" onclick="update_canvas_bg('white')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/blackbg.png" onclick="update_canvas_bg('black')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/redicon.png"/ title="red background" onclick="update_canvas_bg('red')">
        <img src="../../media_store/onecampus_store/onecampus_icons/greenicon2.png" title="green background" onclick="update_canvas_bg('green')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/blueicon2.png" title="blue background" onclick="update_canvas_bg('blue')"/>
        <img src="../../media_store/onecampus_store/onecampus_icons/gridicon.png" title="grid background" onclick="update_canvas_bg('grid')"/>
  
    </div>
</div>

<!--end of board -->
<!--discussion room -->

</div>

</body>
</html>
