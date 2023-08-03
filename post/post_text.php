<?php

if(($spot_id != "") AND ($spot_img == 0)){

?>

<div class="section mt-2 mb-2">
    <div class="card ">
        <div class="card-body p-0">

            <div class="">
                <ul class="listview image-listview media border-0" style="border-radius: 16px;">
                
                    <li class="" >
                        <div class="item">

                            <div class="imageWrapper story" data-id="ramon" data-photo="https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/users/1.jpg" >
                                <img src="<?php echo $path_url;?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged w55">
                            </div>
                            <div class="in">
                                <div class="w-100 text-truncate"  onclick="goToPlace(<?php echo $place_id; ?>);">
                                    <span style="display: inline;"><?php echo $place_name; ?>
                                    <?php echo $icon_user_follow_status_place; ?>  
                                    </span>
                                    <div>
                                        <span class="text-truncate text-gr"></span>
                                        <span class="text-muted text-truncate"><?php echo $place_address." ".$place_city; ?></span>
                                    </div>


                                </div>
                                <span id="optionPostBtn" class="float-right" onclick="goToDetailsPost(<?php echo $spot_id; ?>)">
                                    <i class="bi bi-three-dots-vertical text-muted"></i>
                                </span>
                            </div>
                        </div>
                    </li>

                </ul>
            
            </div>

        
            <ul class="listview image-listview media border-0">

                 <li class="">
                    <div href="#" class="item">
                        <div class="in">
                            <span class="">
                                <?php echo $spot_text; ?>
                            </span>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="text-truncate" style="width: 80%;">
                <div id="piace_a_box_<?php echo $spot_id; ?>">
                    <?php echo $likes_string; ?>
                </div>
            </div>


            <div class="">
                <ul class="listview image-listview border-0">
                    <li>
                        <div class="item">
                            <img src="<?php echo $path_url;?><?php echo $user_profile_img; ?>" alt="image" class="image">
                            <div class="in">
                                <div class="w-100"  onclick="goToProfile(<?php echo $uid; ?>);">
                                    <span style="display: inline;"><?php echo $username; ?>
                                    <?php echo $icon_user_follow_status; ?>  
                                    </span>                                    
                                </div>
                                <span class="text-muted" style="width: 30%;"><?php echo $spot_time; ?></span>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="">
                <div class="">
                    <div class="card-footer">      
                        <div class="d-flex justify-content-center">
                            <div id="like_box_<?php echo $spot_id; ?>">
                                <?php echo $like_button_post; ?>
                            </div>
                            <div id="spotted_box_<?php echo $spot_id; ?>">
                                <?php echo $spotted_button_post; ?>
                            </div>
                            <div id="comment_box_<?php echo $spot_id; ?>">
                                <?php echo $comment_button_post; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- * Card Body -->
    </div>
    <!-- * Card -->
</div>

<?php 
}
?>