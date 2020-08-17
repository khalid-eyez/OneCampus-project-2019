
let canvasgraph;
var onecampus_server_2;
let bag;
let starty=0;
let startx=0;
//initilizing the canvas and all shapes data
var canvassetup={
background:"black",
current_shape:"line",
action:"draw",
strokesize:1,
strokecolor:"white",
fillcolor:""
};
var linedata={
strokesize:3,
strokecolor:"white",
mousex:0,
mousey:0,
pmousex:0,
pmousey:0
};
var textdata={
  strokesize:1,
  strokecolor:"white",
  mousex:0,
  mousey:0
};
var rectdata={
  strokesize:1,
  strokecolor:"white",
  fillcolor:"white",
  mousex:0,
  mousey:0,
  mx:0,
  my:0
};
var tridata={
  strokesize:1,
  strokecolor:"white",
  fillcolor:"white",
  mousex:0,
  mousey:0,
  startx:0,
  starty:0
};
var slinedata={
  strokesize:1,
  strokecolor:"white",
  mousex:0,
  mousey:0,
  startx:0,
  starty:0
};
var ellipsedata={
  strokesize:1,
  strokecolor:"white",
  fillcolor:"white",
  mousex:0,
  mousey:0
};
//updating the canvas shapes and the shapes controls
function updateshape(shape){canvassetup.current_shape=shape;}
function update_canvas_bg(bg){canvassetup.background=bg; setup_canvas_bg(canvassetup.background);}
function update_action(control){canvassetup.action=control;}
function update_stroke_color(thecolor){canvassetup.strokecolor=thecolor;}
//functionn update_strokesize(asize){canvassetup.strokesize=asize;}
function  update_strokecolor(acolor){canvassetup.strokecolor=acolor;}
function update_fill(color){canvassetup.fillcolor=color;}

function setup_strokecolor(color)
{
  switch(color)
  {
    case 'red':
      canvasgraph.stroke(255,0,0);
      break;
    case 'white':
      canvasgraph.stroke(255);
      break;
    case 'black':
      canvasgraph.stroke(0);
      break;
    case 'green':
      canvasgraph.stroke(0,255,0);
      break;
    case 'yellow':
      canvasgraph.stroke(255,255,0);
      break;
    case 'blue':
      canvasgraph.stroke(0,0,255);
      break;
    default:
      canvasgraph.stroke(255);
      break;

  }
}

//setting up the canvas
function setup_canvas_bg(bg)
{
  if(bg=="black"){background(0);}
  else if(bg=="white"){background(255);}
  else if(bg=="red"){background(255,0,0);}
  else if(bg=="green"){background(0,255,0);}
  else if(bg=="blue"){background(0,0,255);}
  else{}
}

function canvas_setup()
{
  var canvas=createCanvas(300,300);
  canvas.parent("canvasarea");
  canvasgraph=createGraphics(300,300);
  canvasgraph.strokeWeight(canvassetup.strokesize);
  if(canvassetup.strokecolor=="black"){canvasgraph.stroke(0);}
  else if(canvassetup.strokecolor=="white"){canvasgraph.stroke(255);}
  else{}
 

}
 //updating the shapes data for drawing and sending
function update_shapedata(shape)
{
  var theshape=shape;
  if(theshape=="line")
  {
    linedata.mousex=mouseX;
    linedata.mousey=mouseY;
    linedata.pmousex=pmouseX;
    linedata.pmousey=pmouseY;
    linedata.strokesize=canvassetup.strokesize;
    linedata.strokecolor=canvassetup.strokecolor;
  }
  else if(theshape=="recta")
  {
    rectdata.mousex=mouseX;
    rectdata.mousey=mouseY;
    rectdata.strokesize=canvassetup.strokesize;
    rectdata.strokecolor=canvassetup.strokecolor;
    rectdata.fillcolor=canvassetup.fillcolor;
  }
  else if(theshape=="ellipse")
  {
    ellipsedata.mousex=mouseX;
    ellipsedata.mousey=mouseY;
    ellipsedata.strokesize=canvassetup.strokesize;
    ellipsedata.strokecolor=canvassetup.strokecolor;
    ellipsedata.fillcolor=canvassetup.fillcolor;
  }
  else if(theshape=="tri")
  {
    tridata.mousex=mouseX;
    tridata.mousey=mouseY;
    tridata.strokesize=canvassetup.strokesize;
    tridata.strokecolor=canvassetup.strokecolor;
    tridata.fillcolor=canvassetup.fillcolor;
  }
  else if(theshape=="sline")
  {
    slinedata.vmousex=mouseX;
    slinedata.vmousey=mouseY;
    slinedata.strokesize=canvassetup.strokesize;
    slinedata.strokecolor=canvassetup.strokecolor;
  }
  else{

  }
}

//drawing the shapes, after updating them

function drawshape(shape)
{
 

  if(shape=="line")
  {
    canvasgraph.strokeWeight(linedata.strokesize);
    setup_strokecolor(linedata.strokecolor);
    canvasgraph.line(linedata.mousex,linedata.mousey,linedata.pmousex,linedata.pmousey);

  }
  else if(shape=="recta")
  {
    canvasgraph.strokeWeight(rectdata.strokesize);
    setup_strokecolor(rectdata.strokecolor);
    if(rectdata.fillcolor!=""){canvasgraph.fill(rectdata.fillcolor);}
    else{canvasgraph.noFill();}
    canvasgraph.rect(rectdata.mx,rectdata.my,rectdata.mousex,rectdata.mousey);
    
  }
  else if(shape=="ellipse")
  {
    canvasgraph.strokeWeight(ellipsedata.strokesize);
    setup_strokecolor(ellipsedata.strokecolor);
    if(ellipsedata.fillcolor!=""){canvasgraph.fill(ellipsedata.fillcolor);}
    else{canvasgraph.noFill();}
    canvasgraph.ellipse(ellipsedata.mousex,ellipsedata.mousey,30,30);
    
  }
  else if(shape=="tri")
  {
    canvasgraph.strokeWeight(tridata.strokesize);
    setup_strokecolor(tridata.strokecolor);
    if(tridata.fillcolor!=""){canvasgraph.fill(tridata.fillcolor);}
    else{canvasgraph.noFill();}
    canvasgraph.triangle(tridata.startx,tridata.starty,movedX,movedY,movedY*2,movedX/2);
    
  }
  else if(shape=="sline")
  {
    canvasgraph.strokeWeight(slinedata.strokesize);
    setup_strokecolor(slinedata.strokecolor);
    canvasgraph.line(slinedata.startx,slinedata.starty,slinedata.vmousex,slinedata.vmousey);
    
  }
  else{

  }
}
// sending the shapes to the server

function onsendingshapes(shape)
{
  if(shape=="line")
  {
  onecampus_server_2.emit('line',linedata);

  }
  else if(shape=="recta")
  {
    onecampus_server_2.emit('recta',rectdata); 
    
  }
  else if(shape=="ellipse")
  {
    onecampus_server_2.emit('ellipse',ellipsedata); 
  }
  else if(shape=="tri")
  {
    onecampus_server_2.emit('tri',tridata); 
  }
  else if(shape=="sline")
  {
    onecampus_server_2.emit('sline',slinedata); 
  }
  else{

  }
}

//handling received shapes and data


function onreceivingshapes()
{
  onecampus_server_2.on('line',linedrawing);
  onecampus_server_2.on('recta',drawrect);
  onecampus_server_2.on('ellipse',drawellipse);
  onecampus_server_2.on('tri',drawtri);
  onecampus_server_2.on('sline',drawsline);
}
//drawing the received shapes
function linedrawing(data)
{
  canvasgraph.strokeWeight(data.strokesize);
  canvasgraph.stroke(data.strokecolor);
  canvasgraph.line(data.mousex,data.mousey,data.pmousex,data.pmousey);
}
function drawrect(data)
{
  canvasgraph.strokeWeight(data.strokesize);
  canvasgraph.stroke(data.strokecolor);
  if(data.fillcolor!=""){canvasgraph.fill(data.fillcolor);}
  else{canvasgraph.noFill();}
  canvasgraph.rect(data.mx,data.my,data.mousex,data.mousey);
    
}
function drawellipse(data)
{
    canvasgraph.strokeWeight(data.strokesize);
    canvasgraph.stroke(data.strokecolor);
    if(data.fillcolor!=""){canvasgraph.fill(data.fillcolor);}
    else{canvasgraph.noFill();}
    canvasgraph.ellipse(data.mousex,data.mousey,30,30);
}
function drawtri(data)
{
  canvasgraph.strokeWeight(data.strokesize);
  canvasgraph.stroke(data.strokecolor);
  if(data.fillcolor!=""){canvasgraph.fill(data.fillcolor);}
  else{canvasgraph.noFill();}
  canvasgraph.triangle(data.startx,data.starty,data.mousex,data.mousey,data.mousex*2,(data.mousey+data.mousex)/2);
}
function drawsline(data)
{
  
    canvasgraph.strokeWeight(data.strokesize);
    setup_strokecolor(data.strokecolor);
    canvasgraph.line(data.startx,data.starty,data.mousex,data.mousey);
    
}

//controlling controlls
function clearall()
{
  
}

function setup() {
    // put setup code here
bag=loadImage('../media_store/onecampus_store/onecampus_icons/gridtrans3.png');
canvas_setup();
onecampus_server_2=io.connect('http://172.20.10.8:1200');

    
  }
  //update the shapes when the mouse is pressed
 function mousePressed()
 {
   update_shapedata(canvassetup.current_shape);
 
   onsendingshapes(canvassetup.current_shape);
  
 

 }
 function mouseReleased()
 {
  slinedata.mousex=movedX;
  slinedata.mousey=movedY;
  //canvasgraph.line(slinedata.startx,slinedata.starty,slinedata.mousex,slinedata.mousey);
  onsendingshapes(canvassetup.current_shape);
 
 }
 function mouseMoved()
 {
  slinedata.startx=mouseX;
  slinedata.starty=mouseY;
 }
 function mouseClicked()
 {
  rectdata.mx=mouseX;
  rectdata.my=mouseY;
  tridata.startx=mouseX;
  tridata.starty=mouseY;

 
 }
 //tansfering and drawing the shapes when the mouse is dragged
  function mouseDragged()
  {
    console.log(canvassetup.current_shape);
    update_shapedata(canvassetup.current_shape);
    drawshape(canvassetup.current_shape);
    onsendingshapes(canvassetup.current_shape);
 
    console.log(slinedata.vmousex);
    
  }

  function draw() {
    // put drawing code here
    image(canvasgraph,0,0);
    if(canvassetup.background=="grid"){
    canvasgraph.background(bag);
    }

    onreceivingshapes();
    
   
  }