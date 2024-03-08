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
    <h3 class="grey-dark fw-bold"> <?= ucfirst($destination->getLocation()) ?> </h3>

    <!-- Pays Destination -->
    <p class="grey-dark"> <?= ucfirst($destination->getCountry()) ?> </p>



    <!-- Carousel -->
    <div id="carouselExampleControls" class="carousel slide">
        <div class="carousel-inner rounded">
            <?php for ($i = 1; $i <= 4; $i++) { ?>
                <div class="carousel-item<?= ($i === 1) ? ' active' : '' ?>">
                    <img class="carousel__images d-block w-100 " src="./assets/images/<?= $destination->getCountry() ?>/<?= $destination->getLocation() ?>/<?= $destination->getLocation() . $i ?>.jpg" alt="Slide <?= $i ?>">
                </div>
            <?php } ?>
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

    <h5 class="grey-dark text-center mt-3">Pour cette destination, ces opérateurs vous proposent:</h5>

    <!-- LISTE T.O -->
        <div class="row mt-3 mb-5 d-flex justify-content-center align-items-center">
            <?php foreach ($toByDestination as $value) { 
        // echo '<pre>'; 
        // var_dump($value);
        // echo '</pre>';
        
        ?>
            <div class="col-3 d-flex justify-content-center align-items-center">
                <?php if ($value['isPremium']) { ?>
                <a href="<?= $value['link']; ?>" style="text-decoration:none;"> <img src="./assets/images/logo/<?= $value['logo']; ?>" style="width: 100px;"></a>
                <?php } else { ?>
                    <img src="./assets/images/logo/<?= $value['logo']; ?>" style="width: 100px;"></a>
                <?php } ?>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center">
                <h6 class="orange fw-bold p-3 "><?= $value['price']; ?>€ <br>
                    <p class="grey-dark">/personne</p>
                </h6>
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center">
                 <?php if ($value['gradeTotal'] == 0) { ?>
                        <i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($value['gradeTotal'] <= 1) { ?>
                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($value['gradeTotal'] <= 2) { ?>
                    <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($value['gradeTotal'] <= 3) { ?>
                    <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($value['gradeTotal'] <= 4) { ?>
                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($value['gradeTotal'] <= 5) { ?>
                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } ?> 
            </div>
            <div class="col-3 d-flex justify-content-center align-items-center">
                <form action="./avis.php" method="post">
                    <input type="hidden" name="idTO" value ="<?= $value['tourOperatorId'] ?>">
                    <input type="hidden" name="logoTO" value ="<?= $value['logo'] ?>">
                    <input type="hidden" name="gradeCountTO" value ="<?= $value['gradeCount'] ?>">
                    <input type="hidden" name="gradeTotalTO" value ="<?= $value['gradeTotal'] ?>">
                    <input type="hidden" name="linkTO" value ="<?= $value['link'] ?>">
                    <button type="submit" class="btn p-3"><i class="fa-solid fa-arrow-right" style="color: #dc661f;"></i></button>
                </form>
            </div>
        <?php
    } ?>
        </div>


</div>



<?php
include "./partials/footer.php"
?>