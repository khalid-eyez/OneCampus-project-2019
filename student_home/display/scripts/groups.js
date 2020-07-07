$('document').ready(function(){
    var groupdata={
    gid:1,
    gname:"warriors",
}


$('#sessionstart').click(function(){

var serverchannel=io.connect('http://localhost:1000');
serverchannel.emit('roomcreation',groupdata);

});

//$('#join').click(function(){

    //var chatchannel=io.of('/'+groupdata.gname);

//})



})
