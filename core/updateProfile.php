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

if(isset($_REQUEST['update_profile'])){

    $con = getdb();


    $user_id = @$_SESSION['user_id']; 
    $name = $_POST['name'];
    $user_bio = ($_POST['bio']); 



    $name =  mysql_real_escape_string($name);
    $user_bio =  mysql_real_escape_string($user_bio);

    //$image_id = 0;

     $currentDirectory = "";
    $uploadDirectory = "../uploads/users/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed 

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    @$fileExtension = strtolower(end(explode('.',$fileName)));
    
    

    $fileName = $_SESSION['user_id'].'_'.time().'.'.$fileExtension;

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 


      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        //$errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
      }

      if ($fileSize > 4000000) {
        //$errors[] = "File exceeds maximum size (4MB)";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
          //echo "The file " . basename($fileName) . " has been uploaded";
          $file_name = basename($fileName);

          $sql2 = " INSERT INTO `images` (`images_id`, `images_file`, `images_type`, `user_id`, `images_timestamp`, `images_hidden`) VALUES (NULL, '$file_name', 'profile', '$user_id', CURRENT_TIMESTAMP, '1');";
            
            $result2 = $db->query($sql2); 

        //echo $sql2;
            $image_id = $db->getInsertId($db);


            $query_add_media =  " img = '$image_id'";

            //echo $query_add_media;

        } else {
          //echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          //echo $error . "These are the errors" . "\n";
        }
      }



    $con = getdb();

          $sql = "UPDATE `users` SET `name` = '$name', `bio` = '$user_bio', $query_add_media WHERE `users`.`user_id` = '$user_id';";

          //echo $sql;
           
           $result = mysqli_query($con, $sql);
            if(!isset($result)){
                        $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> OPS!</h5>Si è verificato un problema.</div>";
     
            }

                        $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> Dati aggiornati!</h5>Utente aggiornato con successo.</div>";


    header('location: ../page_profile.php?uid='.$user_id.'&msg='.$msg);   
    

}



if(isset($_REQUEST['update_setting_private_profile'])){

    $con = getdb();


    $user_id = @$_SESSION['user_id']; 
    $check = $_POST['check_box'];

    $con = getdb();

          $sql = "UPDATE `users` SET `private_profile` = '$check' WHERE `users`.`user_id` = '$user_id';";
           
           $result = mysqli_query($con, $sql);
            if(!isset($result)){
                        $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> OPS!</h5>Si è verificato un problema.</div>";
     
            }

                        $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> Dati aggiornati!</h5>Valori aggiornati con successo.</div>";


    //header('location: ../page_profile.php?uid='.$user_id.'&msg='.$msg);   
    

}


if(isset($_REQUEST['update_setting_notifiche_all'])){

    $con = getdb();


    $user_id = @$_SESSION['user_id']; 
    $check = $_POST['check_box'];
    
    $con = getdb();

          $sql = "UPDATE `users` SET `notifiche_all` = '$check' WHERE `users`.`user_id` = '$user_id';";
           
           $result = mysqli_query($con, $sql);
            if(!isset($result)){
                        $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> OPS!</h5>Si è verificato un problema.</div>";
     
            }

                        $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> Dati aggiornati!</h5>Valore aggiornato con successo.</div>";


    //header('location: ../page_profile.php?uid='.$user_id.'&msg='.$msg);   
    

}

if(isset($_REQUEST['update_setting_notifiche_email'])){

    $con = getdb();


    $user_id = @$_SESSION['user_id']; 
    $check = $_POST['check_box'];
    
    $con = getdb();

          $sql = "UPDATE `users` SET `notifiche_email` = '$check' WHERE `users`.`user_id` = '$user_id';";
           
           $result = mysqli_query($con, $sql);
            if(!isset($result)){
                        $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> OPS!</h5>Si è verificato un problema.</div>";
     
            }

                        $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> Dati aggiornati!</h5>Valore aggiornato con successo.</div>";


    //header('location: ../page_profile.php?uid='.$user_id.'&msg='.$msg);   
    

}


if(isset($_REQUEST['update_setting_notifiche_nearby'])){

    $con = getdb();


    $user_id = @$_SESSION['user_id']; 
    $check = $_POST['check_box'];
    
    $con = getdb();

          $sql = "UPDATE `users` SET `notifiche_nearby_spot` = '$check' WHERE `users`.`user_id` = '$user_id';";
           
           $result = mysqli_query($con, $sql);
            if(!isset($result)){
                        $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> OPS!</h5>Si è verificato un problema.</div>";
     
            }

                        $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> Dati aggiornati!</h5>Valore aggiornato con successo.</div>";


    //header('location: ../page_profile.php?uid='.$user_id.'&msg='.$msg);   
    

}



if(isset($_REQUEST['update_setting_notifiche_radius'])){

    $con = getdb();


    $user_id = @$_SESSION['user_id']; 
    $check = $_POST['check_box'];
    
    $con = getdb();

          $sql = "UPDATE `users` SET `notifiche_radius` = '$check' WHERE `users`.`user_id` = '$user_id';";
           
           $result = mysqli_query($con, $sql);
            if(!isset($result)){
                        $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> OPS!</h5>Si è verificato un problema.</div>";
     
            }

                        $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> Dati aggiornati!</h5>Valore aggiornato con successo.</div>";


    //header('location: ../page_profile.php?uid='.$user_id.'&msg='.$msg);   
    

}




?>