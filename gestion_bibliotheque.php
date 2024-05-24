<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gestion Bibliothèque</title>
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
    <style>
        .p {
            padding: 70px;
        }
    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="minu_admin.php">Read</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav class="nav-menu d-none d-lg-block">
    <ul>
        <li class="active"><a href="gestion_bibliotheque.php">Home</a></li>
        <li><a href="consultation_etudiant.php">Etudiant</a></li>
        <li><a href="consultation_liste.php">Liste</a></li>
        <li><a href="liste_etudiants_critere.php">Etudiants critere</a></li>
        <li><a href="suppression_etudiant.php">Suppression</a></li>
        <li><a href="add_admin.php">Add admin</a></li>
        <li><a href="gestion_reservations.php">Gestion des Réservations</a></li> <!-- New button -->
    </ul>
</nav>


            <a href="deconnexion.php" class="get-started-btn">Déconnexion</a>
            
            <!-- Add Book button -->
            <a href="add_book.php" class="get-started-btn">Add Book</a>

        </div>
    </header><!-- End Header -->

    <section>
        <div class="p">
            <h1> Books list</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Image</th>
                        <th scope="col">État</th>
                        <th scope="col">Auteur</th> <!-- Nouvel attribut -->
                        <th scope="col">Édition</th> <!-- Nouvel attribut -->
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    try {
                        $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
                        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $query = $bdd->query("SELECT * FROM livre");
                        while ($row = $query->fetch()) {
                            echo "<tr>";
                            echo "<td>{$row['id_livre']}</td>";
                            echo "<td>{$row['titre']}</td>";
                            echo "<td>{$row['quantite']}</td>";
                            echo "<td>{$row['image_lien']}</td>";
                            echo "<td>{$row['etat']}</td>";
                            echo "<td>{$row['auteur']}</td>"; // Afficher l'auteur
                            echo "<td>{$row['edition']}</td>"; // Afficher l'édition
                            echo "<td>";
                            echo "<a href='modifier.php?id={$row['id_livre']}' class='btn btn-primary'>Update</a>";
                            echo "<a href='supprimer.php?id={$row['id_livre']}' class='btn btn-danger'>Delete</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

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
