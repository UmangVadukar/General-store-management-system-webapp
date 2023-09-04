<?php
  $servername="localhost";
  $username="root";
  $password="";
  $dbname="Product";
  
  $conn=mysqli_connect($servername,$username,$password,$dbname);

  if(!$conn)
  {
    echo "Connection Failed Data Can't Show!!".mysqli_connect_error();
  }

?>