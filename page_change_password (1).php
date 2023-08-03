
<!doctype html>
<html lang="en">

<?php
    include 'header.php';
?>

<body class="">

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
        <div class="pageTitle">Cambia Password</div>
        
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule" >

        <div class="login-form">
            <div class="section text-start mt-5">
                <div class="section text-center mb-2">
                    <img src="assets/img/logo_spottat.png" alt="image" style="width: 100px;" class="form-image">
                </div>
            </div>
            <div class="section mt-2 mb-5">
                <form action="app-pages.html">

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="password_old" style="font-size: 15px!important;">Vecchia Password:</label>
                            <input type="password" class="form-control" id="password_old" placeholder="Inserisci vecchia password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="password_new1" style="font-size: 15px!important;">Nuova Password:</label>
                            <input type="password" class="form-control" id="password_new1" placeholder="Inserisci nuova password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="password_new2" style="font-size: 15px!important;">Conferme Nuova Password:</label>
                            <input type="password" class="form-control" id="password_new2" placeholder="Conferma nuova password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn bg-primary btn-block btn-lg">Invia</button>
                    </div>

                </form>
            </div>
        </div>



    </div>
    <!-- * App Capsule -->



    <?php
        // Footer Script JS
        include('footer.php');
    ?>

</body>

</html>