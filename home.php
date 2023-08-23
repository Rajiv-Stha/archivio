<?php  
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


// echo $_SESSION["username"];

$userId = null;

// how can i get the user id  logged in user id

// 


//login via app
//session start via app

if (isset($_REQUEST['uid']) && isset($_REQUEST['uc'])) {
  // Cast variables to float 
  
  
  // but 
  
  $_SESSION['valid'] = true;
  $_SESSION['user_id'] = $_REQUEST['uid'];
  $userId = $_SESSION['user_id'];
  // echo $userId;
  
}else{
    
    
    //header('location: login.php');
    
}







if (isset($_SESSION['user_id']) != "") {
    include('core/functions.php');
}
else{
    //header('location: LoginPageApp.php');
}
?>
<!doctype html>
<html lang="en">

<?php
    include 'header.php';
?>
<!--  -->

<body>

    <!-- loader -->
    <!--div id="loader">
        <div class="spinner-border text-gr" role="status"></div>
    </div-->
    <!-- * loader -->


    <!-- Header -->
    <div class="appHeader bg-primary">
        <div class="left">
            <a href="page_add_stories2.php" class="headerButton text-white ps-2">
                <!--ion-icon name="search"></ion-icon-->
                <i class="bi bi-plus-square"></i>
            </a>
        </div>

        <div class="pageTitle text-white">
            Home
        </div>

        <div class="right">
            <a href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#actionSheetContentFiltri" class="headerButton text-white">
                <!--ion-icon name="filter"></ion-icon-->
                <i class="bi bi-filter"></i>
            </a>
            <a href="page_chat_list.php" class="headerButton text-white ps-2">
                <!--ion-icon name="search"></ion-icon-->
                <i class="bi bi-chat-left-dots"></i>
            </a>
        </div>
    </div>

    <!-- * Header -->



    <!-- App Capsule -->
    <div id="appCapsule">
            <div id="stories" class="storiesWrapper stories user-icon carousel snapgram ps-2 pt-1" style="    margin-bottom: -9px;"></div>

           <?php 
                // Story block
                //include('stories/stories_list.php');
                //include('carousel/carousel_luoghi.php');

            ?>

        <div id="main_content">


            <div id="contentMainFeed">
            <?php
                // Post Media block 
                //include('post/post_media.php');

                //Post text block
                //include('post/post_text.php');
            ?>
            <!-- skeleton post media -->
            <div class="section mt-2 mb-2">
                <div class="card">
                    <div class="card-body placeholder-glow">
                        <h6 class="card-subtitle">
                            <span class="placeholder col-2 bg-secondary"></span>
                            <span class="placeholder col-4"></span> 
                        </h6>
                        <h5 class="card-title">
                            <span class="placeholder col-12 bg-secondary"><br><br></span>
                        </h5>
                        <p>
                            <span class="placeholder col-12"></span>
                        </p>
                        <div class="card-text text-center">
                            <span class="placeholder col-4"></span>
                            <span class="placeholder col-3 bg-secondary"></span>
                            <span class="placeholder col-4"></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- * skeleton post media -->

            <!-- skeleton post text -->
                <div class="section mt-2 mb-2">
                    <div class="card">
                        <div class="card-body placeholder-glow">
                            <h6 class="card-subtitle">
                                <span class="placeholder col-2"></span>
                                <span class="placeholder col-4 bg-secondary"  ></span> 
                            </h6>
                            <p>
                                <span class="placeholder col-12 bg-secondary"></span>
                            </p>
                            <div class="card-text text-center">
                                <span class="placeholder col-4 bg-secondary"></span>
                                <span class="placeholder col-3"></span>
                                <span class="placeholder col-4"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- * skeleton post text -->
                <!-- skeleton post text -->
                <div class="section mt-2 mb-2">
                    <div class="card">
                        <div class="card-body placeholder-glow">
                            <h6 class="card-subtitle">
                                <span class="placeholder col-2"></span>
                                <span class="placeholder col-4 bg-secondary"  ></span> 
                            </h6>
                            <p>
                                <span class="placeholder col-12 bg-secondary"></span>
                            </p>
                            <div class="card-text text-center">
                                <span class="placeholder col-4 bg-secondary"></span>
                                <span class="placeholder col-3"></span>
                                <span class="placeholder col-4"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- * skeleton post text -->
                <!-- skeleton post media -->
                <div class="section mt-2 mb-2">
                    <div class="card">
                        <div class="card-body placeholder-glow">
                            <h6 class="card-subtitle">
                                <span class="placeholder col-2 bg-secondary"></span>
                                <span class="placeholder col-4"></span> 
                            </h6>
                            <h5 class="card-title">
                                <span class="placeholder col-12 bg-secondary"><br><br></span>
                            </h5>
                            <p>
                                <span class="placeholder col-12"></span>
                            </p>
                            <div class="card-text text-center">
                                <span class="placeholder col-4"></span>
                                <span class="placeholder col-3 bg-secondary"></span>
                                <span class="placeholder col-4"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- * skeleton post media -->
            </div>

        </div>
        <input type="hidden" id="last_id" value="0">
    </div>
    <!-- * App Capsule -->


    <?php

        // Footer Menu
        include('footer_app.php');
        
        // App sidebar
        include('sidebar/app_sidebar.php'); 
    ?>

    <?php
        // Footer Script JS
        include('footer.php');
    ?>

   
   
    <style type="text/css">
        .float-right{
            text-align: right!important;
            float: right!important;
        }
    </style>
   

</body>


<script type="text/javascript">
 
   

  

//  UDPATE 



            
var empty_load_gps = '<!-- NoGPSConnection -->'+
'        <div class="text-center pt-5">'+
'            <img src="assets/img/EmptyStateNoSpotNearBy.png" class="img-fluid w-50 pt-5" style="max-width: 220px;">'+
'            <div class="p-3">'+
'                <h3>Stiamo cercando i gli Spot lasciati intorno a te...</h3>'+
'                <p>Solo un attimo...</p>'+
'                <p class="" style="font-size: 10px;"></p>'+
'            </div>'+
'        </div>'+
'        <!-- * NoGPSConnection -->';


var empty_gps = '<!-- NoGPSConnection -->'+
'        <div class="text-center pt-5">'+
'            <img src="assets/img/EmptyStateGPSConnection.png" class="img-fluid w-50 pt-5" style="max-width: 220px;">'+
'            <div class="p-3">'+
'                <h3>OPS...</h3>'+
'                <p>Non riusciamo a determinare la tua posizione, controlla lo stato dei tuoi servizi di localizzazione</p>'+
'                <p class="" style="font-size: 10px;">Ti ricordiamo che la tua posizione non verrà  mai condivisa con nessun utente</p>'+
'            <div class="btn btn-block bg-gr" onclick="loadGPS();">  Riprova </div> </div>'+
'        </div>'+
'        <!-- * NoGPSConnection -->';

        var skeleton = '<div class="wide-block pt-2 pb-2 placeholder-glow">'+
'                <span class="placeholder col-6"></span>'+
'                <span class="placeholder w-75"></span>'+
'                <span class="placeholder col-12"></span>'+
'            </div>';
    //$('#main_content').html(skeleton);
    



//prevento load more double 
 var isPreviousEventComplete = true;
 var isDataAvailable = true;



if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
    //alert('backHystoryButton');
    

    $('#main_content').html(localStorage.getItem("lastFeed"));
        if (sessionStorage.getItem('latitude') === null) {            
            loadGPS();
        }
}else{
    $(document).ready(function() 
    {
        $('#main_content').html(empty_load_gps);

        //if (sessionStorage.getItem('latitude') === null) {       
            
            loadGPS();

        //}else{
        //        $('#main_content').html(localStorage.getItem("lastFeed"));
        //}

    });
}




$(window).scroll(function () {
    if ($(document).height()-50 <= $(window).scrollTop() + $(window).height()) {

        var last_id_val = $('#last_id').val();
        //alert(last_id_val);
                var latitude = sessionStorage.getItem('latitude');
                var longitude = sessionStorage.getItem('longitude');

        if (isPreviousEventComplete  && isDataAvailable) {
       
            isPreviousEventComplete = false;
            //$(".LoaderImage").css("display", "block");

            loadNearBySpotted(latitude, longitude, 'near', last_id_val);
        }
    }
 });



function loadGPS(){
    //alert("loadGPS");
    //$('#main_content').html("loadGPS");

    navigator.geolocation.getCurrentPosition(locSuccess, locError);
}


function initialize(lat, lon)
{
        sessionStorage.removeItem('latitude');
        sessionStorage.removeItem('longitude');
}

function locError(error) 
{
    $('#main_content').html(empty_gps);
}

function locSuccess(position) 
{
    initialize(position.coords.latitude, position.coords.longitude);
        sessionStorage.setItem('latitude', position.coords.latitude);
        sessionStorage.setItem('longitude', position.coords.longitude);
        $('#main_content').html("");


        //$('#main_content').html(position.coords.longitude+" "+position.coords.latitude);
    

        loadNearBySpotted(position.coords.latitude, position.coords.longitude, 'nearby',0);
}



function loadNearBySpotted(latitude, longitude, type, last_id){
    //$('#main_content').html(skeleton);
    var last_id_val = $('#last_id').val();
    //alert(last_id_val);
    $.ajax({
          url: 'core/getNearBySpotted.php',
          type: 'POST',
          data:   {
            latitude: latitude,
            longitude: longitude,
            type: type,
            last_id_list: last_id_val,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
          }).done(function(response) {
              isPreviousEventComplete = true;
            //$(".LoaderImage").css("display", "none");

              $('#main_content').append(response);
               

              main_content_all = $('#main_content').html();
              localStorage.setItem("lastFeed", main_content_all);


          }).fail(function() {
                          //$('#'+div_id).html(response);
      });

             
}


</script>

<?php
if(isset($_REQUEST['addspot'])){
?>
    
<script>
    

        //alert(sessionStorage.getItem('toastaddok'));
        if (sessionStorage.getItem('toastaddok') === null) {

// sessionStorage.removeItem('latitude');
// sessionStorage.removeItem('longitude');
            toastbox('toast-add-spot-ok', 5000)
                sessionStorage.setItem('toastaddok', 1);
                            

            }







        </script>

<?php
}
?>



<!-- STORIES FUNCTIONS -->
<script src="<?php echo $path_url;?>/assets/js/FunctionsStories.js"></script>



<style>
.wrapScroll {
  white-space: nowrap;
  overflow-x: auto;
  border: 1px solid orange;
}
    </style>
</html>