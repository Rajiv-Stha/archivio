<?php 
header("Content-Type:application/json");

ob_start();
session_start();
include('core/connection.php');
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$msg = '';


//$_SESSION['valid'] = true;
//header('location: home.php');   


if(isset($_REQUEST['logout'])){
    unset($_SESSION["username"]);
    unset($_SESSION["password"]);
    unset($_SESSION["valid"]);
    unset($_SESSION["logInFromApp"]);

    $_SESSION['valid'] = false;
    

    $msg = '<span class="badge badge-danger w-100 p-1">Logout effettuato.</span><br>';
    
    session_destroy();

    header('location: login.php?msg='.$msg);   
    

}else{



    @$username = strtolower($_REQUEST['username']);
    @$pass = $_REQUEST['password'];
    @$device_id = $_REQUEST['device_id'];
    @$device_os = $_REQUEST['device_os'];
    @$app_version = $_REQUEST['version'];


    $username = trim($username);
    $pass = trim($pass);


    $sql = "SELECT * FROM `users` WHERE  ((`username` = '$username') or ( `email` = '$username' )) AND `password` = '$pass'";

    //echo $sql;


    $result = $db->query($sql); 
        
    //controlo login e setto role
    if (mysqli_num_rows($result) > 0) {
        $rowdata = mysqli_fetch_array($result);
        $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['user_id'] = $rowdata['user_id'];
                $_SESSION['username'] = $rowdata['username'];
                $_SESSION['logInFromApp'] = 1;
        
            $user_id = $rowdata['user_id'];
            $username = $rowdata['username'];
            $user_code = strtotime($rowdata['user_timestamp']);
            $device_id = $device_id;
        //insert device id
        //ADD DEVICE ID + USER ID IN DB
        if($device_id != ""){
            $sql2 = "INSERT INTO `device` (`device_id`, `user_id`, `device`, `device_SO`,  `app_version`, `device_time`) VALUES (NULL, '$user_id', '$device_id', '$device_os','$app_version', CURRENT_TIMESTAMP);";
            $result2 = $db->query($sql2); 
        }
            response($user_id, $username, $device_id, $device_os, $user_code, $app_version);

        }else{
            response(NULL, NULL, 200,0, NULL, NULL);
        }
}



function response($user_id, $username, $device_id, $device_os, $user_code, $app_version){
    $response['user_id'] = $user_id;
    $response['username'] = $username;
    $response['device_id'] = $device_id;
    $response['device_os'] = $device_os;
    $response['version'] = $app_version;
    $response['user_code'] = ($user_code);
    
    $json_response = json_encode($response);
    echo $json_response;
}


//header('location: users.php?msg='.$msg);


?>