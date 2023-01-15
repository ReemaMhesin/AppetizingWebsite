<?php

$values = array(
    "wheat", "rye", "oats", "corn", "barley", "buckwheat", "rice", "bread", "rolls", "buns", "cakes", "cookies", "pies", "cereal", "corn flakes",
    "icre flakes", "muesli", "popcorn", "pasta", "macaroni", "noodles", "spaghetti", "vermicelli", "ravioli", "dumplings", "flour", "dough", "batter",
    "cake mix", "bread",
    "white bread", "whole-wheat bread", " rye bread", "raisin bread", " garlic bread", "corn bread", "sourdough bread",
    "tortilla", "roll", "bread roll", "sesame roll", " poppy seed roll", "cinnamon roll", "cracker", "biscuit", "cookie", "toast",
    "wafer", "waffle", "crouton", "cake", "birthday cake", "cheesecake", "cupcake", " fudge brownie", " oatmeal cookie",
    "chocolate cookie", "pie", "apple pie", " blueberry pie", "pizza", "blueberry muffin", "biscuit", " sour cream", "biscuit", "pancake",
    "doughnut", "fritter", "waffle", "meat", "beef", "mutton", "roast beef", "ground beef", "hamburger",
    "lamb chop", "bacon", "pastrami", "corned beef", "sausage", "salami", "smoked sausage", "hot dogs",
    "chicken", "turkey", "goose", "duck", "fowl", "eggs", "drumstick", "chicken wing", "chicken breast", "fish", "salmon", "trout",
    "sturgeon", "cod", "sole", "flatfish", "plaice", "halibut", "tuna",
    "mullet", "sardine", "catfish", "caviar", "fish steak",
    " salmon steak", "fish fillet", "smoked fish", " salted fish", "seafood", "crab",
    "squid", "milk", "whole milk", "low-fat milk", "nonfat milk", "pasteurized milk", "dry milk", "condensed milk", "yogurt",
    "sour milk", "buttermilk", "cream", " sour cream", "butter",
    " homemade cheese", "cream cheese", "cheese", "Parmesan", "Cheddar", "Mozzarella",
    "ice cream", "vanilla ice cream", "chocolate ice cream", "fruit ice", "strawberry ice", "ice-cream cone", "popsicle",
    "sundae", "apple", "apricot",
    "nectarine", "plum", "grapes", "cherry", "sweet cherry", "lemon", "lime", "orange", "tangerine", "grapefruit", "banana", "kiwi",
    "pineapple",
    "olive", "fig", "papaya", "mango", "avocado", "coconut", "persimmon", "melon", "watermelon", "berry", "strawberry",
    "cranberry", "blueberry", "bilberry", "black currants", "red currants", "gooseberry", "blackberry", "whortleberry",
    " dried fruit", "dried apricots",
    "raisins", "figs", "prunes", "dates", "candied fruit", "nuts", "hazelnuts", "almonds", "chestnuts", "peanuts", "pistachio nuts",
    "cashew nuts", "pecans", " apricot pits", "pumpkin seeds", "sunflower seeds", "raspberry jam", " cranberry jam",
    " grape jelly", "marmalade", "honey", " peanut butter",
    "leaf vegetables", "tomato", "cucumber", "carrot", "beet", "potato", "onion",
    " green onions", "leek", "sweet pepper", "paprika", "hot pepper"
, "cabbage", "cauliflower", "broccoli", "kohlrabi", "mushrooms", "lettuce", "spinach",
    "celery", "asparagus", "artichoke", "cress", "garlic", "aubergine", "squash", "zucchini",
    "pumpkin", "turnip", "parsnip", "pickled cucumbers ", "marinated cucumbers", "sauerkraut",
    "beans", "soybeans",
    "lentil", "corn", "coffee beans", "dill", "parsley", "coriander", "mint", "apple juice", "orange juice",
    "grapefruit juice", "lemon juice", "tomato juice", "fresh fruit juice", "tea", "green tea", "black tea", "iced tea",
    "coffee", "instant coffee", "espresso", "cappuccino", "decaf",
    " black coffee", " hot chocolate", "milk shake", "mineral water",
    "soda water", "lemonade", "cocktail", "punch", "tomato sauce", "ketchup",
    "mushroom sauce", "meat sauce", "steak sauce", "gravy", "spaghetti sauce", "hot sauce", "chili sauce", "barbecue sauce",

    "salad dressing", "Russian dressing", "Italian dressing", "French dressing", "vegetable oil",
    "olive oil", " corn oil", "sunflower seed oil", "sesame oil", "margarine",
    "seeds", "vinegar", "pepper",
    "salt", "dill", "parsley", "mint", "coriander", "basil", " bay leaf",
    "cinnamon", "caraway", "thyme", "cardamom", "rosemary", "garlic", "mustard", "lemon peel", "candy",
    "caramels"
);
session_start();

if(isset($_POST['add'])) {

    if (isset($_SESSION['admin'])) {


        if (isset($_POST['rate'])&&isset($_POST['name'])
            && isset($_POST['Price']) && isset($_POST['expiryDate'])
           )
         {$name=$_POST['name'];
            $rate = $_POST['rate'];
             $A=$_SESSION['admin'];
            $price = $_POST['Price'];

            $expiryDate = $_POST['expiryDate'];


            ?>

            <?php
            try {
                $db = new mysqli('localhost', 'root', '', 'graduationjawna');
                $qryStr = " INSERT INTO `offers` (`marketname`, `productname`, `offer-ratio`, `newprice`, `date`) 
 VALUES ('" . $A . "', '" . $name . "', '" . $rate . "', '" . $price . "',  '" . $expiryDate . "' ) ";
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
                <li><a href="offers.php">Market Offers</a></li>
                <li><a href="myorder.php">My Offers</a></li>
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
                <h2>Add Products</h2>
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
                                <div class="row-fluid">
                                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" style="height: 10px" id="name" required name="name">
                                        <?php
                                        foreach ($values as $key=>$value){
                                            $selected = ($key==0)?" Selected=\"Selected\"": "";
                                            echo "<option data-subtext=\"\" $selected > $value </option>";
                                        }
                                        ?>
                                    </select>

                                </div>
                                <!--                                    <select id="name" required name="name" class="form-control">-->
                                <!--                                        <option id="srch" type="text" name="search">-->
                                <!--                                 --><?php
                                //
                                //                                        for ($s = 0; $s < count($values); $s++) {
                                //
                                //                                            echo
                                //                                                '<option id="choice" name="choice" value="' . $values[$s] . '">' . $values[$s] . '</option>';
                                //
                                //                                            //304
                                //                                        }
                                //
                                //                                        ?>
                                <!--                                    </select>-->
                            </div>

                            <label for="rate" class="label"><i class="fa fa-phone" ></i>rate</label>
                            <div class=" mb-3">
                                <input type="text" class="form-control" name="rate" id="rate" placeholder="offer ratio" required>
                            </div>

                            <label for="Price" class="label"><i class="fa fa-phone"></i> Price</label>
                            <div class=" mb-3">
                                <input type="text" class="form-control" name="Price" id="Price" placeholder="Price In Dollar" required>
                            </div>

                            <label for="expiryDate" class="label"><i class="fa fa-phone"></i>Expiry date</label>
                            <div class=" mb-3">
                                <input type="text" class="form-control" name="expiryDate" id="expiryDate" placeholder="Expiry date" required>
                            </div>

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