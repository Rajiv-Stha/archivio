<?php  
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
if(isset($_SESSION['user_id'])){
    include('core/functions.php');
}
else{
    header('location: login.php');
}

    $user_id = $_SESSION['user_id'];
    
    $msg = @$_REQUEST['msg'];

    $user_id_get =$user_id;
    if(isset($_GET['uid'])) {
        $user_id_get = $_REQUEST['uid'];
    }

    $user_info_arr = get_user_info($user_id_get);
                
    $user_id_info = $user_info_arr['user_id'];
    $user_username = $user_info_arr['username'];
    $user_nome = $user_info_arr['nome'];
    $user_bio = ($user_info_arr['bio']);
    $user_profile_img = ($user_info_arr['img']);
    $user_private_profile = ($user_info_arr['private_profile']);
    $user_follow_status = getFollowerStatusUser($user_id_get);
    $user_followers = getFollowers($user_id_get);
    $user_follow_seguiti = getSeguiti($user_id_get);
    $user_follow_spotted_point = getSpottedPoint($user_id_get);



?>

<!doctype html>
<html lang="en">

<?php
    include 'header.php';
?>

<body class=" vh-100">

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-gr" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="pageTitle"><?php echo $user_username; ?></div>
        <div class="right">
            <div onclick="goToChat(<?php echo $user_id_info; ?>);"  class="headerButton toggle-searchbox text-white">
                <i class="bi bi-chat-left-dots"></i>
            </div>
            <div data-bs-toggle="offcanvas" data-bs-target="#actionSheetShareBox" class="headerButton text-white">
            <!--ion-icon name="filter"></ion-icon-->
                <i class="bi bi-share-fill"></i>
            </div>
        </div>
        
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule" class="">

        <div id="profileHeaderSection" class="section bg-white p-0 pb-1">
            <div class="row ">
                <div class="col">

                    <div class="section mt-2">
                        <div class="profile-head">
                            <div class="avatar">
                                <img src="<?php echo $path_url;?><?php echo $user_profile_img; ?>" alt="avatar" class="imaged w64 rounded">
                            </div>
                            <div class="in">
                                <h3 class="name"><?php echo $user_username; ?></h3>
                                <h5 class="subtext"><?php echo $user_nome; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                    if($user_id != $user_id_info){
                ?>
                <div class="col-3">
                    <div class="section mt-4 float-end">
                        <div class="profile-head">
                            <div class="in" data-bs-toggle="modal" data-bs-target="#DialogProfileOptions">
                                <i class="bi bi-three-dots-vertical float-end text-gray" style="font-size: 25px!important;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
                }
                ?>

            </div>

            <div class="section full mt-1">
                <div class="profile-stats ps-2 pe-2">
                        <a href="profile_followers_list.php?uid=<?php echo $user_id_get; ?>&n=<?php echo $user_followers; ?>" class="item">
                            <strong>
                                <span id="box_followes_number_<?php echo $user_id_get; ?>">
                                <?php echo $user_followers; ?></span></strong>Followers
                        </a>
                
                    <a href="profile_spotted_list.php?uid=<?php echo $user_id_get; ?>&n=<?php echo $user_follow_spotted_point; ?>" class="item text-spotted">
                        <strong><?php echo $user_follow_spotted_point; ?></strong><b>Spotted</b>
                    </a>

                    <a href="profile_following_list.php?uid=<?php echo $user_id_get; ?>&n=<?php echo $user_follow_seguiti; ?>" class="item">
                        <strong><?php echo $user_follow_seguiti; ?></strong>Seguiti
                    </a>
                </div>
            </div>

            <div class="section mt-1 mb-1">
                <div class="profile-info">
                    <div class=" bio">
                        <?php echo ($user_bio) ?>
                    </div>
                    <!--div class="link">
                        <a href="#">Paris</a>,
                        <a href="#">France</a>
                    </div-->
                </div>
            </div>

            <div class="section bg-white pb-1">
<?php 

                //controllo che abbia bia messo user_follow_status cambio icona
                if($user_follow_status == 1){
                  $icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-block\" onclick=\"setFollowOff($user_id_info,'1');\">
                      $icon
                      <span class=\"text-dark\">Segui già</span>
                  </div>";
                }elseif($user_follow_status == 3){
                  $icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-block\" onclick=\"setFollowOff($user_id_info,'1');\">
                      $icon
                      <span class=\"text-dark\">Richiesta Inviata</span>
                  </div>";
                }else{
                  $icon = " <img src=\"$path_url/assets/img/footsteps.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button = "<div href=\"#\" class=\"btn btn-gr shadowed border-0 btn-block\" onclick=\"setFollowOn($user_id_info,'1');\">
                      $icon
                      <span class=\"text-white\">Inzia a seguire</span>
                  </div>";
                }

                if($user_id == $user_id_info){
                  $follow_button = "";
                }      


?>
            <div class="row d-flex bg-white">
                <div class="col">
                    <div id="follow_button_box_profile<?php echo $user_id_info; ?>">
                      <?php echo $follow_button; ?>
                    </div>
                </div>
            <?php 
            if($user_follow_status != 1){
                $css_more_followers = ' d-none ';
            }
            ?>
                <div id="profile_box_more_followers" class="bg-white col-2 <?php echo $css_more_followers; ?>" >
                    <div id="follow_button_box_profile<?php echo $user_id_info; ?>">
                        <button class="btn  btn-white shadowed text-dark border-0 text-center btn-block" style="">
                            <i class="bi bi-person-plus-fill ms-1"></i>
                        </button>
                    </div>


                </div>

            <?php
            //}
            ?>
            </div>
                
            </div>
        </div><!-- profile header sections -->

        <div class="section full bg-white" style="position: sticky; top: 56px; z-index: 999;">
            <div class="wide-block transparent p-0">
                <ul class="nav nav-tabs lined iconed" role="tablist">
                <?php
                if(($user_private_profile == 0) OR ($user_id == $user_id_info) OR ($user_follow_status == 1)){               

                ?>
                    <li class="nav-item">
                        <a class="nav-link active " data-bs-toggle="tab" href="#feed" role="tab">
                            <!--ion-icon name="grid-outline"></ion-icon-->
                            <i class="bi bi-grid"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-place" id="nav-link-place" data-bs-toggle="tab" href="#places" role="tab">
                            <i class="bi bi-geo-alt"></i>
                        </a>
                    </li>
                <?php 
                    if($user_id == $user_id_info){
                ?>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" id="nav-link-settings"  href="#settings" role="tab">
                            <i class="bi bi-gear"></i>
                        </a>
                    </li>
                <?php
                    }
                }else{
                ?>
                     <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#private_profile" role="tab">
                            <i class="bi bi-lock-fill"></i>
                        </a>
                    </li>
                <?php
                }
                ?>
                </ul>
            </div>
        </div>


        <!-- tab content -->
        <div class="section full mb-2 ">
            <div class="tab-content">

            <?php 
                if(($user_private_profile == 0) OR ($user_id == $user_id_info) OR ($user_follow_status == 1)){               
           
            ?>

                <!-- Feed Block -->
                <div class="tab-pane fade show active " id="feed" role="tabpanel">
                    <?php include ('profile/profile_tab_post.php'); ?>
                </div>
                <!-- * Feed Block -->

                <!-- * places -->
                <div class="tab-pane fade show rofile; ?>" id="places" role="tabpanel">
                    <?php include ('profile/profile_tab_place.php'); ?>
                </div>
                <!-- * places -->

                <?php 
                if($user_id == $user_id_info){
               
                ?>
                    <!-- settings -->
                    <div class="tab-pane fade bg-white " id="settings" role="tabpanel">
                    <?php
                        include ('profile/profile_tab_settings.php')
                    ?>
                    </div>
                    <!-- * settings -->
                <?php 
                }
                ?>
            
            <?php 
             }else{
             ?>
                <!--  private_profile -->
                <div class="tab-pane fade show active" id="private_profile" role="tabpanel">
                    <?php include ('profile/profile_tab_private.php') ?>
                </div>
                <!-- * private_profile -->
            <?php
            }
            ?>
                
            </div>
        </div>
        <!-- * tab content -->

    </div>
    <!-- * App Capsule -->


    <?php

        // Dialog Profile Options 
        include ('dialogs/dialog_profile_options.php');

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
    .close_button{
        display: none!important;
    }
</style>
</html>