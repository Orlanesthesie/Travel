<?php
session_start();
include "./partials/header.php";

$manager = new Manager($connexion);
$destinations = $manager->getAllDestination();

$allTO = $manager->getAllOperator();
$allTOPremium = $manager->getAllOperatorPremium();
$allTORegular = $manager->getAllOperatorRegular();

?>

<header class="text-center bg-white text-dark p-4">
    <h1>MODE ADMIN</h1>
</header>

<style>
    .form-container {
        display: flex;
        flex-wrap: wrap; /* Permet le passage à la ligne lorsque l'espace est insuffisant */
        justify-content: space-between;
        margin-bottom: 20px;
    }

    /* Style pour chaque formulaire */
    .container {
        box-sizing: border-box;
        border-radius: 5px;
        background-color: #D9D9D9;
        padding: 20px;
        width: calc(33.33% - 20px); /* Calcul de la largeur de chaque formulaire */
        max-width: 400px;
        margin-bottom: 20px;
    }

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

    /* Autres styles inchangés */
    input[type=text],
    textarea,
    input[type=email] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    label {
        width: 100%;
    }

    input[type=submit] {
        background-color: #1255a2;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #1872D9;
    }

    h1 {
        color: dark;
        width: 100%;
    }
</style>

<div class="form-container ">


    <!-- Ajouter un OPERATEUR -->
    <div class="container mb-2 ">
        <h1>Ajouter un opérateur</h1>
        <form action="./process/process_add_operator.php" method="post">
            <label for="name">Nom</label>
            <input type="text" id="name" name="name" placeholder="Nom de du tour operateur">

            <label for="link">Lien du site</label>
            <input type="text" id="link" name="link" placeholder="Lien du site">

            <button type="submit" class="btn bg-orange">Valider</button>
        </form>
    </div>

    <!-- Ajouter une destination -->
    <div class="container mb-2">
        <h1>Ajouter une destination</h1>
        <form action="./process/add_destination.php" method="post">
            <label for="country">Pays</label>
            <input type="text" id="country" name="country" placeholder="Pays">

            <label for="location">Ville</label>
            <input type="text" id="location" name="location" placeholder="Ville">

            <!-- <label for="price">Prix</label>
        <input type="number" id="price" name="price" placeholder="Prix"> -->

            <input type="number" name="price" id="price">

            <label class="mb-2">Opérateur</label>
            <select name="tourOperatorId" id="tourOperatorId">
                <?php foreach ($allTO as $TOObject) { ?>
                    <option value="<?= $TOObject->getId() ?>"> <?= $TOObject->getName() ?> </option>
                <?php } ?>
            </select>
            <br>
            <button type="submit" class="btn bg-orange mt-4">Valider</button>
        </form>
    </div>

    <!-- Destination en premium -->
    <div class="container mb-2">
        <h1>Premium</h1>

        <!-- FAIRE DEVENIR PREMIUM -->
        <form action="./process/process_premium.php" method="post" class="d-flex justify-content-center align-items-center">
            <label class="mb-2">Add Premium</label>
            <select name="tourOperatorId" id="tourOperatorId">
                <?php
                foreach ($allTORegular as $TOObject) { ?>
                    <option value="<?= $TOObject->getId() ?> "> <?= $TOObject->getName() ?> </option>
                <?php } ?>
            </select>
            <br>
            <button type="submit" class="btn bg-orange mt-4">Valider</button>
        </form>
        <hr>

        <!-- ENLEVER LE PREMIUM -->
        <form action="./process/process_regular.php" method="post" class="d-flex justify-content-center align-items-center">
            <label class="mb-2">Remove Premium</label>
            <select name="tourOperatorId" id="tourOperatorId">
                <?php
                foreach ($allTOPremium as $TOObject) { ?>
                    <option value="<?= $TOObject->getId() ?> "> <?= $TOObject->getName() ?> </option>
                <?php } ?>
            </select>
            <br>
            <button type="submit" class="btn bg-orange mt-4">Valider</button>
        </form>

    </div>
</div>