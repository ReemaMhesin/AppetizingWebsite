<?php


session_start();


if(isset($_POST['login'])){

if (isset($_POST['name'])&&isset($_POST['password'])){
    $flag=0;

    $name= $_POST['name'];
    $password=$_POST['password'];

        try{
            $db = new mysqli('localhost', 'root', '', 'graduation');
            $qryStr = "select * from admin";
            $res = $db->query($qryStr);
            for ($s = 0; $s < $res->num_rows; $s++) {
                $row = $res->fetch_assoc();
                if (($row["AdminPass"] ==$password) &&($row["AdminName"] ==$name)){
                    $flag=1;

                    $_SESSION['admin']=$name;
                    header('location:homePage.php');

                }
            }


            $db->commit();
            $db->close();

        }catch (Exception $e){
        }

}}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Portfolio - Moderna Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
  <!-- =======================================================
  * Template Name: Moderna - v4.10.1
  * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1 class="text-light"><a href="index.html"><span>Appetizing</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="active " href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="portfolio.php">Sign In</a></li>
                <li><a href="blog.php">Join Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Our Portfolio Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Sign In</h2>
          <ol>
            <li><a href="homePage.php">Home</a></li>
            <li>Sign In</li>
          </ol>
        </div>

      </div>
    </section><!-- End Our Portfolio Section -->

    <!-- ======= Portfolio Section ======= -->
    <section class="blog">
      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-6">
            <form  method="post" role="form" class="myform" action="portfolio.php" >
              <div class="row">
                <div class="col-md-12 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Market name" required>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-md-12 form-group">
                    <input type="password" required id="password" name="password" placeholder="Password" class="form-control"><br>
                    <input type="checkbox" onclick="myFunction()"><span style="font-size: 10px">Show ID number </span>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-md-12">
                  <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Welcome to Appetizing</div>
                  </div>
                    <div class="text-center"> <input type="submit" value="Sign In" name="login" ></div>
                </div>
              </div>


            </form>
          </div>

        </div>
      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

      <div class="footer-top">
          <div class="container">
              <div class="row">

                  <div class="col-lg-3 col-md-6 footer-links">
                      <h4>Useful Links</h4>
                      <ul>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                      </ul>
                  </div>

                  <div class="col-lg-3 col-md-6 footer-links">
                      <h4>Our Services</h4>
                      <ul>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Markets Management</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Connects Users & Markets</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                          <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>

                      </ul>
                  </div>

                  <div class="col-lg-3 col-md-6 footer-contact">
                      <h4>Contact Us</h4>
                      <p>
                          A108 Tunis Street <br>
                          Nablus<br>
                          Palestine<br><br>
                          <strong>Phone:</strong> +1 5589 55488 55<br>
                          <strong>Email:</strong> info@appetizing.com<br>
                      </p>

                  </div>

                  <div class="col-lg-3 col-md-6 footer-info">
                      <h3>About Appetizing</h3>
                      <p>To be able to manage your store through an integrated system that makes it easy for you to add and modify your store products with their specifications,Appetizing is the perfect choice for you.</p>
                      <div class="social-links mt-3">
                          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                      </div>
                  </div>

              </div>
          </div>
      </div>

      <div class="container">
          <div class="copyright">
              &copy; Copyright <strong><span>Appetizing</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
              <!-- All the links in the footer should remain intact. -->
              <!-- You can delete the links only if you purchased the pro version. -->
              <!-- Licensing information: https://bootstrapmade.com/license/ -->
              <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/ -->

          </div>
      </div>
  </footer><!-- End Footer -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>