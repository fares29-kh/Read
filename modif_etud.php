<?php

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$date = $_POST['date'];
$sexe = $_POST['sexe'];
$statut = $_POST['statut'];
// $nce is not needed if updating by `nom`

// Convert the values for sexe and statut to their database representations
$sexe = ($sexe == "Masculin") ? "M" : "F";
$statut = ($statut == "Celibataire") ? "C" : "M";

try {
    // Connect to the database
    $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    // Handle connection error
    die('Erreur : ' . $e->getMessage());
}


$req = $bdd->prepare('
    UPDATE etudiant 
    SET 
        nom = :nnom,
        prenom = :nprenom, 
        date_naiss = :ndate, 
        sexe = :nsexe, 
        statut = :nstatut  
    WHERE 
        nom = :nom
');

$req->execute([
    'nnom' => $nom,
    'nprenom' => $prenom,
    'ndate' => $date,
    'nsexe' => $sexe,
    'nstatut' => $statut,
    'nom' => $nom  // The current nom to find the correct record
]);

// Check if the update was successful
if ($req->rowCount() > 0) {
    // Redirect to the consultation_etudiant.php page with a success result
    header('Location: consultation_etudiant.php?result=1');
} else {
    // No rows affected, possibly no change in data or invalid nom
    header('Location: consultation_etudiant.php?result=0');
}
exit();
?>
