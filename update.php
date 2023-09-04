<?php
require 'conn.php';
$id = $_GET['val'];

$pq = "select price from buyproduct WHERE name = '$id'";
$pres = mysqli_query($conn, $pq);
if ($pres->num_rows > 0) {
  $pri = mysqli_fetch_assoc($pres);
  $price = $pri['price'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-5.3.0-dist\css\bootstrap.min.css">

  <style>
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
  </style>
</head>

<body>
  <div class="container">
    <h2 class="text-center">Update Product</h2>

    <form method="post">
      <div class="form-group">
        <label for="productName">Product Name</label>
        <input type="text" class="form-control" id="productName" name="upn" placeholder="Enter product name" value=<?php echo $id ?> readonly>
      </div>

      <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="uquanti" placeholder="Enter product quantity" required>
      </div>

      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" id="price" name="upri" placeholder="Enter product price" required>
      </div>

      <button type="submit" class="btn btn-success" name="update">Update</button>

    </form>
  </div>
</body>
<?php
if (isset($_POST["update"])) {
  $id = $_GET['val'];
  $q = $_POST["uquanti"];
  $amt = $_POST["upri"];
  $qupdate = "UPDATE `cart` SET `quantity`='$q' , `price` = '$amt' WHERE `name`='$id'";

  $res = mysqli_query($conn, $qupdate);
  if ($res) {
    // echo "product deleted";
    header("location: addpro.php?upd=" . $res);
  }


}
?>



</html>