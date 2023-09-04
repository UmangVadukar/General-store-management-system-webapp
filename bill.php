<?php
require_once 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.0-dist\css\bootstrap.min.css">
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <div class="list" style="padding-inline: 395px; margin-top: 42px;">
        <table class="center" border=3px cellspacing="1" cellpadding="20">
            <thead>
                <tr>
                    <th colspan="4">Product Bill</th>
                </tr>

                <tr>
                    <th> Customer Name :</th>
                    <td>
                    <th colspan=4>
                        <?php echo $_SESSION["username"]; ?>

                    </th>
                    </td>
                </tr>


            </thead>
            <thead>
                <tr>
                    <th scope>sr no</th>
                    <th scope="col">Name </th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price </th>
                </tr>
            </thead>
            <?php
            $query = "select * from buyproduct";
            $total = 0;
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
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
                            <?php echo $row['price'];

                            $total += $row['price'];
                            ?>

                        </td>
                    </tr>

                    <?php
                    $srno++;
            }

            ?>
                <tr>
                    <td>
                        Total Bill :
                    </td>
                    <td>
                        <?php echo $total ?>
                    </td>
                </tr>
        </table>
    </div>
</body>

</html>