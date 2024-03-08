<?php
session_start();
include "./partials/header.php";

$manager = new Manager($connexion);

$destinations = $manager->getAllDestination();

?>

<style>
   /* Style pour chaque formulaire en mode réactif */
   @media (max-width: 768px) {
        .container {
            width: calc(70% - 20px); /* Les formulaires passent en 2 colonnes */
        }
    }

    @media (max-width: 880px) {
        .container {
            width: 100%; /* Les formulaires passent en une seule colonne */
        }
    }
</style>

<!-- FORMULAIRE OÙ SOUHAITEZ-VOUS ALLER -->
<div class="p-3 container">
    <h3 class="text-center"> Où souhaitez-vous aller ? </h3>
</div>

<!-- CARROUSEL -->
<div id="carouselExampleControls" class="container carousel slide mb-5 " data-bs-ride="carousel">
  <div class="carousel-inner rounded">
    <div class="carousel-item active">
      <img src="./assets/images/carouprice/hammaprice.jpg" class="d-block w-100 " alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/images/carouprice/malagaprice.jpg" class="d-block w-100 " alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/images/carouprice/monacoprice.jpg" class="d-block w-100 " alt="...">
    </div>
    <div class="carousel-item">
      <img src="./assets/images/carouprice/Parisprice.jpg" class="d-block w-100 " alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<!-- TOP DESTINATION -->
<div class="container">
    <h3 class="grey-dark text-center">TOP DESTINATION</h3>
    <?php foreach ($destinations as $destination) { ?> </h4>
        <form action="./details.php" method="get">
            <h4 class="grey-dark me-2 ms-2"> <?= ucfirst($destination->getLocation())?>
            <input type="hidden" name="location" value="<?= $destination->getLocation()?>"> 
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
          "image" => "./assets/images/france/paris/paris1.jpg",
          "description" => "Flânez dans les rues pavées, savourez un croissant au café et vivez la vie parisienne.",
        ),
        array(
          "ville" => "Tunis",
          "image" => "./assets/images/tunisie/tunis/tunis1.jpg",
          "description" => "Profitez des plages paradisiaques et du soleil de la Tunisie.",
        ),
        array(
            "ville" => "Barcelone",
            "image" => "./assets/images/espagne/barcelone/barcelone1.jpg",
            "description" => "Barcelone: La cité catalane où l'art et la passion se mêlent.",
        ),
        array(
            "ville" => "Rome",
            "image" => "./assets/images/italie/rome/rome1.jpg",
            "description" => "La ville éternelle où l'histoire et la beauté se rencontrent.",
        ),
        array(
            "ville" => "Londres",
            "image" => "./assets/images/royaume-uni/londres/londres1.jpg",
            "description" => "Shopping, musées, gastronomie... Découvrez les mille et une facettes de la capitale britannique.",
        ),
        array(
            "ville" => "Malaga",
            "image" => "./assets/images/espagne/malaga/malaga1.jpg",
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
  $carte .= "      <a href='./details.php?location=" . strtolower($destination['ville']) . "' class='btn bg-orange'>Voir les offres</a>";
  $carte .= "    </div>";
  $carte .= "  </div>";
  $carte .= "</div>";
  return $carte;
}
?>


<?php
include "./partials/footer.php"
?>