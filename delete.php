<?php

require_once('conn.php');
$namepro=$_GET['val'];
$query= "DELETE FROM buyproduct WHERE name = '".$namepro."'";
$result=mysqli_query($conn,$query);

if($result)
{
    // echo "product deleted";
    header("location: buy.php?del=".$result);
 }

?>