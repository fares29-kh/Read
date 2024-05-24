<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Check if book ID is provided through URL parameter
if (!isset($_GET['id']) || empty(trim($_GET['id']))) {
    echo "Invalid book ID.";
    exit();
}

// If book ID is provided, proceed with deletion
$id = trim($_GET['id']);

try {
    $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Perform deletion in the database using SQL DELETE statement
    $stmt = $bdd->prepare("DELETE FROM livre WHERE id_livre = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Redirect to the main page after deletion
    header("Location: gestion_bibliotheque.php");
    exit();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>
