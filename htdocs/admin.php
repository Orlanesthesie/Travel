<?php
session_start();
include "./partials/header.php";

$manager = new Manager($connexion);
$destinations = $manager->getAllDestination();
?>




<body>
    <header class="text-center bg-white text-dark p-4 mt-3">
        <h1>MODE ADMIN</h1>
    </header>

    <div class="d-flex justify-content-center p-4 vh-10 bg-grey-light">
            <form style="align-items: center;" class="bg-grey-light">
                <p class="grey-dark d-inline">Mot de passe</p>
                <input type="password" id="motDePasse" name="motDePasse" class="">
                <button type="submit" class="btn bg-orange ">Valider</button>
            </form>
    </div>
</body>