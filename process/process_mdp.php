<?php
session_start();
require_once '../config/connexion.php';


// Mot de passe en dur (à remplacer par votre mot de passe réel)
$motDePasseStocke = "1234";

// Récupérer le mot de passe soumis par l'utilisateur
$motDePasseSoumis = $_POST['motDePasse'];

// Vérifier si les mots de passe correspondent
if ($motDePasseSoumis === $motDePasseStocke) {
    header("Location: ../adminAdd.php"); // Vous pouvez rediriger l'utilisateur vers une page sécurisée ici
} else {
    echo "Mot de passe incorrect. Veuillez réessayer.";
}
?>