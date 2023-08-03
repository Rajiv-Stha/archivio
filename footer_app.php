<?php

//include('core/functions.php');
//controllo pagina attivo
$url_footer_menu = $_SERVER['REQUEST_URI'];

//gestistco il menu css classe active
$active_home = "";
$active_esplora = "";
$active_page_add = "";
$active_notifications = "";
$active_page_profile = "";

if (strpos($url_footer_menu,'home') !== false) {
    $active_home = " active ";
}elseif(strpos($url_footer_menu,'esplora') !== false){
    $active_esplora = " active ";
}elseif(strpos($url_footer_menu,'cerca') !== false){
    $active_esplora = " active ";
}
elseif(strpos($url_footer_menu,'page_add') !== false){
    $active_page_add = " active ";
}elseif(strpos($url_footer_menu,'notifications') !== false){
    $active_notifications = " active ";
}elseif(strpos($url_footer_menu,'page_profile.php') !== false){
    if(!isset($_REQUEST['uid'])){
        $active_page_profile = " active ";
    }
}

?>
<!-- App Bottom Menu -->
<div class="appBottomMenu">

    <a href="home.php" class="item <?php echo $active_home; ?>" onclick="resetLocation();">
        <div class="col">
            <!--ion-icon name="home-outline"></ion-icon-->
            <i class="bi bi-house"></i>
        </div>
    </a>
    <a href="cerca.php" class="item <?php echo $active_esplora; ?>">
        <div class="col">
            <!--ion-icon name="search-outline"></ion-icon-->
            <i class="bi bi-search"></i>
        </div>
    </a>

    <a href="page_add.php" class="item <?php echo $active_page_add; ?>">
        <div class="col">
            <!--ion-icon name="add-outline"></ion-icon-->
            <i class="bi bi-plus" style="font-size: 45px;"></i>
        </div>
    </a>

    
    <!-- <a href="page-chat.html" class="item">
        <div class="col">
            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
            <span class="badge badge-danger">5</span>
        </div>
    </a> -->
    
    <a href="notifications.php" class="item <?php echo $active_notifications; ?>">
        <div class="col">
            <!--ion-icon name="notifications-outline"></ion-icon-->
            <i class="bi bi-bell"></i>
            <?php
            //controllo sulla tabella users se bubble_notfiche_status = 1 attivo bubble e conto notifiche non lette
            $notifiche_couter = "";
            $user_info_arr_notifich = get_user_info($_SESSION['user_id']);
            $check_notification_status = $user_info_arr_notifich['notifiche_status'];
            $notifiche_couter = 5; 
            if($check_notification_status == 1){
            ?>
                <span class="badge badge-primary"><?php echo @$notifiche_couter; ?></span>
            <?php 
            }?>
        </div>
    </a>
    <a href="page_profile.php" class="item <?php echo $active_page_profile; ?>">
        <div class="col">
            <!--ion-icon name="person-outline"></ion-icon-->
            <i class="bi bi-person"></i>
        </div>
    </a>
    
</div>
<!-- * App Bottom Menu -->


<!-- * Toast Update Ok -->

<div id="toast-update-ok" class="toast-box toast-top" style="z-index: 999">
    <div class="in">
        <div class="text-white">
            Aggiornato.
        </div>
    </div>
</div>
<!-- * Toast Update Ok -->
<!-- * Toast Update Ok -->

<div id="toast-add-spot-ok" class="toast-box toast-top tap-to-close" style="z-index: 999">
    <div class="in">
        <div class="text-white">
            <b style="font-size:18px;">Spot pubblicato!</b><br>Attendi che qualcuno si riconosca...
        </div>
    </div>
</div>
<!-- * Toast Update Ok -->


<?php
        // Modal & Dialogs Post 
        include('post/post_modals_dialogs.php'); 
?>