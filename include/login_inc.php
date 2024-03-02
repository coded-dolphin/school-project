<?php

if(isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST["email"]);
    $pwd = htmlspecialchars($_POST["pwd"]);

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    if (emptyInputLogin($email, $pwd) !== false) {
        header("Location: /school-project/login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $email, $pwd);
}
else{
    header("Location: /school-project/login.php");
    exit();
}