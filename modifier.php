<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php"); // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Traite la soumission du formulaire pour mettre à jour les détails du livre
    // Exemple de code pour mettre à jour le livre dans la base de données
    $id_livre = $_POST['id'];
    $titre = $_POST['titre'];
    $quantite = $_POST['quantite'];
    $image_lien = $_POST['image_lien'];
    $etat = $_POST['etat'];
    $auteur = $_POST['auteur']; // Ajout de l'attribut auteur
    $edition = $_POST['edition']; // Ajout de l'attribut edition

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Met à jour le livre dans la base de données en utilisant l'instruction SQL UPDATE
        $stmt = $bdd->prepare("UPDATE livre SET titre = :titre, quantite = :quantite, image_lien = :image_lien, etat = :etat, auteur = :auteur, edition = :edition WHERE id_livre = :id");
        $stmt->bindParam(':id', $id_livre);
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':quantite', $quantite);
        $stmt->bindParam(':image_lien', $image_lien);
        $stmt->bindParam(':etat', $etat);
        $stmt->bindParam(':auteur', $auteur);
        $stmt->bindParam(':edition', $edition);
        $stmt->execute();
        
        // Redirige vers la page principale après la mise à jour
        header("Location: gestion_bibliotheque.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
} else {
    // Récupère les détails du livre en fonction de l'ID passé en paramètre d'URL
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $id = $_GET['id'];
            $stmt = $bdd->prepare("SELECT * FROM livre WHERE id_livre = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                echo "No book found with that ID.";
                exit();
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit();
        }
    } else {
        echo "Invalid book ID.";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
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
        form input[type="text"] {
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
        <h2>Update Book</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id_livre']; ?>">
            <label for="titre">Titre:</label>
            <input type="text" name="titre" id="titre" value="<?php echo $row['titre']; ?>"><br>
            <label for="quantite">Quantité:</label>
            <input type="text" name="quantite" id="quantite" value="<?php echo $row['quantite']; ?>"><br>
            <label for="image_lien">Image Lien:</label>
            <input type="text" name="image_lien" id="image_lien" value="<?php echo $row['image_lien']; ?>"><br>
            <label for="etat">État:</label>
            <select name="etat" id="etat">
                <option value="disponible" <?php if ($row['etat'] == 'disponible') echo 'selected'; ?>>Disponible</option>
                <option value="indisponible" <?php if ($row['etat'] == 'indisponible') echo 'selected'; ?>>Indisponible</option>
            </select><br>
            <label for="auteur">Auteur:</label> <!-- Nouvel attribut -->
            <input type="text" name="auteur" id="auteur" value="<?php echo $row['auteur']; ?>"><br>
            <label for="edition">Édition:</label> <!-- Nouvel attribut -->
            <input type="text" name="edition" id="edition" value="<?php echo $row['edition']; ?>"><br>
            <input type="submit" value="Update Book">
        </form>

        <!-- Bouton de retour -->
        <button onclick="history.go(-1);">Back</button>
    </div>

</body>

</html>
