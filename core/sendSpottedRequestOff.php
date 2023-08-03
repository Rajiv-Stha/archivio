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


  $user_id = $_SESSION['user_id'];
  $post_id = $_POST['post_id'];

  $post_info_arr = get_post_info($post_id);

  $to_user = $post_info_arr['user_id'];

//echo $post_id;

     $sql2 = "DELETE FROM `spotted_request`WHERE  (spotted_request_user_id = '$user_id' AND spotted_request_to_user_id = '$to_user' AND spotted_request_post_id = '$post_id' )";
          //echo $sql2;

        $result2 = $db->query($sql2); 


$button = "<div  onclick=\"openDialogSpottedSend($post_id);\"  data-bs-toggle=\"modal\" data-bs-target=\"#DialogSpottedRequestButton\" class=\"btn btn-text-dark   align-items-center\" data-bs-dismiss=\"modal\">
                                    <i class=\"bi bi-eye\"  style=\"margin-right: 3px!important;\"></i>
                                    <span >Spotted</span>
                                </div> ";

echo $button;




?>