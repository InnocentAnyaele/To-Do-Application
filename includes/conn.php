<!-- Connection page -->
<?php

$server = "localhost";
$user = "root";
$password = "";
$dbname = "todo";

// creating connection variable
$conn = mysqli_connect($server,$user,$password,$dbname);

if (!$conn) {
  // direct to 404 error page if connection fails
    header ('location: views/404.php');
  }

?>