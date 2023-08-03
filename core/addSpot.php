<?php  

session_start();
if(isset($_SESSION['user_id'])){
    include('functions.php');
}
else{
    header('location: login.php');
}

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


    $user_id = $_SESSION['user_id'];
    
    $msg = @$_REQUEST['msg'];
    $text = mysql_real_escape_string($_REQUEST['text']);
    $text = convertUserIDtoTagBackEnd($text);  

    $place_id = @$_REQUEST['place_id'];


    $currentDirectory = "";
    $uploadDirectory = "../uploads/spot/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed 

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    @$fileExtension = strtolower(end(explode('.',$fileName)));
    
    $image_id = 0;

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

          $sql2 = " INSERT INTO `images` (`images_id`, `images_file`, `images_type`, `user_id`, `images_timestamp`, `images_hidden`) VALUES (NULL, '$file_name', 'spot', '$user_id', CURRENT_TIMESTAMP, '1');";
            
            $result2 = $db->query($sql2); 

        //echo $sql2;
            $image_id = $db->getInsertId($db);

           // echo $image_id;

        } else {
          //echo "An error occurred. Please contact the administrator.";
        }
      } else {
        foreach ($errors as $error) {
          //echo $error . "These are the errors" . "\n";
        }
      }


      //checkhasktag


      $sql2 = " INSERT INTO `spots` (`spot_id`, `user_id`, `place_id`, `spot_text`, `spot_images_id`, `spot_time`, `spot_hashtag`, `spot_hidden`) VALUES (NULL, '$user_id', '$place_id', '$text', '$image_id', CURRENT_TIMESTAMP, '', '1'); ";
            
            $result2 = $db->query($sql2); 

        //echo $sql2;



    //@header('location: ../home.php?addspot=1');   
    echo '<script>window.location = "../home.php?addspot=1";</script>';
?>


