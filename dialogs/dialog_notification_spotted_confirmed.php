<!-- Notification Spotted Dialog Block -->
<div class="modal fade dialogbox"  id="DialogSpottedConfirmed" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document" >
        <div class="modal-content text-center" style="box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 28px 10px!important;">
            <div class="modal-header mt-2">
                <h5 class="modal-title d-none">Spotted Point</h5>
                    <img src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged w55 rounded" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
            </div>
            <div class="modal-body" style="background: #fff!important;">
                <h3 class="text-dark">vitale_89 <br> <span class="text-muted"></span></h3>
                <p>Ha confermato il tuo Spotted.</p>
                <h3>Hai guadagnato un punto <b class="text-spotted">Spotted.</b></h3>
            </div>
            <div class="modal-footer">
                <div class="btn-list">
                    <a href="#"  onclick="goToProfile(1);" class="btn btn-text-dark btn-block" data-bs-dismiss="modal">
                        <i class="bi bi-person"></i>
                        Visualizza Profilo
                    </a>
                    <a href="#"  onclick="goToProfile(1);" class="btn btn-text-dark btn-block" data-bs-dismiss="modal">
                        <i class="bi bi-chat-left-dots"></i>
                        Invia un messaggio
                    </a>
                    <a href="#" class="btn btn-text-dark btn-block" data-bs-dismiss="modal">
                        <i class="bi bi-geo"></i>
                        Dettagli Spot
                    </a>
                </div>

                <div class="btn-inline" style="border-top: 0.5px solid lightgray;!important;">
                    <a href="#" class="btn btn-text text-danger btn-block" data-bs-dismiss="modal">
                        <i class="bi bi-x-lg"></i>
                        Chiudi
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- * Notification Spotted Dialog Block -->