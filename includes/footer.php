<footer>
      <h1>artisan.</h1>
      <div class="box-1">
        <p>
          <!-- description -->
          artisan is an online art destination featuring a carefully curated
          selection of original artworks for sale. Explore a diverse collection
          that spans thousands of captivating pieces, including oil paintings,
          acrylics, watercolors, mixed media art, and beyond.
        </p>

      <ul>
        <li><a href="buy.php">Explore Artwork</a></li>
        <li><a href="aboutus.php">About us</a></li>
      </ul>
      <ul>
        <?php if (isset($user_data['usertype']) && $user_data['usertype'] == 'artist'): ?>
          <li><a href="addart.php">Sell Art</a></li>
        <?php endif; ?>
        <li><a href="cart.php">My Cart</a></li>
      </ul>
      </div>
      <hr class="footer-line" />
      <div class="box-2">
        <div class="contact-info">
          <p>Phone: +36 (70) 123-4567</p>
          <p>Email: info@artisan.com</p>
        </div>
        <div class="copyright">Copyright &copy; 2024 by artisan.</div>
      </div>
    </footer>