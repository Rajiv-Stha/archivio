
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
        <div class="pageTitle">Segnala Utente</div>
        
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule" >

        <form>
            <div class="wide-block p-0">

                <div class="section-title ms-2 mt-2">
                    <h3>Cosa vuoi segnalare di questo account?</h3>
                </div>

                <div class="input-list">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radioList" id="radioList1">
                        <label class="form-check-label" for="radioList1">Sta fingendo di essere qualcun altro</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radioList" id="radioList2">
                        <label class="form-check-label" for="radioList2">Potrebbe avere meno di 13 anni</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="radioList" id="radioList3">
                        <label class="form-check-label" for="radioList3">È Spam</label>
                    </div>
                </div>

                <div class="fixed-bottom ms-3 me-3" style="padding-bottom: 36px!important;">
                    <button type="submit" class="btn bg-primary btn-block btn-lg shadowed">
                        <span class="text-white"  style="font-weight: bold;!important;">Conferma</span>
                    </button>
                </div>
            
            </div> 
            
        </form>

    </div>
    <!-- * App Capsule -->



    <?php
        // Footer Script JS
        include('footer.php');
    ?>

</body>

</html>