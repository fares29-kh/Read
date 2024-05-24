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
        <link href="assets/css/style_conx.css" rel="stylesheet">

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
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="library.php">Library</a></li>
                        <li><a href="contact.php">Contact</a></li>

                    </ul>
                </nav><!-- .nav-menu -->
                <a href = "panier.php">
                    <img src = "assets/img/cart_icon_160296.png" alt = "cart" class = "cart">
                </a></li>
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

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex justify-content-center align-items-center">
            <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
                <h1>Learning Today,<br>Leading Tomorrow</h1>
                <?php
                if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
                    echo '<a href="library.php" class="btn-get-started">Library</a>';
                } else {
                    echo '<a href="connexion.php" class="btn-get-started">Connexion</a>';
                }
                ?>
            </div>
        </section><!-- End Hero -->

        <main id="main">

            <!-- ======= About Section ======= -->
            <section id="about" class="about">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>About</h2>
                        <p>About Us</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                            <img src="assets/img/read-vector.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                            <h3>Welcome to all of you to this site dedicated to books of various kinds.</h3>
                            <p class="font-italic">
                                with the multiplicity of options it has become difficult for the individual to find what he likes, and we all know that the book is a sacred and important thing as it develops knowledge and contributes to the prosperity of the individual's culture,.
                            </p>
                            <a href="about.php" class="learn-more-btn">Learn More</a>
                        </div>
                    </div>

                </div>
            </section><!-- End About Section -->





        </main><!-- End #main -->

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
                                tunisie <br><br>
                                <strong>Phone:</strong> +216 24 314 081<br>
                                <strong>Email:</strong> fares@gmail.com<br>
                            </p>
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