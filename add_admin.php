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

        <!-- =======================================================
        * Template Name: Mentor - v2.2.0
        * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
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
        <li ><a href="gestion_bibliotheque.php">Home</a></li>
        <li><a href="consultation_etudiant.php">Etudiant</a></li>
        <li><a href="consultation_liste.php">Liste</a></li>
        <li><a href="liste_etudiants_critere.php">Etudiants critere</a></li>
        <li><a href="suppression_etudiant.php">Suppression</a></li>
        <li class="active"><a href="add_admin.php">Add admin</a></li>
        <li><a href="gestion_reservations.php">Gestion des Réservations</a></li> <!-- New button -->
    </ul>
</nav>

                <a href="deconnexion.php" class="get-started-btn">Déconnexion</a>

            </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section>
            <!-- zone de connexion -->

            <form action="add.php" method="POST">
                <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1){
                        echo "<p style='color:red'>New records created successfully</p>";
                    } elseif ($err==2) {
                        echo "<p style='color:red'>Error:</p>";
                    }
                }
                ?>
                <h1>Connexion</h1>

                <label><b>Nom d'utilisateur</b></label>
                <br><input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>
                <br><label><b>Nom</b></label>
                <br><input type="text" placeholder="Entrer le nom" name="nom" required>
                <br><label><b>Prenom</b></label>
                <br><input type="text" placeholder="Entrer le prenom" name="prenom" required>
                <br><label><b>Adresse E_mail</b></label>
                <br><input type="email" placeholder="Entrer l'adresse E_mail" name="email" required>
                <br><label><b>Mot de passe</b></label>
                <br><input type="password" placeholder="Entrer le mot de passe" name="password" required>
                <br><label><b>Date de naissance</b></label>
                <label for="start"></label>
                <input type="date" id="start" name="date"
                       value=""
                       min="1970-01-01" max="2020-12-31">
                <br><label><b>Sexe</b></label>
                <INPUT TYPE ="radio" NAME ="sexe"  VALUE="F">Feminin 
                <INPUT TYPE ="radio" NAME ="sexe"  VALUE="M">Masculin
                <br><label><b>Etat civil</b></label>
                <SELECT NAME="etat" >
                    <OPTION VALUE="C"> célibataire
                    <OPTION VALUE="M"> Marié
                </SELECT>


                <br><br><br><input type="submit" value="S'inscrire">
                <br><INPUT TYPE="reset" VALUE="Annuler">
               
            </form>
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