<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="bootstrap-5.3.0-dist\css\bootstrap.min.css">
  <title>Navbar</title>
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      padding: 0;
      margin: 0;
    }

    small {
      font-size: 12px;
      color: rgba(50, 104, 241, 0.921);
    }

    .center {
      text-align: center;
    }

    section {
      height: 10vh;
    }

    /* NAVIGATION */
    nav {
      width: 100%;
      margin: 0 auto;
      background: rgb(35, 125, 216);
      padding: 50px 0;
      box-shadow: 0px 5px 0px #dedede;
    }

    nav ul {
      list-style: none;
      text-align: center;
      float: right;
    }

    nav ul li {
      display: inline-block;
    }

    nav ul li a {
      display: block;
      padding: 15px;
      text-decoration: none;
      color: white;
      font-weight: 800;
      text-transform: uppercase;
      margin: 0 10px;
    }

    nav ul li a,
    nav ul li a:after,
    nav ul li a:before {
      transition: all .5s;
    }

    nav ul li a:hover {
      color: #555;
    }

    /* SHIFT */
    nav.shift ul li a {
      position: relative;
      z-index: 1;
    }

    nav.shift ul li a:hover {
      color: black;
    }

    nav.shift ul li a:after {
      display: block;
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      margin: auto;
      width: 100%;
      height: 1px;
      content: '.';
      color: transparent;
      background: whitesmoke;
      visibility: none;
      opacity: 0;
      z-index: -1;
    }

    nav.shift ul li a:hover:after {
      opacity: 1;
      visibility: visible;
      height: 100%;
    }
  </style>
</head>

<body>
  <link href='https://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
  <section style=" color: rgba(0, 0, 0, 0.5);">
    <nav class="shift" style="height:5px; align-self: left">
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="addpro.php">Add Products</a></li>
        <li><a href="buy.php">Buy Products</a></li>
        <li><a href="deletecart.php">Delete Product</a></li>
      </ul>
    </nav>
  </section>
  <br>
  <br>
  <br>

  <div class="container" style="margin:60px;
    font-size: 50px;
    font-family: -webkit-body;
    font-weight: bold;">
    <?php

    if (isset($_SESSION["username"])) {
      echo "Welcome " . $_SESSION["username"];

      echo '<div class="content" style="font-family: math;
    font-size: 32px;
    margin-top: 75px;
    background: lightskyblue;">';
      echo "Our General Store Management System is a software application that automates 
    various tasks in a retail store. Its includes features such as Product Management 
    billing management and other related tasks .It aims to optimize store operations 
    enhance customer satisfaction and improve overall productivity.";
      echo '</div>';
    } else {
      ?>
      <h2 style=" font-size: 50px;
    font-family: -webkit-body;
    font-weight: bold;">Looks like You haven't login</h2>
      <form method="post">
        <button type="submit" class="btn btn-primary" name="bktlog" value="bktlog">Back to Login</button>
      </form>
      <?php
      if (isset($_POST["bktlog"])) {
        header("location: signup.php");
      }
    }
    ?>
  </div>
  <!-- Bootstrap JS dependencies -->
  <script src="bootstrap-5.3.0-dist\js\jquery.min.js"></script>
  <script src="bootstrap-5.3.0-dist\js\bootstrap.min.js"></script>
</body>

</html>