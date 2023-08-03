<?php 
ob_start();
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('../core/connection.php');



//$_SESSION['valid'] = true;
//header('location: home.php');   

    $db = new Db();
    $con = getdb();

if(isset($_POST['check_username'])){


    $username = htmlentities($_POST['username']);   

  
    $sql1 = "SELECT * FROM users WHERE ((username = '$username'));";
    
    $result = $db->query($sql1); 
        
    //controlo login e setto role
    if (mysqli_num_rows($result) > 0) {

                $msg = '<span class="badge badge-warning w-100 p-1">Username già registrato.</span>';
                    
                echo $msg;

    }else{

    }
}

?>