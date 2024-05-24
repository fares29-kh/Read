<!DOCTYPE html>
<?php
session_start();
try {

    $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');


    if (isset($_GET['ajoute'])) {
        $titre_livre = $_GET['ajoute'];
        
  
        if (isset($_COOKIE['mon_panier'])) {
            $value = $_COOKIE['mon_panier'] . ",'" . $titre_livre . "'";
            setcookie("mon_panier", $value);
        } else {
            setcookie("mon_panier", "'" . $titre_livre . "'");
        }
    }


    $req_update_etat = $bdd->prepare('UPDATE livre SET etat = "indisponible" WHERE quantite = 0');
    $req_update_etat->execute();
    
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Library</title>
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
        <style>
            .button {
                border: none;
                color: #777777;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }

            .button1 {background-color: #ffffff;} /* Green */

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

        <main id="main" data-aos="fade-in">

            <!-- ======= Breadcrumbs ======= -->
            <div class="breadcrumbs">
                <div class="container">
                    <h2>Books</h2>

                </div>
            </div><!-- End Breadcrumbs -->
            <?php
            try {
                // On se connecte à MySQL 
                $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
                $req = "SELECT * FROM livre";
                $reponse = $bdd->query($req);
            } catch (Exception $e) {

                die('Erreur : ' . $e->getMessage());
            }

            ?>
            <!-- ======= Courses Section ======= -->
            <section id="courses" class="courses">
                <div class="container" data-aos="fade-up">

                    <div class="row" data-aos="zoom-in" data-aos-delay="100">
                        <?php foreach ($reponse->fetchAll() as $donnee) { ?>

                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                                <div style="width:200px;" class="course-item">
                                    <img src="<?php echo $donnee['image_lien']; ?>" style="width: 100%; height: 250px;" class="img-fluid" alt="..."><br>
                                    <?php
                                    if($donnee['etat'] == "disponible"){
                                    echo '<p style="color:green;"><strong><span>'.$donnee['etat'].'</span></strong></p>';
                                    }else{
                                    echo '<p style="color:red;"><strong><span>'.$donnee['etat'].'</span></strong></p>';
                                    }
                                    ?>
                                    
                                    <form action="details.php" method="get" >
                                        <button class="button button1" type="submit" name="choix" value="<?php echo $donnee['titre']; ?>"><strong><?php echo $donnee['titre']; ?></strong></p</button>
                                    </form>
                                   
                                </div>
                            </div>
                        
                            <?php
                            
                        }
                        ?> 

                    
                    </div>
                    
                </div>
               
            </section><!-- End Courses Section -->

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
                                <strong>Email:</strong> fares@gmail.com<br>
                            </p>
                        </div>



                    </div>
                </div>
            </div>

            <div class="container d-md-flex py-4">

                <div class="mr-md-auto text-center text-md-left">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Read</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">

                        Designed by <strong>fares khlifi</strong>
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