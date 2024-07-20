<?php
session_start();

$email = $_SESSION["email"];

if(!isset($_SESSION["signin"])) {
  header("Location: login.php");
  exit;
}

require 'connection.php';

// User
$email = $_SESSION["email"];
$users = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
$user = mysqli_fetch_assoc($users);

// Diary
$diaries = mysqli_query($conn, "SELECT * FROM diaries");

// Save
if (isset($_POST["save"])) {
  $date = $_POST["date"];
  $diary = $_POST["diary"];

  $query = "INSERT INTO diaries VALUES ('', '$id_user', '', '$diary')";
  mysqli_query($conn, $query);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Moodster</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="img/blob copy.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top" />
          Moodster
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="features">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signout.php">Sign Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Nav -->

    <!-- Jumbotron -->
    <section class="jumbotron">
      <div class="container">
        <div class="row align-items-center mb-5">
          <div class="col py-5">
            <h1>
              Hi, <?php echo $user['name'] ?>!<br />
              How do you feel today?
            </h1>
          </div>
          <div class="col py-5">
            <img src="img/blob copy.png" alt="Logo" class="w-100" />
          </div>
        </div>
      </div>
    </section>
    <!-- End Jumbotron -->

    <!-- Feature -->
    <section id="features">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col">
            <h2>Features</h2>
          </div>
        </div>
        <div class="row justify-content-center mb-5">
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/features/1.jpg" class="card-img-top" alt="Features 1" />
              <div class="card-body">
                <h5 class="card-title">My Diary</h5>
                <p class="card-text">A diary is the last place to go if you wish to seek the truth about a person.</p>
                <a href="diary.php" class="btn btn-primary">Write a Diary</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/features/2.jpg" class="card-img-top" alt="Features 1" />
              <div class="card-body">
                <h5 class="card-title">Mental Health Test</h5>
                <p class="card-text">Knowing others is intelligence, knowing yourself is true wisdom.</p>
                <a href="test.php" class="btn btn-primary">Take a Test</a>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <div class="card">
              <img src="img/features/3.jpg" class="card-img-top" alt="Features 1" />
              <div class="card-body">
                <h5 class="card-title">Consult with Professionals</h5>
                <p class="card-text">Your present circumstances don’t determine where you go; they merely determine where you start.</p>
                <a href="consult.php" class="btn btn-primary">Consult</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Feature -->

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col">
            <h2>Contact Us</h2>
          </div>
        </div>
        <div class="row justify-content-center mb-5">
          <div class="col-md-8">
            <form action="">
              <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" />
              </div>
              <div class="mb-3">
                <label for="textarea" class="form-label">Message</label>
                <textarea class="form-control" id="textarea" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
