<!-- 404 page for connection error -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Connection Error!</title>
</head>
<body>
    <div class="jumbotron text-center">
        <h2 style="color: red;">
            Database Connection Error!
        </h2>
        <p><b>
            Please check your server and database connections!<br>
             Make sure to have the following:<br>
            Database name : <i>todo</i> <br>
            Table name: <i>todo</i> <br>
            Column names: <i>log(autoincrement),todo(text),date(datatime, automatic update)</i>
        </b>
        </p>
    </div>
</body>
</html>