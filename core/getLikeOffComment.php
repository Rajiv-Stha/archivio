<?php  
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
if(isset($_SESSION['user_id'])){
    include('functions.php');
}
else{
    header('location: login.php');
}

// Check for the existence of longitude and latitude in our POST request
// variables; if they're present, continue attempting to save
if (isset($_POST['comment_post_id'])) {
  // Cast variables to float 

  $post_id = (float) $_POST['comment_post_id'];
  $user_id = $_SESSION['user_id'];

    $sql2 = "UPDATE `likes` SET `like_status` = '0' WHERE  (like_user_id = '$user_id' AND like_post_id = '$post_id' AND type = 'comment' AND like_status = 1)";
    $result2 = $db->query($sql2); 
    
    $icon_comment_like = "<i class=\"bi bi-heart text-dark\"></i>";

    $comment_like_button = "<div class=\"comment-button\"  onclick=\"like_on_comment($post_id);\">
                      $icon_comment_like
                      Like 
                  </div>";


    echo $comment_like_button;

}

?>

