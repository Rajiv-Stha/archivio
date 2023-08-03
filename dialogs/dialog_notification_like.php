<!-- Like Dialog Block -->
<div class="modal fade dialogbox" id="DialogLikeButton" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header mt-2">
                <h5 class="modal-title d-none">Spotted Point</h5>
                    <img src="<?php echo $path_url; ?>/assets/img/sample/photo/1.jpg" alt="image" class="imaged w55 rounded" style="display: block; margin-left: auto; margin-right: auto; width: 50%;">
            </div>
            <div class="modal-body" style="background: #fff!important;">
                <h3 class="text-dark">vincenzo_russomanno <br> <span class="text-muted">ha messo like al tuo post.</span></h3>
            </div>
            <div class="modal-footer">
                <div class="btn-list">
                    <a href="#" onclick="goToProfile(1);" class="btn btn-text-dark btn-block" data-bs-dismiss="modal">
                        <i class="bi bi-person"></i>
                        Visualizza Profilo
                    </a>
                </div>

                <div class="btn-inline" style="border-top: 0.5px solid lightgray;!important;">
                    <a href="#" class="btn btn-text-success btn-block" data-bs-dismiss="modal">
                        <i class="bi bi-eye"></i>
                        Accetta
                    </a>
                    <a href="#" class="btn btn-text text-danger btn-block" data-bs-dismiss="modal">
                        <i class="bi bi-trash3"></i>
                        Rifiuta
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- * Like Dialog Block -->
