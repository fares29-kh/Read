<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Contact</title>
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="library.php">Library</a></li>
                        <li class="active"><a href="contact.html">Contact</a></li>
                        
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
                    <h2>Contact Us</h2>
                    <p> </p>
                </div>
            </div><!-- End Breadcrumbs -->

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
               

                <div class="container" data-aos="fade-up">

                    <div class="row mt-5">

                        <div class="col-lg-4">
                            <div class="info">
                                <div class="address">
                                    <i class="icofont-google-map"></i>
                                    <h4>Location:</h4>
                                    <p>Korba</p>
                                </div>

                                <div class="email">
                                    <i class="icofont-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>alaweslati2@gmail.com</p>
                                </div>

                                <div class="phone">
                                    <i class="icofont-phone"></i>
                                    <h4>Call:</h4>
                                    <p>+216 24 314 081</p>
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-8 mt-5 mt-lg-0">

                            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <div class="validate"></div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                        <div class="validate"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validate"></div>
                                </div>
                                <div class="mb-3">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>
                                <div class="text-center"><button type="submit">Send Message</button></div>
                            </form>

                        </div>

                    </div>

                </div>
            </section><!-- End Contact Section -->

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">

            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <h3>Read</h3>
                            <p>
                                Monastir <br>
                                Nabeul<br>
                                tunisie <br><br>
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