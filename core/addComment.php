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




    $user_id = $_SESSION['user_id']; 
    $comment_text = mysql_real_escape_string($_POST['comment_text']);
    $comment_text = htmlentities($comment_text);
    $post_id = $_POST['post_id'];   


    $db = new Db();
    $con = getdb();
      
        

        $sql = "INSERT INTO `comments` (`comment_post_id`, `comment_user_id`, `comment_text` ) VALUES ('$post_id', '$user_id', '$comment_text' )";
        //echo $sql;

        $result = $db->query($sql); 

?>
