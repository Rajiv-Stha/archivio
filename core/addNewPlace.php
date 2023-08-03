<?php  
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
if(isset($_SESSION['user_id'])){
    include('functions.php');
}
else{
    header('location: ../login.php');
}

// Check for the existence of longitude and latitude in our POST request
// variables; if they're present, continue attempting to save
if (isset($_POST['nome'])) {
  // Cast variables to float 
	$follow_button = "";
  $user_id = $_SESSION['user_id'];
  $longitude = $_SESSION['user_longitude'];
  $latitude = $_SESSION['user_latitude'];
  $nome = mysql_real_escape_string($_POST['nome']);
  $indirizzo = mysql_real_escape_string($_POST['address']);
  $city = mysql_real_escape_string($_POST['city']);


if (($_SESSION['latitude'] == true) AND ($_SESSION['latitude'] == true) ){


 		$sql2 = "INSERT INTO `places` (`place_id`, `user_id`, `place_id_four`, `place_name`, `place_latitude`, `place_longitude`, `place_address`, `place_city`, `place_time`, `place_hidden`) VALUES (NULL, '$user_id', '', '$nome', '$latitude', '$longitude','$indirizzo', '$city', CURRENT_TIMESTAMP, '1');";
    	
    	$result2 = $db->query($sql2); 

  //echo $sql2;
		  $last_id = $db->getInsertId($db);

		  //echo "<br>".$last_id;

	header('location: ../page_add.php?pid='.$last_id);   
	}
 }