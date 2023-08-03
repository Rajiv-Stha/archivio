
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
            <a href="index.php" class="headerButton goBack">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="pageTitle">Reimposta Password</div>
        
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule" >

        <div class="login-form">
            <div class="section text-start mt-5">
                <div class="section text-center mb-2">
                    <img src="assets/img/logo_spottat.png" alt="image" style="width: 100px;" class="form-image">
                </div>
                <h4 class="">Inserisci la tua Email per reimpostare le password</h4>
                <p>Invieremo un link per reimpostare la tua password all'indirizzo email con cui ti sei registrato su spottat.com</p>
            </div>
            <div class="section mt-2 mb-5">
                <form action="app-pages.html">

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="email" class="form-control" id="name1" placeholder="Indirizzo Email">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn bg-primary btn-block btn-lg">Reset</button>
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