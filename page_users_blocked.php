
<?php 
    
    $path_url= "http://localhost/spottat";
    // $path_url= "https://fixuapp.com/spottat";



?>

<!doctype html>
<html lang="en">

<?php
    include 'header.php';
?>

<body class="">

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
        <div class="pageTitle">Utenti Bloccati</div>
        
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule" >

        
            <div class=" p-0">
                <ul class="listview image-listview">
                    <li>
                        <div class="item">
                            <img src="<?php echo $path_url; ?>/assets/img/sample/avatar/avatar3.jpg" alt="image" class="image">
                            <div class="in">
                                <div onclick="goToProfile(1);" >Edward Lindgren</div>
                                <a href="#" class="btn btn-secondary shadowed border-0">
                                    <i class="bi bi-lock"></i>
                                    <span class="text-white">Sblocca</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item">
                            <img src="<?php echo $path_url; ?>/assets/img/sample/avatar/avatar2.jpg" alt="image" class="image">
                            <div class="in">
                                <div onclick="goToProfile(1);">Emelda Scandroot</div>
                                <a href="#" class="btn btn-secondary shadowed border-0">
                                    <i class="bi bi-lock"></i>
                                    <span class="text-white">Sblocca</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item">
                            <img src="<?php echo $path_url; ?>/assets/img/sample/avatar/avatar2.jpg" alt="image" class="image">
                            <div class="in">
                                <div onclick="goToProfile(1);">vitale89</div>
                                <a href="#" class="btn btn-secondary shadowed border-0" >
                                    <i class="bi bi-lock"></i>
                                    <span class="text-white">Sblocca</span>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="item">
                            <img src="<?php echo $path_url; ?>/assets/img/sample/avatar/avatar2.jpg" alt="image" class="image">
                            <div class="in">
                                <div onclick="goToProfile(1);">mirko_cast</div>
                                <a href="#" class="btn btn-secondary shadowed border-0">
                                    <i class="bi bi-lock"></i>
                                    <span class="text-white">Sblocca</span>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>   
            </div>
            <!-- * Card Body -->



    </div>
    <!-- * App Capsule -->



    <?php
        // Footer Script JS
        include('footer.php');
    ?>

</body>

</html>