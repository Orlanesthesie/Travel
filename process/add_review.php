<?php

include '../config/connexion.php';

$idTO = $_POST['idTO'];

if (!empty($_POST['username'])
    && !empty ($_POST['comment'])
    && !empty($_POST['title'])
    && !empty($_POST['grade'])){

$prepareRequest = $connexion->prepare(
    "INSERT INTO `review`(`message`, `author`, `tour_operator_id`, `title`, `grade`) VALUES (?, ?, ?, ?, ?)");
    
 $prepareRequest->execute([
    $_POST['comment'],
    $_POST['username'],
    $idTO,
    $_POST['title'],
    $_POST['grade']
]);

    header('Location: ../index.php?Commentaire ajouté avec succes');
}
