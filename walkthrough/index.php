<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Spott@</title>
    <meta name="description" content="Ti connette con le persone che vedi">
    <meta name="keywords" content="bootstrap 5, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/icon/192x192.png">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body class="">
    <!-- App Capsule -->
    <div id="appCapsule" style="padding: 0px!important;" class="">
<!-- Header -->
    <div class="appHeader bg-white ">
        <div class="left pt-1">
            <!--a href="page_add_stories2.php" class="headerButton text-white ps-2">
                <i class="bi bi-plus-square"></i>
            </a-->
            <img src="spottat-logo-h.png" style="max-height:50px;" class="img-fluid">
        </div>

        <!--div class="pageTitle text-white">
            Home
        </div-->

        <div class="right">
            <!--a href="javascript:;" data-bs-toggle="offcanvas" data-bs-target="#actionSheetContentFiltri" class="headerButton text-white">
                <i class="bi bi-filter"></i>
            </a-->
            <a href="../LoginPageApp.php" class="headerButton text-dark ps-2">
                <!--ion-icon name="search"></ion-icon-->
                <strong style="font-weight: 600; font-size: 16px;">ACCEDI</strong>
            </a>
        </div>
    </div>

    <!-- * Header -->

    <div class="appCapsule" style="background: linear-gradient(to right, #0066ff, #4dc3ff)!important;">
       <!-- Carousel items -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="1.png" class="d-block w-100 " alt="...">
    </div>
    <div class="carousel-item">
      <img src="2.png" class="d-block w-100 " alt="...">
    </div>
    <div class="carousel-item">
      <img src="3.png" class="d-block w-100 " alt="...">
    </div>
    <div class="carousel-item">
      <img src="4.png" class="d-block w-100 " alt="...">
    </div>
    <div class="carousel-item">
      <img src="5.png" class="d-block w-100 " alt="...">
    </div>
    <div class="carousel-item">
      <img src="6.png" class="d-block w-100 " alt="...">
      <div class="p-3 w-100"  style="position: fixed; bottom: 1%; z-index: 99999!important;">
          <a href="../LoginPageApp.php" class="btn btn-block bg-dark text-white btn-lg">Accedi</a>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev text-dark" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next text-dark" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

                <!--CAROUSEL END -->
    </div>
    <!-- * App Capsule -->

   
    <!-- ============== Js Files ==============  -->
    <!-- Bootstrap -->
    <script src="../assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="../assets/js/plugins/splide/splide.min.js"></script>
    <!-- ProgressBar js -->
    <script src="../assets/js/plugins/progressbar-js/progressbar.min.js"></script>
    <!-- Base Js File -->
    <script src="../assets/js/base.js"></script>
    <script src="../assets/js/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
<script type="text/javascript">


var carouselLength = $('.carousel-item').length - 1;
        $('.carousel-control-prev').addClass('d-none');

// If there is more than one item
if (carouselLength) {
    $('.carousel-control-next').removeClass('d-none');
}

$('.carousel').carousel({
    interval: false,
    wrap: false
}).on('slide.bs.carousel', function (e) {
    // First one
    if (e.to == 0) {
        $('.carousel-control-prev').addClass('d-none');
        $('.carousel-control-next').removeClass('d-none');
    } // Last one
    else if (e.to == carouselLength) {
        $('.carousel-control-prev').removeClass('d-none');
        $('.carousel-control-next').addClass('d-none');
    } // The rest
    else {
        $('.carousel-control-prev').removeClass('d-none');
        $('.carousel-control-next').removeClass('d-none');
    }
});

</script>
<style type="text/css">
.carousel {
    top: 0;
    left: 0;
    min-width: 100%;
    height: 100%;
    max-height: 100%;
    width: auto;
}
.carousel-control-next,
.carousel-control-prev /*, .carousel-indicators */ {
    filter: invert(100%);
}

.carousel-indicators {
    filter: invert(50%);
    position: fixed;
    bottom: 1%;

}
</style>
</html>