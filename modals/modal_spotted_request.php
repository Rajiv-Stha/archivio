<!-- Like Modal -->
<div style="z-index: 99999!important;"  class="modal fade modalbox" id="ModalSpottedRequestList" data-bs-backdrop="static" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary" style="background: linear-gradient(to right, #b739f3, #6950fb)!important;"> 
                <a class="text-white" onclick="notification('notification-spotted-info')">Info
                </a>
                <h3 class="modal-title text-white ">Richieste Spotted</h3>
                <a href="#" data-bs-dismiss="modal" class="text-white"><b>Chiudi</b></a>
            </div>
            <div class="modal-body p-0">

                <div id="spottedRequestModalContent">
                    
                </div>
                
            </div>
            <!-- * Card Body -->
        </div>
        <!-- * Card -->
    </div>
</div>
<!-- * Like Modal -->


<?php 
    // Notifica a comparsa info spotted
    //include 'notifications/notification_spotted_info.php';

    // Notification Spotted Dialog Block
    //    include ('dialogs/dialog_notification_spotted.php');
?>