<!-- settings -->
<div class="listview-title text-dark" style="background: #f2f2f2!important;">Notifiche</div>
<ul class="listview image-listview text flush transparent pt-1">
    
    <li>
        <div class="item">
            <div class="in">
                <div>
                    Notifiche
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="check_n_all" name="check_n_all" onclick="updateSettingNotificheAll(this.value);" >
                    <label class="form-check-label" for="check_n_all"></label>
                </div>
            </div>
        </div>
    </li>

    <li>
        <div class="item">
            <div class="in">
                <div>
                    Notifiche E-mail
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="check_n_email"  name="check_n_email" onclick="updateSettingNotificheEmail(this.value);">
                    <label class="form-check-label" for="check_n_email"></label>
                </div>
            </div>
        </div>
    </li>

    <li>
        <div class="item">
            <div class="in">
                <div>
                    Notifiche Spot
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox"  id="check_n_spot"  name="check_n_spot" onclick="updateSettingNotificheSpot(this.value);">
                    <label class="form-check-label" for="check_n_spot"></label>
                </div>
            </div>
        </div>
    </li>

    <li>
        <div class="item">
            <div class="in">
                <div class="w-100 pt-2">
                    <label for="customRange" class="form-label">Range notifica</label>
                    <div class="row mt-1">
                        <p class="col-3 text-dark text-start">50 m</p>
                        <p class="col-3 text-dark text-center">200 m</p>
                        <p class="col-3 text-dark text-center">1000 m</p>
                        <p class="col-3 text-dark text-end">2000 m</p>
                    </div>
                    <input type="range" class="form-range" min="1" max="4" step="1" id="customRange"  name="customRange" oninput="range_value.value=customRange.value">
                    <input id="range_value" type="hidden"  oninput="customRange.value=range_value.value" />

                    
                </div>
                
            </div>
        </div>
    </li>
    

    
</ul>

<div class="listview-title text-dark" style="background: #f2f2f2!important;">Impostazioni Utente</div>
<ul class="listview image-listview text flush transparent pt-1">
    <li>
        <div class="item">
            <div class="in">
                <div>
                    Profilo Privato
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="check_private_profile" name="check_private_profile" onclick="updatePrivateProfile(this.value);">
                    <label class="form-check-label" for="check_private_profile"></label>
                </div>
            </div>
        </div>
    </li>

    <li>
        <a href="page_edit_profile.php" class="item">
            <div class="in">
                <div>Modifica Profilo</div>
            </div>
        </a>
    </li>

    <li>
        <a href="page_change_password.php" class="item">
            <div class="in">
                <div>Cambia Password</div>
            </div>
        </a>
    </li>

    <li>
        <a href="page_users_blocked.php" class="item">
            <div class="in">
                <div>Utenti Bloccati</div>
            </div>
        </a>
    </li>
</ul>

<div class="listview-title text-dark" style="background: #f2f2f2!important;">Impostazioni App</div>
<ul class="listview image-listview text flush transparent pt-1">
   

    <li>
        <a href="empty_screen/empty_screen.php" class="item">
            <div class="in">
                <div>Centro Assistenza</div>
            </div>
        </a>
    </li>

    <li>
        <div href="#" class="item">
            <div class="in">
                <div>Condividi App</div>
            </div>
            <span class="text-muted">
                <i class="bi bi-share" style="font-size: 20px!important;"></i>
            </span>
        </div>
    </li>
</ul>

<div class="listview-title text-dark" style="background: #f2f2f2!important;">&nbsp;</div>
<div class="p-1 bg-gray">
<a href="LoginPageApp.php" class="btn btn-danger shadowed border-0 btn-block">
    <i class="bbi bi-box-arrow-right me-1"  role="img" class="md hydrated"></i>
    <span class="">Esci</span>
</a>
</div>

<p class="text-center text-dark p-2" style="background: #f2f2f2!important;">Version 1.01..14</p>

<!-- * settings -->


<script type="text/javascript">


function updatePrivateProfile(a){
    var remember = document.getElementById('check_private_profile');
    if (remember.checked){
        var update = 1; //private_profile
    }else{
        var update = 0; //public_profile
        
    }
    $.ajax({
          url: 'core/updateProfile.php',
          type: 'POST',
          data:   {
            update_setting_private_profile: 1,
            check_box: update,
            check: update,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
        }).done(function(response) {
            //$('#DialogSpottedRequestInfo').html(response);
            toastbox('toast-update-ok', 2000)

        }).fail(function() {
                        //$('#'+div_id).html(response);
        });
}



function updateSettingNotificheAll(a){
    var remember = document.getElementById('check_n_all');
    if (remember.checked){
        var update = 1; //private_profile
    }else{
        var update = 0; //public_profile
        
    }
    $.ajax({
          url: 'core/updateProfile.php',
          type: 'POST',
          data:   {
            update_setting_notifiche_all: 1,
            check_box: update,
            check: update,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
        }).done(function(response) {
            //$('#DialogSpottedRequestInfo').html(response);
            toastbox('toast-update-ok', 2000)

        }).fail(function() {
                        //$('#'+div_id).html(response);
        });
}


function updateSettingNotificheEmail(a){
    var remember = document.getElementById('check_n_email');
    if (remember.checked){
        var update = 1; //private_profile
    }else{
        var update = 0; //public_profile
        
    }
    $.ajax({
          url: 'core/updateProfile.php',
          type: 'POST',
          data:   {
            update_setting_notifiche_email: 1,
            check_box: update,
            check: update,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
        }).done(function(response) {
            //$('#DialogSpottedRequestInfo').html(response);
            toastbox('toast-update-ok', 2000)

        }).fail(function() {
                        //$('#'+div_id).html(response);
        });
}


function updateSettingNotificheSpot(a){
    var remember = document.getElementById('check_n_spot');
    if (remember.checked){
        var update = 1; //private_profile
    }else{
        var update = 0; //public_profile
        
    }
    $.ajax({
          url: 'core/updateProfile.php',
          type: 'POST',
          data:   {
            update_setting_notifiche_nearby: 1,
            check_box: update,
            check: update,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
        }).done(function(response) {
            //$('#DialogSpottedRequestInfo').html(response);
            toastbox('toast-update-ok', 2000)

        }).fail(function() {
                        //$('#'+div_id).html(response);
        });
}



//listener su range bar (input range_value hidden)
document.getElementById('customRange').addEventListener("change",function () {
    updateSettingNotificheRadius();
})


function updateSettingNotificheRadius(a){
    var remember = document.getElementById('range_value').value;
    //alert(remember);
    $.ajax({
          url: 'core/updateProfile.php',
          type: 'POST',
          data:   {
            update_setting_notifiche_radius: 1,
            check_box: remember,
            check: remember,
          },
          statusCode: {
            500: function() {
              //$('#'+div_id).html('<p>We couldn\'t save your location.</p>');
            }
          }
        }).done(function(response) {
            //$('#DialogSpottedRequestInfo').html(response);
            toastbox('toast-update-ok', 2000)

        }).fail(function() {
                        //$('#'+div_id).html(response);
        });
}

</script>