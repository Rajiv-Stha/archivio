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

  $follow_button = "";
  $user_id = $_SESSION['user_id'];
  $post_id = $_REQUEST['post_id'];
  $spotted_request_number = (float) $_REQUEST['n'];


  $post_info_arr = get_post_info($post_id);

  $to_user = $post_info_arr['user_id'];

// se ci sono commenti seleziona da DB
if ($spotted_request_number >0) {



    $resArr = array();
    
    $db = new Db();

    $sql1 = "SELECT * FROM spotted_request WHERE (spotted_request_post_id = '$post_id' AND spotted_request_status = 1) ORDER BY spotted_request_confirmed DESC, spotted_request_timestamp DESC ;";
    //echo $sql1;
    $result = $db->query($sql1); 
        if (mysqli_num_rows($result) > 0) {
?>
            <ul class="listview image-listview"> 
<?php


            while($rowdata = $result->fetch_assoc()){

                $spotted_request_id=$rowdata['spotted_request_id'];
                $spotted_request__post_id=$rowdata['spotted_request_post_id'];
                $spotted_request_user_id=$rowdata['spotted_request_user_id'];
                $spotted_request_confirmed=$rowdata['spotted_request_confirmed'];


                $user_info_arr = get_user_info($spotted_request_user_id);
                $user_id_info = $user_info_arr['user_id'];
                $user_username = $user_info_arr['username'];
                $user_follow_status = $user_info_arr['private_profile'];


                //controllo che abbia sia il confermato
                if($spotted_request_confirmed > 0){
                echo "
                    <li class=\"\">
                        <div class=\"item\">
                            <img src=\"$path_url/assets/img/sample/avatar/avatar3.jpg\" alt=\"image\" class=\"image\" onclick=\"goToProfile($user_id_info);\">
                            <div class=\"in\">
                                <div onclick=\"goToProfile($user_id_info);\" class=\"text-spotted\">$user_username</div>
                                <span class=\"badge bg-spotted shadowed border-0 p-2\" style=\"font-size: 16px!important;\">
                                    <i class=\"bi bi-eye-fill\"></i>
                                    <b class=\"ms-1\">Confermato</b>
                                </span>
                            </div>
                        </div>
                    </li>";
                }else{
                ?> 
                 <li>
                    <div class="item">
                        <img src="<?php echo $path_url; ?>/assets/img/sample/avatar/avatar2.jpg" alt="image" class="image" onclick="goToProfile(<?php echo $user_id_info; ?>);">
                        <div class="in">
                            <div  onclick="goToProfile(<?php echo $user_id_info; ?>)"><?php echo $user_username; ?></div>
                            <div class="btn bg-white shadowed border-1" onclick="openModalSpottedRequest(<?php echo $post_id; ?>,<?php echo $user_id_info; ?>);">
                                <i class="bi bi-eye"></i>
                                <span class="" >Conferma</span>
                            </div>
                        </div>
                    </div>
                 </li>
    <?php
                }                 
  
                        
            }//while
        }
    
}else{

?>
<!-- NoPlaces -->
        <div class="text-center pt-5">
            <img src="assets/img/EmptyStateSpotted.png" class="img-fluid w-50 pt-5" style="max-width: 220px;">
            <div class="p-3">
                <h3>Nessun utente si è riconosciuto nel tuo Spot.</h3>
                <p>Tutte le richieste <b class="text-spotted">Spotted</b> le troverai qui.</p>
            </div>
        </div>
        <!-- * NoPlaces -->


<?php
}

?>
                   
 </ul>  
  <!-- * likes block -->