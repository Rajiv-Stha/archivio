<!-- ///////////// Js Files ////////////////////  -->

<script src="<?php echo $path_url;?>/assets/js/jquery.min.js" crossorigin="anonymous"></script>

 <!-- Bootstrap -->

 <script src="<?php echo $path_url;?>/assets/js/lib/bootstrap.min.js"></script>
 <!-- Ionicons -->
 <!-- script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script -->
 <!-- Splide -->
 <script src="<?php echo $path_url;?>/assets/js/plugins/splide/splide.min.js"></script>
 <!-- ProgressBar js -->
 <script src="<?php echo $path_url;?>/assets/js/plugins/progressbar-js/progressbar.min.js"></script>
 <!-- Mention @ Js File -->
 <!-- Base Js File -->
 <script src="<?php echo $path_url;?>/assets/js/base.js"></script>
 <!-- Functiins Js File -->
 <script src="<?php echo $path_url;?>/assets/js/functionsApp.js"></script>

<script src="<?php echo $path_url;?>/assets/js/zuck.js"></script>

<script src="<?php echo $path_url;?>/assets/js/croppie.js"></script>
<script   src="assets/js/socket.js"></script>



<script type="text/javascript">
   
//    alert(" i am initialized")

var userId = <?php echo  $_SESSION['user_id']; ?>;
var username =  '<?php    echo $_SESSION['username']; ?>';

console.log(username)

socket.emit("JOIN",userId.toString());

socket.on("GET_USERS",onlineUsers=>{
   console.log("online users",onlineUsers);
});

// document.addEventListener('DOMContentLoaded', function () {
    
//   });
 
</script>