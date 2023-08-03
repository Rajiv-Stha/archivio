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


$latitude = $_SESSION['user_latitude'];
$longitude = $_SESSION['user_longitude'];


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



    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="pageTitle">Cerca</div>
        <div class="right">
        </div>

          
                
    </div>
    <!-- * App Header -->
<div class="extraHeader">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" id="searchbox" class="form-control" placeholder="Search...">
                <i class="input-icon">
                <i class="bi bi-search"></i>
                </i>
            </div>
        </form>
    </div>

    <!-- App Capsule -->
    <div id="appCapsule" class="extra-header-active">
 
    <div id="results" class="section">
        <div class="row">
<?php 

    $sql1="SELECT DISTINCT z.users_locations_user_id AS user_place_id , z.type FROM (
            SELECT users_locations_user_id, users_locations_user_id AS type, SQRT(POW(69.1 * (users_locations_latitude - '$latitude'), 2) + POW(69.1 * ('$longitude' - users_locations_longitude) * COS(users_locations_latitude / 57.3), 2)) AS distance FROM users_locations HAVING distance < '150'  
            UNION  
            SELECT place_id, place_name, SQRT(POW(69.1 * (places.place_latitude - '$latitude'), 2) + POW(69.1 * ('$longitude' - places.place_longitude) * COS(places.place_latitude / 57.3), 2)) AS distance FROM places HAVING distance < '150' ORDER BY distance LIMIT 100) AS z WHERE (z.users_locations_user_id != '$user_id' AND z.type  !='$user_id') ORDER BY RAND() ;";

  //  echo $sql1;

    $result = $db->query($sql1); 
if (mysqli_num_rows($result) > 0) {  

    while($rowdata = $result->fetch_assoc())
            {
                
                $user_place_id=$rowdata['user_place_id'];
                $type=$rowdata['type'];

                
                if($user_place_id != $type){
                    $place_card_id = $user_place_id;
                    include('post/post_card_place.php');
                }else{
                    $user_card_id = $user_place_id;
                    include('post/post_card_user.php');
                }

                   
        
        }
    
}

?>
</div>

                 </div>
    </div>
    <!-- * App Capsule -->



    <!-- App Bottom Menu -->
    <?php
    // Footer
        include('footer_app.php');
    ?>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->

    <?php
        // Footer Script JS
        include('footer.php');
    ?>

</body>
<script type="text/javascript">

    //$('#results').html(sessionStorage.getItem("searchHistory"));

        var skeleton = '<div class="wide-block pt-2 pb-2 placeholder-glow">'+
'                <span class="placeholder col-6"></span>'+
'                <span class="placeholder w-75"></span>'+
'                <span class="placeholder col-12"></span>'+
'            </div>';
    //$('#main_content').html(skeleton);


var delay = (function() {
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();


discover_content_all = $('#results').html();
//sessionStorage.setItem("discover_content_all", search_content_all);


$("#searchbox").keyup(
    function () {
        if($(this).val().length == 0) {
            $('#results').html(discover_content_all);
        }else{
         

       
            $("#results").html(skeleton);
            var keyword = $("#searchbox").val();
            var URL = encodeURI("core/getSearch.php?q=" + keyword);
            $.ajax({
                url: URL,
                cache: false,
                type: "GET",
                success: function(response) {
                    $("#results").html(response);
                    //search_content_all = $('#results').html();
                    //sessionStorage.setItem("discover_content_all", search_content_all);



                }
            });
        };
    }
);
</script>
</html>