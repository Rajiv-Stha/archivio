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
  // Cast variables to float 
  $follow_button = "";
  $user_id = $_SESSION['user_id'];
  $post_id = $_POST['post_id'];

  //echo $post_id;


  $post_info_arr = get_post_info($post_id);

  $to_user = $post_info_arr['user_id'];

//echo $to_user;

  $sql1 = "SELECT * FROM `spotted_request` WHERE (spotted_request_user_id = '$user_id' AND spotted_request_to_user_id = '$to_user'  AND spotted_request_post_id = $post_id AND spotted_request_status = 0)";

//echo $sql1;

    $result = $db->query($sql1); 
        
    //follow gia inserito
    if (mysqli_num_rows($result) > 0) {


        $button = "<div  onclick=\"confirmSpottedSendRequestOff($post_id);\"   class=\"btn btn-text-spotted   align-items-center\" >
                  <i class=\"bi bi-eye-fill\"  style=\"margin-right: 3px!important;\"></i>
                  <span >Spotted</span>
              </div> ";

    }else{

      $sql2 = "INSERT INTO `spotted_request` ( `spotted_request_user_id`, `spotted_request_to_user_id` , `spotted_request_post_id`) VALUES ( '$user_id', '$to_user' , '$post_id');";
    $result2 = $db->query($sql2); 
        

        $button = "<div  onclick=\"openDialogSpottedSend($post_id);\"   class=\"btn btn-text-spotted   align-items-center\" >
                    <i class=\"bi bi-eye\"  style=\"margin-right: 3px!important;\"></i>
                    <span >Spotted</span>
                </div> ";





    }


      echo $button;




?>