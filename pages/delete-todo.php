<?php
include ("../includes/conn.php");

$log = $_GET['log'];

$delete = mysqli_query($conn,("DELETE FROM `todo` WHERE `log` = '$log'"));

if ($delete){
    echo "<script>confirm('ToDo Deleted!'); location.href='../index.php';</script>";
} else {
    echo "<script>confirm('Failed!'); location.href='../index.php';</script>";
}

?>