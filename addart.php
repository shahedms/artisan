<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include('connect.php');
include('functions.php');

$user_data = check_login($conn);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
  $user_id = $user_data['id'];
  $sql_user = "SELECT fname, lname FROM user_form WHERE id = $user_id";
  $result_user = mysqli_query($conn, $sql_user);

  if ($result_user && mysqli_num_rows($result_user) > 0) {
      $user_info = mysqli_fetch_assoc($result_user);
      $artist = $user_info['fname'] . ' ' . $user_info['lname'];
  } else {
      // Handle the case where user information is not found
      echo "<script> alert('Error fetching user information.'); </script>";
      // Redirect or handle as needed
      exit();
  }
    $name = $_POST['name'];
    $dimensions = $_POST['dimensions'];
    $medium = $_POST['medium'];
    $price = $_POST['price'];

    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $img_size = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];

    if ($error === 0) {
        if ($img_size > 10000000) {
            echo "<script> alert('Image Size is too Large'); </script>";
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $newImageName = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $newImageName;
                move_uploaded_file($tmp_name, $img_upload_path);

                $sql = 
                "INSERT INTO artworks (artist, artworkName, dimensions, paintMedium, price, image) 
                VALUES ('$artist', '$name', '$dimensions', '$medium', '$price', '$newImageName')";
                mysqli_query($conn, $sql);

                  echo "<script> 
                          alert('Successfully Added');
                          document.location.href = 'buy.php';
                        </script>";
            } else {
                echo "<script> alert('Invalid Image Extension'); </script>";
            }
        }
    } else {
        echo "<script> alert('Error uploading your file.'); </script>";
    }
} else {
    // header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sell Artwork</title>
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/style7.css" />
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

    <!-- form section -->
    <div class="container">
        <h3 class="heading">Upload Artwork</h3>
        <form action="addart.php" class="add-art" method="post" enctype="multipart/form-data">
          <!-- <div>
            <label for="artist">Artist Name</label>
            <input id="artist" name="artist-name" type="text" placeholder="Enter artist name" class="input-field" required>
          </div> -->
          <div>          
            <label for="artwork">Artwork Name</label>
            <input id="artwork" name="name" type="text" placeholder="Enter artwork name" class="input-field" required>
         </div>
          <div>
            <label for="dimensions"> Dimensions</label>
            <div class="input-with-symbol">
              <input id="dimensions" name="dimensions" type="text" placeholder="Enter Dimensions" class="input-field" required>
              <span>cm</span>
            </div>          
          </div>
          <div>
            <label for="medium">Painting Medium</label>
            <!-- <input id="medium" type="text" name="medium" placeholder="Enter Painting Medium" class="input-field" required> -->
            <select id="medium" name="medium" class="input-field" required>
              <option value="" disabled selected>Select Painting Medium</option>
              <option value="oil">Oil</option>
              <option value="acrylic">Acrylic</option>
              <option value="watercolor">Watercolor</option>
              <option value="gouache">Gouache</option>
              <option value="watercolor">Watercolor</option>
              <option value="pastel">Pastel</option>
              <option value="pencil">Pencil</option>
              <option value="charcoal">Charcoal</option>
              <option value="ink">Ink</option>
            </select>
          </div>
          <div>
            <label for="price">Price</label>
            <div class="input-with-symbol">
              <span>$</span>
              <input id="price" type="text" name="price" placeholder="Enter price" class="input-field" required>
            </div>
          </div>
          <!-- <div>
            <label for="price">Quantity</label>
            <input id="price" type="text" name="quantity" placeholder="Enter quantity" class="input-field" required>
          </div> -->
         <div>
            <label for="image">Image</label>
            <input  type="file" name="image" class="input-field" id="image" required accept=".jpg, .png, .jpeg">
         </div>
          <div>
          <input type="submit" name="submit" value="Upload" class="submit-btn">
          </div>
        </form>
    </div>



    <?php
        include('includes/footer.php');
        ?>
  
</body>
</html>