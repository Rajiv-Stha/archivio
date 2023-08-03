<div class="section mt-2 mb-2">

    <div class="row">

<?php

    $sql1="SELECT * from followers where follower_user_id = '$user_id_get' AND follower_type = 'place' AND follower_status = 1  ORDER BY follower_timestamp DESC;"; //confermate


    $result = $db->query($sql1); 
if (mysqli_num_rows($result) > 0) {  

    while($rowdata = $result->fetch_assoc())
            {
                
                $place_card_id=$rowdata['follow_user_id'];

                

                 include('post/post_card_place.php');

                   
        
        }
    
}else{

?>
<!-- NoPlaces -->
        <div class="text-center pt-0 pb-5">
            <img src="assets/img/EmptyStateNoPlaces.png" class="img-fluid w-50 pt-5" style="max-width: 220px;">
            <div class="p-1">
                <h3>Ops...</h3>
                <p>Nessun luogo seguito...</p>
            </div>
        </div>
        <!-- * NoPlaces -->


<?php
}

?>



    </div><!-- row -->
</div><!-- section -->