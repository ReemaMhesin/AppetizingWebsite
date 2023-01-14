<?php

session_start();

if(isset($_POST['add'])) {

    if (isset($_SESSION['admin'])) {


        if (isset($_POST['name'])
            && isset($_POST['quantity']) && isset($_POST['Price'])
            && isset($_POST['Manufacturing']) && isset($_POST['expiryDate'])
            &&

            isset($_FILES['image'])
        ) {
            $name = $_POST['name'];
            $productNum = $_POST['productNum'];
            $quantity = $_POST['quantity'];
            $price = $_POST['Price'];
            $manufacturing = $_POST['Manufacturing'];
            $expiryDate = $_POST['expiryDate'];
            $amount=$_POST['amount'];
            $var = $_SESSION['admin'];
            $connect = mysqli_connect("localhost", "root", "", "graduationjawna");
//            $file = addslashes(file_get_contents($_FILES['image']['tmp_name']));


            $targetDir = "C:/Users/MIX-IT/Desktop/images/";
            $file = basename($_FILES["image"]["name"]);
            $targetFilePath = $targetDir . $file;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            ?>

            <?php
            try {
                $db = new mysqli('localhost', 'root', '', 'graduationjawna');
                $qryStr = " INSERT INTO `products` (`marketName`, `productName`, `quantity`, `price`, `manufacturing`, `expiryDate`, `productNumber`, `amount`,`image`) VALUES ('" . $var . "', '" . $name . "', '" . $quantity . "', '" . $price . "', '" . $manufacturing . "', '" . $expiryDate . "', '" . $productNum ."', '" . $amount . "','$targetFilePath'  ) ";
                $db->query($qryStr);
                $db->commit();
                $db->close();


            } catch (Exception $e) {
            }

        }
    }
}


if(isset($_SESSION['admin'])){
    if(isset($_POST['delete'])) {
        header('location:logout.php');

    }}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <title>Services - Moderna Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

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

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
            <form method="post">
                <input  type="submit"  value="Sign Out " name="delete" class="active " style="background-color:rgba(109, 161, 75,75);color: white;font-weight: bold;border: none;margin-left: 6px;font-size: 13px">
            </form>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<main id="main">

    <!-- ======= Our Services Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Add Special Products</h2>
                <ol>
                    <li><a href="homePage.php">Home</a></li>
                    <li>Add Your Products</li>
                </ol>
            </div>

        </div>
    </section><!-- End Our Services Section -->

    <!-- ======= Services Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row justify-content-center">

                <div class="col-lg-6">
                    <form   method="post" enctype="multipart/form-data" class="myform" >
                        <div class="row ">
                            <label for="name" class="label"><i class="fa fa-phone"></i>Product Name</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required>

                            </div>
                            <label for="productNum" class="label"><i class="fa fa-phone"></i>Product Number</label>
                            <div class="mb-3">
                                <input type="text" class="form-control" name="productNum" id="productNum" placeholder="Product Number" required>

                            </div>
                            <label for="quantity" class="label"><i class="fa fa-phone" ></i>Quantity</label>
                            <div class=" mb-3">
                                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" required>
                            </div>
                            <label for="amount" class="label"><i class="fa fa-phone" ></i>Amount</label>
                            <div class=" mb-3">
                                <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" required>
                            </div>
                            <label for="Price" class="label"><i class="fa fa-phone"></i> Price</label>
                            <div class=" mb-3">
                                <input type="text" class="form-control" name="Price" id="Price" placeholder="Price In Dollar" required>
                            </div>
                            <label for="Manufacturing" class="label"><i class="fa fa-phone"></i>Manufacturing</label>
                            <div class=" mb-3">
                                <input type="text" class="form-control" name="Manufacturing" id="Manufacturing" placeholder="Manufacturing" required>
                            </div>
                            <label for="expiryDate" class="label"><i class="fa fa-phone"></i>Expiry date</label>
                            <div class=" mb-3">
                                <input type="text" class="form-control" name="expiryDate" id="expiryDate" placeholder="Expiry date" required>
                            </div>

                            <input type="file" class="form-control" id="image" placeholder="image" name="image" required>

                            <div class="text-center"> <input type="submit" value="Add Product" id="add" name="add"></div>

                        </div>
                    </form>
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
<script>
    $(document).ready(function(){

        $('#add').click(function(){

            var image_name = $('#image').val();
            if(image_name == '')
            {
                alert('Please Select Image');
                return false;
            }
            else
            {
                var extension = $('#image').val().split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    alert('Invalid Image File');
                    $('#image').val('');
                    return false;
                }
            }
        });
    });
</script>;