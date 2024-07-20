<?php
session_start();

if(isset($_SESSION["signin"])) {
  header("Location: index.php");
  exit;
}

include 'connection.php';

// Sign Up
if (isset($_POST["signup"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  $result = mysqli_query($conn, "SELECT email from users WHERE email = '$email'");
  if(mysqli_fetch_assoc($result)) {
    echo "<script> alert('Username invalid') </script>";
  } else {
    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $query_user = "INSERT INTO users VALUES ('', '$name', '$email', '$password')";
    mysqli_query($conn, $query_user);
    
    echo "<script> alert('Registration Successed! Please Login to Continue')</script>";
  }
}
  
// Sign In

if (isset($_POST["signin"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
  if(mysqli_num_rows($result) === 1 ) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      $_SESSION["signin"] = true;
      $_SESSION["email"] = $email;

      header("Location: index.php");
      exit;
    }
  }
  $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/style.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="container" id="container">

      <!-- Sign Up -->
      <div class="form-container sign-up-container">
        <form action="" method="post">
          <h1>Create Account</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <span>or use your email for registration</span>
          <input type="text" placeholder="Name" class="input" name="name" />
          <input type="email" placeholder="Email" class="input" name="email" />
          <input type="password" placeholder="Password" class="input" name="password"/>
          <button type="submit" name="signup">Sign Up</button>
        </form>
      </div>
      <!-- End Sign Up -->  

      <!-- Sign In -->
      <div class="form-container sign-in-container">
        <form action="" method="post">
          <h1>Sign in</h1>
          <div class="social-container">
            <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
            <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
          </div>
          <span>or use your account</span>
          <input type="email" placeholder="Email" class="input" name="email" />
          <input type="password" placeholder="Password" class="input" name="password"/>
          <a href="#">Forgot your password?</a>
          <button type="submit" name="signin">Sign In</button>
        </form>
      </div>
      <!-- End Sign In -->

      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>To keep connected with us please login with your personal info</p>
            <button class="ghost" id="signIn">Sign In</button>
          </div>
          <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your personal details and start journey with us</p>
            <button class="ghost" id="signUp">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    <script src="script/script.js"></script>
  </body>
</html>
