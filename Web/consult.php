<?php
session_start();

$email = $_SESSION["email"];

if(!isset($_SESSION["signin"])) {
  header("Location: login.php");
  exit;
}

require 'connection.php';

// consultant
$consultants = mysqli_query($conn, "SELECT * FROM consultant");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Moodster | Consultation</title>
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

    <!-- List -->
    <section id="list">
      <div class="container mt-5">
        <div class="row justify-content-center">

        <?php while ($row = mysqli_fetch_assoc($consultants)) : ?>

          <div class="col-md-8">
            <div class="card mb-3">
              <div class="row g-0">
                <div class="col-md-3">
                  <img src="img/consultant/<?php echo $row["image"]; ?>" class="img-fluid rounded-start" />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $row["name"]; ?></h4>
                    <p class="card-text"><?php echo $row["profession"]; ?></p>
                    <p class="card-text"><small class="text-body-secondary"><?php echo $row["status"]; ?></small></p>
                    <a href="#" class="btn btn-primary">Chat</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php endwhile; ?>

    <!-- End List -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
