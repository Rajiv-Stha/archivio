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
if (isset($_POST['longitude']) && isset($_POST['latitude'])) {
  // Cast variables to float 

  $longitude = (float) $_POST['longitude'];
  $latitude = (float) $_POST['latitude'];
 

  // Set the timestamp from the current system time
  $time = time();


  echo $longitude." ".$latitude;



}

?>