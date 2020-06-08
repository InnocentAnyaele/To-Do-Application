<?php
require_once('includes/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <title>ToDo</title>
</head>
<body>


        <!-- <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4 shadow p-3 mb-5 rounded" style="margin-top: 50px; background-color: white;"> -->
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4" style="margin-top: 50px;">
            <!-- ToDo Add Form -->
            <form class="mb-5" action="pages/add-todo.php" method="post">
            <h2><b>Create a Todo</b></h2><br>
                <input class="form-control" type="text" name="todo" placeholder="Add a ToDo ..." required><br>   
                <!-- <button class="btn btn-primary btn-sm btn-block" style="border-radius: 50px;" name="submit">Add</button> -->
                <button class="btn btn-primary btn-sm btn-block" name="submit">Add</button>
            </form>


            <div>
            <form method="post" action="pages/delete-selected-todos.php">
                <!-- List of Todo Items -->
                    <ul class="list-group list-group-flush text-left">


                <!-- Php code to retrive and display todo items from the database -->
                <?php
                    $select = mysqli_query($conn,("SELECT * FROM `todo` ORDER BY `date` DESC "));
                    while($selectrows = mysqli_fetch_assoc($select)){ ?>

                     <!-- Todo List - Displaying todo list from the database -->
                            <li class="list-group-item mb-3">
                                <div class="custom-control custom-checkbox">
                                    <div class="row">
                                        <div class="col-9">
                                            <input type="checkbox" class="custom-control-input"  id="<?php echo $selectrows['log']; ?>" name="deleteTodo[]" value="<?php echo $selectrows['log']; ?>">
                                            <input type="text" name="log" value="<?php echo $selectrows['log']; ?>" hidden>
                                            <label class="custom-control-label" for="<?php echo $selectrows['log']; ?>">
                                                <span class="" style="color: #4169E1;"><?php echo $selectrows['todo']; ?> </span>
                                            </label>
                                        </div>
                                        <div class="col-3">
                                            <!-- Form to post the log of the selected list required for edit -->
                                            <!-- <form method="post" action=""> -->
                                                <!-- <button class="btn btn-primary" name="edit"><i class="fas fa-pen"></i></button> -->
                                                <a href="index.php?log=<?php echo $selectrows['log']; ?>&todo=<?php echo $selectrows['todo'] ?>" class="btn btn-primary mr-2"><i class="fas fa-pen"></i></button>
                                                <input type="text" name="todo" value="<?php echo $selectrows['todo']; ?>" hidden>
                                                <input type="text" name="log" value="<?php echo $selectrows['log']; ?>" hidden>
                                                <a href="pages/delete-todo.php?log=<?php echo $selectrows['log']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            <!-- </form> -->
                                        </div>
                                    </div>                             
                                </div>
                            </li>

                <?php } ?>
                
                
                <?php
                
                if (mysqli_num_rows($select)<1){ ?>
                
                <div class="container mb-5 text-center">
                    <span class="text-muted"><i>No Todos at the moment!</i></span>
                </div>
                
                <?php } ?>

                        <div class="mt-3">
                            <button class="btn btn-outline-danger btn-block" name="submit" >Delete Selected Items</button>
                        </div>

                         </ul>
                    </form>
                </div>
       
            </div>

            <?php
            // log of selected list retrieved and displayed in modal for edit

            // if (isset($_POST['edit'])){
            //     $log = $_POST['log'];
            //     $todo = $_POST['todo']; 
            
            if (isset($_GET['log']) && ($_GET['todo'])){
                $log = $_GET['log'];
                $todo = $_GET['todo'];
            ?>
               

<div class="modal fade" id="editTodo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Edit This Todo</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
                <form method="post" action="pages/edit-todo.php">
                    <p><?php echo $todo; ?></p>
                    <div>
                        <input class="form-control" type="text" name="edited_todo" placeholder="Edit here..." required>
                        <input type="text" value="<?php echo $log; ?>" name="log" hidden>
                    </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
      <button class="btn btn-primary" name="submit"><i class="fas fa-edit"></i>Edit</button>
      </div>
            </form>
    </div>
  </div>
</div>
                
            
            
            <?php
                echo "<script type='text/javascript'>
                $(document).ready(function(){
                $('#editTodo').modal('show');
                });
                </script>";
            }

            ?>


</body>
</html>