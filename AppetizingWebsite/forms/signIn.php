<?php

if (isset($_GET['name'])
    &&isset($_GET['email']) &&isset($_GET['street']) &&isset($_GET['city'])
    &&isset($_GET['place']) &&isset($_GET['aboutMarket'])
    &&isset($_GET['password']) ) {
    $name = $_GET['name'];
    $email = $_GET['email'];
    $city = $_GET['city'];
    $street = $_GET['street'];
    $place = $_GET['place'];
    $aboutMarket = $_GET['aboutMarket'];
    $password = $_GET['password'];

    try {
        $db = new mysqli('localhost', 'root', '', 'graduation');
        $qryStr = " INSERT INTO `admin` (`AdminName`, `AdminPass`, `email`, `street`, `city`, `place`, `aboutMarket`) VALUES ('" . $name . "', '" . $email . "', '" . $city. "', '" . $street. "', '" . $place . "', '" . $aboutMarket . "', '" . $password . "');";
        $db->query($qryStr);
        $db->commit();
        $db->close();
        header('homePage.php');
    } catch (Exception $e) {
    }

}
?>
