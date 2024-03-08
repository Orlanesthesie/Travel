<?php

include "../config/connexion.php";

$idTO = $_POST['tourOperatorId'];

$preparedRequest = $connexion->prepare(
    'UPDATE tour_operator SET isPremium = 1 WHERE id = ?'
);
$preparedRequest->execute([
    $idTO
]);

header('Location: ../adminAdd.php?TO devenu premium');

