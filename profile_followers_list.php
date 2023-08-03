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
    <!--div id="loader">
        <div class="spinner-border text-gr" role="status"></div>
    </div-->
    <!-- * loader -->


    <!-- Header -->
    <div class="appHeader bg-primary">
        <div class="left">
            <a href="#" class="headerButton goBack text-white">
                <i class="bi bi-chevron-left text-white"></i>
            </a>
        </div>

        <div class="pageTitle">
            Followers
        </div>
        
        <div class="right">
        </div>
    </div>
    <!-- * Header -->


    <!-- App Capsule -->
    <div id="appCapsule" >
         <div id="likeModalContent">
                    
        </div>
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


<script type="text/javascript">

    //carico lista likes
    getFollowers(<?php echo $_REQUEST['uid'];?>, <?php echo $_REQUEST['n'];?>);
</script>

</body>

</html>
