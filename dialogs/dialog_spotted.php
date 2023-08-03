<!-- Spotted Dialog Block -->
<div class="modal fade dialogbox" id="DialogSpottedRequestButton" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header mt-2 text-center">
                <h5 class="modal-title d-none">Spotted Point</h5>
                    <img src="<?php echo $path_url; ?>/assets/img/EmptyStateSpotted.png" class="img-fluid w-50 pb-2" style="display: block; margin-left: auto; margin-right: auto; width: 200px;">
            </div>
            <div class="modal-body" style="background: #fff!important;">
                <h3 class="text-dark">Ti riconosci in questo Spot?<br> <span class="text-muted"></span></h3>
                 <span class="text-muted">Se l'utente che ha "avvistato" sei tu, guadagnerai un punto <b class="btn-text-spotted">Spotted</b>.</span>
            </div>
            <div class="modal-footer">
                <!--div class="btn-list">
                    <a href="#" class="btn btn-text-dark btn-block" data-bs-dismiss="modal">
                        <ion-icon name="person-outline"></ion-icon>
                        Visualizza Profilo
                    </a>
                </div-->
                <input type="hidden" id="spotted_request_post_id" value="">
                <div class="btn-inline" style="border-top: 0.5px solid lightgray;!important;">
                    <a href="#" id="" onclick="confirmSpottedSendRequestOn();" class="btn btn-text-spotted btn-block" data-bs-dismiss="modal">
                        <i class="bi bi-eye"></i>
                        Sono io!
                    </a>
                    <a href="#" class="btn btn-text text-muted btn-block" data-bs-dismiss="modal">
                            <i class="bi bi-trash3"></i>
                            Annulla
                        </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- * Spotted Dialog Block -->