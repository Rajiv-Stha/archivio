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
if (isset($_POST['post_id'])) {
  // Cast variables to float 

  $post_id = (float) $_POST['post_id'];
  $user_id = $_SESSION['user_id'];

  $sql1 = "SELECT * FROM likes WHERE (like_user_id = '$user_id' AND like_post_id = '$post_id' AND type = 'post' AND like_status = 1);";
    
    $result = $db->query($sql1); 
        
    //like gia inserito
    if (mysqli_num_rows($result) > 0) {

?>

      <div onclick="like_off(<?php echo $post_id; ?>);" class="btn btn-text-gr text-gr align-items-center" data-bs-dismiss="modal">
          <i class="bi bi-heart-fill" style="margin-right: 3px!important;"></i>
          <span class="text-gr">Like</span>
      </div> 


<?php


    }else{

      $sql2 = "INSERT INTO `likes` (`like_id`, `like_post_id`, `like_user_id`, `type`, `like_timestamp`, `like_status`) VALUES (NULL, '$post_id', '$user_id', 'post', CURRENT_TIMESTAMP, '1');";
    $result2 = $db->query($sql2); 


        $to = "cf87cea4-29c6-452f-8fe8-ac623d3c8f19";

$title = "Like";
$message = "Piace il tuo Spot";
$img = "";

$result = sendnotification($to, $title, $message, $img);


    
  ?>

      <div onclick="like_off(<?php echo $post_id; ?>);" class="btn btn-text-gr text-gr align-items-center" data-bs-dismiss="modal">
          <i class="bi bi-heart-fill" style="margin-right: 3px!important;"></i>
          <span class="text-gr">Like</span>
      </div> 


<?php

    }





}

?>