<!-- session start gebruik je voor het inloggen -->
<?php session_start(); 
include("functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/yeti/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Khaled Cryptomania</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Cryptomania</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home
            
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="news.php">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="exchanges.php">Exchanges</a>
        </li>
        <!-- Als je bent ingelogd bent krijg je de portfolio te zien in de navbar  -->
        <?php if(isset($_SESSION["user"])): ?>
        <li class="nav-item">
            <a class="nav-link" href="portfolio.php">Portfolio</a>
        </li>
        <?php endif; ?>
      </ul>
      <!-- Als je bent ingelogd bent krijg je de portfolio te zien in de navbar  -->
      <?php if(!isset($_SESSION["user"])):?>
      <div class="d-flex gap-2">
        <a class="btn btn-primary" href="login.php">Login</a>
        <a class="btn btn-primary" href="register.php">Register</a>
      </div>
      <!-- Als je bent ingelogd bent krijg je de portfolio te zien in de navbar  -->
      <?php endif;
      if (isset($_SESSION["user"])):
      ?>
      <div class="text-white">Welkom <?php echo $_SESSION["user"]["username"];?></div>
      <a class="text-white" href="logout.php">&nbsp;Logout</a>

      <?php endif; ?>
    </div>
  </div>
</nav>