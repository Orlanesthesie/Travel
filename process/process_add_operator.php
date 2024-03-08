<?php
session_start();
require_once '../config/connexion.php';

$cheminImage = '../assets/images/logo/';


if (!empty($_POST['name'])
    && !empty ($_POST['link'])){

$preparedRequest = $connexion->prepare( 
    "INSERT INTO tour_operator (name, link, logo) VALUES (?, ?, ?)");

$preparedRequest->execute([
    $_POST['name'],
    $_POST['link'],
    'randop.png',
]);
  
header('Location: ../adminAdd.php?Opérateur ajouté avec succès !');
}
?>