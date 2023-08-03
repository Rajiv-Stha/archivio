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


    <!-- Header -->
    <div class="appHeader bg-primary invisible">
        <div class="left">
            <a href="#" class="headerButton goBack text-white">
                <i class="bi bi-chevron-left text-white"></i>
            </a>
        </div>

        <div class="pageTitle">
            Lascia uno Spot
        </div>
        
        <div class="right">
            <a href="javascript:;" class="headerButton toggle-searchbox text-white">
                <i class="bi bi-send"></i>
            </a>
        </div>
    </div>

    <!-- Search Component -->
    <div id="search" class="appHeader">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Search...">
                <i class="input-icon">
                    <i class="bi bi-search"></i>
                </i>
                <a href="javascript:;" class="ml-1 close toggle-searchbox">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>
        </form>
    </div>
    <!-- * Search Component -->

    <!-- * Header -->


    <!-- App Capsule -->
    <div id="appCapsule" class="bg-white" style="padding: 0px!important;"> 
        <div class="section pe-0 ps-0 wh-100">
            
            <!-- Form Creazione post -->
            <form>
                
                <div class="" style="height: 100vh!important; background: gray!important;">
                    

                    <div style=" position: absolute; bottom: 15%!important; align-items: flex-end!important; justify-content: center; color: #fff; padding: 50px 24px; ">
                        <p>This is simple text for the story sndfiv9d</p>
                    </div>

                    <div class="fab-button animate top-left dropdown goBack" style=" top: 18px;">
                        <div class="fab" style="background: #fff!important;">
                            <i class="bi bi-chevron-left text-dark"></i>
                        </div>
                    </div>

                    <div class="fab-button animate top-right dropdown" style=" top: 18px;">
                        <div class="fab bg-primary">
                            <i class="bi bi-send text-white"></i>
                        </div>
                    </div>


                    <div class="fab-button animate bottom-center dropdown" style="position: absolute; bottom: 15%!important;">
                        <div class="fab" style="background: #fff!important;">
                            <i class="bi bi-camera text-dark"></i>
                        </div>
                    </div>

                    <div class="fab-button animate bottom-right dropup" style="position: absolute; bottom: 15%!important;">
                        <div class="fab " data-bs-toggle="dropdown" aria-expanded="false" style="background: #000!important;">
                            <i class="bi bi-plus text-white"  style="font-size: 45px;"></i>
                        </div>
                        <div class="dropdown-menu" style="">
                            <div class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#actionSheetAddTextStories" style="background: #000!important;">
                                <i class="bi bi-chat-left-text"></i>
                                <p>Testo</p>
                            </div>
                            <div class="dropdown-item" data-bs-toggle="offcanvas" data-bs-target="#actionSheetContent" style="background: #000!important;">
                                <i class="bi bi-card-image text-dark"></i>
                                <p>Immagine</p>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="fixed-bottom" style="z-index: 99999!important;">
                    
                    <ul class="listview image-listview">
                        <li class="pt-2 pb-2">
                            <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#ModalListview">
                                <img src="assets/img/blue_square_pin.jpg" alt="image" class="image">
                                <div class="in">
                                    <div>Dove Sei?</div>
                                    <span class="badge badge-danger">&nbsp;</span>
                                </div>
                            </a>
                        </li>


                        <!-- li class="pt-2 pb-2">
                            <a href="#" class="item" data-bs-toggle="offcanvas" data-bs-target="#actionSheetContent">
                                <img src="assets/img/sample/avatar/media_icon.png" alt="image" class="image" >
                                <div class="in">
                                    <div>Aggiungi Foto/Video</div>
                                </div>
                            </a>
                        </li -->

                        <!-- li class="pt-2 pb-2">
                            <div href="#" class="row item" data-bs-toggle="offcanvas" data-bs-target="#actionSheetContent">
                                <div class="col-2">
                                    <div class="custom-file-upload" id="fileUpload1" style="width: 50px;
                                        height: 50px;">
                                        <input type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                                        <label for="fileuploadInput">
                                            <span class="m-0 p-0">
                                                <i class="bi bi-plus"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            <div class="col-10">
                                <div class="in">
                                    <div>Aggiungi Foto/Video</div>
                                </div>
                            </div>
                            </div>
                        </li -->
                    </ul>
                </div>
                
               
            </form>
            <!-- * Form Creazione post -->
        </div>
    </div>
    <!-- * App Capsule -->


    

    <?php
        // Post add notification
        include ('notifications/notification_add_post.php');

        // Modal add place
        include ('modals/modal_add_place.php');

        // Action sheet add text stories
        include ('action_sheet/action_sheet_add_text_stories.php');

        // Action sheet add text stories
        include ('action_sheet/action_sheet_add_media.php');

        // Footer Menu
        include('footer_app.php');

        // App sidebar
        include('sidebar/app_sidebar.php'); 
    ?>                        




     <?php
        // Footer Script JS
        //include('footer.php');
    ?>

    <script>
        // Trigger welcome notification after 5 seconds
        setTimeout(() => {
            notification('notification-welcome', 5000);
        }, 2000);
    </script>
    <!-- Date Picker Js -->
    

    <!-- 
    <script>
        $(document).ready(function() {
            $('#date').bootstrapMaterialDatePicker({
                time: false,
                clearButton: true
            });
        });
    </script>

    -->

</body>

</html>