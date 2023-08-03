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

//aggiorno sulla tabella users se bubble_notfiche_status = 0 
$sql2 = "UPDATE `users` SET `bubble_notfiche_status` = 0 WHERE  user_id = '$user_id' ";
      //echo $sql2;
$result2 = $db->query($sql2); 


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
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="pageTitle">Notifiche</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- Extra Header -->
    <div class="extraHeader">
        <ul class="nav nav-tabs lined" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#utenti" role="tab">
                    Utenti
                    <span class="badge badge-primary ms-1 badge-xs ">&nbsp</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#luoghi" role="tab">
                    Spot
                </a>
            </li>
        </ul>
    </div>
    <!-- * Extra Header -->





    <!-- App Capsule -->
    <div id="appCapsule" class="extra-header-active">

        <!-- Tab content -->
        <div class="tab-content">

            <?php
                // Users tab
                include('tabs/notifications_tab_users.php');


                // Places tab
                include('tabs/notifications_tab_places.php'); 
            ?>

        </div>
        <!-- * Tab Content -->


    </div>
    <!-- * App Capsule -->


    <?php
        // Notification Spotted Dialog Block
        include ('dialogs/dialog_notification_spotted.php');

        // Notification Spotted Confirmed
        include ('dialogs/dialog_notification_spotted_confirmed.php'); 
    
        // Follower Dialog Block
        include ('dialogs/dialog_notification_follower.php'); 
    
        // Welcome notifications
        include('notifications/notification_welcome.php');
   
        // Footer
        include('footer_app.php');

        // App sidebar
        include('sidebar/app_sidebar.php');
    ?>

     <?php
        // Footer Script JS
        include('footer.php');
    ?>


    <script>
        // Trigger welcome notification after 5 seconds
        setTimeout(() => {
            notification('notification-welcome', 5000);
        }, 2000);
           sessionStorage.removeItem('latitude');
            sessionStorage.removeItem('longitude');
    </script>

</body>

</html>