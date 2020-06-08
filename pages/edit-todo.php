<?php
include ("../includes/conn.php");

if (isset($_POST['submit'])){
    $log = $_POST['log'];
    $todo = $_POST['edited_todo'];

  $update = mysqli_query($conn,("UPDATE `todo` SET `todo` = '$todo' WHERE `log` = '$log' "));

  if($update) {
      echo "<script>alert('Todo Updated'); location.href='../index.php';</script>";
  }
  else {
      echo "<script>alert('Failed'); location.href='../index.php';</script>";  
    }

//     $update  = mysqli_query($conn,("UPDATE `todo` SET `todo` = '$todo' WHERE `log` = `$log` "));


//     if($update) {
//         echo "<script>alert('Todo Updated'); location.href='../index.php';</script>";
//     }else {
//         echo "<script>alert('Failed'); location.href='../index.php';</script>";
//     }
// }
}

?>