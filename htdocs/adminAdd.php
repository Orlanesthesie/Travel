<?php
session_start();
include "./partials/header.php";

$manager = new Manager($connexion);
$destinations = $manager->getAllDestination();
?>

<header class="text-center bg-white text-dark p-4">
        <h1>MODE ADMIN</h1>
    </header>

<style>
    
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
        margin-right: 0px;
        margin-left: 0px;
        resize: vertical;
    }

    label {
        margin-right: 0px;
        margin-left: 0px;
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

    .container {
        /* Ajouter box-sizing */
        box-sizing: border-box;
        border-radius: 5px;
        background-color: #D9D9D9;
        padding: 20px;
        width: 100%;
        /* redéfinition 400 + 2*20 */
        max-width: 440px;
        margin: 0 auto;
    }

    h1 {
        color: dark;
        width: 100%;
    }
</style>

<br> 

<div class="container">
    <h1>Ajouter un opérateur</h1>
    <form action="/action_page.php">
        <label for="fname">Nom</label>
        <input type="text" id="fname" name="firstname" placeholder="Votre nom et prénom">

        <label for="emailAddress">Lien du site</label>
        <input id="emailAddress" type="email" name="email" placeholder="Votre email">

        <label for="sujet" class="mb-2">Logo</label>
        <input type="file" id="sujet" name="sujet" placeholder="L'objet de votre message" class="pb-3">

        <button type="submit" class="btn bg-orange">Valider</button>
    </form>
</div>

<br>

<div class="container">
    <h1>Ajouter une destination</h1>
    <form action="/action_page.php">
        <label for="fname">Nom</label>
        <input type="text" id="fname" name="firstname" placeholder="Votre nom et prénom">

        <label for="emailAddress">Lien du site</label>
        <input id="emailAddress" type="email" name="email" placeholder="Votre email">

        <label for="sujet">Prix</label>
        <input type="text" id="sujet" name="sujet" placeholder="L'objet de votre message">

        <label class="mb-2">Opérateur</label>
        <select name="operator" id="pet-select">
            <option value="dog">Leclerc Voyage</option>
            <option value="cat">Fram</option>
            <option value="hamster">Heliades</option>
            <option value="parrot">Salaun Holidays</option>
        </select>
        <br>
        <button type="submit" class="btn bg-orange mt-4">Valider</button>
    </form>
</div>

<br>

<div class="container">
    <h1>Prenium</h1>
    <form action="/action_page.php">
        <label class="mb-2">Tour Opérateur</label>
        <select name="operator" id="pet-select">
            <option value="dog">Leclerc Voyage</option>
            <option value="cat">Fram</option>
            <option value="hamster">Heliades</option>
            <option value="parrot">Salaun Holidays</option>
        </select>


        <br>
        <button type="submit" class="btn bg-orange mt-4">Valider</button>
    </form>
</div>