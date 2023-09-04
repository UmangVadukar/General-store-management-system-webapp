<?php
require_once('conn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.3.0-dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <title>buy</title>
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

    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 30px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-group label {
      font-weight: bold;
    }

    .btn-link {
      text-decoration: none;
      color: #fff;
    }

    .btn-link:hover {
      text-decoration: none;
      color: #fff;
    }

    #add {
      text-align: center;
      width: 99%;
      margin-top: 3vh;
    }

    a {
      color: white;
      text-decoration: none;
    }

    #bill {
      text-align: center;
      margin-top: 3vh;
      background-color: rgba(50, 104, 241, 0.921);
    }

    a .cancel {
      background-color: none;
    }

    .del-icon {
      font-size: 20px;
      color: red;
    }
  </style>
</head>

<body>
  <link href='https://fonts.googleapis.com/css?family=Roboto:500,900,100,300,700,400' rel='stylesheet' type='text/css'>
  <section style=" color: rgba(0, 0, 0, 0.5);">
    <nav class="shift" style="height:5px; align-self: left">
      <ul>
        <li><a href="hello.php">Home</a></li>
        <li><a href="buy.php">Add Products</a></li>
        <li><a href="buy.php">Buy Products</a></li>
        <li><a href="deletecart.php">Delete Product</a></li>
      </ul>
    </nav>
  </section>
  <?php

  if (empty($_SESSION["username"])) {
    ?>
    <h2 style=" font-size: 50px;
      font-family: -webkit-body;
      font-weight: bold;
      margin:90px;">Looks like You haven't login</h2>
    <form method="post" style="padding-inline:235px;
     margin-top:-40px;">
      <button type="submit" class="btn btn-primary" name="bktlog" value="bktlog">Back to Login</button>
    </form>
    <?php
    if (isset($_POST["bktlog"])) {
      header("location: signup.php");
    }
  } else {
    ?>
    <div class="container" style=" margin-top:55px">

      <?php
      if (isset($_POST["add"])) {
        echo '
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      </svg>
      <div class="alert alert-success my-3 alert-dismissible fade show" role="alert"  style="width: 100%; height: 7vh;">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
     <strong> Product Added Successfully..</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  </button>
  </div>
  ';
      }
      ?>
      <?php
      if (isset($_GET["del"])) {
        echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
      </svg>
      <div class="alert alert-danger my-3 alert-dismissible fade show" role="alert"  style="width: 100%; height: 7vh;">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
     <strong> Product Deleted!!!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  </button>
  </div>

  ';
      }
      if (isset($_GET["upd"])) {
        echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
      </svg>
      <div class="alert alert-warning my-3 alert-dismissible fade show" role="alert"  style="width: 100%; height: 7vh;">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
     <strong> Product Updated!!!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  </button>
  </div>

  ';
      }
      ?>
      <?php
      if (isset($_POST["bill"])) {
        $sel = "select * from cart";
        $tab = mysqli_query($conn, $sel);
        $rw = mysqli_num_rows($tab);
        if ($rw > 0) {
          header("location: generate.php");
        } else {
          echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
      </svg>
      <div class="alert alert-info my-3 alert-dismissible fade show" role="alert"  style="width: 100%; height: 7vh;">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
     <strong> Please First Add the Product!!!</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  </button>
  </div>

  ';
        }

      }
      ?>


      <h2 class="text-center">Add Product</h2>

      <form method="post">
        <div class="form-group">
          <label for="productName">Product Name</label>
          <input type="text" class="form-control" id="productName" name="pn" placeholder="Enter product name" required>
        </div>

        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="number" class="form-control" id="quantity" name="quanti" placeholder="Enter product quantity"
            required>
        </div>

        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" class="form-control" id="price" name="pri" placeholder="Enter product price" required>
        </div>

        <button type="submit" id="add" class="btn btn-success" name="add">Add Product</button>

    </div>
    <div class="list" style="padding-inline: 395px; margin-top: 42px;">
      <table class="table table-hover">
        <thead>
          <tr style="font-size: 17px;">
            <th scope>Sr No</th>
            <th scope="col">Name </th>
            <th scope="col">Quantity</th>
            <th scope="col">Price </th>

          </tr>
        </thead>
        <?php
        if (isset($_POST['add'])) {
          $n = $_POST["pn"];
          $q = $_POST["quanti"];
          $p = $_POST["pri"];

          $qins = "INSERT INTO `cart` VALUES('$n','$q','$p')";
          mysqli_query($conn, $qins);

        }
        ?>
        <?php
        $query = "select * from cart";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
          static $srno = 1;
          ?>
          <tbody>
            <tr>
              <th scope="row">
                <?php echo $srno; ?>
              </th>
              <td>
                <?php echo $row['name'] ?>
              </td>
              <td>
                <?php echo $row['quantity'] ?>
              </td>
              <td>
                <?php echo $row['price'] ?>
              </td>

              <td>
                <button class="btn btn-primary" name="update">
                  <?php echo "<a href='update.php?val=" . $row['name'] . "'>Update</a>"; ?>
                </button>
              </td>

              <td>
                <?php echo "<a class='cancel' style='font-size: 25px;' href='delet.php?val=" . $row['name'] . "'><i class='fa fa-trash del-icon'></i></a>"; ?>

              </td>

              <?php $srno += 1; ?>
            </tr>


            <?php

        }
  }

  ?>

      </tbody>
    </table>
  </div>
  </form>
  </div>
  <script src="bootstrap-5.3.0-dist\js\bootstrap.min.js"></script>
  <script src="bootstrap-5.3.0-dist\js\jquery.min.js"></script>

  <script>
    let alerts = document.querySelectorAll(".alert");
    if (alerts.length > 0)
      setTimeout(() => {
        alerts.forEach(alert => {
          alert.remove();
        });
        window.location = "addpro.php";
      }, 2500);
  </script>
</body>

</html>