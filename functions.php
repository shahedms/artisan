<?php

function check_login($conn){
    if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $query = "select * from user_form where id = '$id' limit 1";
            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                return $user_data;
            }
        }
        // redirect to login
        header("Location: login.php");
        die;
}

function addToCart($conn, $artwork_id, $user_id) {

    // Check if the cart array exists in the session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the artwork is already in the cart
    if (isset($_SESSION['cart'][$artwork_id])) {
        echo "<script>alert('This item is already in your cart. You can update the quantity in your cart.');</script>";
    } else {
        // Get artwork details from the database (replace with your query)
        $sql = "SELECT * FROM artworks WHERE id = $artwork_id";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $artwork = mysqli_fetch_assoc($result);

            // Add the artwork to the cart
          $_SESSION['cart'][$artwork_id] = array(
            'user_id' => $user_id,
            'id' => $artwork['id'],
            'artwork_id' => $artwork['id'],
            'artworkName' => $artwork['artworkName'],
            'artistName' => $artwork['artist'],
            'price' => $artwork['price'],
            'quantity' => 1,
            'image' => $artwork['image']
          );
          
          header("Location: cart.php");
          ob_end_flush();
            exit();
        } else {
            echo "<script>alert('Artwork not found.');</script>";
        }
    }
}


function removeFromCart($artwork_id) {

    if (isset($_SESSION['cart'][$artwork_id])) {
        unset($_SESSION['cart'][$artwork_id]);
        echo "<script>alert('Artwork removed from the cart');</script>";
    } else {
        echo "<script>alert('Artwork not found in the cart');</script>";
    }

    header("Location: cart.php");
    exit();
}

?>