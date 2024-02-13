<?php
session_start();

include("connect.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Receive input values from the form
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $usertype = mysqli_real_escape_string($conn, $_POST['usertype']);

    // Form validation
    $errors = array();

    if (strlen($password) < 8) {
      array_push($errors, "Password should be at least 8 characters long");
    }

    if ($password != $cpassword) { 
      array_push($errors, "The two passwords do not match"); 
    }

    // Check if user already exists
    $stmt = $conn->prepare("SELECT * FROM user_form WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user) {
        array_push($errors, "Email already exists");
    }

    // Register user if there are no errors
    if (count($errors) == 0) {
        $password = password_hash($password, PASSWORD_BCRYPT); // Encrypt the password

        $stmt = $conn->prepare("INSERT INTO user_form (fname, lname, email, password, usertype) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fname, $lname, $email, $password, $usertype);
        $stmt->execute();
        $stmt->close();

        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;
        $_SESSION['usertype'] = $usertype;

        header("Location: login.php"); // Redirect to welcome page or any other page
        exit();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup</title>
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/style5.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=Inter
      :wght@400;500;700&family=Libre+Baskerville&display=swap"
      rel="stylesheet"/>
  </head>

  <body>
    <div class="left-half">
        <img src="photos/pexels-steve-johnson-1509534.jpg" alt="Art Image">
        <div class="text-overlay">
            <h1>artisan.</h1>
            <p>[ˈɑː.tɪ.zæn] <i>noun</i></p>
            <p>a person skilled in making things by hand with love.</p>
        </div>
    </div>

    <div class="right-half">  
    <div class="signup-box">
      <h1>Signup</h1>
      <form action="signup.php" method="post">
      <div>
        <label for="fname" class="item">First Name</label>
        <input id="fname" name="fname" type="text" placeholder="first name" required />
      </div>

      <div>
        <label for="lname" class="item">Last Name</label>
        <input id="lname" name="lname" type="text" placeholder="last name" required />
      </div>

      <div>
        <label for="email" class="item">Email Address</label>
        <input id="email" name="email" type="email" placeholder="name@example.com" 
        required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" />      
      </div>

      <div>
        <label for="password" class="item">Password</label>
        <input id="password" name="password" type="password" placeholder="password" 
        required />
      </div>

      <div>
        <label for="cpassword" class="item">Confirm Password</label>
        <input
          id="cpassword"
          name="cpassword"
          type="password"
          placeholder="password"
          required
        />
      </div>

      <div>
        <label class="item">User Type</label>
        <div class="usertype">
          <select name="usertype">
            <option value="customer">Customer</option>
            <option value="artist">Artist</option>
          </select>
        </div>
      </div>

      <button type="submit" class="btn" name="reg_user">Register</button>

      <p id="login">
        Already have an account? <a href="login.php"><b>Log in now!</b></a>
      </p>
      </form>
    </div>
    </div>

  </body>
</html>