<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Welcome to Read Library</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/read.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style_add.css">

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'];
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }

        $stmt = $bdd->prepare("SELECT * FROM `etudiant` WHERE `nom` = :nom");
        $stmt->execute(['nom' => $nom]);
        $etat = $stmt->rowCount();

        if ($etat != 0) {
            $donnees = $stmt->fetch();

            $nce = $donnees['nce'];
            $prenom = $donnees['prenom'];
            $date = $donnees['date_naiss'];
            $sexe = $donnees['sexe'] === "M" ? "Masculin" : "Feminin";
            $statut = $donnees['statut'] === "C" ? "Celibataire" : "Marié";
        } else {
            header('Location: consultation_etudiant.php?erreur=1');
            exit();
        }
    } else {
        header('Location: consultation_etudiant.php');
        exit();
    }
    ?>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="minu_admin.php">Read</a></h1>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="gestion_bibliotheque.php">Home</a></li>
                    <li class="active"><a href="consultation_etudiant.php">Etudiant</a></li>
                    <li><a href="consultation_liste.php">Liste</a></li>
                    <li><a href="Liste_etudiants_critere.php">Etudiants critere</a></li>
                    <li><a href="suppression_etudiant.php">Suppression</a></li>
                    <li><a href="add_admin.php">Add admin</a></li>
                </ul>
            </nav>
            <a href="deconnexion.php" class="get-started-btn">Déconnexion</a>
        </div>
    </header>

    <!-- ======= Main Section ======= -->
    <section class="container mt-5">
        <?php
        if (isset($_GET['erreur'])) {
            $err = $_GET['erreur'];
            if ($err == 1) {
                echo "<p style='color:green'>Etudiant modifié</p>";
            }
        }
        ?>
        <form action="modif_etud.php" method="POST" class="form-horizontal">
            <input type="hidden" name="nce" value="<?php echo htmlspecialchars($nce); ?>">
            <div class="form-group">
                <label for="nom"><b>Nom</b></label>
                <input type="text" class="form-control" name="nom" id="nom" required value="<?php echo htmlspecialchars($nom); ?>">
            </div>
            <div class="form-group">
                <label for="prenom"><b>Prenom</b></label>
                <input type="text" class="form-control" name="prenom" id="prenom" required value="<?php echo htmlspecialchars($prenom); ?>">
            </div>
            <div class="form-group">
                <label for="date"><b>Date de naissance</b></label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo htmlspecialchars($date); ?>" min="1970-01-01" max="2020-12-31">
            </div>
            <div class="form-group">
                <label for="sexe"><b>Sexe</b></label>
                <select class="form-control" name="sexe" id="sexe">
                    <option value="Masculin" <?php echo $sexe === "Masculin" ? 'selected' : ''; ?>>Masculin</option>
                    <option value="Feminin" <?php echo $sexe === "Feminin" ? 'selected' : ''; ?>>Feminin</option>
                </select>
            </div>
            <div class="form-group">
                <label for="statut"><b>Etat civil</b></label>
                <select class="form-control" name="statut" id="statut">
                    <option value="Celibataire" <?php echo $statut === "Celibataire" ? 'selected' : ''; ?>>Celibataire</option>
                    <option value="Marié" <?php echo $statut === "Marié" ? 'selected' : ''; ?>>Marié</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
            <button type="reset" class="btn btn-secondary">Annuler</button>
        </form>
    </section>

    <!-- Back to top button and preloader -->
    <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
