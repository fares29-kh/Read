<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Suppression Etudiant</title>
    </head>
    <body>
        <?php
      
        if (isset($_POST['nom']) && !empty($_POST['nom'])) {
            $nom = $_POST['nom'];

            try {
                $conn = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Prepare the SQL statement to select the student by name
                $stmt = $conn->prepare("SELECT id_etudiant FROM `etudiant` WHERE `nom` = :nom");
                $stmt->execute(['nom' => $nom]);
                $donnees = $stmt->fetch();

                if ($donnees) {
                    $id_etudiant = $donnees['id_etudiant'];

                
                    $conn->beginTransaction();

                    $stmt = $conn->prepare("DELETE FROM `etudiant` WHERE `nom` = :nom");
                    $stmt->execute(['nom' => $nom]);

                    // Prepare the SQL statement to delete the related account record
                    $stmt2 = $conn->prepare("DELETE FROM `compte` WHERE `id_compte` = :id_compte");
                    $stmt2->execute(['id_compte' => $id_etudiant]);

                    // Commit the transaction
                    $conn->commit();

                    // Redirect with success message
                    header('Location: suppression_etudiant.php?erreur=1');
                    exit();
                } else {
                    // Redirect with error message if student not found
                    header('Location: suppression_etudiant.php?erreur=3'); // No such student found
                    exit();
                }
            } catch (PDOException $e) {
                // Rollback the transaction in case of error
                if ($conn->inTransaction()) {
                    $conn->rollBack();
                }
                // Log the error message (optional)
                error_log($e->getMessage());

                // Redirect with error message
                header('Location: suppression_etudiant.php?erreur=2');
                exit();
            }

            // Close the connection
            $conn = null;
        } else {
            // Redirect with error message if 'nom' is not provided
            header('Location: suppression_etudiant.php?erreur=4'); // Missing 'nom' field
            exit();
        }
        ?>
    </body>
</html>
