<?php
session_start();  

include("connect.php");
include("functions.php");
$user_data = check_login($conn);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/style10.css" />
    <link rel="stylesheet" href="css/newsletter.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Inter:wght@400;500;700&family=Libre+Baskerville&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>

    <?php include('includes/nav.php'); ?>

    <h1 id="title">Newsletter Subscription</h1>

    <div class="container">
        <h2>Thank you for subscribing for our newsletter!<br> You'll start receiving our newsletter shortly. Check your inbox!</h2>
        <br>
        <div>
          <a href="buy.php" class="link3">Continue Shopping</a>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    
  </body>
</html>