<?php
session_start();
require_once '../config/connexion.php';


// Récupérer les données du formulaire
$name = $_POST['name'];
$link = $_POST['link'];

// Gérer l'upload du logo
$logo = $_FILES['logo'];

// Vérifier si le fichier a été uploadé
if ($logo['error'] === 0) {

    // Définir le nom du fichier
    $nom_fichier = uniqid() . "." . pathinfo($logo['name'])['extension'];

    // Déplacer le fichier vers le dossier de destination
    move_uploaded_file($logo['tmp_name'], "./uploads/" . $logo_name);

} else {
    echo "Erreur lors de l'upload du logo";
    die();
}

// INSERT INTO `tour_operator`(`name`, `link`,`logo`) VALUES ('[value-1]','[value-2]','[value-3]')

// Préparer la requête SQL
$sql = "INSERT INTO operateurs (name, link, logo) VALUES (:name, :link, :logo)";

// Préparer les paramètres
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':link', $link);
$stmt->bindParam(':logo', $nom_fichier);

// Exécuter la requête
$stmt->execute();

// Afficher un message de succès
echo "Opérateur ajouté avec succès !";

?>