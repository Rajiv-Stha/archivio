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
    $msg = @$_REQUEST['msg'];


    $user_info_arr = get_user_info($user_id);
    $user_id_info = $user_info_arr['user_id'];
    $user_username = $user_info_arr['username'];
    $user_nome = $user_info_arr['nome'];
    $user_bio = ($user_info_arr['bio']);
    $user_profile_img = ($user_info_arr['img']);
    $user_private_profile = ($user_info_arr['private_profile']);
    $user_follow_status = getFollowerStatusUser($user_id_info);
    $user_followers = getFollowers($user_id_info);
    $user_follow_seguiti = getSeguiti($user_id_info);
    $user_follow_spotted_point = getSpottedPoint($user_id_info);



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
        <div class="pageTitle">Modifica Profilo</div>
        
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule" >

        <div class="login-form">
            <form method="POST" action="core/updateProfile.php"  enctype="multipart/form-data">
                <div class="section text-start mt-5">
                    <div class="row text-center">

                        <span class="pt-2"><?php echo $msg; ?></span>

                        <h3><?php echo $user_username; ?></h3>
                        <div class="col-6">
                            <div class="avatar" >
                                <img src="<?php echo $path_url;?><?php echo $user_profile_img; ?>" alt="image_profile" class="imaged w64 imaged" style="height: 120px!important; width: 150px!important;">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="custom-file-upload" id="fileUpload1" style="height: 120px!important; width: 150px!important;">
                                <input type="file" id="fileuploadInput" name="the_file" accept=".png, .jpg, .jpeg">
                                <label for="fileuploadInput">
                                    <span class="p-0 m-0">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                </label>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="section mt-2 mb-5">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="name" style="font-size: 15px!important;">Nome:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nome..."  value="<?php echo $user_nome; ?>">
                            <i class="clear-input">
                                <i class="bi bi-x-lg"></i>
                            </i>
                        </div>
                    </div>

                    <!--div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="username" style="font-size: 15px!important;">Username:</label>
                            <input type="text" class="form-control" id="username" placeholder="Username..." value="<?php //echo $username; ?>">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div-->

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="bio" style="font-size: 15px!important;">Biografia:</label>
                            <textarea id="bio" rows="4" class="form-control" placeholder="Biografia..." name="bio"><?php echo $user_bio; ?></textarea>
                            <i class="clear-input">
                                <i class="bi bi-x-lg" ></i>
                            </i>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn bg-primary btn-block btn-lg" name="update_profile">Salva</button>
                    </div>
                </div>
            </form>
        </div>



    </div>
    <!-- * App Capsule -->



    <?php
        // Footer Script JS
        include('footer.php');
    ?>

</body>

</html>