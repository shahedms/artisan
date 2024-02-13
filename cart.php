<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('connect.php');
include('functions.php');

$user_data = check_login($conn);



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Cart</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/style6.css" />
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
        
        <?php
            include('includes/nav.php');
        ?>

        <div class="cart-container">
            <?php
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                echo '<h1 id="title">Your Cart</h1>';
                echo '<div class="link">';
                echo '<a href="checkout.php" class="link1">Proceed to Checkout</a>';
                echo '<a href="buy.php" class="link2">Continue Shopping</a>';
                echo '</div>';
                echo '<div class="cart-items">'; // Wrap cart items in a div
                echo '<table>';
                echo '<tr><th>Artwork</th><th></th><th>Price</th><th>Action</th></tr>';

                $totalPrice = 0;

                foreach ($_SESSION['cart'] as $artwork_id => $artwork) {
                    if ($artwork['user_id'] == $user_data['id']) {
                    echo '<tr>';
                    echo '<td><img src="uploads/' . $artwork['image'] . '" alt="' . $artwork['artworkName'] . '"></td>';
                    echo '<td><b>' .$artwork["artworkName"] . '</b><br> by ' .$artwork["artistName"] . '<br></td>';
                    echo '<td>$' . $artwork['price'] . '</td>';
                    echo '<td><a href="cart.php?action=remove&id=' . $artwork_id . '">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="remove-icon" onclick="removeItem(' . $artwork_id . ')">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                    </a></td>';
                    echo '</tr>';
                    $totalPrice += $artwork['price'];
                    }
                }
                // echo '<tr><td colspan="2"></td><td>Total Price:</td><td>$' . $totalPrice . '</td></tr>';

                echo '</table>';
                echo '</div>'; // Close the cart-items div
                echo '<div class="check-cont">';
                echo '<p id="price">Sub total: $' . $totalPrice . '</p>';
                echo '<a href="checkout.php" class="link3">Proceed to Checkout</a>';
                echo '</div>';
            } else {
                echo '<h1 class="emptycart" id="title">Your cart is empty!</h1>';
                echo '<a href="buy.php" class="link4">Continue Shopping</a>';
            }
            ?>
        </div>

        <?php
            if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])) {
                $artwork_id = $_GET['id'];
                removeFromCart($artwork_id);
            }
        ?>
    

        <!-- <hr> -->

        <?php
            include('includes/newsletter.php');
        ?>


        <?php
            include('includes/footer.php');
        ?>

  </body>
</html>
