
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Panier</title>
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
                <h1 class="logo mr-auto"><a href="index.php">Read</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="library.php">Library</a></li>
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

            <!-- ======= Breadcrumbs ======= -->
            <div class="breadcrumbs" data-aos="fade-in">
                <div class="container">
                    <h2>Panier</h2>
                </div>
            </div>
            <!-- ======= Cource Details Section ======= -->
            <section id="course-details" class="course-details">
                <div class="container" data-aos="fade-up">
                    <div class="row">
                        <div id="basket" class="col-lg-9">
                            <div class="box">
                                <?php
                                if (isset($_GET['erreur'])) {
                                    $err = $_GET['erreur'];
                                    if ($err == 1){
                                      echo "<p style='color:red'>Operation accomplished successfully</p>";  
                                    }elseif ($err == 2) {
                                      echo "<p style='color:red'>Opsss The process has not been successful</p>";
                                }
                                        
                                }
                                ?>
                                <form method="get" action="confirmation.php">
                                    <center><h1>Shopping</h1></center>
                                    <!--<p class="text-muted">You currently have 3 item(s) in your cart.</p>-->

                                    <?php
                                    echo '<br>';
                                    if (isset($_COOKIE['mon_panier'])) {
                                        $coockie = $_COOKIE['mon_panier'];
                                        $arry = explode(',', $coockie);
                                        $a = array_count_values($arry);
                                        try {
                                            // On se connecte à MySQL 
                                            $bdd = new PDO('mysql:host=localhost;dbname=iset;charset=utf8', 'root', '');
                                            $req = "SELECT * FROM livre WHERE titre in($coockie)";
                                            $reponse = $bdd->query($req);
                                            foreach ($reponse->fetchAll() as $result) {
                                                ?>
                                                <table border='0'>
                                                    <tr><th style="width: 100px; height: 100px;"><img src="<?php echo $result['image_lien']; ?>" style="padding-right: 30px" class="img-fluid" alt=""></th>
                                                        <th style="width: 150px">
                                                            <?php
                                                            echo $result['titre'];
                                                            ?>
                                                        </th>
                                                        <th style="width: 20px">
                                                            <?php
                                                            echo $a["'" . $result['titre'] . "'"];
                                                            ?>
                                                        </th></tr>
                                                </table>
                                                <?php
                                                echo '<br><br>';
                                            }
                                        } catch (Exception $e) {

                                            die('Erreur : ' . $e->getMessage());
                                        }
                                    }
                                    ?>

                                    <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                                        <div class="left"><a href="library.php" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continue shopping</a></div>
                                        <div class="right">
                                            <button class="btn btn-outline-secondary"><a href="init.php" class="learn-more-btn">Empty my cart</a></button>
                                            <?php
                                            if (isset($_SESSION['login']) && isset($_SESSION['password'])) {

                                                echo '<button type="submit" class="btn btn-primary">Confirmation <i class="fa fa-chevron-right"></i></button>';
                                            } else {


                                                echo '<button class="btn btn-outline-secondary"><a href="connexion.php" class="learn-more-btn">Connexion</a></button>';
                                            }
                                            ?>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h3>Read</h3>
                            <p>
                                korba <br>
                                Nabeul<br>
                                Tunisie <br><br>
                                <strong>Phone:</strong> +216 24 314 081<br>
                                <strong>Email:</strong> alawesalti2@gmail.com<br>
                            </p>
                        </div>


                        <div class="container d-md-flex py-4">

                            <div class="mr-md-auto text-center text-md-left">
                                <div class="copyright">
                                    &copy; Copyright <strong><span>Read</span></strong>. All Rights Reserved
                                </div>
                                <div class="credits">

                                    Designed by <strong>Ala WESLATI & Riras MARZOUKI</strong>
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
                    </div>
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