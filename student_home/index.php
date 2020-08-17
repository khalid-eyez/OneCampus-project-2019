<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneCampus</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="groups/display/styles/styles2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.9/typicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,500,500i,700,700i">
    <link rel="stylesheet" href="display/styles/index.css" />
    <link rel="stylesheet" href="assets/css/Login-Form-Dark.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css">
    <link rel="stylesheet" href="groups/display/assets/css/styles.min.css">
    <link rel="stylesheet" href="groups/display/assets/css/styles.css">
    <link rel="stylesheet" href="display/styles/discussion.css" />
    <link rel="stylesheet" href="display/styles/search.css" />
    <link rel="stylesheet" href="display/styles/notif.css" />
    <link rel="stylesheet" type="text/css" href="display/styles/groups.css"/>
    <link rel="stylesheet" href="assets/css/styles.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="display/scripts/homepage.js"></script>
    <script src="../user_profil/profil.js"></script>
    <script src="../forum/display/assets/js/component.js"></script>
    <script src="display/scripts/socket.io.js"></script>
    <script type="text/javascript">
    $('document').ready(function()
    {
        $('#usernamex').css({
            'marginLeft':'36%',
            'fontWeight':'bold',
            'width':'20%',
            'textAlign':'center'
        });
      $('#profile-col').css('paddingLeft','35%');
      setInterval(function(){
     $('#profile-col').load('getuserimg.php');
     },2000);
      $('#logo').css('marginLeft','35%');
      var all=$('#joindeci *');

      for(var i=0;i<all.length;i++){
    
      all.eq(i).click(function(){
      var id=$(this).attr('id');
      var clicked=$(this);
//console.log(id);

    
      var partners;
   
    //console.log(partners.student_firstname);
    //var serverchannel=io('http://localhost:1000')
    var username='<?php echo $_SESSION['username'];?>';
    var userid=<?php echo $_SESSION['userid'];?>;
    var data={
        userid:0,
        username:""
    };
    data.userid=userid;
    data.username=username;
    //$.get("getallpartners.php", function(part){
      
      //data.mypartners=JSON.parse(part);
    window.open('../discussion_room/discussion/?username='+username+'$userid='+userid+'&disc='+id);
      //serverchannel.emit('mydetails',data);
      //console.log(data.mypartners.student_firstname[0]);
      
         //});
          
         
    
  });

} 

   
 })
    </script>
</head>


<body id="body" class="main section">
    <?php if(isset($_SESSION['userid'])){?>
    <section>
        <div class="row" id="mainRow">
            <div class="col-lg-3" id="main-left-col">
                <div class="row" id="row-1-main-left-col">
                    <div class="col"><img src="assets/img/ONECAMPUS FULL ICON.png" id="logo"></div>
                </div>
                <div class="row" id="row-2-main-left-col">
                    <div class="col" id="profile-col">
                       
                    </div>
                    
                </div>
                <div id="usernamex"><?php print($_SESSION['username']);?></div>
                <div class="row" id="row-3-main-left-col">
                    <div class="col-sm-4" id="icon-col"><i class="icon-home" id="side-bar-icon"></i></div>
                    <div class="col" id="icon-name-col">
                        <p id="side-bar-icon-name">Home</p>
                    </div>
                </div>
                <div class="row" id="row-4-main-left-col">
                    <div class="col-sm-4" id="icon-col"><i class="far fa-handshake" id="side-bar-icon"></i></div>
                    <div class="col" id="icon-name-col">
                        <p id="side-bar-icon-name">Partners</p>
                    </div>
                </div>
                <div class="row" id="row-9-main-left-col">
                    <div class="col-sm-4" id="icon-col"><i class="fas fa-users" id="side-bar-icon"></i></div>
                    <div class="col" id="icon-name-col">
                        <p id="side-bar-icon-name">Groups</p>
                    </div>
                </div>
                <div class="row" id="row-6-main-left-col">
                    <div class="col-sm-4" id="icon-col"><i class="typcn typcn-messages" id="side-bar-icon"></i></div>
                    <div class="col" id="icon-name-col">
                        <p id="side-bar-icon-name">Forum</p>
                    </div>
                </div>
            </div>
            <div class="col" id="main-right-col">
                <nav class="navbar navbar-light navbar-expand-md navigation-clean-search">
                    <div class="container"><a class="navbar-brand" href="#" id="page-name">Home</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div
                            class="collapse navbar-collapse justify-content-between align-content-end" id="navcol-1">
                            <form class="form-inline ml-auto" target="_self">
                                <div class="form-group" id="search-form-group"><label for="search-field"></label><i class="fa fa-search"></i><input class="form-control search-field" type="search" name="search" placeholder="Search" id="search-field"></div>
                            </form>
                            <form class="form-inline ml-auto" target="_self">
                                <div class="form-group" id="search-form-group"><label for="search-field"></label><i class="fa fa-bell-o" id="notefication-icon"></i><span id="hidden-text-on-navbar"></span><i class="fas fa-sign-out-alt" id="profile-icon"></i></div>
                            </form>
                    </div>
            </div>
            </nav>
            <div id="main"></div>
            
        </div>
        <div id="user_profil"></div>
        <div id="search"></div>
        <div id="notifications"></div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script src="groups/display/assets/js/component.js"></script>
    <?php }else{header("location:../");} ?>
</body>
</html>

