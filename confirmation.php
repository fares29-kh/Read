<?php
if (isset($_COOKIE['mon_panier'])) {
    $coockie = $_COOKIE['mon_panier'];
    $arry = explode(',', $coockie);
    $a = array_count_values($arry);
    try {
        // On se connecte à MySQL 
        $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
        $req1 = "SELECT quantite FROM livre WHERE titre in($coockie)";
        $reponse1 = $bdd->query($req1);
        $donnees1 = $reponse1->fetch();
        $quantite = $donnees1['quantite'];
        if ($quantite > 0) {
            $req2 = "SELECT * FROM livre WHERE titre in($coockie)";
            $reponse2 = $bdd->query($req2);
            foreach ($reponse2->fetchAll() as $result) {

                $q = $result['quantite'] - $a["'" . $result['titre'] . "'"];
                $req = $bdd->prepare('UPDATE livre SET quantite = :nquantite  WHERE titre = :ntitre');

                $req->execute(array(
                    'nquantite' => $q,
                    'ntitre' => $result['titre']
                ));
                header('Location: panier.php?erreur=1');
            }
        } else {
            $req2 = "SELECT * FROM livre WHERE titre in($coockie)";
            $reponse2 = $bdd->query($req2);
            foreach ($reponse2->fetchAll() as $result) {

                $etat = "indisponible";
                $req = $bdd->prepare('UPDATE livre SET etat = :netat  WHERE titre = :ntitre');

                $req->execute(array(
                    'netat' => $etat,
                    'ntitre' => $result['titre']
                ));
                header('Location: panier.php?erreur=1');
            }
        }
    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());
    }
}
?>