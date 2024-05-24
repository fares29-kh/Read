<!DOCTYPE html>
<?php
session_start();

if (isset($_GET['ajoute'])) {
    if (isset($_COOKIE['mon_panier'])) {
        $value = $_COOKIE['mon_panier'] . ",'" . $_GET['ajoute'] . "'";
        setcookie("mon_panier", $value);
    } else {
        setcookie("mon_panier", "'" . $_GET['ajoute'] . "'");
    }
}
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Details</title>
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
        <link href="assets/css/style_conx.css" rel="stylesheet">

        <script type="text/javascript">
            function verif() {
                var decodedcookie = decodeURIComponent(document.cookie);
                var ca = decodedcookie.split(',');
                if (ca.length >= 3) {
                    alert("You can booked three books at least");
                    return false;

                } else {
                    document.form.submit();
                    return true;
                }


            }
        </script>

        <style>
            .button {
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }

            .button1 {background-color: green;} /* Green */

        </style>

    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">
                <h1 class="logo mr-auto"><a href="index.php">Read</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li class="active"><a href="library.php">Library</a></li>
                        <li><a href="contact.php">Contact</a></li>

                    </ul>
                </nav><!-- .nav-menu -->
                <a href = "panier.php">
                    <img src = "assets/img/cart_icon_160296.png" alt = "cart" class = "cart">
                </a>
                <?php
                if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

                    echo '<a href = "profile.php">
                        <img src = "assets/img/individual.png" alt = "Avatar" class = "avatar">
                    </a>';
                } else {

                    echo '<a href = "connexion.php" class = "get-started-btn">Connexion</a>';
                }
                ?>


            </div>
        </header><!-- End Header -->

        <main id="main">
            <?php
            if (isset($_GET['choix']) || isset($_GET['ajoute'])):
                $choix = (isset($_GET['choix'])) ? $_GET['choix'] : $_GET['ajoute'];

                try {
                    // On se connecte à MySQL 
                    $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
                    $req = "SELECT * FROM livre WHERE titre='$choix'";
                    $reponse = $bdd->query($req);
                    $donnees = $reponse->fetch();
                } catch (Exception $e) {

                    die('Erreur : ' . $e->getMessage());
                }
                ?>
                <div class="breadcrumbs" data-aos="fade-in">
                    <div class="container">
                        <h2>Book Details</h2>
                    </div>
                </div><!-- End Breadcrumbs -->

                <!-- ======= Cource Details Section ======= -->
                <section id="course-details" class="course-details">
                    <div class="container" data-aos="fade-up">

                        <div class="row">
                            <div class="col-lg-8">
                                <img src="<?php echo $donnees['image_lien']; ?>" class="img-fluid" alt="">
                                <h3></h3>
                                <p>

                                </p>
                            </div>
                            <div class="col-lg-4">

                                <div class="course-info d-flex justify-content-between align-items-center">
                                    <h5>Titre</h5>
                                    <p><?php echo $donnees['titre']; ?></a></p>
                                </div>

                                <div class="course-info d-flex justify-content-between align-items-center">
                                    <h5>Auteur</h5>
                                    <p><?php echo $donnees['auteur']; ?></p>
                                </div>
                                <div class="course-info d-flex justify-content-between align-items-center">
                                    <h5>Edition</h5>
                                    <p><?php echo $donnees['edition']; ?></p>
                                </div>
 <div>
    <?php if ($donnees['etat'] == "disponible"): ?>
        <div class="course-info d-flex justify-content-between align-items-center">
    <h5>Quantité disponible</h5>
        <p><?php echo $donnees['quantite']; ?></p>
  
    <?php endif; ?>
</div>
</div>
                                <div class="course-info d-flex justify-content-between align-items-center">
                                    <h5>Etat</h5>
                                    <p><?php echo $donnees['etat']; ?></p>
                                </div>
                                <?php
                                if ($donnees['etat'] == "disponible") {
                                    ?>
                                <form method="get" action="details.php" onsubmit="return verif()">
                                        <div class="text-center"><button class="button button1" type="submit" value="<?php echo $donnees['titre']; ?>" name="ajoute"><strong>Ajoute au panier </strong></button></div>
                                    </form>
                                    <?php
                                } else {
                                    ?>
                                    <div class="course-info d-flex justify-content-between align-items-center">
                                        <h5>Non disponible</h5>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </section>


            <?php else: ?>
                <div class="breadcrumbs">
                    <div class="container">
                        <h2>Details</h2>
                        <p>OPSSS You didn't choose any books. </p>
                    </div>
                </div><!-- End Breadcrumbs -->
            <?php endif; ?>
        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h3>Read</h3>
                            <p>
                                monastir <br>
                                Nabeul<br>
                                Tunisie <br><br>
                                <strong>Phone:</strong> +216 24 314 081<br>
                                <strong>Email:</strong>fares@gmail.com<br>
                            </p>
                        </div>


                        <div class="container d-md-flex py-4">

                            <div class="mr-md-auto text-center text-md-left">
                                <div class="copyright">
                                    &copy; Copyright <strong><span>Read</span></strong>. All Rights Reserved
                                </div>
                                <div class="credits">
                                    <!-- All the links in the footer should remain intact. -->
                                    <!-- You can delete the links only if you purchased the pro version. -->
                                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
                                    Designed by:<strong><span>Ala Wesalti</span></strong>
                                </div>
                            </div>
                            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                        </footer><!-- End Footer -->

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