<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Traiter la soumission du formulaire pour ajouter un nouveau livre
    $titre = $_POST['titre'];
    $quantite = $_POST['quantite'];
    $image_lien = $_POST['image_lien'];
    $etat = $_POST['etat'];
    $auteur = $_POST['auteur']; // Nouvel attribut
    $edition = $_POST['edition']; // Nouvel attribut

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Insérer le nouveau livre dans la base de données en utilisant une instruction SQL INSERT
        $stmt = $bdd->prepare("INSERT INTO livre (titre, quantite, image_lien, etat, auteur, edition) VALUES (:titre, :quantite, :image_lien, :etat, :auteur, :edition)");
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':quantite', $quantite);
        $stmt->bindParam(':image_lien', $image_lien);
        $stmt->bindParam(':etat', $etat);
        $stmt->bindParam(':auteur', $auteur); // Nouvel attribut
        $stmt->bindParam(':edition', $edition); // Nouvel attribut
        $stmt->execute();
        
        // Rediriger vers la page principale après l'ajout
        header("Location: gestion_bibliotheque.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form input[type="text"], form select {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        button {
            padding: 10px 20px;
            background-color: #ddd;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #ccc;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Ajouter un livre</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="titre">Titre:</label>
            <input type="text" name="titre" id="titre"><br>
            <label for="quantite">Quantité:</label>
            <input type="text" name="quantite" id="quantite"><br>
            <label for="image_lien">Lien de l'image:</label>
            <input type="text" name="image_lien" id="image_lien"><br>
            <label for="etat">État:</label>
            <select name="etat" id="etat">
                <option value="disponible">Disponible</option>
                <option value="indisponible">Indisponible</option>
            </select><br>
            <label for="auteur">Auteur:</label> <!-- Nouvel attribut -->
            <input type="text" name="auteur" id="auteur"><br> <!-- Nouvel attribut -->
            <label for="edition">Édition:</label> <!-- Nouvel attribut -->
            <input type="text" name="edition" id="edition"><br> <!-- Nouvel attribut -->
            <input type="submit" value="Ajouter un livre">
        </form>

        <!-- Bouton de retour -->
        <button onclick="history.go(-1);">Retour</button>
    </div>

</body>

</html>
