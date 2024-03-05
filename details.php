<?php
session_start();
include "./partials/header.php";

$location = $_GET['location'];
$manager = new Manager($connexion);
$destination = $manager->getDestinationByLocation($location);

$arrayOfTourOperatorObject = $manager->getOperatorByDestination($destination);
?>

<!-- CHEMIN -->


<div class="container">

    <!-- Titre destination -->
    <h3 class="grey-dark fw-bold"> <?= $destination->getLocation() ?> </h3>

    <!-- Pays Destination -->
    <p class="grey-dark"> <?= $destination->getCountry() ?> </p>

    <!-- CAROUSEL -->
    <p>carousel</p>

    <!-- LISTE T.O -->
    <?php foreach ($arrayOfTourOperatorObject as $key) { ?>
        <div class="row">
            <div class="col-3">
                <h3 class="grey-dark d-inline"><?= $key->getName(); ?> </h3>
            </div>
            <div class="col-3">
                <a href="<?= $key->getLink(); ?>" class="orange" style="text-decoration: none;"><img src="./assets/images/logo/<?= $key->getLogo(); ?>" style="width: 100px;"></a>
            </div>
            <div class="col-3">
                <p class="orange fw-bold"><?= $destination->getPrice(); ?></p>
            </div>
        </div>
    <?php } ?>

</div>



<?php
include "./partials/footer.php"
?>