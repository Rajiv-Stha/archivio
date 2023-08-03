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
        <div class="pageTitle">Esplora</div>
        <div class="right">
            <a href="cerca.php" class="headerButton goBack">
                <i class="bi bi-search"></i>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    <!-- Extra Header -->
    <div class="extraHeader">
        <ul class="nav nav-tabs lined" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#utenti" role="tab">
                    Trend Nearby
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#luoghi" role="tab">
                    Trend Top
                </a>
            </li>
        </ul>
    </div>
    <!-- * Extra Header -->





    <!-- App Capsule -->
    <div id="appCapsule" class="extra-header-active">
        


        <div class="tab-content">


            <!-- * trend nearby tab -->
            <div class="tab-pane fade show active" id="utenti" role="tabpanel">

                <div class="section full">
                    
                    <?php 
                    include ('tabs/esplora_tab_nearby.php');
                    ?>


                </div>

            </div>
            <!-- * trend nearby tab -->



            <!-- * TOP nearby tab -->
            <div class="tab-pane fade" id="luoghi" role="tabpanel">

                <div class="section full">
                    <h3>TEST</h3>
                    
                </div>

            </div>
            <!-- * TOP nearby tab -->


        </div>



    </div>
    <!-- * App Capsule -->



    <!-- App Bottom Menu -->
    <?php
    // Footer
        include('footer_app.php');
    ?>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarPanel">
        <div class="offcanvas-body">
            <!-- profile box -->
            <div class="profileBox">
                <div class="image-wrapper">
                    <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged rounded">
                </div>
                <div class="in">
                    <strong>Julian Gruber</strong>
                    <div class="text-muted">
                        <ion-icon name="location"></ion-icon>
                        California
                    </div>
                </div>
                <a href="#" class="close-sidebar-button" data-bs-dismiss="offcanvas">
                    <ion-icon name="close"></ion-icon>
                </a>
            </div>
            <!-- * profile box -->

            <ul class="listview flush transparent no-line image-listview mt-2">
                <li>
                    <a href="index.html" class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="home-outline"></ion-icon>
                        </div>
                        <div class="in">
                            Discover
                        </div>
                    </a>
                </li>
                <li>
                    <a href="app-components.html" class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="cube-outline"></ion-icon>
                        </div>
                        <div class="in">
                            Components
                        </div>
                    </a>
                </li>
                <li>
                    <a href="app-pages.html" class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="layers-outline"></ion-icon>
                        </div>
                        <div class="in">
                            <div>Pages</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="page-chat.html" class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                        </div>
                        <div class="in">
                            <div>Chat</div>
                            <span class="badge badge-danger">5</span>
                        </div>
                    </a>
                </li>
                <li>
                    <div class="item">
                        <div class="icon-box bg-primary">
                            <ion-icon name="moon-outline"></ion-icon>
                        </div>
                        <div class="in">
                            <div>Dark Mode</div>
                            <div class="form-check form-switch">
                                <input class="form-check-input dark-mode-switch" type="checkbox" id="darkmodesidebar">
                                <label class="form-check-label" for="darkmodesidebar"></label>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <div class="listview-title mt-2 mb-1">
                <span>Friends</span>
            </div>
            <ul class="listview image-listview flush transparent no-line">
                <li>
                    <a href="page-chat.html" class="item">
                        <img src="assets/img/sample/avatar/avatar7.jpg" alt="image" class="image">
                        <div class="in">
                            <div>Sophie Asveld</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="page-chat.html" class="item">
                        <img src="assets/img/sample/avatar/avatar3.jpg" alt="image" class="image">
                        <div class="in">
                            <div>Sebastian Bennett</div>
                            <span class="badge badge-danger">6</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="page-chat.html" class="item">
                        <img src="assets/img/sample/avatar/avatar10.jpg" alt="image" class="image">
                        <div class="in">
                            <div>Beth Murphy</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="page-chat.html" class="item">
                        <img src="assets/img/sample/avatar/avatar2.jpg" alt="image" class="image">
                        <div class="in">
                            <div>Amelia Cabal</div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="page-chat.html" class="item">
                        <img src="assets/img/sample/avatar/avatar5.jpg" alt="image" class="image">
                        <div class="in">
                            <div>Henry Doe</div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar buttons -->
        <div class="sidebar-buttons">
            <a href="#" class="button">
                <ion-icon name="person-outline"></ion-icon>
            </a>
            <a href="#" class="button">
                <ion-icon name="archive-outline"></ion-icon>
            </a>
            <a href="#" class="button">
                <ion-icon name="settings-outline"></ion-icon>
            </a>
            <a href="#" class="button">
                <ion-icon name="log-out-outline"></ion-icon>
            </a>
        </div>
        <!-- * sidebar buttons -->
    </div>
    <!-- * App Sidebar -->

    <?php
        // Footer Script JS
        include('footer.php');
    ?>

</body>

</html>