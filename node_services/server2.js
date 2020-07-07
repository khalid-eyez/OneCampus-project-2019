var express=require('express');
var onecampus_server2=express();
var server = require('http').createServer(onecampus_server2);
var servernetwork=server.listen(1000);
console.log("onecampus server 2 is running at port 1000");

var clientnode=require('socket.io')(server);
//var clientnode=socket(servernetwork);

clientnode.sockets.on('connection',connectionhandler);
var socuser;
var conusers=new Array();
function connectionhandler(socket)
{
    

   console.log('new user connected'+socket.id);

   socket.on('mydetails',function(data){

    socuser=data;
    
});
if(socuser){
   socket.username=socuser.username;
   socket.userid=socuser.userid;
   socket.partners=socuser.mypartners;
   //console.log(socket.userid+" "+socket.username);
   conusers.push(socket);
}
   socket.on('roomcreation',createroom);


   function initsocket(data)
   {
       socket.username=username;
      
   }
  

   function createroom(data)
   {
       socket.join(data.room);
       console.log('new user in room in'+data.room);
   }

   //receiving and broadcasting messages

   socket.on('new_message',messagebroadcaster);

   function messagebroadcaster(data)
   {
       var msg=data;
           //msg.sendername=socket.username;
           //msg.senderid=socket.userid;
       console.log(data.message+" "+data.room+""+msg.sender);
       clientnode.to(data.room).emit('new_message',msg);
       
   }

   //getting all connected partners and broadcast them to the clients

  /* var onlinepartners=new Array();
   var allconnected_users=clientnode.sockets.clients();
   var myactual_partners=socket.partners;
   for(i in conusers)
    {
       var sr=myactual_partners['student_id'].indexOf(conusers[i].userid);
       console.log(myactual_partners['student_id']);
       //console.log(conusers[i].userid);
       if(sr!=-1)
       {

        onlinepartners[i]=conusers[i].userid;
        //console.log(conusers[i].userid);

       }
       
       console.log('online partners'+onlinepartners);  
       //console.log('conn'+conusers[i]);
       console.log("all connected"+conusers[i]);

    }
*/
   
 console.log(socket.username);
}

