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

  $username = "";
    $user_id = $_SESSION['user_id'];
  $user_id_get = $_REQUEST['user_id_get'];


  $user_info_arr = get_user_info($user_id_get);
                
    
    $user_followers = getFollowers($user_id_get);


    echo $user_followers;

