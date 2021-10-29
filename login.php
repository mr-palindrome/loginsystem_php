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
</body>

</html>x