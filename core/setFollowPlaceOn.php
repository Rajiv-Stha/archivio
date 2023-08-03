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
if (isset($_POST['to_user'])) {
  // Cast variables to float 
	$follow_button = "";
  $user_id = $_SESSION['user_id'];
  $to_user = $_POST['to_user'];
  $type = $_POST['t'];

      $user_info_arr = get_place_info($to_user);
                
    $user_id_info = $user_info_arr['place_id'];
    $user_follow_status = getFollowerStatusPlace($to_user);

       
    //follow gia inserito
    if ($user_follow_status == 1) {

			$icon = " <img src=\"$path_url/assets/img/footsteps.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
			                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-block btn-follow\" onclick=\"setFollowPlaceOff($user_id_info, $type);\">
			                      $icon
			                      <span class=\"text-dark\">Segui già</span>
			                  </div>";

	
		}else{



			      $sql2 = "INSERT INTO `followers` ( `follower_user_id`, `follow_user_id`, `follower_type`, `follower_status`) VALUES ( '$user_id', '$to_user', 'place', '1');";
    	$result2 = $db->query($sql2); 

    	//echo $sql2;

			  		$icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
			                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-block btn-follow\" onclick=\"setFollowPlaceOff($user_id_info, $type);\">
			                      $icon
			                      <span class=\"text-dark\">Segui già</span>
			                  </div>";
		

  		
			      


    }


			echo $follow_button;



}

?>