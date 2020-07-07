var express=require('express');
var onecampus_server2=express();
var servernetwork=onecampus_server2.listen(1200);
console.log("onecampus server 1 is running at port 1200");

var socket=require('socket.io');
var clientnode=socket(servernetwork);

clientnode.sockets.on('connection',boardhandler);
function boardhandler(socket)
{
  console.log("new user at" + socket.id);
  socket.on('line',broadcastline);
  socket.on('ellipse',broadcastellip)
  socket.on('recta',broadcastrect);
  socket.on('tri',broadcasttri);
  socket.on('sline',broadcastsline);

  function broadcastline(data)
  {
      socket.broadcast.emit('line',data);
  }
  function broadcastellip(data)
  {
      socket.broadcast.emit('ellipse',data);
  }
  function broadcastrect(data)
  {
      socket.broadcast.emit('recta',data);
  }
  function broadcasttri(data)
  {
      socket.broadcast.emit('tri',data);
  }
  function broadcastsline(data)
  {
      console.log("sending data for mouse x"+data.vmousex);
      socket.broadcast.emit('sline',data);
  }
}