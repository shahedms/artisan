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
    <meta
      name="viewport"
      content="width=
      , initial-scale=1.0"/>
    <title>Welcome</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="css/newsletter.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Inter
      :wght@400;500;700&family=Libre+Baskerville&display=swap"
      rel="stylesheet"/>
      
  </head>
  <body>

  <?php
    include('includes/nav.php');
  ?>

    <div class="welcome-container">
      <!--welcome-->
      <h2>
        art unleashed,<br/>
        welcome home
      </h2>
      <img
        src="photos/pexels-dan-cristian-pădureț-1193743.jpg"
        alt="color splatter"
      />
    </div>
    <div class="mini-about">
      <!-- mini about us -->
      <h2>
        Where creativity <br />meets canvas, and <br />art finds its admirers.
      </h2>
      <div>
      <p class="p-about">
        Established in 2017, artisan has cultivated a devoted community of art
        enthusiasts, creators, and design aficionados spanning across diverse
        corners of the globe.
      </p>
      <a href="aboutus.php" class="ref-about">About us</a>
      </div>
    </div>
    <div class="explore">
      <!-- explore -->
      <h2>
        Discover Art You Love From <br />the World's Leading Online<br />
        Gallery Added Weekly
        <hr class="custom-line" />
      </h2>
      <div class="img-container">
        <!--images in the feed -->
        <div class="img-item">
          <img src="photos/paitings/img1.jpg" alt="image 1" height="200" />
          <div class="img-details">
            <p class="img-artist">artist</p>
            <p class="img-title">name</p>
            <p class="img-dimpaint">dimesions, medium</p>
            <p class="img-price">price</p>
          </div>
        </div>

        <div class="img-item">
          <img src="photos/paitings/img3.jpg" alt="image 3" height="200" />
          <div class="img-details">
            <p class="img-artist">artist</p>
            <p class="img-title">name</p>
            <p class="img-dimpaint">dimesions, medium</p>
            <p class="img-price">price</p>
          </div>
        </div>
        <div class="img-item">
          <img src="photos/paitings/img2.jpg" alt="image 2" height="200" />
          <div class="img-details">
            <p class="img-artist">artist</p>
            <p class="img-title">name</p>
            <p class="img-dimpaint">dimesions, medium</p>
            <p class="img-price">price</p>
          </div>
        </div>
      </div>
    </div>
    <a href="buy.php" class="btn">Browse More Art </a>
    <hr class="custom-line" />

    <div class="rev-section">
      <h2>Gallery of Praise</h2>
      <div class="review-container">
        <!-- reviews -->
        <div class="review">
          <i>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="36"
              height="36"
              fill="#000000"
              viewBox="0 0 256 256">
              <path
                d="M100,56H40A16,16,0,0,0,24,72v64a16,16,0,0,0,16,16h60v8a32,32,
                0,0,1-32,32,8,8,0,0,0,0,16,48.05,48.05,0,0,0,48-48V72A16,16,0,0,
                0,100,56Zm0,80H40V72h60ZM216,56H156a16,16,0,0,0-16,16v64a16,16,0
                ,0,0,16,16h60v8a32,32,0,0,1-32,32,8,8,0,0,0,0,16,48.05,48.05,0,0
                ,0,48-48V72A16,16,0,0,0,216,56Zm0,80H156V72h60Z">
              </path>
            </svg>
          </i>
          <p>
            An absolute gem for art lovers! I stumbled upon artisan and found
            the perfect painting for my living room. The buying process was
            seamless, and the artwork arrived in pristine condition. Can't wait
            to explore more!
          </p>
          <h4>Chloe, Ireland</h4>
        </div>
        <div class="review">
        <i>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="36"
              height="36"
              fill="#000000"
              viewBox="0 0 256 256">
              <path
                d="M100,56H40A16,16,0,0,0,24,72v64a16,16,0,0,0,16,16h60v8a32,32,
                0,0,1-32,32,8,8,0,0,0,0,16,48.05,48.05,0,0,0,48-48V72A16,16,0,0,
                0,100,56Zm0,80H40V72h60ZM216,56H156a16,16,0,0,0-16,16v64a16,16,0
                ,0,0,16,16h60v8a32,32,0,0,1-32,32,8,8,0,0,0,0,16,48.05,48.05,0,0
                ,0,48-48V72A16,16,0,0,0,216,56Zm0,80H156V72h60Z">
              </path>
            </svg>
          </i>
          <p>
            As an artist, artisan has been a game-changer for me. The exposure
            my work has gained on this platform is unparalleled. The community
            is supportive, and the team behind the scenes is truly passionate
            about art. Highly recommended!
          </p>
          <h4>Jack, Portugal</h4>
        </div>
        <div class="review">
        <i>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="36"
              height="36"
              fill="#000000"
              viewBox="0 0 256 256">
              <path
                d="M100,56H40A16,16,0,0,0,24,72v64a16,16,0,0,0,16,16h60v8a32,32,
                0,0,1-32,32,8,8,0,0,0,0,16,48.05,48.05,0,0,0,48-48V72A16,16,0,0,
                0,100,56Zm0,80H40V72h60ZM216,56H156a16,16,0,0,0-16,16v64a16,16,0
                ,0,0,16,16h60v8a32,32,0,0,1-32,32,8,8,0,0,0,0,16,48.05,48.05,0,0
                ,0,48-48V72A16,16,0,0,0,216,56Zm0,80H156V72h60Z">
              </path>
            </svg>
          </i>
          <p>
            As an interior designer, I rely on artisan for sourcing unique and
            captivating artworks for my clients. The range of styles and artists
            is impressive, and the purchasing process is straightforward. My
            clients are always delighted with the final result!
          </p>
          <h4>Vanessa, United Kindgom</h4>
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