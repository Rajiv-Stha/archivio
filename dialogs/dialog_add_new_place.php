<!-- Follower Dialog Block -->
<div class="modal fade dialogbox" id="DialogAddNewPlace" data-bs-backdrop="static" tabindex="-1" role="dialog" style="z-index: 9999999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body text-start" style="background: #fff!important; margin-bottom: 15px;">
                <div class="row mt-2">
                    <div class="col-2">
                        <img src="<?php echo $path_url; ?>/assets/img//blue_pin.png" alt="image" class="imaged w55 rounded" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
                    </div>

                    <div class="col-10 text-center">
                        <p style="font-size: 12px;" class="mt-1 mb-0">
                            Il luogo che creerai sarà visibile <br>ed utilizzabile da tutti.
                        </p>
                    </div>
                </div>
                <hr>
                <form action="core/addNewPlace.php" method="POST">

                    <div class="text-center mt-1 mb-1">
                        <span style="font-size: 13px; font-weight: 900;">La tua posizione:</span><BR>

                        <span class="border-0 me-1">
                            <b style="font-size: 12px;">Lat: </b>
                            <b class="ms-1" style="font-size: 12px;"><?php echo @$_SESSION['user_latitude'];?></b>
                        </span>
                        <span class="border-0 ms-1">
                            <b style="font-size: 12px;">Long: </b>
                            <b class="ms-1" style="font-size: 12px;"><?php echo @$_SESSION['user_longitude'];?></b>
                        </span>
                    </div>

                    <div class="form-group boxed" style="padding: 4px 0;">
                        <div class="input-wrapper">
                            <label class="form-label" style="font-size: 15px;" for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="nome" placeholder="Nome del luogo..." required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed" style="padding: 4px 0;">
                        <div class="input-wrapper">
                            <label class="form-label" style="font-size: 15px;" for="address">Indirizzo</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Indirizzo.." autocomplete="off" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed" style="padding: 4px 0;">
                        <div class="input-wrapper">
                            <input type="text" class="form-control" id="city" name="city" placeholder="Città (Provincia)" autocomplete="off">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

            </div>


            <div class="modal-footer">
                <div class="btn-inline">
                    <button onclick="goToProfile(1);" class="btn text-place btn-block" data-bs-dismiss="modal">
                        <i class="bi bi-geo-alt"></i>
                        Crea
                    </button>
                    <div class="btn btn-text text-danger btn-block" data-bs-dismiss="modal">
                        <i class="bi bi-trash3"></i>
                        Annulla
                    </div>
                </div>

                </form>

            </div>


           
        </div>
    </div>
</div>
<!-- * Follower Dialog Block -->