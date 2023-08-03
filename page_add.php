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


$content = 'Lorem @vitale89 dolor sit , consectetur #adipiscing elit. Nam elementum, lectus id pellentesque egestas. Lorem @u16 dolor sit , consectetur #adipiscing elit. Nam elementum, lectus id pellentesque egestas.';
//$content = convertHashtoLink($content);  
//$content = convertUserTagToLinkFrontEnd($content);  
//$content = convertUserIDtoTagBackEnd($content);  


?>

<!doctype html>
<html lang="en">

<?php
    include 'header.php';
?>

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-gr" role="status"></div>
    </div>
    <!-- * loader -->


    <!-- Header -->
    <div class="appHeader bg-primary">
        <div class="left">
            <a href="#" class="headerButton goBack text-white">
                <i class="bi bi-chevron-left text-white"></i>
            </a>
        </div>

        <div class="pageTitle">
            Lascia uno Spot
        </div>
        
        <div class="right">
            <a href="javascript:;" onclick="submitForm();" class="headerButton text-white">
                <i class="bi bi-send"></i>
            </a>
        </div>
    </div>

    <!-- * Header -->


    <!-- App Capsule -->
    <div id="appCapsule" class="bg-white">
        <div class="section pe-0 ps-0 wh-100">
            
            <!-- Form Creazione post -->
            <form action="core/addSpot.php" method="post" id="theForm" enctype="multipart/form-data">
                <div class="h-50">
                    <!-- label class="form-label" for="spottArea" id="spottArea">Lascia uno Spot</label -->
                    <textarea class="mention form-control hwt-input hwt-content" name="text" id="text" style="width: 100vw; height: 80vh;" placeholder="Chi hai avvistato oggi?" rows="5" required></textarea>
                </div>

                <div class="fixed-bottom" style="padding-bottom: 56px!important;">
                    <?php
                    //echo $content;
                    ?>
                    <ul class="listview image-listview">
                        <li class="pt-2 pb-2">
                            <a href="#" class="item" data-bs-toggle="modal" data-bs-target="#ModalListview">
                                <img src="assets/img/blue_square_pin.jpg" alt="image" class="image">
                                <div class="in">
                                    <?php
                                    $place_id = "";
                                        if(isset($_GET['pid'])) {
                                            $place_id_get = $_REQUEST['pid'];
                                             $user_info_arr = get_place_info($place_id_get);
                
                                                $place_id = $user_info_arr['place_id'];
                                                $place_name = $user_info_arr['place_name'];
                                                $place_city = ($user_info_arr['place_city']);
                                                $place_address = ($user_info_arr['place_address']);
                                            
                                      echo "<div>
                                                <span class=\"text-truncate\">$place_name</span>
                                                 <div class=\"text-muted text-truncate\">$place_address $place_city</div>
                                                 <div id=\"badge_box\"></div>
                                             </div>";

                                            
                                        }else{ ?>
                                            <div id="place_name_box">Dove Sei?</div>
                                            <div id="badge_box"></div>
                                        <?php } ?>
                                    <input type="hidden" name="place_id" id="place_id" value="<?php echo $place_id; ?>" required>
                                </div>
                            </a>
                        </li>
                        <li class="pt-2 pb-2">
                            <a href="#" class="item" data-bs-toggle="offcanvas" data-bs-target="#actionSheetContent">
                                <img src="assets/img/sample/avatar/media_icon.png" alt="image" class="image" >
                                <div class="in">
                                    <div>Aggiungi Foto/Video</div>
                                </div>
                            </a>
                        </li>

                        <!-- li class="pt-2 pb-2">
                            <div href="#" class="row item" data-bs-toggle="offcanvas" data-bs-target="#actionSheetContent">
                                <div class="col-2">
                                    <div class="custom-file-upload" id="fileUpload1" style="width: 50px;
                                        height: 50px;">
                                        <input type="file" id="fileuploadInput" accept=".png, .jpg, .jpeg">
                                        <label for="fileuploadInput">
                                            <span class="m-0 p-0">
                                                <i class="bi bi-plus"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            <div class="col-10">
                                <div class="in">
                                    <div>Aggiungi Foto/Video</div>
                                </div>
                            </div>
                            </div>
                        </li -->
                    </ul>
                </div>

            <!-- * Form Creazione post -->
        </div>
    </div>
    <!-- * App Capsule -->

 <?php
                // Action sheet add media
                include ('action_sheet/action_sheet_add_media.php');
                ?>
               
            </form>
    

    <?php
        // Post add notification
        include ('notifications/notification_add_post.php');

        // Modal add place
        include ('modals/modal_add_place.php');

        // Dialog Loading add new spot
        include ('dialogs/dialog_loading_addSpot.php');


        // Footer Menu
        include('footer_app.php');

        // App sidebar
        //include('sidebar/app_sidebar.php'); 
    ?>                        




    <?php
        // Footer Script JS
        include('footer.php');
    ?>

  <script type="text/javascript" src="<?php echo $path_url;?>/assets/js/jquery.js"></script>
   <script src="<?php echo $path_url;?>/assets/js/jquery.highlight-within-textarea.js"></script>

  <script type="text/javascript" src="<?php echo $path_url;?>/assets/js/jquery.caretposition.js"></script>
                <script type="text/javascript" src="<?php echo $path_url;?>/assets/js/jquery.sew.js"></script>

<script>


// sessionStorage.removeItem('latitude');
//        sessionStorage.removeItem('longitude');




            $(document).ready(function() {


                var values = [{val:'vitale89', meta:''},
                    {val:'vitale89', meta:''},
                    {val:'fixu', meta:''},
                    {val:'angelo', meta:''},
                    {val:'hello', meta:''},
                    {val:'fixu', meta:''},
                    {val:'jacopo', meta:''},
                    {val:'hello', meta:''},
                    {val:'vitale89', meta:''},
                    {val:'fixu', meta:''},
                              {val:'fixu', meta:''},
                              {val:'angelo', meta:''},
                              {val:'hello', meta:''}];

                for (var i = 0; i < 10; i++) {
                    //values.push({val: '' + i})
                };


                var customItemTemplate = "<div><span style='color:black;'/>&nbsp;<small /></div>";

                function elementFactory(element, e) {
                    var template = $(customItemTemplate).find('span')
                                                            .text('@' + e.val).end()
                                                        .find('small')
                                                            .text("(" + (e.meta || e.val) + ")").end();
                    element.append(template);
                };

                // here is how we use it
                $('textarea').sew({values: values, elementFactory: elementFactory});


                // with repetition but unique flag
                var repeatedElements = [{val: 'johnny'}, {val: 'chanta'}, {val: 'chanta'}, {val: 'chanta'}];
                $('input').sew({unique: true, values: repeatedElements, elementFactory: elementFactory});

                $('.editable').sew({unique: true, values: repeatedElements, elementFactory: elementFactory});
                $('.editable-repeat').sew({repeat: false, unique: true, values: repeatedElements, elementFactory: elementFactory});
                $('.editable-position').sew({repeat: false, unique: true, values: values, elementFactory: elementFactory});
            });
 


        // Trigger welcome notification after 5 seconds
        setTimeout(() => {
             getNearbyPlaces();
            //notification('notification-welcome', 5000);
        }, 2000);

        //getNearbyPlaces();

        function getNearbyPlaces(){
          $.ajax({
                    url: 'core/getNearbyPlacesLatLng.php',
                    type: 'POST',
                    data:   {
                    },
                    statusCode: {
                      500: function() {
                        //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
                      }
                    }
                  }).done(function(response) {
                      //$('#comment_post_id').val();//setto hidden post id in comment_text
                      //localStorage.setItem('comment_post_id', pid);

                      $('#nearByPlaceBox').html(response);

                  }).fail(function() {
                                  //$('#'+div_id).html(response);
                  });
}


        function setPlaceInAddNewSpot(id){           
            $('#place_id').val(id);
            var data = $('#responce_place'+id).html();
            $('#place_name_box').html(data);
            $('#badge_alert').html('');
            
        }


        function submitForm(){

            //resetto toast per avviso pubblicaizone ok
            sessionStorage.removeItem('toastaddok');
            //alert(sessionStorage.getItem('toastaddok'));

            sessionStorage.removeItem('latitude');
            sessionStorage.removeItem('longitude');

            var t = document.getElementById("text").value;
            var p = document.getElementById("place_id").value;

            //alert(t);
            //alert(p);

            if((t != "")  && (p != "")){
                
                

                var myModal = new bootstrap.Modal(document.getElementById('DialogLoadingSpot'));
                myModal.show();
                $("#appBottomMenu").css("display", "none");

                document.getElementById('theForm').submit();
            }else{
                $('#badge_box').html('<span class="badge badge-danger" id="badge_alert">&nbsp;</span>');
                                          
            }
        }

    </script>
    <!-- Date Picker Js -->
    

    <!-- 
    <script>
        $(document).ready(function() {
            $('#date').bootstrapMaterialDatePicker({
                time: false,
                clearButton: true
            });
        });
    </script>

    -->

</body>
<style type="text/css">
    .-sew-list-container {
    background: white;
    border: 1px solid #DDD;
    border-radius: 3px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    min-width: 100%!important;
    position: absolute;
    left: 0px!important;
    padding: 0!important;
    margin-top: 8px;
    z-index: 1040!important;
    padding-bottom: 200px!important;
}

.-sew-list {
    list-style: none;
    margin: 0;
    padding: 0;
    max-height: 300px;
    overflow: scroll;
}

.-sew-list-item {
    display: block;
    padding: 10px 10px;
    border-bottom: 1px solid #DDD;
    cursor: pointer;
    width: 100%;
}


.-sew-list-item small {
    color: #afafaf;
}

.-sew-list-item.selected {
    color: white;
    background: #33cc66;
    text-decoration: none;
}
</style>
</html>