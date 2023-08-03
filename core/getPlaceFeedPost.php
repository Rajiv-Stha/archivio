<?php  
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
if(isset($_SESSION['user_id'])){
    include('functions.php');
}
else{
    header('location: login.php');
}

$user_id = $_SESSION['user_id'];
$msg = '';
$itms_count = 0;




$last_id_itmes = 0;

if(isset($_REQUEST['last_id_list'])){
    $last_id_itmes = $itms_count+$_REQUEST['last_id_list'];   
}




if(isset($_REQUEST['place_id'])){

	$place_id = $_REQUEST['place_id']; 
  
//echo $last_id_itmes;
  
     $sql1 = "SELECT spots.*, places.*, places.place_id as places_place_id, spots.user_id as spots_user_id FROM spots INNER JOIN places ON places.place_id=spots.place_id WHERE spots.place_id = '$place_id' ORDER BY spots.spot_time DESC LIMIT  $last_id_itmes, 5";

    //echo $sql1;

    $result = $db->query($sql1); 
        
    //controlo login e setto role
    if (mysqli_num_rows($result) > 0) {

        while($rowdata = $result->fetch_assoc())
            {
                
                $place_id=$rowdata['places_place_id'];
                $place_name=$rowdata['place_name'];
                $place_address=$rowdata['place_address'];
                $place_city=$rowdata['place_city'];            

                //echo $distance;

                $spot_id=$rowdata['spot_id'];
                $uid=$rowdata['spots_user_id'];


                $spot_text=$rowdata['spot_text'];
                $spot_img=$rowdata['spot_images_id'];
                $spot_time=$rowdata['spot_time'];

                $user_info_arr = get_user_info($uid);
                $username = $user_info_arr['username'];
                $user_profile_img = $user_info_arr['img'];

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
                
                $spot_img=$rowdata['spot_images_id'];
                $spot_img_file = getImageByID($spot_img);  
                $spot_img_file = "/uploads/spot/".$spot_img_file;


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



                        $itms_count++;

                $itms_count_ads = $itms_count+$last_id_itmes;


                //CARICO ADS 
                if(($itms_count_ads == 3) OR ($itms_count_ads == 9)){
                    ?>
                    <div class="section mt-2">
                        <div class="card bg-dark text-white">
                            <img src="https://mobilekit.bragherstudio.com/view29/assets/img/sample/photo/wide3.jpg" class="card-img overlay-img" alt="image">
                            <div class="card-img-overlay">
                                <h5 class="card-title">ADS</h5>
                                <p class="card-text">Some card text here and more natural text content.</p>
                                <p class="card-text"><div class="btn btn-text-dark bg-white">Scopri</div></p>
                            </div>
                        </div>
                    </div>
                <?php
                }

                if(($itms_count_ads == 5) OR ($itms_count_ads == 15)){
                    include('../carousel/suggestion_luoghi.php');

                }


                    include('../post/post_media.php');
                    include('../post/post_text.php');
                
            }

            $itms_count = $itms_count+$last_id_itmes; 
        //echo "<input type='text' id='last_id' value='$spot_id'>";
            echo "<script>$('#last_id').val($itms_count);</script>";

    }else{
            //echo "<script>$('#last_id').val('0');</script>";

            echo "<script>var isDataAvailable = false;</script>";
            //non ci sono contenuti
            //aggiungo skeleton
            $itms_count == 1;
            if(($itms_count == 0) AND ($last_id_itmes == 0)){ 
            ?>
                <!-- NoNearby -->
        <div class="text-center pt-5">
            <img src="<?php echo $path_url; ?>/assets/img/EmptyStateNoPlaces.png" class="img-fluid w-50 pt-5" style="max-width: 220px;">
            <div class="p-3">
                <h3>Nessuno Spot è stato ancora lasciato qui...</h3>
                <p>Inizia a seguire questo luogo e non perderti gli Spot che vengono lasciati qui.</p>
                <!--a href="///page_add.php?pid=<?php echo $place_id;?>" class="btn btn-gr btn-text  shadowed">
                    Lascia uno Spot
                </a-->
            </div>
        </div>
        <!-- * NoNearby -->
            <?php
            }
    }
}

                //echo $longitude."  ".$latitude;
                //include('../post/post_media.php');

                //echo $longitude."  ".$latitude;
                //include('../post/post_text.php');

?>