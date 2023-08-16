<?php  
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

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

        <!-- <div class="message-item">
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
        </div> -->
        





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
        // include('home.php')
    ?>
  <!-- <script src="https://cdn.jsdelivr.net/npm/timeago.js@4.0.2/dist/timeago.min.js"></script> -->

    <script>


          const urlString = window.location.href;
            const url = new URL(urlString);
            const queryParams = url.searchParams;
            const chatId = queryParams.get('chat');
            var userId = <?php echo  $_SESSION['user_id']; ?>;
            var username =  '<?php    echo $_SESSION['username']; ?>';
       


      
 


            socket.on("GET_MESSAGE",data=>{
                console.log("i received message",data)

                const {senderId,message} = data;
         
                let msgDate = moment(message.createdAt).format('LT');
                    document.querySelector("#appCapsule").insertAdjacentHTML("beforeEnd",`<div class="message-item">
                    <img src=${ "assets/img/sample/avatar/avatar2.jpg"} alt="avatar" class="avatar">
                        <div class="content">
                            <div class="bubble">
                            ${message.text}
                            </div>
                            <div class="footer">${msgDate}</div>
                        </div>
                    </div>`)
                   
                    scrollToViews()
         
            })

    

    document.addEventListener('DOMContentLoaded', ()=>{

            scrollToViews()
                
    })

    async function fetchAllMessages(){

        
        
        try {
            const res = await fetch(`http://localhost:8000/api/message/${chatId}`)
            const data = await res.json();
            console.log(data);
            
            if(res.status===200){
                // alert("helo")
                data.message.forEach(msg=>{
                        let msgDate = moment( new Date(msg.createdAt)).format('LT');



                    const isMine = userId.toString() === msg.sender?.id?.toString();


                        document.querySelector("#appCapsule").innerHTML+=`
    
                        <div class="message-item ${isMine ?  "user":""}">
                 
                 
                     ${!isMine ? 
                    '<img src="assets/img/sample/avatar/avatar2.jpg" alt="avatar" class="avatar">':""}  

                        
            <div class="content">
                    <div class="bubble">
                  ${msg.text}
                </div>
                <div class="footer">${msgDate}</div>
                </div>
                </div>
                
                
                `
            })
        }
        



                scrollToViews()
        } catch (error) {
            
        }



    }
    fetchAllMessages()

    function scrollToViews(){
        
        const messageContainer = document.querySelector("#appCapsule")
                messageContainer.scrollTo(0,messageContainer.scrollHeight)
    }

      async  function handleSubmit(){

            const urlString = window.location.href;
            const url = new URL(urlString);
            const queryParams = url.searchParams;
            const chatId = queryParams.get('chat');
            // alert(chatId);





            // alert(userId,username)
            // console.log(username)
            const user={
                id:userId.toString(),
                username,
                image:"",
            }
            const messageText =  document.querySelector("#message_input").value;
            const newMessage={
                text:messageText,
                sender:user,
                chatId
            }

            try {
                
             const res = await   fetch("http://localhost:8000/api/message/create",{
                    method:"POST",
                    body:JSON.stringify(newMessage),
                    "headers":{
                        'Content-Type': 'application/json', 
                    }
                })
                if(res.status===200){
                    const data = await res.json()

                    let msgDate = moment(data.message.createdAt).format('LT');
                    document.querySelector("#appCapsule").insertAdjacentHTML("beforeEnd",`<div class="message-item user">
                    
                        <div class="content">
                            <div class="bubble">
                            ${messageText}
                            </div>
                            <div class="footer">${msgDate}</div>
                        </div>
                    </div>`)

                    document.querySelector("#message_input").value =""
                    // console.log("sending " ,data.message,userId,chatId)
                    const receiverId =data.message.chatId.users.find(us=>us.id !== userId.toString())?.id


                    // console.log(receiverId,userId)

                    const socketPayload = {
                        message:data.message,
                        senderId:userId.toString(),
                        receiverId:receiverId.toString()
                        
                        
                        
                    }
                    console.log(socketPayload)

                    socket.emit("SEND_MESSAGE",socketPayload)

                    
                    scrollToViews()
                }
                


            } catch (error) {
                
            }

        //   alert(messageText);
    }
        // Trigger welcome notification after 5 seconds

        // setTimeout(() => {
        //     notification('notification-welcome', 5000);
        // }, 2000);
           sessionStorage.removeItem('latitude');
            sessionStorage.removeItem('longitude');






</script>

    </>

</body>

</html>