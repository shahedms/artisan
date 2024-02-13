<?php
session_start();

include("connect.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Something was posted
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = $_POST['password'];

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($password)) {
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT id, fname, password FROM user_form WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $fname, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                // Set additional user data in the session
                $_SESSION['user_id'] = $user_id;
                $_SESSION['fname'] = $fname;
                header("Location: index.php");
                die;
            } else {
                echo '<script>alert("Wrong username or password")</script>';
            }
        } else {
            echo '<script>alert("User not found")</script>';
        }

        $stmt->close();
    } else {
        echo '<script>alert("Please enter a valid email and password")</script>';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/style4.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Inter
      :wght@400;500;700&family=Libre+Baskerville&display=swap"
      rel="stylesheet"/>
  </head>
  <body>
    <div class="left-half">
        <!-- <img src="photos/pexels-steve-johnson-1509534.jpg" alt="Art Image"> -->
        <img src="photos/background.jpeg" alt="Art Image">
        <div class="text-overlay">
            <h1>artisan.</h1>
            <p>[ˈɑː.tɪ.zæn] <i>noun</i></p>
            <p>a person skilled in making things by hand with love.</p>
        </div>
    </div>
        
    <div class="right-half">  
    <div class="login-box">
      <h1> Login</h1>
      <form method="post" action="login.php">
           
      <div>
        <label for="email" class="item">Email Address</label>
        <input id="email" name="email" type="text" placeholder="name@example.com" 
        required />
      </div>

      <div>
        <label for="password" class="item">Password</label>
        <input id="password" name="password" type="password" placeholder="password" 
        required />
      </div>

      <button type="submit" class="btn" name="login_user">Login</button>
      <p id="signup">
        Don't have an account? <a href="signup.php"><b>Sign up now!</b></a>
      </p>
      </form>
    </div>
    </div>
</html>