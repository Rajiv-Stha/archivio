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
            Commenti
        </div>
        
        <div class="right">
        </div>
    </div>
    <!-- * Header -->


<?php
    $user_info_arr = get_user_info($_SESSION['user_id']);
                
    $user_id_info = $user_info_arr['user_id'];
    $user_profile_img = ($user_info_arr['img']);
?>
    <!-- App Capsule -->
    <div id="appCapsule" >
        <div class="section mb-2  pt-2 pb-2 bg-white">
            <div id="commentModalContent">
                
            </div>
        </div>

        <div class="chatFooter" style="z-index: 999999!important;">
            <form id="add_comment" name="add_comment" method="POST"  onsubmit="event.preventDefault();">
                <div class="avatar">
                    <img src="<?php echo $path_url; ?><?php echo $user_profile_img; ?>" alt="avatar" class="imaged w32 rounded">
                </div>
                <div class="form-group boxed pe-2">
                    <div class="input-wrapper">
                        <input type="text" class="form-control" placeholder="Lascia un commento..." name="comment_text" id="comment_text">
                        <input type="hidden" class="form-control" value="<?php echo $_REQUEST['pid'];?>" id="comment_post_id" name="post_id">
                    </div>
                </div>
                <button type="submit" name="add_comment_" onclick="submitComment();" class="btn btn-icon btn-primary rounded">
                    <i class="bi bi-send"></i>
                </button>
            </form>
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



</body>


<script type="text/javascript">

    //carico lista commenti
    getComments(<?php echo $_REQUEST['pid'];?>, <?php echo $_REQUEST['n'];?>);
</script>


<script type="text/javascript">


function submitComment(){

    $.ajax({
        url: 'core/addComment.php',
            type: "POST",
            data: $('#add_comment').serialize(),
            success: function(data){
                $('#comment_text').val('');
                getComments(<?php echo $_REQUEST['pid'];?>, 1);
                //sessionStorage.removeItem('latitude');
                //sessionStorage.removeItem('longitude');
            },
            error: function(){
                alert("Si è verificato un errore!");
            }
    });
};


</script>
</html>