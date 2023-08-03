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

  $post_id = (float) $_REQUEST['post_id'];
  $comment_number = (float) $_REQUEST['cn'];



// se ci sono commenti seleziona da DB
//if ($comment_number >0) {



    $resArr = array();
    
    $db = new Db();

    $sql1 = "SELECT * FROM comments WHERE (comment_post_id = '$post_id' AND comment_status = 1) ORDER BY comment_timestamp DESC;";

    //echo $sql;

    $result = $db->query($sql1); 
        if (mysqli_num_rows($result) > 0) {

          

?>

<!-- comment block -->
  <div class="comment-block">
<?php


  while($rowdata = $result->fetch_assoc())
            {
                
                $comment_id=$rowdata['comment_id'];
                $comment_post_id=$rowdata['comment_post_id'];
                $comment_text=$rowdata['comment_text'];
                $comment_time=getDateTimeDifferenceString($rowdata['comment_timestamp']);
                $comment_user=$rowdata['comment_user_id'];


                $comment_user_info = get_user_info($comment_user);
                $user_id_comment = $comment_user_info['user_id'];
                $user_username = $comment_user_info['username'];
                $user_profile_img = ($comment_user_info['img']);

                $infolike = get_likes_info($comment_id, 'comment');
                $like_number = $infolike['like_number'];
                $like_status = $infolike['like_status'];
                $likes_counter = "";
                if($like_number > 0){
                  $likes_counter = "(".$like_number.")";
                }

                //controllo che abbia bia messo like cambio icona
                if($like_status > 0){
                  $icon_comment_like = "<i class=\"bi bi-heart-fill text-danger\"></i>";
                  $comment_like_button = "<a href=\"#\" class=\"comment-button\" onclick=\"like_off_comment($comment_id);\">
                      $icon_comment_like
                      Like $likes_counter
                  </a>";
                }else{
                  $icon_comment_like = "<i class=\"bi bi-heart text-dark\"></i>";
                  $comment_like_button = "<a href=\"#\" class=\"comment-button\"  onclick=\"like_on_comment($comment_id);\">
                      $icon_comment_like
                      Like $likes_counter
                  </a>";
                }                     

?>

       <div class="item">
          <div class="avatar">
              <img src="<?php echo $path_url; ?><?php echo $user_profile_img; ?>" alt="avatar" class="imaged w32 rounded">
          </div>
          <div class="in">
              <div class="comment-header">
                  <h4 class="title" onclick="goToProfile(<?php echo $user_id_comment; ?>)"><?php echo $user_username; ?></h4>
                  <span class="time">
                    <?php echo $comment_time; ?>
                  <?php if($user_id == $user_id_comment){?>
                    <span onclick="delete_comment(<?php echo $comment_id; ?>, <?php echo $comment_post_id; ?>)" class="ms-2 text-gray mt-1">
                      <i class="bi bi-trash3" style="font-size: 25px;"></i>
                    </span>
                  <?php } ?>
                  </span>
                  
              </div>
              <div class="text">
                  <?php print ($comment_text); ?>
              </div>
              <div class="comment-footer">
                <div id="like_box_comment_<?php echo $comment_id; ?>">
                  <?php echo $comment_like_button; ?>
                </div>
                  <!-- a href="#" class="comment-button">
                      <ion-icon name="chatbubble-outline"></ion-icon>
                      Reply
                  </a -->
              </div>
          </div>
      </div>
      <!-- * item -->


<?php
                  }
        }else{
          ?>
  <!-- NoComments -->
  <div class="text-center pt-5">
      <img src="assets/img/EmptyStateComments.png" class="img-fluid w-50 pt-5" style="max-width: 220px;">
      <div class="p-3">
          <h3>Nessun Commento</h3>
          <p>Lascia un commento ora</p>
      </div>
  </div>
  <!-- * NoComments -->

<?php

        }
    
//}else{

?>
  <!-- NoComments -->
  <!--div class="text-center pt-5">
      <img src="assets/img/EmptyStateComments.png" class="img-fluid w-50 pt-5" style="max-width: 220px;">
      <div class="p-3">
          <h3>Nessun Commento</h3>
          <p>Lascia un commento ora</p>
      </div>
  </div-->
  <!-- * NoComments -->

<?php
//}

?>
  </div>
  <!-- * comment block -->