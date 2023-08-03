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


$search = strtolower($_REQUEST['q']);
//echo $search;
 $resArr = array();
    
    $db = new Db();

    $sql1="SELECT users.user_id as res_id, users.username AS users_username, users.username as check_type FROM `users` WHERE LOWER(users.username) LIKE LOWER('$search%')  UNION all SELECT places.place_id as places_place_id, places.place_name as places_place_name, places.place_id as latitude FROM `places` WHERE LOWER(places.place_name) LIKE LOWER('$search%')  ORDER BY users_username ASC LIMIT 30;"; 
    //if  check_type == res_id  --> PLACE
    //echo $sql1;

    $result = $db->query($sql1); 
        if (mysqli_num_rows($result) > 0) {

          

?>

<ul class="listview image-listview">
  
<?php


  while($rowdata = $result->fetch_assoc())
            {
                
                $res_id = $rowdata['res_id'];
                $check_type = $rowdata['check_type'];

                if($check_type == $res_id){

                	  $user_info_arr = get_place_info($res_id);

                	$place_id = $user_info_arr['place_id'];
					    $place_name = $user_info_arr['place_name'];
					    $place_city = ($user_info_arr['place_city']);
					    $place_address = ($user_info_arr['place_address']);

					    $user_follow_status = getFollowerStatusPlace($res_id);

					    $res_name = $place_name;
	                	$res_string =  $place_city." ".$place_address;


	                	$function = "onclick='goToPlace($place_id)'";
	                	$img_css = " ";


                }else{
                	$user_info_arr = get_user_info($res_id);
	                $user_id_info = $user_info_arr['user_id'];
	                $user_username = $user_info_arr['username'];
	                $user_name = $user_info_arr['nome'];
	                $user_follow_status = getFollowerStatusUser($res_id);

	                $res_name = $user_username;
	                $res_string =  $user_name;

	                	$function = "onclick='goToProfile($user_id_info)'";
	                	$img_css = " rounded ";
                }

                

                
                //controllo che abbia bia messo like cambio icona
                if($user_follow_status == 1){
                  $icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-follow\" onclick=\"setFollowOff($res_id, '0');\">
                      $icon
                      <span class=\"text-dark\">Segui già</span>
                  </div>";
                }elseif($user_follow_status == 3){
                  $icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button = "<div class=\"btn btn-white shadowed border-0\" onclick=\"setFollowOff($res_id,'0');\">
                      $icon
                      <span class=\"text-dark\">Richiesta Inviata</span>
                  </div>";
                }else{
                  $icon = " <img src=\"$path_url/assets/img/footsteps.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button = "<div href=\"#\" class=\"btn btn-gr shadowed border-0\" onclick=\"setFollowOn($res_id ,'0');\">
                      $icon
                      <span class=\"text-white\">Inzia a seguire</span>
                  </div>";
                }

               // if($user_id == $res_id){
               //   $follow_button = "";
               // }     
?>

<li class="bg-white">
    <a class="item" <?php echo $function; ?>>
        <div class="imageWrapper">
            <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged w55 <?php echo $img_css; ?>">
        </div>
        <div class="in  text-truncate">
            <div class="ps-1">
                <?php echo $res_name;?>
                <div class="text-muted "><?php echo $res_string; ?></div>
            </div>
            <!--span class="text-muted"><?php //echo $follow_button;?></span-->
        </div>
    </a>
</li>

<?php
                  }
    
    }else{ //zero risultati
?>
<!-- GenericErroe -->
        <div class="text-center pt-5">
            <img src="assets/img/EmptyStateGeneric.png" class="img-fluid w-50 pt-5">
            <div class="p-3">
                <h3>OPS...</h3>
                <p>Nessun risultato...</p>
            </div>
        </div>
        <!-- * GenericErroe -->


<?php

        }

?>

            </ul>
