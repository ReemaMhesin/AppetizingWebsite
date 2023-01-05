<?php
session_start();

if(isset($_SESSION['admin']))
    if(isset($_POST['delete'])) {
        header('location:logout.php');

    }

if(isset($_POST['up'])) {

    if (isset($_SESSION['admin'])) {

        if (isset($_POST['name'])
            && isset($_POST['email']) && isset($_POST['street']) && isset($_POST['city'])
            && isset($_POST['place']) && isset($_POST['aboutMarket'])
            && isset($_POST['password'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $city = $_POST['city'];
            $street = $_POST['street'];
            $place = $_POST['place'];
            $aboutMarket = $_POST['aboutMarket'];
            $password = $_POST['password'];

            try {

                $jaw=$_SESSION['admin'];
//                $sql = "UPDATE admin SET AdminName='" . $name . "',AdminPass='" . $password . "',aboutMarket='" . $aboutMarket . "',place='" . $place . "',street='" . $street . "',city='" . $city . "' where AdminName ='" . $jaw . "'";
//



                $db = new mysqli('localhost', 'root', '', 'graduation');

                $qryStr = "select * from admin";
                $res = $db->query($qryStr);

                for ($i = 0; $i < $res->num_rows; $i++) {
                    $row = $res->fetch_object();
                    if ($row->AdminName == $jaw) {

                        $qryStr = "UPDATE `admin` SET  `AdminName`= '$name', `AdminPass`= '$password'
,`aboutMarket`= '$aboutMarket',
                   `place`= '$place',
                   `street`= '$street',
                   `city`= '$city',
                   `email`= '$email'WHERE `AdminName`='" . $jaw . "' ";

                        $rs = $db->query($qryStr);



                    }
                }


            } catch (Exception $e) {
            }
        }

    }
}



//if(array_key_exists('button1', $_POST)) {
//    button1();
//}
//function button1()
//{




















?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Services - Moderna Bootstrap Template</title>
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
        <li><a href="homePage.php">Home</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="Products.php">Your Products</a></li>
        <li><a href="addProducts.php">Add Products</a></li>
        <li><a href="updateProducts.php">Update Products</a></li>
        <li><a href="deleteProducts.php">Delete Products</a></li>
        <li><a href="customers.php">Customers</a></li>
        <li><a href="map.php">Market Location</a></li>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
      <form method="post">
        <input  type="submit"  value="Sign Out " name="delete" class="active " style="background-color:rgba(109, 161, 75);color: white;font-weight: bold;border: none;margin-left: 6px;font-size: 13px">
      </form>
    </nav><!-- .navbar -->

  </div>
</header><!-- End Header -->

<main id="main">

  <!-- ======= Our Services Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Your Profile</h2>
        <ol>
          <li><a href="homePage.php">Home</a></li>
          <li>Your Profile</li>
        </ol>
      </div>

    </div>
  </section><!-- End Our Services Section -->

  <!-- ======= Services Section ======= -->


  <!-- ======= Why Us Section ======= -->

    <?php

    if(isset($_SESSION['admin'])){

    try {

    $namee=$_SESSION['admin'];

    $connect = mysqli_connect("localhost", "root", "", "graduation");

    $query = "select * from admin WHERE AdminName='$namee'";
    $res = mysqli_query($connect, $query);




    $row = mysqli_fetch_array($res);

    if(null !=$row){

    ?>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <form  method="post"  class="myform" action="profile.php">
                        <div class="row ">
                            <div class="col-md-6 ">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Market Name" value="<?php  echo $row['AdminName'] ?>" required>
                            </div>
                            <div class="col-md-6  mt-3 mt-md-0">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Market Email" value="<?php  echo $row['email'] ?>" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 " >
                                <select id="city" required name="city" class="form-control" >

                                <option value="<?php  echo $row['city'] ?>" ><?php  echo $row['city'] ?></option>
                                    <option value="nablus" >Jenin</option>
                                    <option value="jenin">Nablus</option>
                                    <option value="ramallah">Ramallah</option>
                                    <option value="jerusalem">Jerusalem</option>
                                    <option value="jericho">Jericho</option>
                                    <option value="hebron">Hebron</option>
                                    <option value="tulkarm">Tulkarm</option>
                                    <option value="qalqilya">Qalqilya</option>
                                </select>
                            </div>
                            <div class="col-md-6  mt-3 mt-md-0">
                                <input type="text" class="form-control" name="street" id="street" placeholder="Street" value="<?php  echo $row['street'] ?>"required>
                            </div>
                        </div>
                        <div class=" mt-3">
                            <input type="text" class="form-control" name="place" id="place" placeholder="Further Discription About The Market Place" value="<?php  echo $row['place']?>"required>
                        </div>
                        <div class=" mt-3">
                            <textarea class="form-control" name="aboutMarket" rows="5" placeholder="About Your Market" value="<?php  echo $row['aboutMarket'] ?>"required><?php  echo $row['aboutMarket'] ?></textarea>
                        </div>

                        <div class=" mt-3">

                            <input type="password" required id="password" name="password" placeholder="Password" class="form-control" value="<?php  echo $row['AdminPass'] ?>"><br>
                            <input type="checkbox" ><span style="font-size: 10px">Show ID number </span>
                        </div>

                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"> <input type="submit" value="Update Your Information" name="up"></div>
                    </form>

                </div>
                <?php
                }


                $connect->close();

                }catch(Exception $e){

                }

                }



                ?>
            </div>
        </div>
    </section><!-- End Blog Section -->

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