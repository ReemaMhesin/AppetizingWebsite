<?php

session_start();
if(isset($_SESSION['admin'])){
    if(isset($_POST['button1'])) {
        header('location:logout.php');

    }

    if(isset($_POST['deleteee1'])) {
        $u = $_SESSION['admin'];
        $n =  $_POST['productname'];

        try {
            $conn = new mysqli('localhost', 'root', '', 'graduationjawna');


            $sql = "DELETE FROM offers WHERE productname='$n' and marketname= '$u' ";

            $conn->query($sql);
            $conn->commit();
            $conn->close();
//        header('Location:deleteProducts.php');
        } catch (Exception $e) {
        }


    }
    if(isset($_POST['update'])) {

        try {

            $jaw=$_SESSION['admin'];
//                $sql = "UPDATE admin SET AdminName='" . $name . "',AdminPass='" . $password . "',aboutMarket='" . $aboutMarket . "',place='" . $place . "',street='" . $street . "',city='" . $city . "' where AdminName ='" . $jaw . "'";
//



            $db = new mysqli('localhost', 'root', '', 'graduationjawna');

            $qryStr = "select * from offers";
            $res = $db->query($qryStr);

            for ($i = 0; $i < $res->num_rows; $i++) {
                $row = $res->fetch_object();
                if ($row->marketname == $jaw) {

                    $b= $_POST['productname'];
                    $a= $_POST['newprice'];
                    $e= $_POST['date'];
                    $r= $_POST['offer-ratio'];





                    $qryStr = "UPDATE `offers` SET  `offer-ratio`= '$r',
`newprice`= '$a',`date`= '$e'
                    WHERE `productname`='" . $b . "' and `marketname`='" . $jaw . "'";

                    $rs = $db->query($qryStr);



                }
            }


        } catch (Exception $e) {
        }

    }
}

?><!DOCTYPE html>
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

    <!-- =======================================================
    * Template Name: Moderna - v4.10.1
    * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<style>
    @import "https://fonts.googleapis.com/css?family=Montserrat:300,400,700";
    .rwd-table {
        margin: 1em 0;
        min-width: 300px;
    }
    .rwd-table tr {
        border-top: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }
    .rwd-table th {
        display: none;
    }
    .rwd-table td {
        display: block;
    }
    .rwd-table td:first-child {
        padding-top: .5em;
    }
    .rwd-table td:last-child {
        padding-bottom: .5em;
    }
    .rwd-table td:before {
        content: attr(data-th) ": ";
        font-weight: bold;
        width: 6.5em;
        display: inline-block;
    }
    @media (min-width: 480px) {
        .rwd-table td:before {
            display: none;
        }
    }
    .rwd-table th, .rwd-table td {
        text-align: left;
    }
    @media (min-width: 480px) {
        .rwd-table th, .rwd-table td {
            display: table-cell;
            padding: .25em .5em;
        }
        .rwd-table th:first-child, .rwd-table td:first-child {
            padding-left: 0;
        }
        .rwd-table th:last-child, .rwd-table td:last-child {
            padding-right: 0;
        }
    }

    body {
        padding: 0 2em;
        font-family: Montserrat, sans-serif;
        -webkit-font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
        color: #444;
        background: #eee;
    }

    h1 {
        font-weight: normal;
        letter-spacing: -1px;
        color: #34495E;
    }

    .rwd-table {
        background: #34495E;
        color: #fff;
        border-radius: .4em;
        overflow: hidden;
    }
    .rwd-table tr {
        border-color: #46637f;
    }
    .rwd-table th, .rwd-table td {
        margin: .5em 1em;
    }
    @media (min-width: 480px) {
        .rwd-table th, .rwd-table td {
            padding: 1em !important;
        }
    }
    .rwd-table th, .rwd-table td:before {
        color: #dd5;
    }

</style>
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
                <li><a href="addProductsnew.php">Add special Products</a></li>
                <li><a href="updateProducts.php">Visualization</a></li>
                <li><a href="deleteProducts.php">Delete Products</a></li>
                <li><a href="customers.php">Customers</a></li>
                <li><a href="map.php">Market Location</a></li>
                <li><a href="offers.php">Market Offers</a></li>
                <li><a href="myorder.php">My Offers</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
            <form method="post">
                <input  type="submit"  value="Sign Out " name="button1" class="active " style="background-color:rgba(109, 161, 75,0);color: white;font-weight: bold;border: none;margin-left: 6px;font-size: 13px">
            </form>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<main id="main">

    <?php




    try {
    if(isset($_SESSION['admin'])){

    $conn= mysqli_connect("localhost", "root", "", "graduationjawna");




    ?>
    <table border="1px" class="rwd-table">
        <tr>
            <th>productName</th>
            <th>newprice</th>
            <th>offer-ratio</th>
            <th>date</th>




        </tr>
        <?php
        $j=$_SESSION['admin'];
        //        $sql = "select * from products where marketName='$j' " ;
        $connect = mysqli_connect("localhost", "root", "", "graduationjawna");

        $query = "select * from offers where marketname='$j' ";
        $res = mysqli_query($connect, $query);
        $a=1;


        for($i=0;$i<$res->num_rows;$i++)
        {
            $row = mysqli_fetch_array($res);

            ?>
            <form   method="post"  >
                <tr>
                    <td>  <input type="text" style="width:200px "  name="productname" id="productname"  value="<?php echo $row["productname"]; ?>">

                    </td>

                    <td><input type="text"  style="width:50px "name="newprice" id="newprice"  value="<?php echo $row["newprice"]; ?>">
                    </td>

                    <td>
                        <input type="text" style="width:100px " name="offer-ratio" id="offer-ratio"  value="<?php echo $row["offer-ratio"]; ?>">
                    </td>
                    <td>
                        <input type="text"  style="width:200px " name="date" id="date"  value="<?php echo $row["date"]; ?>">

                    </td>
                    <td> <input type="submit" value="delete" name="deleteee1"  id="deleteee1"></td>
                    <td> <input type="submit" value="update" name="update"  id="update"></td></form>

            </tr>
            <?php
        }}}catch(Exception $e){

        }

        ?>
    </table>

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