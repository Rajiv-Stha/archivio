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
            <a href="#" class="headerButton text-white" data-bs-toggle="offcanvas" data-bs-target="#sidebarPanel">
                <i class="bi bi-menu"></i>
            </a>
        </div>

        <div class="pageTitle text-white">
            Home
        </div>

        <div class="right">
            <a href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#actionSheetContentFiltri" class="headerButton text-white">
                <!--ion-icon name="filter"></ion-icon-->
                <i class="bi bi-filter"></i>
            </a>
            <a href="page_add_stories2.php" class="headerButton text-white ps-2">
                <!--ion-icon name="search"></ion-icon-->
                <i class="bi bi-chat-left-dots"></i>
            </a>
        </div>
    </div>

    

    <!-- Search Component -->
    <div id="search" class="appHeader">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Search...">
                <i class="input-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i>
                <a href="javascript:;" class="ml-1 close toggle-searchbox">
                    <ion-icon name="close-circle"></ion-icon>
                </a>
            </div>
        </form>
    </div>
    <!-- * Search Component -->

    <!-- * Header -->



    <!-- App Capsule -->
    <div id="appCapsule">

        <h3 id="locationpane"></h3>
        <button onclick="getLocation()">Try It</button>

<p id="demo"></p>
        
        <div id="stories" class="storiesWrapper stories user-icon carousel snapgram ps-2">
            
        </div>

        <?php 
            // Story block
            // include('stories/stories_list.php');
        ?>

        <div id="contentMainFeed">
        <?php
            // Post Media block 
            include('post/post_media.php');

            //Post text block
            include('post/post_text.php');
        ?>
        </div>

        
    </div>
    <!-- * App Capsule -->


    <?php

        // Footer Menu
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
        setTimeout(() => {
            notification('notification-welcome', 5000);
        }, 2000);
    </script>

    <style type="text/css">
        .float-right{
            text-align: right!important;
            float: right!important;
        }
    </style>

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


    <script language="javascript">

      // This function is called when the Geolocation API 
      // retrieves the user's location
      function savePosition(point) {

        // Send the retrieved coordinates to 
        // request, and then set the page content to 
        // once this process is complete 
        $.ajax({
          url: 'core/getHomeFeedByLatLng.php',
          type: 'POST',
          data:   {
            latitude: point.coords.latitude,
            longitude: point.coords.longitude
          },
          statusCode: {
            500: function() {
              $('#locationpane').html('<p>We couldn\'t save your location.</p>');
            }
          }
        }).done(function(response) {
          $('#contentMainFeed').html(response);
        }).fail(function() {
          $('#locationpane').html('<p>We couldn\'t save your location.</p>');
        });

      }

      // This function is called when there is a problem 
      // the user's location (but the Geolocation API is 
      // his or her browser)
      function errorPosition(error) {
        switch(error.code) {

        // Error code 1: permission to access the user's 
        // was denied
        case 1: $('#locationpane').html('<p>No location was retrieved.</p>');
        break;

        // Error code 2: the user's location could not be 
        case 2: $('#locationpane').html('<p>We couldn\'t find you.</p>');
        break;

        // Error code 3: the Geolocation API timed out
        case 3: $('#locationpane').html('<p>We took too long  trying to find your location.</p>');
        break;

      }

       notification('notification-error-location', 15000);

    }

    </script>




<script>
var x = document.getElementById("locationpane");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(savePosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}


$( document ).ready(function() {
  //getLocation();
});
</script>



 <script language="javascript">

/*
      // First, check if geolocation support is available
      if (navigator.geolocation) {
        // If it is, attempt to get the current position. 
        // the savePosition function if the operation was 
        // errorPosition if it was not.
        navigator.geolocation.getCurrentPosition(savePosition, errorPosition);

      } else {

        // If the browser doesn't support the Geolocation 
        $('#locationpane').html('<p>No geolocation support is available.</p>');

      }
*/
    </script>

<script>
  const timestamp = function () {
  let timeIndex = 0;
  const shifts = [
    35,
    60,
    60 * 3,
    60 * 60 * 2,
    60 * 60 * 25,
    60 * 60 * 24 * 4,
    60 * 60 * 24 * 10
  ];

  const now = new Date();
  const shift = shifts[timeIndex++] || 0;
  const date = new Date(now - shift * 1000);

  return Math.round(date.getTime() / 1000);
};


      function updateUserStatusStory(storyId) {
        alert(storyId);
         // body...
       }

      var stories = window.Zuck(document.querySelector('#stories'), {
        backNative: true,
        previousTap: true,
        skin: 'snapgram',
        avatars: true,
        autoFullScreen: false,
        paginationArrows: false,
        list: false,
        openEffect: true,
        cubeEffect: false,
        localStorage: false,
        callbacks: {
            onOpen: function (storyId, callback) {
              
              callback();
            },
            onView: function (storyId, callback) {
              //console.log(storyId); 
            },
            onEnd: function (storyId, callback) {
              updateUserStatusStory(storyId);
              callback();
            },
            onClose: function (storyId, callback) {
              callback();
            },
            onNextItem: function (storyId, nextStoryId, callback) {
             callback();
            },
            onNavigateItem: function (storyId, nextStoryId, callback) {
              callback();
            }
       },
        stories: [
          {
            id: 'ramon',
            photo:
              'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/users/1.jpg',
            name: 'Ramon',
            time: timestamp(),
            items: [
              {
                id: 'ramon-1',
                type: 'photo',
                length: 3,
                src: 'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/1.jpg',
                preview:
                  'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/1.jpg',
                link: '',
                linkText: false,
                time: timestamp()
              },
              {
                id: 'ramon-2',
                type: 'video',
                length: 0,
                src: 'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/2.mp4',
                preview:
                  'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/2.jpg',
                link: '',
                linkText: false,
                time: timestamp()
              },
              {
                id: 'ramon-3',
                type: 'photo',
                length: 3,
                src: 'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/3.png',
                preview:
                  'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/3.png',
                link: 'https://ramon.codes',
                linkText: 'Visit my Portfolio',
                time: timestamp()
              }
            ]
          },
          {
            id: 'gorillaz',
            photo:
              'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/users/2.jpg',
            name: 'Gorillaz',
            time: timestamp(),
            items: [
              {
                id: 'gorillaz-1',
                type: 'video',
                length: 0,
                src: 'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/4.mp4',
                preview:
                  'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/4.jpg',
                link: '',
                linkText: false,
                time: timestamp()
              },
              {
                id: 'gorillaz-2',
                type: 'photo',
                length: 3,
                src: 'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/5.jpg',
                preview:
                  'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/5.jpg',
                link: '',
                linkText: false,
                time: timestamp()
              }
            ]
          },
          {
            id: 'ladygaga',
            photo:
              'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/users/3.jpg',
            name: 'Lady Gaga',
            time: timestamp(),
            items: [
              {
                id: 'ladygaga-1',
                type: 'photo',
                length: 5,
                src: 'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/6.jpg',
                preview:
                  'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/6.jpg',
                link: '',
                linkText: false,
                time: timestamp()
              },
              {
                id: 'ladygaga-2',
                type: 'photo',
                length: 3,
                src: 'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/7.jpg',
                preview:
                  'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/7.jpg',
                link: 'http://ladygaga.com',
                linkText: false,
                time: timestamp()
              }
            ]
          },
          {
            id: 'starboy',
            photo:
              'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/users/4.jpg',
            name: 'The Weeknd',
            time: timestamp(),
            items: [
              {
                id: 'starboy-1',
                type: 'photo',
                length: 5,
                src: 'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/8.jpg',
                preview:
                  'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/8.jpg',
                link: '',
                linkText: false,
                time: timestamp()
              }
            ]
          },
          {
            id: 'riversquomo',
            photo:
              'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/users/5.jpg',
            name: 'Rivers Cuomo',
            time: timestamp(),
            items: [
              {
                id: 'riverscuomo-1',
                type: 'photo',
                length: 10,
                src: 'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/9.jpg',
                preview:
                  'https://raw.githubusercontent.com/ramonszo/assets/master/zuck.js/stories/9.jpg',
                link: '',
                linkText: false,
                time: timestamp()
              }
            ]
          }
        ]
      });


    </script>

</html>