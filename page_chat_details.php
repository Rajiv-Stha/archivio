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
    <div id="loader">
        <div class="spinner-border text-gr" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left" onclick="handleGetBack()">
            <a href="#" class="headerButton goBack">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="pageTitle" style="display:flex;flex-direction:column;align-items:center;">
            <div class="userTitle" style="letter-spacing:1px;">

            </div>
            <span class="active_text" style="display:none;font-weight:500;font-size:11px;letter-spacing:1px;">Active Now</span>
        </div>
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

    





    </div>
    <!-- * App Capsule -->

    <div class="chatFooter" style="z-index: 99999999999999999">
        <form>
            <input onChange="handleFileInputChange(event)" type="file" name="" id="file_input" style="display:none;">
            <a onClick="handleMedia()" href="#" class="btn btn-icon btn-secondary rounded" data-bs-toggle="offcanvas" data-bs-target="#actionSheetAdd">
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

        let mediaFile = null;
        let fileType = null;
          const urlString = window.location.href;
            const url = new URL(urlString);
            const queryParams = url.searchParams;
            const chatId = queryParams.get('chat');
            var userId = <?php echo  $_SESSION['user_id']; ?>;
            var username =  '<?php    echo $_SESSION['username']; ?>';
            const profileImg = '<?php   echo $_SESSION['user_profile_img']; ?>' 


  
        
 


            socket.on("GET_MESSAGE",data=>{
                console.log("i received message",data);

                const {senderId,message} = data;
         
                let msgDate = moment(message.createdAt).format('LT');
                    document.querySelector("#appCapsule").insertAdjacentHTML("beforeEnd",`<div class="message-item user">
                    
                        <div class="content">
                                <div class="bubble">
                    ${message.type === "image" ? `<img class="message_media" src=${message.url} alt="media"> ` :""}
                  
   

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

    const handleGetBack=()=>{
        history.back();
    }

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
                    `<img src=${msg.sender?.image} alt="avatar" class="avatar">`:""}  


                        
            <div class="content" >


                <div class="content_top"  id=${msg._id} style="display:flex;gap:1rem;align-items:center;">
                    <div class="bubble">
                    ${msg.type === "image" ? `<img class="message_media" src=${msg.url} alt="media"> ` :""}
                  ${msg.text}
                  </div>
                  <i class="fa-solid fa-ellipsis-vertical" style="color: #adadad;"></i>
                  </div>
               
                <div class="footer">${msgDate}</div>
                </div>
                </div>
                
                
                `
            })
        }
        



                scrollToViews()
                addEventToDelBtn()
         document.querySelector("#loader").style.display="none"
                
        } catch (error) {
            
        }



    }
    fetchAllMessages()


    async function fetchChatFromDB(){


        const res =  await  fetch(`http://localhost:8000/api/chat/byChatId/${chatId}`)
        const data = await res.json();



        const users = data.message.users; 
        const nextUser = users.find(usr=>usr.id !== userId.toString());

      

        document.querySelector(".userTitle").innerText = nextUser.username;
        
        setOnlineStatus(nextUser.id?.toString())





    }
        fetchChatFromDB();


        function getOnlineUsers(cb){
           socket.emit("REQUEST_USERS");
           socket.on("RESPONSE_USERS",users=>{
           cb(users)
           })
       }

    function setOnlineStatus(userId){
        getOnlineUsers((users)=>{


            const isActive = users.some(user=>user.userId === userId)
            if(isActive){
                    document.querySelector(".active_text").style.display="block";
            }
        })
    }    



    function scrollToViews(){
        
        const messageContainer = document.querySelector("#appCapsule")
                messageContainer.scrollTo(0,messageContainer.scrollHeight)
    }

      async  function handleSubmit(){

        let fileUrl;
 

        if(mediaFile){
          fileUrl  =   await   handleUploadFile();
          fileType = mediaFile.type.split("/")[0];  
        
        }



            

            const urlString = window.location.href;
            const url = new URL(urlString);
            const queryParams = url.searchParams;
            const chatId = queryParams.get('chat');

            const user={
                id:userId.toString(),
                username,
                image:profileImg,
            }
            const messageText =  document.querySelector("#message_input").value;
            const newMessage={
                text:messageText,
                sender:user,
                chatId,
                type:fileType ??  "text",
                url:fileUrl
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
                    ${data.message.type === "image" ? `<img class="message_media" src=${data.message.url} alt="media"> ` :""}
                  
   

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


    async function handleUploadFile(){

        console.log("file",mediaFile)

        if(!mediaFile)return;
    
        const {url:imageUrl} =await  uploadFile(mediaFile,(progress,url)=>{
    
                console.log(progress,url)
    
          
        })


        return  imageUrl;


    }


     function  handleMedia(){
        document.querySelector("#file_input").click();
    }

    async function handleFileInputChange(event){
            if(event.target.files[0]){

                mediaFile = event.target.files[0];
                let fileType = mediaFile.type.split("/")[0];
              

                if(fileType === "image" || fileType === "video"){
                    
                }else{
                    mediaFile=null;
                    fileType= null;
                    alert("unsupported media format")
                    return ;
                }
            }

    }
       


           sessionStorage.removeItem('latitude');
            sessionStorage.removeItem('longitude');


            const addEventToDelBtn=()=>{


                const otherButtons = document.querySelectorAll('.fa-ellipsis-vertical')         

                otherButtons.forEach(btn=>{
                    btn.addEventListener("click",e=>{
                        console.log("clicked")
                    const content =  e.currentTarget.closest(".content_top");
                    content.insertAdjacentHTML("beforeEnd",`
                      <div class="del-popover" id=${content.id}  > 


                  <button class="deleteButton" onclick="handleDelEvent(event)" >
                  delete 
                  </button>

                  </div>
                    `)
                    })
                })






            }





            const handleDelEvent=async(e)=>{


                
                
                
                e.currentTarget.closest(".message-item").remove()
                
                const id =   e.currentTarget.closest(".del-popover").id
                
                try {
                    
                    
                    const res =  await fetch(`http://localhost:8000/api/message/${id}`,{
                        method:"DELETE",
                    })
                    
                    // console.log(e.currentTarget.closest(".message-item"))
                    // e.currentTarget.closest(".message-item").remove();
                    
                    if(res.status===200){

                        
                    }
                } catch (error) {
                    
                }

          
            }

</script>

    </>

</body>

</html>