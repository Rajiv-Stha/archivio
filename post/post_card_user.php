<?php
    
//$user_card_id = 3;

if((@$user_card_id != "")){

     $user_info_arr = get_user_info($user_card_id);
                
    $user_card_id_info = $user_info_arr['user_id'];
    $user_card_username = $user_info_arr['username'];
    $user_card_nome = $user_info_arr['nome'];
    $user_profile_img = ($user_info_arr['img']);
    
    if($user_card_nome == ""){
        $user_card_nome ="<br>";    
    }
    //$user_bio = ($user_info_arr['bio']);
    $user_card_private_profile = ($user_info_arr['private_profile']);
    $user_card_follow_status = getFollowerStatusUser($user_card_id);
    $user_card_followers = getFollowers($user_card_id);
    $user_card_follow_seguiti = getSeguiti($user_card_id);
    $user_card_follow_spotted_point = getSpottedPoint($user_card_id);


?>
   
        <div class="col-6 pt-2" id="suggest_user_<?php echo $user_card_id; ?>">
            <div class="card product-card">
                <div class="card-body">
                    <span  onclick="addSuggestionRemoveUser(<?php echo $user_card_id_info; ?>);" class="float-end opacity-50 close_button" style="position: absolute; right: 5px; padding-top: 5px;"><i class="bi bi-x-lg me-1 bg-white text-dark rounded-circle" style="padding: 3px;" ></i></span>
                    <div onclick="goToProfile(<?php echo $user_card_id_info; ?>);"  class="ps-2 pe-2 pt-2 text-center"style="overflow: hidden;">
                        <img src="<?php echo $path_url; ?><?php echo $user_profile_img; ?>" alt="image" class="imaged  rounded mb-1 w120" loading="lazy">
                        <h2 class="title" ><?php echo $user_card_username; ?></h2>
                        <p class="text text-truncate"><?php echo $user_card_nome; ?></p>
                    </div>
                    
                    <div class="row text-center mt-1">
                        <div class="col-6">
                            <a href="#" class="item text-dark">
                                <i class="bi bi-eye me-1"></i><strong><?php echo $user_card_follow_spotted_point; ?></strong>
                            </a>
                        </div>
                        <div class="col-6 text-center">
                            <a href="#" class="item text-dark">
                                <i class="bi bi-person me-1"></i><strong id="box_followes_number_card<?php echo $user_card_id_info; ?>">
                                        <?php echo $user_card_followers; ?>   
                                </strong>
                            </a>
                        </div>
                    </div>

                    <?php
                    //controllo che abbia bia messo user_follow_status cambio icona
                    if($user_card_follow_status == 1){
                      $icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                      $follow_button_card_user = "<div class=\"btn btn-white shadowed border-0 btn-block\" onclick=\"setFollowOff($user_card_id_info,'1');\">
                          $icon
                          <span class=\"text-dark\">Segui già</span>
                      </div>";
                    }elseif($user_card_follow_status == 3){
                      $icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                      $follow_button_card_user = "<div class=\"btn btn-white shadowed border-0 btn-block\" onclick=\"setFollowOff($user_card_id_info,'1');\">
                          $icon
                          <span class=\"text-dark\">Richiesta Inviata</span>
                      </div>";
                    }else{
                      $icon = " <img src=\"$path_url/assets/img/footsteps.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                      $follow_button_card_user = "<div href=\"#\" class=\"btn btn-gr shadowed border-0 btn-block\" onclick=\"setFollowOn($user_card_id_info,'1');\">
                          $icon
                          <span class=\"text-white\">SEGUI</span>
                      </div>";
                    }

                    if($user_id == $user_card_id_info){
                      $follow_button_card_user = "";
                    }  

                    ?>
                    <div class="pt-1" id="follow_button_box_user<?php echo $user_card_id_info; ?>">
                      <?php echo $follow_button_card_user; ?>
                    </div>
                </div>
            </div>
        </div>
 <?php 
}

?>   