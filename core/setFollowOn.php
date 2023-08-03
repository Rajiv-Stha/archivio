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

      $user_info_arr = get_user_info($to_user);
                
    $user_id_info = $user_info_arr['user_id'];
    $user_username = $user_info_arr['username'];
    $user_follow_status = getFollowerStatusUser($to_user);
    $user_private_profile = $user_info_arr['private_profile'];

       
    //follow gia inserito
    if ($user_follow_status == 1) {

			$icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
			                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-block btn-follow\" onclick=\"setFollowOff($to_user, $type);\">
			                      $icon
			                      <span class=\"text-dark\">Segui già</span>
			                  </div>";

		


    }elseif($user_follow_status == 3) {


    			$icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
			                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-block btn-follow\" onclick=\"setFollowOff($to_user, $type);\">
			                      $icon
			                      <span class=\"text-dark\">Richiesta Inviata</span>
			                  </div>";
		}elseif(($user_follow_status == 4)){
				if($user_private_profile == 1){
						$request_type = 3;
				  }else{
				  	$request_type = 1;
				  }
			      $sql2 = "UPDATE `followers` SET `follower_status` = '$request_type' WHERE  follow_user_id = '$user_id' AND follower_user_id = '$to_user' AND follower_type = 'user' ";
      //echo $sql2;

    $result2 = $db->query($sql2); 

		
  			
	  			if($user_private_profile == 1){
						$icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
			                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-block btn-follow\" onclick=\"setFollowOff($user_id_info, $type);\">
			                      $icon
			                      <span class=\"text-dark\">Richiesta Inviata</span>
			                  </div>";
				  }else{
				  			$icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
			                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-block btn-follow\" onclick=\"setFollowOff($user_id_info, $type);\">
			                      $icon
			                      <span class=\"text-dark\">Segui già</span>
			                  </div>";
				  }
		}else{

			if($user_private_profile == 1){
						$request_type = 3;
				  }else{
				  	$request_type = 1;
				  }


			      $sql2 = "INSERT INTO `followers` ( `follower_user_id`, `follow_user_id`, `follower_type`, `follower_status`) VALUES ( '$user_id', '$to_user', 'user', '$request_type');";
    	$result2 = $db->query($sql2); 

    	//echo $sql2;

    			if($user_private_profile == 1){
					$icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
			                  $icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
			                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-block btn-follow\" onclick=\"setFollowOff($user_id_info, $type);\">
			                      $icon
			                      <span class=\"text-dark\">Richiesta Inviata</span>
			                  </div>";
			  }else{
			  		$icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
			                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-block btn-follow\" onclick=\"setFollowOff($user_id_info, $type);\">
			                      $icon
			                      <span class=\"text-dark\">Segui già</span>
			                  </div>";
		}


  		
			      


    }


			echo $follow_button;



}

?>