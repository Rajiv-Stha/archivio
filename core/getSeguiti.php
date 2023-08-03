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

  $user_id_get = (float) $_REQUEST['user_id'];
  $l_number = (float) $_REQUEST['ln'];
  $user_id = $_SESSION['user_id'];


// se ci sono commenti seleziona da DB
if ($l_number >0) {



    $resArr = array();
    
    $db = new Db();

    $sql1="SELECT * from followers where follower_user_id = '$user_id_get' AND follower_type = 'user' AND follower_status = 1 ORDER BY follower_timestamp DESC;"; //confermate
    //echo $sql1;

    $result = $db->query($sql1); 
        if (mysqli_num_rows($result) > 0) {

          

?>

<ul class="listview image-listview">
  
<?php


  while($rowdata = $result->fetch_assoc())
            {
                
                $user_id_list = $rowdata['follow_user_id'];

                $user_info_arr = get_user_info($user_id_list);
                $user_id_info = $user_info_arr['user_id'];
                $user_username = $user_info_arr['username'];
                $user_follow_status = getFollowerStatusUser($user_id_info);

                
                //controllo che abbia bia messo like cambio icona
                if($user_follow_status == 1){
                  $icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button = "<div class=\"btn btn-white shadowed border-0 btn-follow\" onclick=\"setFollowOff($user_id_info, '0');\">
                      $icon
                      <span class=\"text-dark\">Segui già</span>
                  </div>";
                }elseif($user_follow_status == 3){
                  $icon = " <img src=\"$path_url/assets/img/footsteps-sharp.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button = "<div class=\"btn btn-white shadowed border-0\" onclick=\"setFollowOff($user_id_info,'0');\">
                      $icon
                      <span class=\"text-dark\">Richiesta Inviata</span>
                  </div>";
                }else{
                  $icon = " <img src=\"$path_url/assets/img/footsteps.svg\"  fill = \"#fff\" class=\"icon_footsteps\">";
                  $follow_button = "<div href=\"#\" class=\"btn btn-gr shadowed border-0\" onclick=\"setFollowOn($user_id_info ,'0');\">
                      $icon
                      <span class=\"text-white\">Inzia a seguire</span>
                  </div>";
                }

                if($user_id == $user_id_info){
                  $follow_button = "";
                }     
?>
    <li>
        <div class="item">
            <img src="<?php echo $path_url; ?>/assets/img/sample/avatar/avatar2.jpg" alt="image" class="image">
            <div class="in">
                <div  onclick="goToProfile(<?php echo $user_id_info; ?>)"><?php echo $user_username; ?></div>
                <div id="follow_button_box_like_modal<?php echo $user_id_info; ?>">
                  <?php echo $follow_button; ?>
                </div>
            </div>
        </div>
    </li>


<?php
                  }
        }
    
}else{

?>
<!-- NoPlaces -->
        <div class="text-center pt-5">
            <img src="assets/img/EmptyStateGeneric.png" class="img-fluid w-50 pt-5" style="max-width: 220px;">
            <div class="p-3">
                <h3>Non c'è niente qui</h3>
            </div>
        </div>
        <!-- * NoPlaces -->


<?php
}

?>
                   
                </ul>  
  <!-- * likes block -->