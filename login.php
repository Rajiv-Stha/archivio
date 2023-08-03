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



    <!-- App Capsule -->
    <div id="appCapsule" style="padding-top: 5%!important;">

        <div class="login-form mt-1">
            <div class="section">
                <a href="home.php">
                    <img src="assets/img/logo_spottat.png" alt="image" style="width: 150px;" class="form-image">
                </a>
            </div>

            <div class="section mt-1 mb-5">
                <form action="login_process.php" method="POST" name="login_form">

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" style="font-size: 15px;" for="username">Username o Email</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username o Email" value="" required>
                            <i class="clear-input">
                                <i class="bi bi-x-lg"></i>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="form-label" style="font-size: 15px;" for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" required>
                            <i class="clear-input">
                                <i class="bi bi-x-lg"></i>
                            </i>
                        </div>
                    </div>
                    <div>
                        <?php echo @$_GET['msg']; ?>
                    </div>
                    <div class="form-links mt-2">
                        <div>
                            <a href="page_register.php" style="font-size: 17px!important; font-weight: 500!important;">Registrati adesso</a>
                        </div>
                        <div>
                            <a href="page-forgot-password.php" class="text-muted">Password dimenticata?</a>
                        </div>
                    </div>

                    <div class="mt-2">
                        <button type="submit" name="login_form" class="btn bg-primary btn-block btn-lg shadowed">
                            <span class="text-white"  style="font-weight: bold;!important;">Accedi</span>
                        </button>
                    </div>
                    <p class="text-center mt-2">oppure</p>

                    <div class="mt-2">
                        <a href="page_register.php" class="btn btn-block btn-lg bg-light shadowed">
                            <span class="text-muted"  style="font-weight: bold;!important;">Registrati adesso</span>
                        </a>
                    </div>

                </form>
            </div>
        </div>

        

    </div>
    <!-- * App Capsule -->




    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Date Picker -->
    <script src="assets/js/plugins/datepicker/duDatepicker.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="assets/js/ionicons.js"></script>
    <!-- Splide -->
    <script src="assets/js/plugins/splide/splide.min.js"></script>
    <!-- ProgressBar js -->
    <script src="assets/js/plugins/progressbar-js/progressbar.min.js"></script>
    <!-- Base Js File -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script src="assets/js/base.js"></script>

    <script>
        // Trigger welcome notification after 5 seconds
        setTimeout(() => {
            notification('notification-welcome', 5000);
        }, 2000);
    </script>
    <!-- Date Picker Js -->
    <script>
      duDatepicker('#datepicker',{
        format:'dd/mm/yyyy',
        minDate: 'today',
         setI18n: 'it',
        theme: 'blue'      
    });




//takes dayIndex from sunday(0) to saturday(6)
function nextDate(dayIndex) {
    var today = new Date();
    today.setDate(today.getDate() + (dayIndex - 1 - today.getDay() + 7) % 7 + 1);
    var datee = convertDate(today);
    return datee;
}
//nextDate(0).toLocaleString();


function convertDate(inputFormat) {
  function pad(s) { return (s < 10) ? '0' + s : s; }
  var d = new Date(inputFormat)
  return [pad(d.getDate()), pad(d.getMonth()+1), d.getFullYear()].join('/')
}




    </script>

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

</html>