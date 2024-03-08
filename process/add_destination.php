<?php

include '../config/connexion.php';

if (!empty($_POST['location'])
    && !empty($_POST['country'])
    && !empty($_POST['price'])
    && !empty($_POST['tourOperatorId'])) 
    {
$preparedRequest = $connexion->prepare(
    "INSERT INTO destination(location, country,  price, tourOperatorId) VALUES (?, ?, ?, ?)"
);
$preparedRequest->execute([
    $_POST['location'],
    $_POST['country'],
    $_POST['price'],
    $_POST['tourOperatorId']
]);

header('Location: ../adminAdd.php?Destination ajoutée avec succès !');

}
else {
    echo 'trucs qui manque mabelle';
}