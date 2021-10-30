<?php

$login = FALSE;
$showError = FALSE;
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'partials/_connectdb.php';
    
    $username = $_POST["uname"];
    $password = $_POST["password"];
    $sql = "select * from ucred where uname = '$username' and pwrd = '$password'";
    $result = mysqli_query($conn,$sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        $login = TRUE;
        session_start();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['username'] = $username;
        header("location: welcome.php");
    }
    else{
        $showError = "Invalid Credentials";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <?php
    require 'partials/_nav.php';
    

    if ($login) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully loged in!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }

    if($showError){
        echo '
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>ERROR!</strong>'.$showError .'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
    }
    
    ?>
    <div class="container my-4">
        <h1 class='text-center'>Login to the webiste</h1>
        <form action="/loginsystem/login.php" method="post">
            <div class="form-group">
                <label for="uname">User Name</label>
                <input type="name" name="uname" class="form-control" id="uname" aria-describedby="uname"
                    placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
        </script>
    <script>
        $('.alert').alert();
    </script>
</body>

</html>