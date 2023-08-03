<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
if(isset($_SESSION['user_id'])){
    include('functions.php');
}
else{
    header('location: login.php');
}

  $latitude = $_SESSION['user_latitude'];

  $longitude = $_SESSION['user_longitude'];

  $l_number = 1;


// se ci sono commenti seleziona da DB


    $resArr = array();
    
    $db = new Db();

    $sql1 = " SELECT place_id, place_name, place_address, place_city, place_latitude, place_longitude, SQRT(
    POW(69.1 * (place_latitude - '$latitude'), 2) +
    POW(69.1 * ('$longitude' - place_longitude) * COS(place_latitude / 57.3), 2)) AS distance
        FROM places HAVING distance < '$global_distance_place' ORDER BY distance;";

    //echo $sql1;

    $result = $db->query($sql1); 
        if (mysqli_num_rows($result) > 0) {

          

?>

<ul class="listview image-listview media">  
<?php


  while($rowdata = $result->fetch_assoc())
            {
                
                $place_id=$rowdata['place_id'];
                $place_name=$rowdata['place_name'];
                $place_address=$rowdata['place_address'];
                $place_city=$rowdata['place_city'];            
                $distance=$rowdata['distance']; 

                $distance= number_format($distance, 2, '.', '')." km";           

?>
<li>
                        <div class="item" data-bs-dismiss="modal" onclick="setPlaceInAddNewSpot(<?php echo $place_id; ?>)">
                            <div class="imageWrapper">
                                <img src="assets/img/blue_pin.png" alt="image" class="imaged w64">
                            </div>
                            <div class="in text-truncate">
                                <div id="responce_place<?php echo $place_id; ?>">
                                    <span class="text-truncate"><?php echo $place_name; ?></span>
                                    <div class="text-muted text-truncate"><?php echo $place_address; ?> <?php echo $place_city; ?></div>
                                </div>
                                <span class="text-muted"><?php echo $distance; ?></span>
                            </div>
                        </div>
                    </li>


    <li>

<?php
                  }
        
    
}else{

?>
<!-- NoPlaces -->
        <div class="text-center pt-5">
            <img src="assets/img/EmptyStateNoPlaces.png" class="img-fluid w-50 pt-5" style="max-width: 220px;">
            <div class="p-3">
                <h3>Non c'è niente qui</h3>
            </div>
        </div>
        <!-- * NoPlaces -->


<?php
}

?>
                   
                </ul>  
  <!-- * likes block -->