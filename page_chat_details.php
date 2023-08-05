<?php  
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
if(isset($_SESSION['user_id'])){
    include('core/functions.php');
}
else{
    header('location: login.php');
}




$user_id = $_SESSION['user_id'];

//aggiorno sulla tabella users se bubble_notfiche_status = 0 
$sql2 = "UPDATE `users` SET `bubble_notfiche_status` = 0 WHERE  user_id = '$user_id' ";
      //echo $sql2;
$result2 = $db->query($sql2); 


?>

<!doctype html>
<html lang="en">
    <!-- <head>
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>


</head> -->

<?php
    include 'header.php';
?>

<body>

    <!-- loader -->
    <!-- <div id="loader">
        <div class="spinner-border text-gr" role="status"></div>
    </div> -->
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="pageTitle">vitale_89</div>
        <div class="right">
            <a href="#" class="btn btn-icon" data-bs-toggle="modal" data-bs-target="#DialogChatOptions">
                <i class="bi bi-three-dots-vertical" style="color: #FFFFFF;"></i>
            </a>
        </div>
    </div>
    <!-- * App Header -->

    

    <!-- App Capsule -->
    <div style="height:100vh;overflow:scroll;" id="appCapsule">

        
          

        <div class="message-divider">
            Friday, Sep 20, 10:40 AM
        </div>

        <div class="message-item">
            <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="avatar">
            <div class="content">
                <div class="title">John</div>
                <div class="bubble">
                    Hi everyone, how are you?
                </div>
                <div class="footer">8:40 AM</div>
            </div>
        </div>

        <div class="message-item">
            <img src="assets/img/sample/avatar/avatar2.jpg" alt="avatar" class="avatar">
            <div class="content">
                <div class="title">Marry</div>
                <div class="bubble">
                    I'm fine, how are you today john, do you feel good?
                </div>
                <div class="footer">10:40 AM</div>
            </div>
        </div>

        <div class="message-item user">
            <div class="content">
                <div class="bubble">
                    Would you please repost the photo you sent yesterday?
                </div>
                <div class="footer">10:40 AM</div>
            </div>
        </div>

        <div class="message-divider">
            Friday, Sep 20, 10:40 AM
        </div>

        <div class="message-item">
            <img src="assets/img/sample/avatar/avatar2.jpg" alt="avatar" class="avatar">
            <div class="content">
                <div class="title">Marry</div>
                <div class="bubble">
                    <img src="assets/img/sample/photo/1.jpg" alt="photo" class="imaged w160">
                </div>
                <div class="footer">10:40 AM</div>
            </div>
        </div>

        <div class="message-item">
            <img src="assets/img/sample/avatar/avatar4.jpg" alt="avatar" class="avatar">
            <div class="content">
                <div class="title">Katie</div>
                <div class="bubble">
                    Nice photo !
                </div>
                <div class="footer">10:40 AM</div>
            </div>
        </div>

        <div class="message-item">
            <img src="assets/img/sample/avatar/avatar2.jpg" alt="avatar" class="avatar">
            <div class="content">
                <div class="title">Marry</div>
                <div class="bubble">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae nisl et nibh iaculis
                    sagittis. In hac habitasse platea dictumst. Sed eu massa lacinia, interdum ex et, sollicitudin elit.
                </div>
                <div class="footer">10:40 AM</div>
            </div>
        </div>

        <div class="message-item user">
            <div class="content">
                <div class="bubble">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae nisl et nibh iaculis
                    sagittis. In hac habitasse platea dictumst. Sed eu massa lacinia, interdum ex et, sollicitudin elit.
                </div>
                <div class="footer">10:40 AM</div>
            </div>
        </div>
        





    </div>
    <!-- * App Capsule -->

    <div class="chatFooter" style="z-index: 99999999999999999">
        <form>
            <a href="#" class="btn btn-icon btn-secondary rounded" data-bs-toggle="offcanvas" data-bs-target="#actionSheetAdd">
                <i class="bi bi-plus"></i>
            </a>
            <div class="form-group boxed">
                <div class="input-wrapper">
                    <input type="text" class="form-control"  id="message_input" placeholder="Type a message...">
                    <i class="clear-input">
                        <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                    </i>
                </div>
            </div>
            <button    onclick="handleSubmit()" type="button" class="btn btn-icon btn-primary rounded">
                <i class="bi bi-send"></i>
            </button>
        </form>
    </div>


    <?php
        // Notification Spotted Dialog Block
        include ('dialogs/dialog_notification_spotted.php');

        // Notification Spotted Confirmed
        include ('dialogs/dialog_notification_spotted_confirmed.php'); 
    
        // Follower Dialog Block
        include ('dialogs/dialog_notification_follower.php'); 

        // Dialog Chat Options 
        include ('dialogs/dialog_chat_options.php');
    
        // Welcome notifications
        // include('notifications/notification_welcome.php');
   
        // Footer
        include('footer_app.php');

        // App sidebar
        include('sidebar/app_sidebar.php');

        // include("./connection.php")
    ?>

     <?php
        // Footer Script JS
        include('footer.php');
    ?>


    <script>

          const socket = io();
          console.log("socket")

    document.addEventListener('DOMContentLoaded', ()=>{

            scrollToViews()
                
    })

    function scrollToViews(){
        
        const messageContainer = document.querySelector("#appCapsule")
                messageContainer.scrollTo(0,messageContainer.scrollHeight)
    }

        function handleSubmit(){



          const messageText =  document.querySelector("#message_input").value;
        //   alert(messageText);
        document.querySelector("#appCapsule").insertAdjacentHTML("beforeEnd",`<div class="message-item user">
            <div class="content">
                <div class="bubble">
                ${messageText}
                </div>
                <div class="footer">${new Date().toLocaleTimeString()}</div>
            </div>
        </div>`)
        document.querySelector("#message_input").value =""
        scrollToViews()
    }
        // Trigger welcome notification after 5 seconds

        // setTimeout(() => {
        //     notification('notification-welcome', 5000);
        // }, 2000);
           sessionStorage.removeItem('latitude');
            sessionStorage.removeItem('longitude');






    </>

</body>

</html>