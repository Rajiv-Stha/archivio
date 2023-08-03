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

$to = "411f8db9-6d76-45cb-a081-43a2676d6dad";

$title = "Spott@";
$message = "Ciao Daniele è stato lasciato uno spot intorno a te";
$img = "";
//$urls = "https://app.spottat.com/page_post_details.php?sid=";
$url = "";
$result = sendnotification($to, $title, $message, $img, $url);

echo $result;


?>