<?php
session_start();
include "./partials/header.php";

$manager = new Manager($connexion);
$destinations = $manager->getAllDestination();
 ?>


<!-- FORMULAIRE WHERE DO YOU WANT TO GO -->
<div class="p-3 container">
    <h3 class="text-center"> Where do you want to go ? </h3>
    <p class="text-center"> recherche ?</p>
</div>

<!-- CARROUSEL -->
<p class="text-center"> carousel </p>


<!-- TOP DESTINATION -->
<div>
    <h3 class="grey-dark text-center">TOP DESTINATION</h3>
    <?php foreach ($destinations as $destination) { ?> </h4>
    <h4 class="grey-dark me-2 ms-2"> <?= $destination->getLocation()?>
     <i class="fa-solid fa-caret-right float-end" style="color: #dc661f;"></i> 
     <hr> 
     
<?php } ?>
</div>

<?php
include "./partials/footer.php"
?>