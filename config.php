<?php
// Informations de connexion à la base de données
$servername = "localhost"; // Nom du serveur MySQL
$username = "root"; // Nom d'utilisateur MySQL
$password = ""; // Mot de passe MySQL
$dbname = "iset"; // Nom de la base de données

try {
    // Création de la connexion à la base de données
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // Configuration des options PDO
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Affichage d'un message de succès si la connexion est établie
    // echo "Connexion à la base de données réussie";
} catch(PDOException $e) {
    // Affichage d'un message d'erreur en cas d'échec de la connexion
    die("La connexion à la base de données a échoué: " . $e->getMessage());
}
?>
