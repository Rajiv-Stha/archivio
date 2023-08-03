<?php  
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start(); 

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
    <div class="appHeader bg-primary text-light d-none">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="pageTitle">Load</div>
        <div class="right">
        </div>

          
                
    </div>
    <!-- * App Header -->
<div class="extraHeader">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" id="searchbox" class="form-control" placeholder="Search...">
                <i class="input-icon">
                <i class="bi bi-search"></i>
                </i>
            </div>
        </form>
    </div>

    <!-- App Capsule -->
    <div id="appCapsule" class="extra-header-active">
 
    <div id="results" class="section">
        <div class="row">

</div>

                 </div>
    </div>
    <!-- * App Capsule -->



    <!-- App Bottom Menu -->
    <?php
    // Footer
        //include('footer_app.php');
    ?>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->

    <?php
        // Footer Script JS
        include('footer.php');
    ?>

</body>

<script type="text/javascript">
    setTimeout(function () {
        window.location = "login.php";
    }, 3000);
</script>
</html>