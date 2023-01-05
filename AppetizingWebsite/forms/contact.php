

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
    $qryStr = " INSERT INTO `admin` (`AdminName`, `AdminPass`, `email`, `street`, `city`, `place`, `aboutMarket`) VALUES ('" . $name . "', '" . $password  . "', '" . $email. "', '" . $street. "', '" . $city . "', '" . $place . "', '" . $aboutMarket. "');";
    $db->query($qryStr);
    $db->commit();
    $db->close();
    header('homePage.php');
  } catch (Exception $e) {
  }

}


  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
