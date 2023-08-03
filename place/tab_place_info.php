<div class="listview-title text-dark" style="background: #f2f2f2!important;">Dettagli Luogo</div>
<ul class="listview image-listview text flush transparent pt-1">

    <li>
        <div class="item">
            <div class="icon-box bg-gray">
                <i class="bi bi-geo"></i>
            </div>
            <div class="in">
                <div>Latitudine</div>
                <span class="badge bg-secondary"><?php echo $place_latitude; ?></span>
            </div>
        </div>
    </li>
     <li>
        <div class="item">
            <div class="icon-box bg-gray">
                <i class="bi bi-geo"></i>
            </div>
            <div class="in">
                <div>Longitudine</div>
                <span class="badge bg-secondary"><?php echo $place_longitude; ?></span>
            </div>
        </div>
    </li>

    <li>
        <a href="http://maps.google.com/maps?q=<?php echo $place_latitude; ?>,<?php echo $place_longitude; ?>" class="item" target="_blank">
            <div class="icon-box bg-place">
                <i class="bi bi-cursor-fill"></i>
            </div>
            <div class="in">
                <div>Portami qui</div>
            </div>
        </a>
    </li>
</ul>
<div class="listview-title text-dark" style="background: #f2f2f2!important;">Rivendica questo luogo.</div>
<ul class="listview image-listview text flush transparent pt-1">

    <li>
        <a href="#" class="item" target="_blank">
            <div class="icon-box bg-warning">
                <i class="bi bi-building"></i>
            </div>
            <div class="in">
                <div>Sei il titolare di questo luogo?</div>
            </div>
        </a>
    </li>
        <li>
        <div  class="item" >
        Se sei il titolare di questo luogo puoi creare eventi e usugruire di tutti i vantaggi della sezione "Gesione Luoghi". <br>Abbiamo bisogno di certificare la tua "proprietà".<br>Segui la procedura guidata per rivendicare il tuo luogo.
        </div>
    </li>
</ul>