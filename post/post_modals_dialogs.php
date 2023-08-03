<?php
        $folder=0;

        if($folder==0){
                // Modal Like
                include('modals/modal_like.php');

                // Dialog spotted
                include('dialogs/dialog_spotted.php');

                // Dialog conferma richiesta spotted
                include('dialogs/dialog_notification_spotted.php');

                // Post Modal Comments 
                include('modals/modal_comments.php');

                // Post Spotted Request 
                include('modals/modal_spotted_request.php');

                // actionSheet Content Filtri
                include('action_sheet/action_sheet_filter_search_home.php');


                // actionSheet Share Content
                include('action_sheet/action_sheet_share.php');

                //notification_spotted_info
                include('notifications/notification_spotted_info.php');

                //notification_spotted_info
                include('notifications/notification_error_location.php');

                
        }
        else{
                // Modal Like
                include('../modals/modal_like.php');

                // Dialog spotted
                include('../dialogs/dialog_spotted.php');


                // Dialog conferma richiesta spotted
                include('dialogs/dialog_notification_spotted.php');

                
                // Post Modal Comments 
                include('../modals/modal_comments.php');

                // Post Spotted Request 
                include('../modals/modal_spotted_request.php');

                // actionSheet Content Filtri
                include('../action_sheet/action_sheet_filter_search_home.php');
                
                //notification_spotted_info
                include('../notifications/notification_spotted_info.php');

                //notification_spotted_info
                include('../notifications/notification_error_location.php');
        }
?>