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

    $sql2 = "UPDATE `comments` SET `comment_status` = '0' WHERE  (  comment_user_id = '$user_id' AND comment_id = '$post_id')";
    $result2 = $db->query($sql2); 
    
    
}

?>

