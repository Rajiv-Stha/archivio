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

    <div class="appHeader bg-primary text-light">

        <div class="left">
            <a href="#" class="headerButton goBack">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
        <div class="pageTitle"><span class="pageTitle">Registrati</span></div>
        
    </div>




    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section text-center mt-4">
            <img src="assets/img/logo_spottat.png" alt="image" style="width: 100px;" class="form-image">
        </div>
        <div class="login-form">
            <div class="section mt-2 mb-5">
                <form action="login_process.php" method="POST" name="insert_data_user" >

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" for="username" style="font-size: 15px;">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required  onkeypress="allowAlphaNumericSpace(event)" maxlength="20"  >
                            <i class="clear-input">
                                <i class="bi bi-x-lg"></i>
                            </i>
                        </div>
                        <div id="username_check_div"></div>
                    </div>

                    <div class="form-group boxed mt-1">
                        <div class="input-wrapper">
                            <label class="form-label" for="email" style="font-size: 15px;">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Indirizzo Email" required>
                            <i class="clear-input">
                                <i class="bi bi-x-lg"></i>
                            </i>
                        </div>
                        <div id="email_check_div"></div>
                    </div>

                    <div class="form-group boxed mt-1">
                        <div class="input-wrapper">
                            <label class="form-label" for="password" style="font-size: 15px;">Password</label>
                            <input type="password" class="form-control" id="password" name="password" autocomplete="off" placeholder="Password" required>
                            <i class="clear-input">
                                <i class="bi bi-x-lg"></i>
                            </i>
                        </div>
                    </div>

                    <!--div class="form-group boxed mt-1">
                        <div class="input-wrapper">
                            <label class="form-label" for="password2" style="font-size: 15px;">Conferma Password</label>
                            <input type="password" class="form-control" id="password2" autocomplete="off" placeholder="Conferma Password">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div-->

                    <div class=" mt-2 text-start">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input"  id="agree_terms_ok" name="agree_terms_ok" required>
                            <label class="form-check-label" for="agree_terms_ok" style="font-size: 17px!important">Accetto <a href="#" data-bs-toggle="modal" data-bs-target="#ModalBasic">Termini e Condizioni</a></label>
                        </div>

                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" id="agree_age_ok" name="agree_age_ok" required>
                            <label class="form-check-label" for="agree_age_ok" style="font-size: 17px!important">Ho più di 16 anni 
                                <a href="#" data-bs-toggle="modal" data-bs-target="#ModalBasic"></a>
                            </label>
                        </div>
                    </div>
                    <div>
                        <?php echo @$_GET['msg']; ?>
                    </div>
                    <div class="mt-3">
                        <button type="submit" name="insert_data_user" class="btn bg-primary btn-block btn-lg">Registrati</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->



    <!-- Modal Terms Conditions-->
    <?php include('modals/modal_terms_conditions.php'); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js" crossorigin="anonymous"></script>

    <!-- ============== Js Files ==============  -->
    <!-- Bootstrap -->
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <!-- Splide -->
    <script src="assets/js/plugins/splide/splide.min.js"></script>
    <!-- ProgressBar js -->
    <script src="assets/js/plugins/progressbar-js/progressbar.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>

    <script type="text/javascript">
        
//solo numeri e lettere
function allowAlphaNumericSpace(e) {
  var code = ('charCode' in e) ? e.charCode : e.keyCode;
  if (!(code == 32) && // space
    !(code > 47 && code < 58) && // numeric (0-9)
    !(code > 64 && code < 91) && // upper alpha (A-Z)
    !(code > 96 && code < 123)) { // lower alpha (a-z)
    e.preventDefault();
  }
}


$('#username').keyup(function(){
  if($(this).val().length > 3)
  {
    $.ajax({
          url: 'core/checkUsername.php',
          type: 'POST',
          data:   {
            username: $(this).val(),
            check_username: 1,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
          }).done(function(response) {
              $('#username_check_div').html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
      });
  }
});


$('#email').keyup(function(){
  if($(this).val().length > 5)
  {
    $.ajax({
          url: 'core/checkEmail.php',
          type: 'POST',
          data:   {
            email: $(this).val(),
            check_email: 1,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
          }).done(function(response) {
              $('#email_check_div').html(response);

          }).fail(function() {
                          //$('#'+div_id).html(response);
      });
  }
});



    </script>

</body>

</html>