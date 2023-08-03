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
?>

<!doctype html>
<html lang="en">

<?php
    include 'header.php';
?>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-gr" role="status"></div>
    </div>
    <!-- * loader -->


    <!-- Header -->
    <div class="appHeader bg-primary">
        <div class="left">
            <a href="#" class="headerButton goBack text-white">
                <i class="bi bi-chevron-left text-white"></i>
            </a>
        </div>

        <div class="pageTitle">
            Dettagli 
        </div>
        
        <div class="right pe-2">
            <div data-bs-toggle="offcanvas" data-bs-target="#actionSheetShareBox" class="headerButton text-white">
                <!--ion-icon name="filter"></ion-icon-->
                <i class="bi bi-share-fill"></i>
            </div>
            <div class="in" data-bs-toggle="modal" data-bs-target="#DialogPostOptions" id="optionMenu">
                <i class="bi bi-three-dots-vertical float-end text-white" style="font-size: 25px!important;"></i>
            </div>
        </div>
    </div>

    

    <!-- * Header -->



    <!-- App Capsule -->
    <div id="appCapsule">

        <div id="contentMainFeed">
        <?php

$last_id_itmes = 0;





if(isset($_REQUEST['sid'])){

    $spot_id = $_REQUEST['sid']; 
  
//echo $last_id_itmes;
  
     $sql1 = "SELECT spots.*, places.*, spots.user_id as spots_user_id, places.place_id as place_place_id FROM spots INNER JOIN places ON places.place_id=spots.place_id WHERE spots.spot_id = '$spot_id' ORDER BY spots.spot_time DESC LIMIT  1";

    //echo $sql1;

    $result = $db->query($sql1); 
        
    //controlo login e setto role
    if (mysqli_num_rows($result) > 0) {

        while($rowdata = $result->fetch_assoc())
            {
                
                $place_id=$rowdata['place_place_id'];
                $place_name=$rowdata['place_name'];
                $place_address=$rowdata['place_address'];
                $place_city=$rowdata['place_city'];            
                //$distance=$rowdata['distance']; 

                //echo $distance;

                $spot_id=$rowdata['spot_id'];
                $uid=$rowdata['spots_user_id'];

                $spot_text=$rowdata['spot_text'];
                $spot_img=$rowdata['spot_images_id'];
                $spot_time=$rowdata['spot_time'];

                $user_info_arr = get_user_info($uid);
                $username = $user_info_arr['username'];
                $user_profile_img = ($user_info_arr['img']);


                $user_follow_status = getFollowerStatusUser($uid);
                $user_follow_status_place = getFollowerStatusPlace($place_id);

                $icon_user_follow_status = " ";
                $icon_user_follow_status_place = " ";
                if($user_follow_status == 1){
                    $icon_user_follow_status = "<img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\" style=\"max-height: 13px;\">";
                }
                if($user_follow_status_place == 1){
                    $icon_user_follow_status_place = "<img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\" style=\"max-height: 13px;\">";
                }
                


                $spot_text = convertHashtoLink($spot_text);  
                $spot_text = convertUserTagToLinkFrontEnd($spot_text); 

                $spot_time=getDateTimeDifferenceString($spot_time);


                $infolike = get_likes_info($spot_id, 'post');
                $like_number = $infolike['like_number'];
                $like_status = $infolike['like_status'];

                $likes_string =$infolike['like_string'];
                $likes_counter = "";

                // PIACE A: STRING
                if($like_number > 0){

                    $likes_string = "<div onclick=\"goToLikes($spot_id,1)\" class=\"col ps-2 \" style=\"font-size: 13px;\">
                                <b class=\"text-dark\">Piace a:</b> $likes_string
                            </div>";


                }

                //controllo che abbia bia messo like cambio icona
                if($like_status > 0){
                    $like_button_post = "<div onclick=\"like_off($spot_id);\" class=\"btn btn-text-gr align-items-center\" data-bs-dismiss=\"modal\">
                                    <i class=\"bi bi-heart-fill\" style=\"margin-right: 3px!important;\"></i>
                                    <span class=\"text-gr\">Like</span>
                                </div> ";
                    

                }else{
                  $like_button_post = "<div onclick=\"like_on($spot_id);\" class=\"btn btn-text-dark align-items-center\" data-bs-dismiss=\"modal\">
                                    <i class=\"bi bi-heart\" style=\"margin-right: 3px!important;\"></i>
                                    <span class=\"text-dark\">Like</span>
                                </div> ";
                    
                }                     


                $btn_comm_label = "Commenta";
                $infocomment = get_comment_info($spot_id);
                $comment_number = $infocomment['comment_number'];
                $comment_status = $infocomment['comment_status'];
                //echo $spot_id;
                //echo $comment_status;
                if($comment_number > 0){
                    $btn_comm_label = " ($comment_number)";
                }

                if($comment_status > 0){
                        $comment_button_post = "<div  onclick=\"goToComments($spot_id, $comment_number);\" class=\"btn btn-text-gr d-flex align-items-center\">
                                        <i class=\"bi bi-chat-dots\"  style=\"margin-right: 5px!important;\"></i>
                                        <span class=\"text-gr\"  style=\"margin-right: 3px!important;\">$btn_comm_label</span>
                                    </div> ";
                        

                    }else{
                      $comment_button_post = "<div  onclick=\"goToComments($spot_id, $comment_number);\" class=\"btn btn-text-dark d-flex align-items-center\">
                                        <i class=\"bi bi-chat-dots\"  style=\"margin-right: 5px!important;\"></i>
                                        <span class=\"text-dark\"  style=\"margin-right: 3px!important;\">$btn_comm_label</span>
                                    </div> ";
                        
                    }  

                $infospotted = get_spotted_info($spot_id);
                $spotted_number = $infospotted['spotted_number'];
                $spotted_status = $infospotted['spotted_status'];
                //echo $spot_id;
                //echo $spotted_number;
                $btn_spot_label = 0;
                if($spotted_number > 0){
                    $btn_spot_label = "$spotted_number";
                }

       
                        
                        if($user_id == $uid){
                            $spotted_button_post = "<div  onclick=\"goSpottedRequest($spot_id, $spotted_number);\" class=\"btn btn-text-dark d-flex align-items-center\"  >
                                        <span class=\"badge badge-spotted\">$btn_spot_label</span>
                                        <span class=\"text-dark\"  style=\"margin-left: 3px!important;\">Spotted</span>
                                    </div>  ";
                        

                        }else{
                            if($spotted_status == 0){
                                $spotted_button_post = " <div  data-bs-toggle=\"modal\" data-bs-target=\"#DialogSpottedRequestButton\" class=\"btn btn-text-dark   align-items-center\" data-bs-dismiss=\"modal\"  onclick=\"openDialogSpottedSend($spot_id);\">
                                        <i class=\"bi bi-eye\"  style=\"margin-right: 3px!important;\"></i>
                                        <span class=\"text-dark\">Spotted</span>
                                    </div>  ";
                            }else{
                                $spotted_button_post = " <div class=\"btn btn-text-dark text-spotted   align-items-center\"  onclick=\"confirmSpottedSendRequestOff($spot_id);\">
                                        <i class=\"bi bi-eye\"  style=\"margin-right: 3px!important;\"></i>
                                        <span class=\"text-spotted\">Spotted</span>
                                    </div>  ";
                                
                            }
                        } 





                    include('post/post_media.php');
                    include('post/post_text.php');
                
            }

            ?>
             <script type="text/javascript">
                  var loading = document.getElementById ( "optionPostBtn" ) ;
                    loading.style.visibility = "hidden" ;
                </script>
            <?php

    }else{
            
            $itms_count = 0;
            //if(($itms_count == 0) AND ($last_id_itmes == 0)){ 
            ?>
                <!-- NoNearby -->
                <script type="text/javascript">
                  var loading = document.getElementById ( "optionMenu" ) ;
                    loading.style.visibility = "hidden" ;
                </script>
        <div class="text-center pt-5">
            <img src="<?php echo $path_url; ?>/assets/img/EmptyStateGeneric.png" class="img-fluid w-50 pt-5" style="max-width: 220px;">
            <div class="p-3">
                <h3>OPS...Qualcosa è andato storto...</h3>
                <p>Il contenuto che cerchi non è più disponibile o è stato rimosso.</p>
                <!--a href="///page_add.php?pid=<?php //echo $place_id;?>" class="btn btn-gr btn-text  shadowed">
                    Lascia uno Spot
                </a-->
            </div>
        </div>
        <!-- * NoNearby -->
            <?php
            //}
    }
 }

                //echo $longitude."  ".$latitude;
                //include('../post/post_media.php');

                //echo $longitude."  ".$latitude;
                //include('../post/post_text.php');

        ?>
        </div>

    </div>
    <!-- * App Capsule -->
    <!-- Notification Spotted Dialog Block -->
    <div class="modal fade dialogbox"   id="DialogPostOptions" data-bs-backdrop="static" data-bs-dismiss="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" >
            <div class="modal-content text-center" style="box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 28px 10px!important;">
                <div class="modal-footer">
                    <div class="btn-list">
                        <div  data-bs-toggle="modal" data-bs-target="#DialogBasic" class="btn btn-text-dark btn-block text-danger">
                            <i class="bi bi-trash3"></i>
                            <b>Elimina</b>
                        </div>
                        <div  onclick="goToSegnalaPost(<?php echo $spot_id; ?>);" class="btn btn-text-dark btn-block text-danger" data-bs-dismiss="modal">
                            <i class="bi bi-exclamation-triangle"></i>
                            <b>Segnala</b>
                        </div>
                        <!--div  onclick="goToNascondiPost(<?php //echo $spot_id; ?>);" class="btn btn-text-dark btn-block text-danger" data-bs-dismiss="modal">
                            <i class="bi bi-x-octagon"></i>
                            <b>Nascondi</b>
                        </div-->
                        <!--div class="btn btn-text-dark btn-block" data-bs-dismiss="modal">
                            <i class="bi bi-share-fill"></i>
                            Condividi Spot
                        </div-->                    
                        <div class="btn btn-text btn-block" data-bs-dismiss="modal">
                            Annulla
                        </div>
                    </div> 

                </div>
            </div>
        </div>
    </div>
    <!-- * Notification Spotted Dialog Block -->

    <div class="modal fade dialogbox" id="DialogBasic" data-bs-backdrop="static" tabindex="-1" aria-modal="true" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confermi?</h5>
                    </div>
                    <div class="modal-body">
                        Eliminare questo post?
                    </div>
                    <div class="modal-footer">
                        <div class="btn-inline">
                            <div onclick="goToEliminaPost(<?php echo $spot_id; ?>);"class="btn btn-text-danger" data-bs-dismiss="modal">
                            <i class="bi bi-trash3"></i>
                            Conferma</div>
                            <div class="btn btn-text-secondary" data-bs-dismiss="modal">Annulla</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
        // Dialog Profile Options 
        //include ('dialogs/dialog_post_options.php');

        // Footer Menu
        include('footer_app.php');
        
        // App sidebar
        //include('sidebar/app_sidebar.php'); 
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
        .page_post_details{
            display: none!important;
        }
    </style>


</body>

</html>