<?php
    
//$place_card_id = 3;

if((@$place_card_id != "")){


    $user_info_arr = get_place_info($place_card_id);
                
    $place_card_id = $user_info_arr['place_id'];
    $place_card_name = $user_info_arr['place_name'];
    $place_card_latitude = $user_info_arr['place_latitude'];
    $place_card_longitude = ($user_info_arr['place_longitude']);
    $place_card_city = ($user_info_arr['place_city']);
    $place_card_address = ($user_info_arr['place_address']);
    $place_card_rating = ($user_info_arr['place_rating']);

    $follower_card_status = ($user_info_arr['follower_status']);
    $place_card_follow_status = getFollowerStatusPlace($place_card_id);
    //$user_follow_seguiti = getSeguiti($place_id_get);
    //$user_follow_spotted_point = getSpottedPoint($place_id_get);

    $place_card_followers = ($user_info_arr['place_followers']);
    $place_card_spotted_confirmed = ($user_info_arr['place_spotted_confirmed']);
    $place_card_posts = ($user_info_arr['place_posts']);
    
    $place_card_img = getPlaceLastImage($place_card_id);


?>
   
        <div class="col-6 pt-2" id="suggest_place_<?php echo $place_card_id; ?>">
            <div class="card product-card">
                <div class="card-body">
                    <div>
                        <div>
                            <span  onclick="addSuggestionRemovePlace(<?php echo $place_card_id; ?>);" class="float-end opacity-50 close_button" style="position: absolute; right: 5px; padding-top: 5px;"><i class="bi bi-x-lg me-1 bg-white text-dark rounded-circle" style="padding: 3px;" ></i></span>
                            <img  onclick="goToPlace(<?php echo $place_card_id; ?>);" src="<?php echo $path_url; ?><?php echo $place_card_img; ?>" alt="image" loading="lazy" class="imaged  " style="display: block; margin-left: auto; margin-right: auto; width: 100%; max-height: 167px!important;">

                        </div>
                    <div  onclick="goToPlace(<?php echo $place_card_id; ?>);">
                        <h2 class="title" ><?php echo $place_card_name; ?></h2>
                        <p class="text text-truncate"><?php echo $place_card_city; ?></p>
                    </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-6">
                            <a href="#" class="item text-dark">
                                <i class="bi bi-eye me-1"></i><strong><?php echo $place_card_spotted_confirmed; ?></strong>
                            </a>
                        </div>
                        <div class="col-6 text-center">

                            <a href="#" class="item text-dark">
                                <i class="bi bi-person me-1"></i><strong>
                                    <span id="box_followes_number_<?php echo $place_card_id; ?>">
                                        <?php echo $place_card_followers; ?>   
                                </span></strong>
                            </a>
                        </div>
                    </div>

                    
                    <?php
                      //controllo che abbia bia messo follow cambio icona
                if($place_card_follow_status == 1){
                  $icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button_card_place = "<div class=\"btn btn-white shadowed border-0 btn-block\" onclick=\"setFollowPlaceOff($place_card_id,'2');\">
                      $icon
                      <span class=\"text-dark\">Segui già</span>
                  </div>";
                }else{
                  $icon = " <img src=\"$path_url/assets/img/footsteps.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button_card_place = "<div href=\"#\" class=\"btn btn-gr bg-place shadowed border-0 btn-block\" onclick=\"setFollowPlaceOn($place_card_id,'2');\">
                      $icon
                      <span class=\"text-white\">SEGUI</span>
                  </div>";
                }
                   
                    ?>
                    <div id="follow_button_box_place<?php echo $place_card_id; ?>">
                      <?php echo $follow_button_card_place; ?>
                    </div>
                </div>
            </div>
        </div>
<?php 
}

?>