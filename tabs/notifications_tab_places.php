<?php
    $notification_type = 1;
    $notification_status = 1;
    $css_read_unread = " ";
    /*
    Tipo 1 = Spot intorno a te / details
    Tipo 2 = ha messo like al tuo spot / details
    Tipo 3 = ha lasciato un commento / details
    Tipo 4 = ha messo like al tuo commento / details
    Tipo 5 = ha iniziato a seguirti / profile_dest
    Tipo 6 = vuole iniziare a seguirti / dialog_box
    Tipo 7 = si è riconsciuto nel tuo spot / details
    Tipo 8 = ha confermato il tuo spotted + point / details
    Tipo 9 = è stato lasciato un Moment intorno a te
    Tipo 10 = ha messo like al tuo Moment
    Tipo 11 = ti ha taggato
    */
?>
<!-- Places tab -->
<div class="tab-pane fade" id="luoghi" role="tabpanel">
    <div class="section full">

        <?php
            if($notification_type == 1){
                // Spot intorno a te
                $location = "Crystal Bar, Caposele";
                $username = "vitale_89";
                $str = "ha lasciato uno Spot qui";
                $time = "10:30";
                if($notification_status == 1){
                    $css_read_unread = "bg-blue";
                }
                $spot_id = 33;
                $profile_user_dest = "";
        ?> 
        <ul class="listview image-listview media mb-2">
            <li class="<?php echo $css_read_unread ?>" onclick="goToDetailsPost(<?php echo $spot_id ?>)">
                <a href="#" class="item">
                    <div class="imageWrapper">
                        <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w55">
                    </div>
                    <div class="in">
                        <div>
                            <span class="text-truncate"> <?php echo $location ?> </span>
                            <div>
                                <span class="text-truncate text-gr"> <?php echo $username ?> </span>
                                <span class="text-muted text-truncate"> <?php echo $str ?> </span>
                            </div>
                        </div>
                        <span class="text-muted"> <?php echo $time ?> </span>
                    </div>
                </a>
            </li>

        <?php
            }
            if($notification_type == 1){
                // Like al tuo spot
                $username = "vincenzo_russomanno";
                $str = "ha messo like al tuo Spot";
                $time = "10:30";
                if($notification_status == 1){
                    $css_read_unread = "bg-gr";
                }
                $spot_id = "";
                $profile_user_dest = "";
        ?>
            <li class="<?php echo $css_read_unread ?>" onclick="goToDetailsPost(<?php echo $spot_id ?>)">
                <a href="#" class="item">
                    <div class="imageWrapper">
                        <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w55 rounded">
                    </div>
                    <div class="in">
                        <div>
                            <span class="text-truncate"> <?php echo $username ?> </span><br>
                            <span class="text-muted text-truncate"> <?php echo $str ?> </span>
                        </div>
                        <span class="text-muted">10:54</span>
                    </div>
                </a>
            </li>
        <?php
            }
            if($notification_type == 1){
                // Ha lasciato un commento
                $username = "mirko_castagno";
                $str = "ha commentato il tuo Spot";
                $time = "10:30";
                if($notification_status == 1){
                    $css_read_unread = "bg-gr";
                }
                $spot_id = "";
                $profile_user_dest = "";
        ?>
            <li class="<?php echo $css_read_unread ?>" onclick="goToDetailsPost(<?php echo $spot_id ?>)">
                <a href="#" class="item">
                    <div class="imageWrapper">
                        <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w55 rounded">
                    </div>
                    <div class="in">
                        <div>
                            <span class="text-truncate"> <?php echo $username ?> </span><br>
                            <span class="text-muted text-truncate"> <?php echo $str ?> </span>
                        </div>
                        <span class="text-muted">10:54</span>
                    </div>
                </a>
            </li>
        <?php
            }
            if($notification_type == 1){
                // Ha messo like al tuo commento
                $username = "benny_daniele";
                $str = "ha messo like al tuo commento";
                $time = "10:30";
                if($notification_status == 1){
                    $css_read_unread = " ";
                }
                $spot_id = "";
                $profile_user_dest = "16";
        ?>
            <li class="<?php echo $css_read_unread ?>" onclick="goToDetailsPost(<?php echo $spot_id ?>)">
                <a href="#" class="item">
                    <div class="imageWrapper">
                        <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w55 rounded">
                    </div>
                    <div class="in">
                        <div>
                            <span class="text-truncate"> <?php echo $username ?> </span><br>
                            <span class="text-muted text-truncate"> <?php echo $str ?> </span>
                        </div>
                        <span class="text-muted">10:54</span>
                    </div>
                </a>
            </li>
        <?php
            }
            if($notification_type == 1){
                // Ha iniziato a seguirti
                $username = "benny_daniele";
                $str = "ha iniziato a seguirti";
                $time = "10:30";
                if($notification_status == 1){
                    $css_read_unread = " ";
                }
                $spot_id = "";
                $profile_user_dest = "16";
        ?>
                <li class="<?php echo $css_read_unread ?>" onclick="goToProfile(<?php echo $profile_user_dest ?>)">
                    <a href="#" class="item">
                        <div class="imageWrapper">
                            <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w55 rounded">
                        </div>
                        <div class="in">
                            <div>
                                <span class="text-truncate"> <?php echo $username ?> </span><br>
                                <span class="text-muted text-truncate"> <?php echo $str ?> </span>
                            </div>
                            <span class="text-muted">10:54</span>
                        </div>
                    </a>
                </li>
        <?php
            }
            if($notification_type == 1){
                // Ha iniziato a seguirti
                $username = "benny_daniele";
                $str = "vuole iniziare a seguirti";
                $time = "10:30";
                if($notification_status == 1){
                    $css_read_unread = " ";
                }
                $spot_id = "";
                $profile_user_dest = "16";
        ?>
                <li class="<?php echo $css_read_unread ?>" onclick="openModalSpottedRequest(1);">
                    <a href="#" class="item">
                        <div class="imageWrapper">
                            <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w55 rounded">
                        </div>
                        <div class="in">
                            <div>
                                <span class="text-truncate"> <?php echo $username ?> </span><br>
                                <span class="text-muted text-truncate"> <?php echo $str ?> </span>
                            </div>
                            <span class="text-muted">10:54</span>
                        </div>
                    </a>
                </li>
        <?php
            }
            if($notification_type == 1){
                // Si è riconsciuto nel tuo spot
                $username = "benny_daniele";
                $str = "si è riconsciuto nel tuo spot";
                $time = "10:30";
                if($notification_status == 1){
                    $css_read_unread = " ";
                }
                $spot_id = "";
                $profile_user_dest = "16";
        ?>
                <li class="<?php echo $css_read_unread ?>" onclick="goToDetailsPost(<?php echo $spot_id ?>);">
                    <a href="#" class="item">
                        <div class="imageWrapper">
                            <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w55 rounded">
                        </div>
                        <div class="in">
                            <div>
                                <span class="text-truncate"> <?php echo $username ?> </span><br>
                                <span class="text-muted text-truncate"> <?php echo $str ?> </span>
                            </div>
                            <span class="text-muted">10:54</span>
                        </div>
                    </a>
                </li>
        <?php
            }
            if($notification_type == 1){
                // Ha confermato il tuo spotted
                $username = "benny_daniele";
                $str = "ha confermato il tuo <strong class='text-spotted'>Spotted</strong>";
                $time = "10:30";
                if($notification_status == 1){
                    $css_read_unread = " ";
                }
                $spot_id = "";
                $profile_user_dest = "16";
        ?>
                <li class="<?php echo $css_read_unread ?>" onclick="goToDetailsPost(<?php echo $spot_id ?>);">
                    <a href="#" class="item">
                        <div class="imageWrapper">
                            <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w55  rounded">
                        </div>
                        <div class="in">
                            <div>
                                <span class="text-truncate"> <?php echo $username ?> </span><br>
                                <span class="text-muted text-truncate"> <?php echo $str ?> </span>
                            </div>
                            <span class="text-muted">10:54</span>
                        </div>
                    </a>
                </li>
        <?php
            }
            if($notification_type == 1){
                // Moment intorno a te
                $location = "Crystal Bar, Caposele";
                $username = "vitale_89";
                $str = "ha lasciato un Moment intorno a te 
                ";
                $time = "10:30";
                if($notification_status == 1){
                    $css_read_unread = "bg-violet";
                }
                $spot_id = "";
                $profile_user_dest = "";
        ?>
            <li class="<?php echo $css_read_unread ?>" onclick="">
                <a href="#" class="item">
                    <div class="imageWrapper">
                        <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w55">
                    </div>
                    <div class="in">
                        <div>
                            <span class="text-truncate"> <?php echo $location ?> </span>
                            <div>
                                <span class="text-truncate text-gr"> <?php echo $username ?> </span>
                                <span class="text-muted text-truncate"> <?php echo $str ?> </span>
                            </div>
                        </div>
                        <span class="text-muted"> <?php echo $time ?> </span>
                    </div>
                </a>
            </li>
        <?php
            }
            if($notification_type == 1){
                // Ha messo like al tuo moment
                $username = "benny_daniele";
                $str = "ha messo like al tuo moment";
                $time = "10:30";
                if($notification_status == 1){
                    $css_read_unread = " ";
                }
                $spot_id = "";
                $profile_user_dest = "16";
        ?>
                <li class="<?php echo $css_read_unread ?>" onclick="">
                    <a href="#" class="item">
                        <div class="imageWrapper">
                            <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w55 rounded">
                        </div>
                        <div class="in">
                            <div>
                                <span class="text-truncate"> <?php echo $username ?> </span><br>
                                <span class="text-muted text-truncate"> <?php echo $str ?> </span>
                            </div>
                            <span class="text-muted">10:54</span>
                        </div>
                    </a>
                </li>
            </ul>
        <?php
            }
        ?>
            

        
    </div>

</div>
<!-- * Places tab -->