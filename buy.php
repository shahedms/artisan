<?php
session_start();
include('connect.php');
include('functions.php');

$user_data = check_login($conn);
ob_start();


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop Art</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/style2.css" />
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

    <h1 class="head">Paintings for Sale</h1>
    <hr class="custom-line"/>

        <?php 
        $sql = "SELECT * FROM artworks ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);

        ?>
        <?php
        if (mysqli_num_rows($result) > 0) {
          echo '<div class="grid-container">';
            while ($row = mysqli_fetch_assoc($result)) {
              $artwork_id = $row['id'];
                ?>
                <div class="item">
                    <img src="uploads/<?= $row['image'] ?>" height="200" title="<?= $row['image'] ?>" alt="<?= $row['artworkName'] ?>">
                    <p class="img-artist"><?= $row['artist'] ?></p>
                    <p class="img-title">'<?= $row['artworkName'] ?>'</p>
                    <p class="img-dim"><?= $row['dimensions'] ?> cm, <?= $row['paintMedium'] ?></p>
                    <p class="img-price">$<?= $row['price'] ?></p>
                    <button class="cart-btn add-to-cart-btn""><a href="buy.php?action=add&id=<?php echo $artwork_id ?>">Add to Cart</a></button>               
                  </div>
                <?php
            }
            echo '</div>';
        }
        ?>

        <?php
        
        if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
            $artwork_id = $_GET['id'];
            addToCart($conn, $artwork_id, $user_data['id']);
        }
        ?>

        <!-- <hr class="custom-line">  -->

        <?php
        include('includes/newsletter.php');
        ?>


        <?php
        include('includes/footer.php');
        ?>

  </body>
</html>
