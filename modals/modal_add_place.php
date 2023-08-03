<!-- Modal Dove Sei? -->
<div class="modal fade modalbox" id="ModalListview" data-bs-backdrop="static" tabindex="-1" role="dialog" style="z-index: 999999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-place">
                <p class="modal-title text-white">Dove Sei?</p>
                <a href="#" data-bs-dismiss="modal" class="text-white">Chiudi</a>
            </div>
            <div class="modal-body p-0">
                
                <div id="nearByPlaceBox">
                    
                     <!-- skeleton generic list -->
                        <ul class="listview image-listview placeholder-glow mt-2">
                            <li>
                                <div href="#" class="item">
                                    <div class="in">
                                        <span class="placeholder col-6"></span>
                                        <span class="placeholder col-2"></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div href="#" class="item">
                                    <div class="in">
                                        <span class="placeholder col-6"></span>
                                        <span class="placeholder col-2"></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div href="#" class="item">
                                    <div class="in">
                                        <span class="placeholder col-6"></span>
                                        <span class="placeholder col-2"></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div href="#" class="item">
                                    <div class="in">
                                        <span class="placeholder col-6"></span>
                                        <span class="placeholder col-2"></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div href="#" class="item">
                                    <div class="in">
                                        <span class="placeholder col-6"></span>
                                        <span class="placeholder col-2"></span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div href="#" class="item">
                                    <div class="in">
                                        <span class="placeholder col-6"></span>
                                        <span class="placeholder col-2"></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- * skeleton generic list -->
                </div>
               

                <div class="mt-2 ms-3 me-3" style="padding-bottom: 76px!important;">
                    <a href="page_add_new_place.php" class="btn bg-place btn-block shadowed border-0" data-bs-toggle="modal" data-bs-target="#DialogAddNewPlace">
                        <i class="bi bi-geo-alt-fill"></i>
                        <b class="text-white" style="font-size: 16px!important;">Aggiungi Luogo</b>
                    </a>
                </div>
            
            </div>
        </div>
    </div>
</div>

<?php
    // Notification Spotted Dialog Block
    include ('dialogs/dialog_add_new_place.php');
?>
<!-- * Modal Dove Sei -->