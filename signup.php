<?php


//collecting to data
$pass_wrong = FALSE;
$uname_exist = FALSE;
$signup = FALSE;
if($_SERVER["REQUEST_METHOD"]== "POST"){
    include 'partials/_connectdb.php';
    $username = $_POST["uname"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    if($cpassword == $password){// checking both passwords
        $sql = "INSERT INTO `ucred` (`uname`, `pwrd`, `dt`) VALUES ('$username', '$password', current_timestamp())";//querry to insert data in the table
        $result = mysqli_query($conn,$sql);
        if(!$result){//checking existence of username in the table
            $uname_exist = TRUE;
        }
        else{
            $signup = TRUE;
        }
    }
    else{
        $pass_wrong = TRUE;
        
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
    <title>Signup</title>
</head>

<body>
    <?php
    require 'partials/_nav.php';
    

    if ($pass_wrong) {
        echo '<!-- alert password not matched -->
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>You have entered different password!</strong> Please fill the form again.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <!--  -->';
    }
    elseif($uname_exist){

        echo '<!-- alert username already exist -->
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Username already exist!</strong> Try different user name.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <!-- -->';
    }

    elseif($signup){

        echo '<!-- alert success -->
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account has been created.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <!--  -->';
    }

    ?>
    <div class="container my-4">
        <h1 class='text-center'>Sign in to the webiste</h1>
        <form action="/loginsystem/signup.php" method="post">
            <div class="form-group">
                <label for="uname">User Name</label>
                <input type="name" name="uname" maxlength="10" class="form-control" id="uname" aria-describedby="uname"
                    placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" maxlength="12" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label>
                <input type="password" class="form-control" maxlength="12" name="cpassword" id="cpassword"
                    placeholder="Confirm Password">
                <small id="emailHelp" class="form-text text-muted">Confirm your passwrod carefully.</small>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script>
        $('.alert').alert();
    </script>
</body>

</html>