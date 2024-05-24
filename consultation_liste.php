<!DOCTYPE html>
<?php
 session_start();
?>
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="gestion_bibliotheque.php">Read</a></h1>

            <nav class="nav-menu d-none d-lg-block">
    <ul>
        <li ><a href="gestion_bibliotheque.php">Home</a></li>
        <li><a href="consultation_etudiant.php">Etudiant</a></li>
        <li class="active"><a href="consultation_liste.php">Liste</a></li>
        <li><a href="liste_etudiants_critere.php">Etudiants critere</a></li>
        <li><a href="suppression_etudiant.php">Suppression</a></li>
        <li><a href="add_admin.php">Add admin</a></li>
        <li><a href="gestion_reservations.php">Gestion des Réservations</a></li> <!-- New button -->
    </ul>
</nav>

            <a href="deconnexion.php" class="get-started-btn">Déconnexion</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section>
        <div class="container mt-5">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date de naissance</th>
                            <th>Sexe</th>
                            <th>Etat Civil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            // Connexion à MySQL
                            $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
                            // Configuration de l'attribut PDO pour générer une exception si une erreur survient
                            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            // Requête SQL pour récupérer les données des étudiants
                            $reponse = $bdd->query("SELECT * FROM `etudiant`");
                            // Affichage des données
                            while ($donnees = $reponse->fetch()) {
                                ?>
                                <tr>
                                    <td><?php echo $donnees['nom']; ?></td>
                                    <td><?php echo $donnees['prenom']; ?></td>
                                    <td><?php echo $donnees['date_naiss']; ?></td>
                                    <td><?php echo $donnees['sexe']; ?></td>
                                    <td><?php echo $donnees['statut']; ?></td>
                                </tr>
                            <?php
                            }
                            // Fermeture du curseur pour libérer la mémoire
                            $reponse->closeCursor();
                        } catch (Exception $e) {
                            // Gestion des erreurs
                            die('Erreur : ' . $e->getMessage());
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section><!-- End Hero -->

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

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
