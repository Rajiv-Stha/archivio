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

  $resArr = array();
    
    $db = new Db();

    $sql1 = "SELECT * FROM spotted_request WHERE (spotted_request_post_id = '$post_id' AND spotted_request_status = 1 AND spotted_request_to_user_id = '$user_id' AND spotted_request_user_id = '$to_user' );";
    
    //echo $sql1;
    $result = $db->query($sql1); 
        if (mysqli_num_rows($result) > 0) {
            
            $reset_spotted_request = "UPDATE `spotted_request` SET `spotted_request_confirmed` = '0' WHERE (spotted_request_post_id = '$post_id' AND spotted_request_status = 1 )";

            echo $reset_spotted_request;

            $result2 = $db->query($reset_spotted_request); 
                //confermo richiesta
                 $sqlsetspotted = "UPDATE `spotted_request` SET `spotted_request_confirmed` = '1' WHERE (spotted_request_post_id = '$post_id' AND spotted_request_status = 1 AND spotted_request_to_user_id = '$user_id' AND spotted_request_user_id = '$to_user' )";

                $result2 = $db->query($sqlsetspotted); 

            

        }

?>
