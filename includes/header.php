<!DOCTYPE html>
<?php
  include("includes/config.php");
  include("includes/classes/Artist.php");
  include("includes/classes/Album.php");
  include("includes/classes/Song.php");

  // session_destroy();

  if(isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
  } else {
    header("Location: register.php");
  }
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="assets/js/script.js">
    </script>
    <title>Zoned</title>
    <link rel="icon" href="assets/images/logo.png">
  </head>
  <body>

    <div class="mainContainer">

      <div class="topContainer">
        <?php include("includes/navbarContainer.php"); ?>
        <div class="mainViewContainer">
          <div class="mainContent">
