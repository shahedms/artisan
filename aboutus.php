<?php
session_start();  

include("connect.php");
include("functions.php");
$user_data = check_login($conn);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About us</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/style3.css" />
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

    <div class="about">
      <img src="photos/img-about2.jpg" width="50%" class="item-1" />
      <div>
        <h1 class="item-2">Good art brings people together</h1>
        <p class="item-2">
          Welcome to artisan, where art meets inspiration and creativity knows
          no bounds. We are more than just an online art destination; we are a
          passionate community dedicated to bringing the beauty of art into your
          life.
        </p>
      </div>
    </div>
    <div class="quote-1">
      Our online gallery invites you to experience the richness of art, all from
      the cozy comfort of your home.
    </div>
    <div class="story">
      <h2>Our Story</h2>
      <hr class="custom-line" />
      <div class="storyflex">
        <p class="item-2">
          artisan was born out of a shared love for art and the desire to create
          a platform that celebrates the work of talented artists. Established
          in 2017, we set out on a mission to curate a diverse collection of
          original artworks that resonate with art enthusiasts around the globe.
        </p>
        <img src="photos/img-story.jpg" width="50%" class="item-1" />
      </div>
    </div>
    <div class="quote-2">
      Immerse yourself in a curated collection that captures the essence of a
      gallery visit, where each piece tells a unique story and invites you to
      discover the boundless creativity within our community.
    </div>
    <div class="mission">
      <h2>Our Mission</h2>
      <hr class="custom-line" />

      <div class="missionflex">
        <img src="photos/mission.jpg" width="50%" class="item-1" />
        <div class="item-2">
          <h2>
            At artisan, our mission is more than just connecting individuals
            with exceptional art.
          </h2>
          <p>
            it's about creating a cultural journey that transcends the
            boundaries of traditional art appreciation. We are dedicated to
            fostering a deep and profound appreciation for creativity and
            self-expression, guiding art enthusiasts on a transformative
            exploration of the aesthetic and emotional dimensions of the human
            experience.
          </p>
        </div>
      </div>
    </div>
    <div class="artist">
      <div class="item-1">
        <h2>Are you an artist?</h2>
        <p>
          We represent top emerging and mid-career artists from around the
          world. We're passionate about our collection and our artists, and we
          are always looking for talented artists with positive attitudes to
          join our community.
        </p>
        <a href="signup.php" class="link">Apply now!</a>
      </div>
      <img src="photos/artist.jpg" width="50%" class="item-2" />
    </div>
    <div class="contact">
      <div class="content">
        <h2>Contact us</h2>
        <p>
          We invite you to explore our curated collection, connect with our
          community, and embark on a journey of artistic discovery. Have
          questions or need assistance? Feel free to contact us for personalized
          support. Thank you for being a part of the artisan community.
        </p>
      </div>
      <div class="box">
        <h3>Contact Information</h3>
        <div>
          <p>Email Address: info@artisan.com</p>
          <p>Phone Number: +36 (70) 123-4567</p>
        </div>
      </div>
    </div>

    <?php
        include('includes/newsletter.php');
        ?>

    <?php
        include('includes/footer.php');
        ?>
  </body>
</html>
