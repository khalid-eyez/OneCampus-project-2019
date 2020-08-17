const HTTPS_PORT = 8443; //default port for https is 443
const HTTP_PORT = 8001; //default port for http is 80

const fs = require('fs');
const http = require('http');
const https = require('https');
const WebSocket = require('ws');


var express=require('express');
var vid_server2=express();
var servernetwork=vid_server2.listen(HTTP_PORT);
var socket=require('socket.io');
var vidclient=socket(servernetwork);
// based on examples at https://www.npmjs.com/package/ws 
//const WebSocketServer = WebSocket.Server;

// Yes, TLS is required
//const serverConfig = {
 // key: fs.readFileSync('key.pem'),
 // cert: fs.readFileSync('cert.pem'),
//};

// ----------------------------------------------------------------------------------------

// Create a server for the client html page
/*const handleRequest = function (request, response) {
  // Render the single client html file for any request the HTTP server receives
  console.log('request received: ' + request.url);

 if (request.url === '/webrtc.js') {
    response.writeHead(200, { 'Content-Type': 'application/javascript' });
    response.end(fs.readFileSync('client/webrtc.js'));
  } else if (request.url === '/style.css') {
    response.writeHead(200, { 'Content-Type': 'text/css' });
    response.end(fs.readFileSync('client/style.css'));
  } else {
    response.writeHead(200, { 'Content-Type': 'text/html' });
    response.end(fs.readFileSync('client/index.html'));
  }
};*/

//const httpsServer = http.createServer(serverConfig, handleRequest);
//httpsServer.listen(HTTP_PORT);

// ----------------------------------------------------------------------------------------

// Create a server for handling websocket calls
//const wss = new WebSocketServer({ server: httpsServer });

vidclient.on('connection', function (socket) {
  console.log('new user'+socket.id);
  socket.on('message', function (message) {
    // Broadcast any received message to all clients
    console.log('received: %s', message);
    socket.broadcast.emit('message',message);
    //console.log(message);
  });

  socket.on('error', () => socket.terminate());
});

console.log('Server running.'
);

// ----------------------------------------------------------------------------------------

// Separate server to redirect from http to https
/*http.createServer(function (req, res) {
    console.log(req.headers['host']+req.url);
    res.writeHead(301, { "Location": "https://" + req.headers['host'] + req.url });
    res.end();
}).listen(HTTP_PORT);*/