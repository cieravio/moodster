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
$id_user = $user["id_user"];

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
    <title>Moodster | My Diary</title>
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
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
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
            <form action="" method="post">
              <div class="mb-3">
                <label for="diarytext" class="form-label">Write your diary here</label>
                <input type="date" class="form-control" id="diarydate" value="<?= date('d/m/Y', strtotime($row['date'])); ?>" name="date" />
                <textarea class="form-control mt-2" id="diarytext" placeholder="How's today?" rows="3" name="diary"></textarea>
                <button type="submit" class="btn btn-primary mt-3" name="save">Save</button>
              </div>
            </form>
          </div>
          <div class="col py-5">
            <img src="img/blob copy.png" alt="Logo" class="w-100" />
          </div>
        </div>
      </div>
    </section>
    <!-- End Jumbotron -->

    <!-- List -->
    <section id="diarylist">
      <div class="container">
        <div class="row text-center mb-5">
          <div class="col">
            <h2>My Diaries</h2>
          </div>
        </div>
        <div class="row justify-content-center mb-5">
          <div class="col-md-10 mb-3">
            <div class="card">
              <div class="card-header">01/09/2023</div>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>i think i need a therapy.</p>
                </blockquote>
              </div>
            </div>
          </div>
          <div class="col-md-10 mb-3">
            <div class="card">
              <div class="card-header">02/09/2023</div>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>today i feel so numb.</p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End List -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
