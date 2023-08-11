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

// echo "hello world". $user_id;
?>

<!doctype html>
<html lang="en">

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
        <div class="pageTitle">Chat</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    

    <!-- App Capsule -->
    <div id="appCapsule">

        
            <!-- Users tab -->
            <div class="tab-pane fade show active" id="utenti" role="tabpanel">

                <div class="section full">
                    <ul class="listview image-listview media mb-2">
<!--                             
    <li class="bg-gr" onclick="goToChat(1);">
        <a href="/archivio/page_chat_details.php" class="item">
            <div class="imageWrapper">
                <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged rounded w55">
            </div>
            <div class="in">
                <div>
                    <span class="text-truncate">vitale_89</span>
                    <div>
                        <span class="text-truncate text-gr"></span>
                        <span class="text-muted text-truncate"> preview message</span>
                    </div>
                </div>
                <span class="text-muted">11:30</span>
            </div>
        </a>
    </li>
    

                        <li class="bg-gr" onclick="goToChat(1);">
                            <a href="#" class="item">
                                <div class="imageWrapper">
                                    <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged rounded w55">
                                </div>
                                <div class="in">
                                    <div>
                                        vincenzo_russomanno
                                        <div class="text-muted">preview message</div>
                                    </div>
                                    <span class="text-muted">10:54</span>
                                </div>
                            </a>
                        </li>

                        <li class="bg-gr" onclick="goToChat(1);">
                            <a href="#" class="item">
                                <div class="imageWrapper">
                                    <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged rounded w55">
                                </div>
                                <div class="in">
                                    <div>
                                        mirko_castagno
                                        <div class="text-muted">preview message</div>
                                    </div>
                                    <span class="text-muted">10:30</span>
                                </div>
                            </a>
                        </li>

                        <li class="" onclick="goToChat(1);">
                            <a href="#" class="item">
                                <div class="imageWrapper">
                                    <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged rounded w55">
                                </div>
                                <div class="in">
                                    <div>
                                        benry_danies
                                        <div class="text-muted">preview message</div>
                                    </div>
                                    <span class="text-muted">09:25</span>
                                </div>
                            </a>
                        </li>
                        <li class="" onclick="goToChat(1);">
                            <a href="#" class="item">
                                <div class="imageWrapper">
                                    <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged rounded w55">
                                </div>
                                <div class="in">
                                    <div>
                                        mirko_castagno
                                        <div class="text-muted">preview message</div>
                                    </div>
                                    <span class="text-muted">10:30</span>
                                </div>
                            </a>
                        </li> -->

                    </ul>
                </div>

            </div>
            <!-- * Users tab -->





    </div>
    <!-- * App Capsule -->


    <?php
        // Notification Spotted Dialog Block
        include ('dialogs/dialog_notification_spotted.php');

        // Notification Spotted Confirmed
        include ('dialogs/dialog_notification_spotted_confirmed.php'); 
    
        // Follower Dialog Block
        include ('dialogs/dialog_notification_follower.php'); 
    
        // Welcome notifications
        // include('notifications/notification_welcome.php');
   
        // Footer
        include('footer_app.php');

        // App sidebar
        include('sidebar/app_sidebar.php');
    ?>

     <?php
        // Footer Script JS
        include('footer.php');
    ?>


    <script>
        // Trigger welcome notification after 5 seconds
        var userId = <?php echo  $_SESSION['user_id']; ?>;
    var username =  '<?php    echo $_SESSION['username']; ?>';

       async function fetchAllChats() {



          const response = await  fetch(`http://localhost:8000/api/chat/${userId.toString()}`);
          const data = await response.json()

        //   console.log(data) 
          if(response.status !==200)return;
          data.message.forEach(chat=>{

              document.querySelector(".listview").innerHTML+=`
              
              <li class="bg-gr" onclick="goToChat(1);">
              <a href="/spottat/archivio/page_chat_details.php?chat=${chat._id}" class="item">
              <div class="imageWrapper">
              <img src="assets/img/sample/photo/1.jpg" alt="image" class="imaged rounded w55">
              </div>
              <div class="in">
              <div>
              <span class="text-truncate">${chat?.users[1]?.username}</span>
              <div>
              <span class="text-truncate text-gr"></span>
              <span class="text-muted text-truncate">${chat?.latestMessage?.text}</span>
              </div>
              </div>
              <span class="text-muted">${chat?.createdAt}</span>
              </div>
              </a>
              </li>
              
              `
              
            })
              
            }
            fetchAllChats();



        setTimeout(() => {
            notification('notification-welcome', 5000);
        }, 2000);
           sessionStorage.removeItem('latitude');
            sessionStorage.removeItem('longitude');
    </script>

</body>

</html>