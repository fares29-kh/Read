<?php

$login = $_POST['login'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$password = $_POST['password'];
$date = $_POST['date'];
$sexe = $_POST['sexe'];
$etat = $_POST['etat'];
$profile = "etudiant";

if (empty($prenom)) {
    print("<center>Champ'<b>prenom</b>' est vide !</center>");
    exit();
}
if (empty($nom)) {
    print("<center>Champ'<b>nom</b>' est vide !</center>");
    exit();
}
if ((empty($nom)) && (empty($prenom))) {
    print("<center>Le '<b>nom et prenom </b>' est vide !</center>");
    exit();
}

try {
    $conn = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->beginTransaction();
    $conn->exec("INSERT INTO `compte` (`login`, `email`, `password`, `profile`) VALUES ('$login', '$email', '$password','$profile');");
    $last_id = $conn->lastInsertId();
    $conn->exec("insert into `etudiant`(`nom`,`prenom`,`date_naiss`,`sexe`,`statut`,`id_etudiant`) value('$prenom','$nom','$date','$sexe','$etat','$last_id');");
    $conn->commit();
    header('Location: inscription.php?erreur=1');
    
} catch (PDOException $e) {
    $conn->rollback();
    header('Location:connexion.php?erreur=2');
    $e->getMessage();
}

$conn = null;
?>  
