<?php 
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
    unset($_SESSION["user_id"]);
    unset($_SESSION["password"]);
    unset($_SESSION["valid"]);

    $_SESSION['valid'] = false;
    

    $msg = '<span class="badge badge-danger w-100 p-1">Logout effettuato.</span><br>';
    
    session_destroy();

    header('location: login.php?msg='.$msg);   
    

}


if(isset($_POST['login_form'])){

    $username = strtolower($_POST['username']);
    $pass = $_POST['password'];

    $username = trim($username);
    $password = trim($password);


    $sql = "SELECT * FROM `users` WHERE  ((`username` = '$username') or ( `email` = '$username' )) AND `password` = '$pass'";

    //echo $sql;


    $result = $db->query($sql); 
        
    //controlo login e setto role
    if (mysqli_num_rows($result) > 0) {

      while($rowdata = $result->fetch_assoc())
            {      
                $_SESSION['valid'] = true;
                $_SESSION['timeout'] = time();
                $_SESSION['user_id'] = $rowdata['user_id'];
                $_SESSION['username'] = $rowdata['username'];
                
                //O = ADMIN
                //1 = USER       

                header('location: home.php');   
            
        }

                

    }else{
                $msg = '<span class="badge badge-warning w-100 p-1">User o password errati, riprova</span>';

                header('location: login.php?msg='.$msg);   

    }

}
    		

if(isset($_POST['insert_data_user'])){


    $nome = ""; 
    $email = strtolower($_POST['email']);   
    $username = strtolower($_POST['username']);   
    $password = $_POST['password'];   

    $email = trim($email);
    $username = trim($username);
    $password = trim($password);



    $db = new Db();
    $con = getdb();
  
    $sql1 = "SELECT * FROM users WHERE ((username = '$username') OR (email = '$email'));";
    
    //echo $sql1;
    
    $result1 = $db->query($sql1); 
    
    
    if (mysqli_num_rows($result1) > 0) {

                $msg = '<span class="badge badge-warning w-100 p-1">User o password gia registrati, riprova o recupera la password.</span>';
                   
                header('location: page_register.php?msg='.$msg);    


    }else{

        $sql = "INSERT INTO `users` (`name`, `email`, `username`, `password`, `address`, `contact`, `img`) VALUES ('$username', '$email', '$username', '$password', '', '', '' )";

        $result = $db->query($sql); 
        
        //controlo login e setto role
        if (mysqli_num_rows($result) > 0) {
                $msg = '<span class="badge badge-warning w-100 p-1">Si è verificato un errore.</span>';
                    

                    header('location: page_register.php?msg='.$msg);    

                
        }
   
        else {

                $msg = '<span class="badge badge-success w-100 p-1">Registrazione effettuata. Accedi!</span>';
                    header('location: login.php?msg='.$msg);    

        }
    }



} //insert_data



if(isset($_POST['update_data'])){


    $u_id = @$_REQUEST['u_id']; 
    $email = @$_REQUEST['email'];   
    $username = @$_REQUEST['username'];   
    $password = @$_REQUEST['password'];   
    
    $email = trim($email);
    $username = trim($username);
    $password = trim($password);




    $db = new Db();


        $sql = "UPDATE `users` SET `email` = '$email', `name` = '$nome', `username` = '$username', `password` = '$password' WHERE `users`.`user_id` = '$u_id';";
        
        //echo "<br>".$sql."<br>";
        
        $result = mysqli_query($con, $sql);
        if(!isset($result)){
                $msg ="<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i>Si è verificato un problema.</h5>Se il problema persiste contatta il centro assistenza. (e044)</div>";     
     
        }
   
        else {

            $msg ="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> Utente aggiornato!</h5>Utente aggiornato con successo.</div>";
        }

} //update_data




if(isset($_REQUEST['delete'])){

    $con = getdb();


    $impianto_id = @$_REQUEST['u_id']; 

    $con = getdb();

          $sql = "UPDATE `users` SET `status` = '0' WHERE `users`.`user_id` = '$impianto_id';";
           
           $result = mysqli_query($con, $sql);
            if(!isset($result)){
                $msg ="<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i>Si è verificato un problema.</h5>Se il problema persiste contatta il centro assistenza. (e06)</div>";     
     
            }

            $msg ="<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><h5><i class='icon fas fa-check'></i> Utente eliminato!</h5>Utente eliminato con successo.</div>";


}


//header('location: users.php?msg='.$msg);


?>