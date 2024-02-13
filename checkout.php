<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();  

  include("connect.php");
  include("functions.php");
  $user_data = check_login($conn);

  if ($user_data) {
    $fname = $user_data['fname'];
    $lname = $user_data['lname'];
    $email = $user_data['email'];
} else {
    // Set default values or handle the case when user is not logged in
    $fname = "";
    $lname = "";
    $email = "";
}

  function removeFromBuy($conn, $artwork_id) {
    // Implement your logic to remove the artwork from buy.php
    // For example, you might want to delete it from the database
    $sql = "DELETE FROM artworks WHERE id = $artwork_id";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
      echo "Error removing artwork from buy.php: " . mysqli_error($conn);
  }
}

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Clear the cart after successful purchase
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
              // Remove items from buy.php
              $totalPrice = 0;

              foreach ($_SESSION['cart'] as $artwork_id => $artwork) {
                if ($artwork['user_id'] == $user_data['id']) {
                    $totalPrice += $artwork['price'];
                }
                removeFromBuy($conn, $artwork_id);
                unset($_SESSION['cart'][$artwork_id]);
            }

        $address = $_POST['address'];
        $zip = $_POST['zip'];
        $city = $_POST['city'];
        $country = $_POST['country'];

        $sql = "INSERT INTO orders (user_id, address, zip_code, city, country, total_price)
                VALUES ('{$user_data['id']}', '$address', '$zip', '$city', '$country', '$totalPrice')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: confirmation.php");
            exit();
        } else {
            echo "Error inserting order details: " . mysqli_error($conn);
        }

        $_SESSION['cart'] = array();
    }
    exit();
    // header("Location: confirmation.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/header.css" />
      <link rel="stylesheet" href="css/style9.css" />
      <link rel="stylesheet" href="css/newsletter.css" />
      <link rel="stylesheet" href="css/footer.css" />
      <link rel="preconnect" href="https://fonts.googleapis.com" />
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Inter:wght@400;500;700&family=Libre+Baskerville&display=swap" />
  </head>
  <body>

    <?php
      include('includes/nav.php');
    ?>

    <h1 id="title">Checkout</h1>

    <div class="container">
            <form class="checkoutForm" action="#" method="post">
                <h2>Billing Information</h2>
                <div id="ex-cv">
                <label for="fname">First Name:</label>
                <label for="lname">Last Name:</label>
                <input type="text" id="fname" name="fname" value="<?php echo $fname; ?>" required>
                <input type="text" id="lname" name="lname" value="<?php echo $lname; ?>" required>
                </div>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>

                <label for="zip">Zip Code:</label>
                <input type="text" id="zip" name="zip" required>

                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>

                <label for="country">Country:</label>
                <select id="country" name="country" required>
                    <option value="us">United States</option>
                    <option value="ca">Canada</option>
                    <option value="al">Albania</option>
                    <option value="ad">Andorra</option>
                    <option value="am">Armenia</option>
                    <option value="at">Austria</option>
                    <option value="by">Belarus</option>
                    <option value="be">Belgium</option>
                    <option value="ba">Bosnia and Herzegovina</option>
                    <option value="bg">Bulgaria</option>
                    <option value="hr">Croatia</option>
                    <option value="cy">Cyprus</option>
                    <option value="cz">Czech Republic</option>
                    <option value="dk">Denmark</option>
                    <option value="ee">Estonia</option>
                    <option value="fi">Finland</option>
                    <option value="fr">France</option>
                    <option value="ge">Georgia</option>
                    <option value="de">Germany</option>
                    <option value="gr">Greece</option>
                    <option value="hu">Hungary</option>
                    <option value="is">Iceland</option>
                    <option value="ie">Ireland</option>
                    <option value="it">Italy</option>
                    <option value="lv">Latvia</option>
                    <option value="li">Liechtenstein</option>
                    <option value="lt">Lithuania</option>
                    <option value="lu">Luxembourg</option>
                    <option value="mt">Malta</option>
                    <option value="md">Moldova</option>
                    <option value="mc">Monaco</option>
                    <option value="me">Montenegro</option>
                    <option value="nl">Netherlands</option>
                    <option value="mk">North Macedonia</option>
                    <option value="no">Norway</option>
                    <option value="pl">Poland</option>
                    <option value="pt">Portugal</option>
                    <option value="ro">Romania</option>
                    <option value="ru">Russia</option>
                    <option value="sm">San Marino</option>
                    <option value="rs">Serbia</option>
                    <option value="sk">Slovakia</option>
                    <option value="si">Slovenia</option>
                    <option value="es">Spain</option>
                    <option value="se">Sweden</option>
                    <option value="ch">Switzerland</option>
                    <option value="tr">Turkey</option>
                    <option value="ua">Ukraine</option>
                    <option value="gb">United Kingdom</option>
                    <option value="va">Vatican City</option>   
                </select>

                <h2>Payment Information</h2>

                <label for="card-name">Name on Card:</label>
                <input type="text" id="card-name" name="card-name" required>

                <label for="card">Credit Card Number:</label>
                <input type="text" id="card" name="card" required>

                <div id="ex-cv">
                <label for="expiry">Expiry Date:</label>
                <label for="cvv">CVV:</label>
                <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>
                <input type="text" id="cvv" name="cvv" required>
                </div>

                <h2>Order Summary</h2>
                  <?php
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                      echo '<div class="order-summary">';
                      echo '<table>';
                      echo '<thead><tr><th>Artwork</th><th>Price</th></tr></thead>';
                      echo '<tbody>';

                        $totalPrice = 0;

                        foreach ($_SESSION['cart'] as $artwork_id => $artwork) {
                          if ($artwork['user_id'] == $user_data['id']) {
                            echo '<tr>';
                            echo '<td>' . $artwork['artworkName'] . '</td>';
                            echo '<td>$' . $artwork['price'] . '</td>';
                            echo '</tr>';
                            $totalPrice += $artwork['price'];
                          }
                        }
                        echo '</tbody>';
                        echo '</table>';
                        echo '<p>Sub Total: $' . $totalPrice . '</p>';
                        echo '<p>Delivery Fee: $0.00</p>';
                        echo '<p id="total">Total Price: $' . $totalPrice . '</p>';
                        echo '</div>';
                    } else {
                        echo '<p>Your cart is empty.</p>';
                    }
                  ?>

                <button type="submit" id="btn">Complete Purchase</button>
            </form>
    </div>

    <?php
      include('includes/footer.php');
    ?>
    
  </body>
</html>