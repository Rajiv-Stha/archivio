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
  $post_id = $_REQUEST['post_id'];

  $to_user = $_REQUEST['to_user'];



             $user_info_arr = get_user_info($to_user);
                $user_id_info = $user_info_arr['user_id'];
                $user_username = $user_info_arr['username'];



?>


                <div class="modal-header mt-2">
                    <h5 class="modal-title d-none">Spotted Point</h5>
                        <img onclick="goToProfile(<?php echo $user_id_info; ?>);" src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged w55 rounded" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
                </div>
                <div class="modal-body" style="background: #fff!important;">
                    <h3 class="text-dark"><?php echo $user_username;?> <br> <span class="text-muted">si è riconosciuto nel tuo Spot.</span></h3>
                    <h3>È la persona che hai avvistato?</h3>
                </div>
                <input type="hidden" name="reqeust_from_user_id" id="reqeust_from_user_id" value="0">
                <div class="modal-footer">
                    <div class="btn-list">
                        <div onclick="goToProfile(<?php echo $user_id_info; ?>);" class="btn btn-text-dark btn-block" data-bs-dismiss="modal">
                            <i class="bi bi-person"></i>
                            Visualizza Profilo
                        </div>
                        <div onclick="goToDetailsPost(<?php echo $post_id; ?>);" class="btn btn-text-dark btn-block" data-bs-dismiss="modal">
                            <i class="bi bi-geo"></i>
                            Dettagli Spot
                        </div>
                    </div>

                    <div class="btn-inline" style="border-top: 0.5px solid lightgray;!important;">
                        <div onclick="confirmSpottedRequest(<?php echo $post_id ?>, <?php echo $user_id_info; ?>);" class="btn btn-text-success btn-block text-spotted" data-bs-dismiss="modal">
                            <i class="bi bi-eye"></i>
                            Accetta
                        </div>
                        <div class="btn btn-text text-danger btn-block" data-bs-dismiss="modal">
                            <i class="bi bi-trash3"></i>
                            Rifiuta
                        </div>
                    </div>
                </div>
        
<!-- * Notification Spotted Dialog Block -->