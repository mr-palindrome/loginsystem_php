<?php

session_start();
$loggedin = FALSE;
if (isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]== TRUE) {
    $loggedin = TRUE;
}

?>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="#">User Portal</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="/loginsystem/welcome.php">Welcome <span class="sr-only">(current)</span></a>
            </li>
            <?php
            if (!$loggedin) {

                echo '<li class="nav-item">
                <a class="nav-link" href="/loginsystem/login.php">Login</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/loginsystem/signup.php">Signup</a>
                </li>';
            }
            
            else{

                echo '<li class="nav-item">
                <a class="nav-link" href="/loginsystem/logout.php">Logout</a>
                </li>';
            }
            ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>