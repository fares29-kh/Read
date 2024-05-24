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

    <!-- =======================================================
    * Template Name: Mentor - v2.2.0
    * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->

    <style>
        /* Ajoutez vos styles CSS personnalisés ici */
        .table-container {
            margin-top: 50px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #dee2e6;
        }

        .table th {
            background-color: #f8f9fa;
            text-align: center;
        }

        .table td {
            text-align: center;
        }

        .no-data {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto"><a href="minu_admin.php">Read</a></h1>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="gestion_bibliotheque.php">Home</a></li>
                    <li><a href="consultation_etudiant.php">Consultation étudiant</a></li>
                    <li><a href="consultation_liste.php">Consultation liste</a></li>
                    <li class="active"><a href="l_e_c.php">Liste étudiants critère</a></li>
                    <li><a href="suppression_etudiant.php">Suppression étudiant</a></li>
                </ul>
            </nav>
            <a href="inscription.php" class="get-started-btn">Inscription</a>
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section class="table-container">
        <div class="container">
            <?php
            $sexe = $_POST['sexe'];
            try {
                // Connexion à MySQL 
                $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            $reponse = $bdd->query("SELECT * FROM `etudiant` WHERE `sexe` = '$sexe'");
            $etat = $reponse->rowCount();
            if ($etat != 0) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                          
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Date de naissance</th>
                            <th>Sexe</th>
                            <th>Etat Civil</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
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
?>
                    </tbody>
                </table>
            <?php
            } else {
                echo "<div class='no-data'>Aucun étudiant trouvé.</div>";
            }
            $reponse->closeCursor(); // Termine le traitement de la requête 
            ?>
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

