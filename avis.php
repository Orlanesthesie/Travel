<?php
include './partials/header.php';

$idTO = $_POST['idTO'];
$logoTO = $_POST['logoTO'];
$gradeCountTO = $_POST['gradeCountTO'];
$gradeTotalTO = $_POST['gradeTotalTO'];
$linkTO = $_POST['linkTO'];

$manager = new Manager($connexion);

$reviews = $manager->getReviewsByOperatorId($idTO);
?>

<div class="container p-5">
    <img class="mb-5" src="./assets/images/logo/<?= $logoTO ?>" style="width: 300px;"></a>
    <h3 style="letter-spacing: 5px;" class="grey-dark fw-bold"> Avis des voyageurs: </h3>
    <div class="container mt-5 comment-box">
        <div id="scroll" class="p-1 row">
            <div id="listComment">
                <?php foreach ($reviews as $review) { ?>
                    <div class="">
                        <h4 class="fw-light"><?= $review->getAuthor(); ?> 
                        <?php if ($review->getGrade() == 0) { ?>
                        <i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($review->getGrade() == 1) { ?>
                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($review->getGrade() == 2) { ?>
                    <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($review->getGrade() == 3) { ?>
                    <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($review->getGrade() == 4) { ?>
                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-regular fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } elseif ($review->getGrade() == 5) { ?>
                        <i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i><i class="fa-solid fa-star fa-sm" style="color: #FFD43B;"></i>
                    <?php } ?> </h4>
                        <h3 class="fw-bold"> <?= $review->getTitle(); ?> </h3>
                        <p class="mt-3"><?= $review->getMessage(); ?></p>
                        
                        <hr>
                    </div>
                <?php }
                ?>
            </div>
        </div>

        <div class="bg-grey-light mb-3 p-4 rounded">
            <form action="./process/add_review.php" method="post">
                <input type="hidden" name="idTO" value="<?= $idTO ?>">
                <h5 class="fw-light">Pseudo:</h5>
                <input class="w-100 mb-2 rounded" type="text" name="username">
                <h5 class="fw-light">Titre :</h5>
                <input class="w-100 mb-2 rounded" type="text" name="title">
                <h5 class="fw-light">Note :</h5>
                <input type="number" name="grade" id="grade" min="0" max="5" placeholder="Entre 0 et 5">
                <div>
                    <h5 class="fw-light">Commentaire :</h5>
                    <textarea class="rounded w-100" type="text" name="comment" placeholder="écrivez votre commentaire ici"></textarea>
                    <button class="btn bg-orange text-white fw-bold d-flex justify-content-center align-items-center" type="submit">GO</button>
                </div>

            </form>
        </div>

    </div>
</div>


    <?php
    include './partials/footer.php';
    ?>