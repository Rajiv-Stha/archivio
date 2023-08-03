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

  $spot_id = $_REQUEST['post_id'];
  $user_id = $_SESSION['user_id'];



$infolike = get_likes_info($spot_id, 'post');
$like_number = $infolike['like_number'];
$like_status = $infolike['like_status'];

$likes_string =$infolike['like_string'];
$likes_counter = "";

// PIACE A: STRING
if($like_number > 0){

    $likes_string = "<div onclick=\"goToLikes($spot_id,1)\" class=\"col ps-2 \" style=\"font-size: 13px;\">
                <b class=\"text-dark\">Piace a:</b> $likes_string
            </div>";


}


echo $likes_string;

?>