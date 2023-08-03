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

  $user_id = $_SESSION['user_id'];
  $to_user = $_POST['to_user'];
  $type = $_POST['t'];

      $sql2 = "DELETE from `followers` WHERE  (follow_user_id = '$to_user' AND follower_user_id = '$user_id' AND follower_type = 'user')";
      //echo $sql2;

    $result2 = $db->query($sql2); 

$icon = " <img src=\"$path_url/assets/img/footsteps.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button = "<div class=\"btn btn-gr shadowed border-0 btn-block btn-follow\" onclick=\"setFollowOn($to_user, $type);\">
                      $icon
                      <span class=\"text-white\">Inzia a seguire</span>
                  </div>";

echo $follow_button;




?>