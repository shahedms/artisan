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
    <title>Document</title>
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

    <h1 id="title">Purchase Confirmation</h1>

    <div class="container">
        <h2>Thank you for your purchase! Your order has been successfully processed.</h2>
        <br>
        <div class="link">
          <a href="buy.php" class="link1">Continue Shopping</a>
          <a href="cart.php" class="link2">Back To Cart</a>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>
    
  </body>
</html>