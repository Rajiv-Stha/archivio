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

    <!-- App Header -->
    <div class="appHeader text-light bg-spotted" style="background: linear-gradient(to right, #b739f3, #6950fb)!important;">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="pageTitle">Spotted</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

<?php

$user_id_get = (float) $_REQUEST['pid'];
  $l_number = (float) $_REQUEST['n'];
  $user_id = $_SESSION['user_id'];


// se ci sono commenti seleziona da DB
if ($l_number >0) {



    $resArr = array();
    
    $db = new Db();

    $sql2="SELECT  DISTINCT spotted_request.spotted_request_to_user_id , spotted_request.spotted_request_post_id  from spotted_request INNER JOIN spots ON spots.spot_id =  spotted_request.spotted_request_post_id where spots.place_id = '$user_id_get' AND spotted_request.spotted_request_confirmed = 1 AND spotted_request.spotted_request_status = 1;"; //confermate
   
//echo $sql2;


    $result2 = $db->query($sql2); 
        if (mysqli_num_rows($result2) > 0) {

        


  while($rowdata2 = $result2->fetch_assoc()){
            
        $spot_spotted_id =$rowdata2['spotted_request_post_id'];


        $sql1 = "SELECT spots.*, places.*, places.place_id as places_place_id, spots.user_id as spots_user_id FROM spots INNER JOIN places ON places.place_id=spots.place_id WHERE spots.spot_id = '$spot_spotted_id' ORDER BY spots.spot_time DESC ";

        //echo $sql1;

        $result = $db->query($sql1); 
            
        //controlo login e setto role
        if (mysqli_num_rows($result) > 0) {

            $rowdata = $result->fetch_assoc();
                $place_id=$rowdata['place_id'];
                $place_name=$rowdata['place_name'];
                $place_address=$rowdata['place_address'];
                $place_city=$rowdata['place_city'];            
                //echo $distance;

                $spot_id=$rowdata['spot_id'];
                $uid=$rowdata['user_id'];

                $spot_text=$rowdata['spot_text'];
                $spot_img=$rowdata['spot_images_id'];
                $spot_time=$rowdata['spot_time'];

                $user_info_arr = get_user_info($uid);
                $username = $user_info_arr['username'];


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

            }
        
        }
    
}else{

?>
<!-- NoPlaces -->
        <div class="text-center pt-5">
            <img src="assets/img/EmptyStateSpotted.png" class="img-fluid w-50 pt-5" style="max-width: 220px;">
            <div class="p-3">
                <h3>Ancora nessuna conferma <br><span class="text-spotted">Spotted</span> ricevuta.</h3>
            </div>
        </div>
        <!-- * NoPlaces -->


<?php
}

?>

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

</html>