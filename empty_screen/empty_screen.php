<?php 
    
    $path_url= "http://localhost/spottat";
    // $path_url= "https://fixuapp.com/spottat";



?>
<!doctype html>
<html lang="en">

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

<body>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="../page_profile.php" class="headerButton goBack">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="pageTitle">Empty Screen</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->





    <!-- App Capsule -->
    <div id="appCapsule">

        <!-- Carosello luoghi -->
        <div class="section full mt-3 mb-3">
            <!-- carousel multiple -->
            <div class="carousel-multiple splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <div class="card product-card p-1">
                                <div onclick="goToPlace(1);" >
                                    <div>
                                        <span class="float-end opacity-50" style="position: absolute; right: 5px; padding-top: 5px;"><i class="bi bi-x-lg me-1 bg-white text-dark rounded-circle" style="padding: 3px;" ></i></span>
                                        <img src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged product " style="display: block; margin-left: auto; margin-right: auto; width: 100%;">

                                    </div>
                                    <h2 class="title" >Crystal Bar</h2>
                                    <p class="text text-truncate">Corso Europa, Caposele (AV)</p>
                                </div>
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-eye me-1"></i><strong>27k</strong>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-person me-1"></i><strong>259</strong>
                                        </a>
                                    </div>
                                </div>

                                
                                <a href="#" class="btn bg-white btn-sm shadowed border-0 mt-1 btn-block">
                                    <img src="assets/img/footsteps-sharp.svg"  fill="#ffffff" class="icon_footsteps">
                                    <span class="">Inizia a Seguire</span>
                                </a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="card product-card p-1">
                                <div onclick="goToPlace(1);" >
                                    <div>
                                        <span class="float-end opacity-50" style="position: absolute; right: 5px; padding-top: 5px;"><i class="bi bi-x-lg me-1 bg-white text-dark rounded-circle" style="padding: 3px;" ></i></span>
                                        <img src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged product " style="display: block; margin-left: auto; margin-right: auto; width: 100%;">

                                    </div>
                                    <h2 class="title" >Crystal Bar</h2>
                                    <p class="text text-truncate">Corso Europa, Caposele (AV)</p>
                                </div>
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-eye me-1"></i><strong>27k</strong>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-person me-1"></i><strong>259</strong>
                                        </a>
                                    </div>
                                </div>

                                
                                <a href="#" class="btn bg-white btn-sm shadowed border-0 mt-1 btn-block">
                                    <img src="assets/img/footsteps-sharp.svg"  fill="#ffffff" class="icon_footsteps">
                                    <span class="">Inizia a Seguire</span>
                                </a>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="card product-card p-1">
                                <div onclick="goToPlace(1);" >
                                    <div>
                                        <span class="float-end opacity-50" style="position: absolute; right: 5px; padding-top: 5px;"><i class="bi bi-x-lg me-1 bg-white text-dark rounded-circle" style="padding: 3px;" ></i></span>
                                        <img src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged product " style="display: block; margin-left: auto; margin-right: auto; width: 100%;">

                                    </div>
                                    <h2 class="title" >Crystal Bar</h2>
                                    <p class="text text-truncate">Corso Europa, Caposele (AV)</p>
                                </div>
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-eye me-1"></i><strong>27k</strong>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-person me-1"></i><strong>259</strong>
                                        </a>
                                    </div>
                                </div>

                                
                                <a href="#" class="btn bg-white btn-sm shadowed border-0 mt-1 btn-block">
                                    <img src="assets/img/footsteps-sharp.svg"  fill="#ffffff" class="icon_footsteps">
                                    <span class="">Inizia a Seguire</span>
                                </a>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="card product-card p-1">
                                <div onclick="goToPlace(1);" >
                                    <div>
                                        <span class="float-end opacity-50" style="position: absolute; right: 5px; padding-top: 5px;"><i class="bi bi-x-lg me-1 bg-white text-dark rounded-circle" style="padding: 3px;" ></i></span>
                                        <img src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged product " style="display: block; margin-left: auto; margin-right: auto; width: 100%;">

                                    </div>
                                    <h2 class="title" >Crystal Bar</h2>
                                    <p class="text text-truncate">Corso Europa, Caposele (AV)</p>
                                </div>
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-eye me-1"></i><strong>27k</strong>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-person me-1"></i><strong>259</strong>
                                        </a>
                                    </div>
                                </div>

                                
                                <a href="#" class="btn bg-white btn-sm shadowed border-0 mt-1 btn-block">
                                    <img src="assets/img/footsteps-sharp.svg"  fill="#ffffff" class="icon_footsteps">
                                    <span class="">Inizia a Seguire</span>
                                </a>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="card product-card p-1">
                                <div onclick="goToPlace(1);" >
                                    <div>
                                        <span class="float-end opacity-50" style="position: absolute; right: 5px; padding-top: 5px;"><i class="bi bi-x-lg me-1 bg-white text-dark rounded-circle" style="padding: 3px;" ></i></span>
                                        <img src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged product " style="display: block; margin-left: auto; margin-right: auto; width: 100%;">

                                    </div>
                                    <h2 class="title" >Crystal Bar</h2>
                                    <p class="text text-truncate">Corso Europa, Caposele (AV)</p>
                                </div>
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-eye me-1"></i><strong>27k</strong>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-person me-1"></i><strong>259</strong>
                                        </a>
                                    </div>
                                </div>

                                
                                <a href="#" class="btn bg-white btn-sm shadowed border-0 mt-1 btn-block">
                                    <img src="assets/img/footsteps-sharp.svg"  fill="#ffffff" class="icon_footsteps">
                                    <span class="">Inizia a Seguire</span>
                                </a>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <!-- * carousel multiple -->

        </div>
        <!-- * Carosello luoghi -->


        <!-- Carosello Utenti -->
        <div class="section full mt-3 mb-3">
            <!-- carousel multiple -->
            <div class="carousel-multiple splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <div class="card product-card p-1">
                                <span><i class="bi bi-x-lg me-1 float-end"></i></span>
                                <div onclick="goToPlace(1);"  class="ps-2 pe-2 text-center">
                                    <img src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged product rounded mb-2" style="display: block; margin-left: auto; margin-right: auto; width: 100%;">
                                    <h2 class="title" >Vitale89</h2>
                                    <p class="text text-truncate">Angelo Vitale</p>
                                </div>
                                
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-eye me-1"></i><strong>27k</strong>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-person me-1"></i><strong>259</strong>
                                        </a>
                                    </div>
                                </div>

                                <a href="#" class="btn btn-gr bg-gr btn-sm mt-1 shadowed border-0 btn-block">
                                    <img src="assets/img/footsteps.svg"  fill="#ffffff" class="icon_footsteps">
                                    <span class="text-white">SEGUI</span>
                                </a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="card product-card p-1">
                                <span><i class="bi bi-x-lg me-1 float-end"></i></span>
                                <div onclick="goToPlace(1);"  class="ps-2 pe-2 text-center">
                                    <img src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged product rounded mb-2" style="display: block; margin-left: auto; margin-right: auto; width: 100%;">
                                    <h2 class="title" >Vitale89</h2>
                                    <p class="text text-truncate">Angelo Vitale</p>
                                </div>
                                
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-eye me-1"></i><strong>27k</strong>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-person me-1"></i><strong>259</strong>
                                        </a>
                                    </div>
                                </div>

                                <a href="#" class="btn btn-gr bg-gr btn-sm mt-1 shadowed border-0 btn-block">
                                    <img src="assets/img/footsteps.svg"  fill="#ffffff" class="icon_footsteps">
                                    <span class="text-white">SEGUI</span>
                                </a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="card product-card p-1">
                                <span><i class="bi bi-x-lg me-1 float-end"></i></span>
                                <div onclick="goToPlace(1);"  class="ps-2 pe-2 text-center">
                                    <img src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged product rounded mb-2" style="display: block; margin-left: auto; margin-right: auto; width: 100%;">
                                    <h2 class="title" >Vitale89</h2>
                                    <p class="text text-truncate">Angelo Vitale</p>
                                </div>
                                
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-eye me-1"></i><strong>27k</strong>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-person me-1"></i><strong>259</strong>
                                        </a>
                                    </div>
                                </div>

                                <a href="#" class="btn btn-gr bg-gr btn-sm mt-1 shadowed border-0 btn-block">
                                    <img src="assets/img/footsteps.svg"  fill="#ffffff" class="icon_footsteps">
                                    <span class="text-white">SEGUI</span>
                                </a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="card product-card p-1">
                                <span><i class="bi bi-x-lg me-1 float-end"></i></span>
                                <div onclick="goToPlace(1);"  class="ps-2 pe-2 text-center">
                                    <img src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged product rounded mb-2" style="display: block; margin-left: auto; margin-right: auto; width: 100%;">
                                    <h2 class="title" >Vitale89</h2>
                                    <p class="text text-truncate">Angelo Vitale</p>
                                </div>
                                
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-eye me-1"></i><strong>27k</strong>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-person me-1"></i><strong>259</strong>
                                        </a>
                                    </div>
                                </div>

                                <a href="#" class="btn btn-gr bg-gr btn-sm mt-1 shadowed border-0 btn-block">
                                    <img src="assets/img/footsteps.svg"  fill="#ffffff" class="icon_footsteps">
                                    <span class="text-white">SEGUI</span>
                                </a>
                            </div>
                        </li>

                        <li class="splide__slide">
                            <div class="card product-card p-1">
                                <span><i class="bi bi-x-lg me-1 float-end"></i></span>
                                <div onclick="goToPlace(1);"  class="ps-2 pe-2 text-center">
                                    <img src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged product rounded mb-2" style="display: block; margin-left: auto; margin-right: auto; width: 100%;">
                                    <h2 class="title" >Vitale89</h2>
                                    <p class="text text-truncate">Angelo Vitale</p>
                                </div>
                                
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-eye me-1"></i><strong>27k</strong>
                                        </a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a href="#" class="item text-dark">
                                            <i class="bi bi-person me-1"></i><strong>259</strong>
                                        </a>
                                    </div>
                                </div>

                                <a href="#" class="btn btn-gr bg-gr btn-sm mt-1 shadowed border-0 btn-block">
                                    <img src="assets/img/footsteps.svg"  fill="#ffffff" class="icon_footsteps">
                                    <span class="text-white">SEGUI</span>
                                </a>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
            <!-- * carousel multiple -->

        </div>
        <!-- * Carosello Utenti -->



        <!-- skeleton loader like -->
        <div class="wide-block pt-2 pb-2 placeholder-glow">
            <ul class="listview image-listview placeholder-glow border-0">
                <li>
                    <div href="#" class="item">
                        <div class="icon-box bg-dark placeholder">
                        </div>
                        <div class="in">
                            <span class="placeholder col-6"></span>
                            <span class="placeholder col-2"></span>
                        </div>
                    </div>
                </li>
                <li>
                    <div href="#" class="item">
                        <div class="icon-box bg-dark placeholder">
                        </div>
                        <div class="in">
                            <span class="placeholder col-3"></span>
                            <span class="placeholder col-2"></span>
                        </div>
                    </div>
                </li>
                <li>
                    <div href="#" class="item">
                        <div class="icon-box bg-dark placeholder">
                        </div>
                        <div class="in">
                            <span class="placeholder col-4"></span>
                            <span class="placeholder col-2"></span>
                        </div>
                    </div>
                </li>
                <li>
                    <div href="#" class="item">
                        <div class="icon-box bg-dark placeholder">
                        </div>
                        <div class="in">
                            <span class="placeholder col-7"></span>
                            <span class="placeholder col-2"></span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- * skeleton loader like -->


    
        <!-- skeleton post media -->
        <div class="section mt-2 mb-2">
            <div class="card">
                <div class="card-body placeholder-glow">
                    <h6 class="card-subtitle">
                        <span class="placeholder col-2 bg-secondary"></span>
                        <span class="placeholder col-4"></span> 
                    </h6>
                    <h5 class="card-title">
                        <span class="placeholder col-12 bg-secondary"><br><br></span>
                    </h5>
                    <p>
                        <span class="placeholder col-12"></span>
                    </p>
                    <div class="card-text text-center">
                        <span class="placeholder col-4"></span>
                        <span class="placeholder col-3 bg-secondary"></span>
                        <span class="placeholder col-4"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- * skeleton post media -->

        <!-- skeleton post text -->
        <div class="section mt-2 mb-2">
            <div class="card">
                <div class="card-body placeholder-glow">
                    <h6 class="card-subtitle">
                        <span class="placeholder col-2"></span>
                        <span class="placeholder col-4 bg-secondary"  ></span> 
                    </h6>
                    <p>
                        <span class="placeholder col-12 bg-secondary"></span>
                    </p>
                    <div class="card-text text-center">
                        <span class="placeholder col-4 bg-secondary"></span>
                        <span class="placeholder col-3"></span>
                        <span class="placeholder col-4"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- * skeleton post text -->

        <!-- skeleton generic list -->
        <ul class="listview image-listview placeholder-glow mt-2">
            <li>
                <div href="#" class="item">
                    <div class="in">
                        <span class="placeholder col-6"></span>
                        <span class="placeholder col-2"></span>
                    </div>
                </div>
            </li>
        </ul>
        <!-- * skeleton generic list -->


        <!-- skeleton tab profile place -->
        <div class="section mt-2 mb-2">

            <div class="row">
                
                <div class="col-6">
                    <div class="card">
                        <img src="<?php echo $path_url ?>/assets/img/sample/photo/wide0.jpg" class="card-img-top" alt="image">
                        <div class="card-body placeholder-glow">
                            <h6 class="card-subtitle">
                                <span class="placeholder col-8"></span>
                            </h6>
                            <p class="card-text">
                                <span class="placeholder col-5"></span>
                                <span class="placeholder bg-secondary col-6"></span>
                                <span class="placeholder col-12"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="card">
                        <img src="<?php echo $path_url ?>/assets/img/sample/photo/wide0.jpg" class="card-img-top" alt="image">
                        <div class="card-body placeholder-glow">
                            <h6 class="card-subtitle">
                                <span class="placeholder bg-secondary col-8"></span>
                            </h6>
                            <p class="card-text">
                                <span class="placeholder col-5"></span>
                                <span class="placeholder col-6"></span>
                                <span class="placeholder bg-secondary col-12"></span>
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-2">
                <div class="col-6">
                    <div class="card">
                        <img src="<?php echo $path_url ?>/assets/img/sample/photo/wide0.jpg" class="card-img-top" alt="image">
                        <div class="card-body placeholder-glow">
                            <h6 class="card-subtitle">
                                <span class="placeholder bg-secondary col-8"></span>
                            </h6>
                            <p class="card-text">
                                <span class="placeholder bg-secondary col-5"></span>
                                <span class="placeholder col-6"></span>
                                <span class="placeholder col-12"></span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    
                </div>
            </div>
        </div>
        <!-- skeleton tab profile place -->


        <!-- skeleton profile page -->
        <div class="wide-block pt-2 pb-2 placeholder-glow">
            <ul class="listview border-0 image-listview placeholder-glow">
                <li>
                    <div href="#" class="item">
                        <div class="icon-box bg-dark placeholder"></div>
                        <div class="in">
                            <span class="placeholder col-6"></span>
                        </div>
                    </div>
                    <h6 class="text-center mt-1">
                        <span class="placeholder col-3 bg-secondar me-2"></span>
                        <span class="placeholder col-3"></span>
                        <span class="placeholder col-3 ms-2"></span>
                    </h6>
                    <h5 class="text-center mt-2">
                        <span class="placeholder col-11 bg-secondary"><br><br></span>
                    </h5>

                    <p class="text-center">
                        <span class="placeholder bg-secondary col-11"></span>
                    </p>
                </li>
            </ul>
        </div>
        <!-- * skeleton profile page -->



        <!-- NoNearby -->
        <div class="text-center pt-5">
            <img src="../assets/img/EmptyStateNoSpotNearBy.png" class="img-fluid w-50 pt-5">
            <div class="p-3">
                <h3>Nessuno Spot intorno a te</h3>
                <p>Lascia uno Spot, invieremo una notifica a tutte le persone presenti intorno a te</p>
            </div>
        </div>
        <!-- * NoNearby -->
        
        <!-- NoComments -->
        <div class="text-center pt-5">
            <img src="../assets/img/EmptyStateComments.png" class="img-fluid w-50 pt-5">
            <div class="p-3">
                <h3>Nessun Commento</h3>
                <p>Lascia un commento ora</p>
            </div>
        </div>
        <!-- * NoComments -->

        <!-- NoNotifcations -->
        <div class="text-center pt-5">
            <img src="../assets/img/EmptyStateNoNotifcations.png" class="img-fluid w-50 pt-5">
            <div class="p-3">
                <h3>Nessuna Notifica</h3>
                <p>Tutte le notifiche le trovi qui</p>
            </div>
        </div>
        <!-- * NoNotifcations -->

        <!-- NoGPSConnection -->
        <div class="text-center pt-5">
            <img src="../assets/img/EmptyStateGPSConnection.png" class="img-fluid w-50 pt-5">
            <div class="p-3">
                <h3>OPS...</h3>
                <p>Non riusciamo a determinare la tua posizione, controlla lo stato dei tuoi servizi di localizzazione</p>
                <p class="" style="font-size: 10px;">Ti ricordiamo che la tua posizione non verrà mai condivisa con nessun utente</p>
            </div>
        </div>
        <!-- * NoGPSConnection -->

        <!-- NoUsers -->
        <div class="text-center pt-5">
            <img src="../assets/img/EmptyStateSteps.png" class="img-fluid w-50 pt-5">
            <div class="p-3">
                <h3>Non c'è nessuno qui</h3>
            </div>
        </div>
        <!-- * NoUsers -->

        <!-- NoPlaces -->
        <div class="text-center pt-5">
            <img src="../assets/img/EmptyStateNoPlaces.png" class="img-fluid w-50 pt-5">
            <div class="p-3">
                <h3>Non c'è niente qui</h3>
            </div>
        </div>
        <!-- * NoPlaces -->

        <!-- NoSpotted -->
        <div class="text-center pt-5">
            <img src="../assets/img/EmptyStateSpotted.png" class="img-fluid w-50 pt-5">
            <div class="p-3">
                <h3>Spotted</h3>
                <p>Nessuno Spot ancora confermato</p>
            </div>
        </div>
        <!-- * NoSpotted -->

        <!-- GenericErroe -->
        <div class="text-center pt-5">
            <img src="../assets/img/EmptyStateGeneric.png" class="img-fluid w-50 pt-5">
            <div class="p-3">
                <h3>OPS...</h3>
                <p>Qualcosa è andato storto</p>
            </div>
        </div>
        <!-- * GenericErroe -->


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

</body>

</html>