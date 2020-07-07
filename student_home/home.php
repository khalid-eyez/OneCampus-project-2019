<!DOCTYPE html>
<html>
<head>
    <title>home</title>
    <link rel="stylesheet" href="display/styles/home.css" />
    <script src="display/scripts/jquery.js"></script>
    <script type="text/javascript">
    $('document').ready(function(){

     $('#discussions').load('alldisc.php');
     $('#online').load('online_partnes.php');
     $('#recommended').load('recommender.php');
     setInterval(function(){
     $('#recommended').load('recommender.php');
     },4000);

   
    setInterval(function(){
     $('#online').load('online_partnes.php');
     },2000);
     setInterval(function(){
     $('#discussions').load('alldisc.php');
     },2000);

    })   
  
    
    </script>
   
</head>


<body>
<div id="home">
<div id="leftside">
<div id="recommended"></div>
<div id="discussions"></div>
</div>
<div id="online">

<div>
<div>



    
</body>
</html>

