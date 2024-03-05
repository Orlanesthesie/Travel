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
<div class="container">
    <h3 class="grey-dark text-center">TOP DESTINATION</h3>
    <?php foreach ($destinations as $destination) { ?> </h4>
        <form action="./details.php" method="get">
            <h4 class="grey-dark me-2 ms-2"> <?= $destination->getLocation()?>
            <input type="hidden" name="id" value="<?= $destination->getId()?>"> 
            <button class="btn float-end"type="submit"><i class="fa-solid fa-caret-right" style="color: #dc661f;"></i></button> 
        </form>
    
     <hr>     
<?php } ?>
</div>

<!-- TOP SÉJOURS OU VOYAGES ORGANISÉS -->
<div class="container">
  <h3 class="grey-dark text-center p-3">TOP SÉJOURS OU VOYAGES ORGANISÉS</h3>
  <div class="row">
    <?php
      $destinations = array(
        array(
          "ville" => "Paris",
          "image" => "./assets/images/france/paris/Paris1.jpg",
          "description" => "Flânez dans les rues pavées, savourez un croissant au café et vivez la vie parisienne.",
        ),
        array(
          "ville" => "Tunis",
          "image" => "./assets/images/tunisie/tunis/Tunis1.jpg",
          "description" => "Profitez des plages paradisiaques et du soleil de la Tunisie.",
        ),
        array(
            "ville" => "Barcelone",
            "image" => "./assets/images/espagne/barcelone/barcelone1.jpg",
            "description" => "Barcelone: La cité catalane où l'art et la passion se mêlent.",
        ),
        array(
            "ville" => "Rome",
            "image" => "./assets/images/italie/rome/Rome1.jpg",
            "description" => "La ville éternelle où l'histoire et la beauté se rencontrent.",
        ),
        array(
            "ville" => "Londres",
            "image" => "./assets/images/r-u/londres/Londres1.jpg",
            "description" => "Shopping, musées, gastronomie... Découvrez les mille et une facettes de la capitale britannique.",
        ),
        array(
            "ville" => "Malaga",
            "image" => "./assets/images/espagne/malaga/Malaga1.jpg",
            "description" => " Découvrez les trésors historiques et les plages de rêve de la perle de l'Andalousie."
        )
      );

      foreach ($destinations as $destination) {
        echo creerCarteDestination($destination);
      }
    ?>
  </div>
</div>

<?php
// Fonction pour créer une carte de destination
function creerCarteDestination($destination) {
  $carte =  "<div class='col-md-4 mb-3' style='height: 400px;'>";
  $carte .= "  <div class='card'>";
  $carte .= "    <img src='" . $destination['image'] . "' class='card-img-top' style='height: 230px;'>";
  $carte .= "    <div class='card-body'>";
  $carte .= "      <h5 class='card-title'>" . $destination['ville'] . "</h5>";
  $carte .= "      <p class='card-text'>" . $destination['description'] . "</p>";
  $carte .= "      <a href='#' class='btn bg-orange'>Voir les offres</a>";
  $carte .= "    </div>";
  $carte .= "  </div>";
  $carte .= "</div>";
  return $carte;
}
?>

<?php
include "./partials/footer.php"
?>