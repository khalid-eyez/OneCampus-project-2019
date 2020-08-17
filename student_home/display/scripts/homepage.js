
$('document').ready(
    function()
    {
      $("#page-name").text('Home');
      $('#main').load('home.php');
      $('#notifications').load('getallnotif.php');
      //handling notification number
      $('#hidden-text-on-navbar').css('display','block');
      $('#hidden-text-on-navbar').load('not_num.php');
      setInterval(function(){
         $('#hidden-text-on-navbar').load('not_num.php');
         },1000);
      
       //handling node server connections

    //var dataz
    

       $('#side-bar-icon-name').click(

        function(){

           $("#page-name").text('Home');
           $('#main').load('home.php');

        }

       );


       //click on the discussion button

       $('#row-5-main-left-col').click(

         function(){
 
 
            $('#main').load('sidemenu/discussions.php');
 
         });

      //loading the groups page

      $('#row-9-main-left-col').click(

         function(){
 
            $('#main').load('groups/display/grouplist.php');
            $("#page-name").text('Groups');
 
         });






         //handling the search engine

         $('#search-field').focus(function(e){
            e.preventDefault();

            $('body').keypress(function(event){
            
               var keycode = (event.keyCode ? event.keyCode : event.which);
               if(keycode == '13'){
                  event.preventDefault();
                  
                  var key=$('#search-field').val();
                  if(key.length>=1){
                  $('#search').load('search.php?searchkey='+key);
                  $('#search').css('display','block');
                  }

               }
            
            });

            //keyup handling

            $('body').keyup(function(event){
            
                  event.preventDefault();
                  
                  var key=$('#search-field').val();
                  if(key.length>=1){
                  $('#search').load('search.php?searchkey='+key);
                  $('#search').css('display','block');
                  }

               });
            
            });
           $('body').click(function(){
              if($(this)!=$('#search')){
              $('#search').css('display','none');
              }
           })
           //$('body').mouseup(function(){
            //if($(this)!=$('#notifications'))
            //{
               //console.log($(this));
             //$('#notifications').css('display','none'); 
           // }
         //})
         $('#notifications').mouseleave(function(){


            $(this).css('display','none');
         });
           $("#search").click(function(e) {
            e.stopPropagation(); 
            return false;       
                                 
        });
      
            //removing the notification window
    



         //loging out handle
$('#profile-icon').click(function(){

window.location.replace('logout.php');
});

   //request click handle

   $('a').click(function(k){


   k.preventDefault();
   });

  //notification icon handling
   $('#notefication-icon').click(function(){

  
   $('#notifications').css('display','block');

   });
 

   //the profil page

   $('#profile-col').click(function(){

   $('#user_profil').load('../user_profil/info1.php');
   $('#user_profil').css('display','block');

   });

   //partners page

   $('#row-4-main-left-col').click(function(){

      $('#main').load('mypartners.php');
      $("#page-name").text('Partners');
   
   
      });

// 

    });