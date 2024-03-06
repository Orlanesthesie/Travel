<?php
session_start();
include "./partials/header.php";

$location = $_GET['location'];
$manager = new Manager($connexion);

$destination = $manager->getDestinationByLocation($location);

$arrayOfTourOperatorObject = $manager->getOperatorByDestination($location);

$toByDestination = $manager->getOperatorByDestination($location);

?>

<!-- CHEMIN -->


<div class="container">

    <!-- Titre destination -->
    <h3 class="grey-dark fw-bold"> <?= $destination->getLocation() ?> </h3>

    <!-- Pays Destination -->
    <p class="grey-dark"> <?= $destination->getCountry() ?> </p>



    <!-- Carousel -->
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <?php for ($i = 1; $i <= 4; $i++) { ?>
                <div class="carousel-item<?= ($i === 1) ? ' active' : '' ?>">
                    <img class="carousel__images d-block w-100 " src="./assets/images/<?= ucfirst($destination->getCountry()) ?>/<?= $destination->getLocation() ?>/<?= $destination->getLocation() . $i ?>.jpg" alt="Slide <?= $i ?>" style="height:15rem;">
                </div>
            <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- LISTE T.O -->
    <?php foreach ($toByDestination as $value) { ?>
        <div class="row mt-5 mb-5">
            <div class="col-4">
                <?php if ($value['isPremium']) { ?>
                    <div class="col-4 text-center">
                        <a href="<?= $value['link']; ?>" class="orange" style="text-decoration:none;"> <img src="./assets/images/logo/<?= $value['logo']; ?>" style="width: 100px;"></a>
                    </div>
                <?php } else { ?>
                    <img src="./assets/images/logo/<?= $value['logo']; ?>" style="width: 100px;"></a>
                <?php } ?>
            </div>
            <div class="col-4">
                <h6 class="orange fw-bold p-3"><?= $value['price']; ?>€ <br>
                    <p class="grey-dark">/personne</p>
                </h6>
            </div>
            <div class="col-4">
                <a href="./details.php"> <?php if ($value['gradeCount'] == 0) { ?>
                        <i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($value['gradeCount'] == 1) { ?>
                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($value['gradeCount'] == 2) { ?>
                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($value['gradeCount'] == 3) { ?>
                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } ?> </a>
            </div>
        <?php
    } ?>
        </div>


</div>



<?php
include "./partials/footer.php"
?>