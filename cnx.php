<?php

session_start();
if (isset($_POST['login']) && isset($_POST['password'])) {
    try {
        // On se connecte à MySQL 
        $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());
    }
    $login = $_POST['login'];
    $password = $_POST['password'];

    //$req = "SELECT login,password FROM compte WHERE login='$login' AND password='$password'";
    $req1 = "SELECT * FROM compte WHERE login='$login' AND password='$password'";
    $reponse1 = $bdd->query($req1);
    $etat = $reponse1->rowCount();
    $donnees1 = $reponse1->fetch();
    $profile = $donnees1['profile'];
    $id = $donnees1['id_compte'];
    If ($etat != 0) {
        if (($login == $donnees1['login']) && ($password == $donnees1['password'])) {
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            if ($profile == "etudiant") {
                $req2 = "SELECT * FROM etudiant WHERE id_etudiant='$id'";
                $reponse2 = $bdd->query($req2);
                $donnees2 = $reponse2->fetch();
                $_SESSION['nom'] = $donnees2['nom'];
                $_SESSION['prenom'] = $donnees2['prenom'];
                $_SESSION['date'] = $donnees2['date_naiss'];
                $_SESSION['sexe'] = $donnees2['sexe'];
                $_SESSION['statut'] = $donnees2['statut'];
                header('Location: library.php');
            } elseif ($profile == "admin") {
                $req2 = "SELECT * FROM admin WHERE id_admin='$id'";
                $reponse2 = $bdd->query($req2);
                $donnees2 = $reponse2->fetch();
                $_SESSION['nom'] = $donnees2['nom'];
                $_SESSION['prenom'] = $donnees2['prenom'];
                $_SESSION['date'] = $donnees2['date_naiss'];
                $_SESSION['sexe'] = $donnees2['sexe'];
                $_SESSION['statut'] = $donnees2['statut'];
                 header('Location: gestion_bibliotheque.php');
               
            }
        } else {
            header('Location: connexion.php?erreur=1');
        }
    } else {
        header('Location: connexion.php?erreur=2');
    }
}
$reponse->closeCursor();
?>
