<!-- include connection -->
<?php
include ('../includes/conn.php');  


// retrieve todo form data
if (isset($_POST['submit'])){
    $todo = $_POST['todo'];

    // insert into database
    $insert = mysqli_query($conn,("INSERT INTO `todo` (`todo`) VALUES ('$todo')"));

    if ($insert) {
        header ('location: ../index.php');
        // echo "<script>confirm('ToDo Added!'); location.href='../index.php';</script>";
    }
    
    else {
        echo "<script>confirm('Failed!'); location.href='../index.php';</script>";
    }
}


?>