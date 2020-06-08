<?php
include ("../includes/conn.php");

if (isset($_POST['submit'])){

    if(!empty($_POST['deleteTodo'])){
        foreach ($_POST['deleteTodo'] as $value){

            // $log = $_POST['log'];
            $delete = mysqli_query($conn,("DELETE FROM  `todo` WHERE `log` = '$value' "));

            if($delete){
               echo "<script>alert('Todos Deleted!'); location.href='../index.php';</script>";
            }
            else{
               echo "<script>alert('Failed'); location.href='../index.php';</script>";
            }
        }
    }
   
    else {
       echo "<script>alert('No ToDos Selected'); location.href='../index.php';</script>";
    }
   
   }
   


?>