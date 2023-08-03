<?php  

session_start();
if(isset($_SESSION['user_id'])){
    include('core/functions.php');
}
else{
    header('location: login.php');
}

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


    $user_id = $_SESSION['user_id'];
    
    $msg = @$_REQUEST['msg'];

    $place_id_get = "";
    if(isset($_GET['pid'])) {
        $place_id_get = $_REQUEST['pid'];
    }

    $user_info_arr = get_place_info($place_id_get);
                
    $place_id = $user_info_arr['place_id'];
    $place_name = $user_info_arr['place_name'];
    $place_name_title = truncate($place_name);
    $place_latitude = $user_info_arr['place_latitude'];
    $place_longitude = ($user_info_arr['place_longitude']);
    $place_city = ($user_info_arr['place_city']);
    $place_address = ($user_info_arr['place_address']);
    $place_rating = ($user_info_arr['place_rating']);

    $follower_status = ($user_info_arr['follower_status']);
    $place_follow_status = getFollowerStatusPlace($place_id_get);
    //$user_follow_seguiti = getSeguiti($place_id_get);
    //$user_follow_spotted_point = getSpottedPoint($place_id_get);

    $place_followers = ($user_info_arr['place_followers']);
    $place_spotted_confirmed = ($user_info_arr['place_spotted_confirmed']);
    $place_posts = ($user_info_arr['place_posts']);
    //$place_rating = ($user_info_arr['place_posts']);
    $place_card_img = getPlaceLastImage($place_id);

?>

<!doctype html>
<html lang="en">

<?php
    include 'header.php';
?>

<body class="">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader text-light bg-place">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="pageTitle text-truncate"><?php echo $place_name_title; ?></div>
        <div class="right">
            <div data-bs-toggle="offcanvas" data-bs-target="#actionSheetShareBox" class="headerButton text-white">
            <!--ion-icon name="filter"></ion-icon-->
                <i class="bi bi-share-fill"></i>
            </div>
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2">
            <div class="profile-head">
                <div class="avatar">
                    <img src="<?php echo $path_url; ?><?php echo $place_card_img; ?>" alt="avatar" class="imaged w64 shadowed">
                </div>
                <div class="in  text-truncate">
                    <h3 class="name"><?php echo $place_name; ?></h3>
                    <h5 class="subtext"><?php echo $place_city; ?></h5>
                </div>
            </div>
        </div>

        <div class="section full mt-2">
            <div class="profile-stats ps-2 pe-2">
                <a href="place_followers_list.php?pid=<?php echo $place_id; ?>&n=<?php echo $place_followers; ?>" class="item">
                    <strong><span id="box_followes_number_<?php echo $place_id; ?>">
                                <?php echo $place_followers; ?></span></strong>Followers
                </a>
                <a  href="place_spotted_list.php?pid=<?php echo $place_id; ?>&n=<?php echo $place_spotted_confirmed; ?>" class="item text-spotted ">
                    <strong><?php echo $place_spotted_confirmed; ?></strong><b>Spotted</b>
                </a>

                <a href="place_rating.php?pid=<?php echo $place_id; ?>&n=<?php echo $place_followers; ?>" class="item">
                    <strong><?php echo $place_rating; ?></strong>Rating
                </a>
            </div>
        </div>

        <div class="mb-2 d-none">
            <?php 
                // Story block
                //include('stories/stories_place_list.php');


                //controllo che abbia bia messo follow cambio icona
                if($place_follow_status == 1){
                  $icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-block\" onclick=\"setFollowPlaceOff($place_id,'2');\">
                      $icon
                      <span class=\"text-dark\">Segui già</span>
                  </div>";
                }else{
                  $icon = " <img src=\"$path_url/assets/img/footsteps.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button = "<div href=\"#\" class=\"btn btn-gr bg-place shadowed border-0 btn-block\" onclick=\"setFollowPlaceOn($place_id,'2');\">
                      $icon
                      <span class=\"text-white\">INIZIA A SEGUIRE</span>
                  </div>";
                }
    


            ?>
        </div>

        <div class="section mt-1 mb-2">
            <div id="follow_button_box_place<?php echo $place_id; ?>">
              <?php echo $follow_button; ?>
            </div>
            <!--a href="#" class="btn bg-white shadowed border-0 mt-1 btn-block">
                <img src="assets/img/footsteps-sharp.svg"  fill = "#fff" class="icon_footsteps">
                <span class="">Segui già</span>
            </a-->
        </div>


        <div class="section full bg-white" style="position: sticky; top: 56px; z-index: 999;">
            <div class="wide-block transparent p-0">
                <ul class="nav nav-tabs lined iconed " role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#feed" role="tab">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="" data-bs-toggle="tab" href="#events" role="tab">
                            <i class="bi bi-ticket-perforated"></i>
                        </a>
                    </li>

                    
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#infoPlaces" role="tab">
                            <i class="bi bi-geo"></i>
                        </a>
                    </li>
                    <!-- 
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#private_profile" role="tab">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
                            <ion-icon name="settings-outline"></ion-icon>
                        </a>
                    </li>
                -->
                </ul>
            </div>
        </div>


        <!-- tab content -->
        <div class="section full mb-2">
            <div class="tab-content">


                <!-- Feed Block -->
                <div class="tab-pane fade show active" id="feed" role="tabpanel">

                    <div id="main_content">
                    </div>
                </div>
                <!-- * Feed Block -->

                <!-- * places -->
                <div class="tab-pane fade show" id="events" role="tabpanel">
                    <?php include ('place/tab_place_events.php'); ?>
                </div>
                <!-- * places -->

                <!--  private_profile -->
                <div class="tab-pane fade" id="infoPlaces" role="tabpanel">
                    <?php include ('place/tab_place_info.php') ?>
                </div>
                <!-- * private_profile -->

                <!-- settings -->
                <!--div class="tab-pane fade" id="settings" role="tabpanel"-->
                <?php
                    //include ('profile/profile_tab_settings.php')
                ?>
                <!--/div-->
                <!-- * settings -->
            </div>
        </div>
        <!-- * tab content -->

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
</body>
<style type="text/css">
    .appBottomMenu{
        display: none;
    }
</style>
<script type="text/javascript">




loadPlaceFeed(<?php echo $place_id; ?>);


$(window).scroll(function () {
    if ($(document).height()-50 <= $(window).scrollTop() + $(window).height()) {

        var last_id_val = $('#last_id').val();
        //alert(last_id_val);

        if (isPreviousEventComplete  && isDataAvailable) {
       
            isPreviousEventComplete = false;
            //$(".LoaderImage").css("display", "block");

            loadPlaceFeed(<?php echo $place_id; ?>);
        }
    }
 });

 


    function loadPlaceFeed(pid){
    //$('#main_content').html(skeleton);
    var last_id_val = $('#last_id').val();
    if(last_id_val == 0){
        $('#main_content').html("");
    }
    //alert(last_id_val);
    $.ajax({
          url: 'core/getPlaceFeedPost.php',
          type: 'POST',
          data:   {
            place_id: pid,
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
              //localStorage.setItem("lastFeedPlace", main_content_all);


          }).fail(function() {
                          //$('#'+div_id).html(response);
      });

             
}
</script>



<style type="text/css">
    .nav-tabs.lined .nav-item .nav-link.active {
    color: #0469ff;
    background: transparent;
    border-bottom-color: #0469ff !important;
}
</style>
</html>