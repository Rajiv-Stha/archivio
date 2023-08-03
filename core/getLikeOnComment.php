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

  $sql1 = "SELECT * FROM likes WHERE (like_user_id = '$user_id' AND like_post_id = '$post_id' AND type = 'comment' AND like_status = 1);";
    
    $result = $db->query($sql1); 
        
    //like gia inserito
    if (mysqli_num_rows($result) > 0) {

      $icon_comment_like = "<i class=\"bi bi-heart-fill text-danger\"></i>";
                  $comment_like_button = "<a href=\"#\" class=\"comment-button\" onclick=\"like_off_comment($post_id);\">
                      $icon_comment_like
                      Like
                  </a>";


    }else{

    $sql2 = "INSERT INTO `likes` (`like_id`, `like_post_id`, `like_user_id`, `type`, `like_timestamp`, `like_status`) VALUES (NULL, '$post_id', '$user_id', 'comment', CURRENT_TIMESTAMP, '1');";
    $result2 = $db->query($sql2); 
 
    $icon_comment_like = "<i class=\"bi bi-heart-fill text-danger\"></i>";
                  $comment_like_button = "<div class=\"comment-button\" onclick=\"like_off_comment($post_id);\">
                      $icon_comment_like
                      Like
                  </div>";


    }


    echo $comment_like_button;
}

?>


