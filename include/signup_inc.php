<?php

if(isset($_POST['submit'])) {
    
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $pwd = htmlspecialchars($_POST["pwd"]);
    $pwdRepeat = htmlspecialchars($_POST["pwdRepeat"]);

    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    if (emptyInputSignup($name, $email, $pwd, $pwdRepeat) !== false) {
        header("Location: /school-project/signup.php?error=emptyinput");
        exit();
    }
    if (invalidEmail($email) !== false) {
        header("Location: /school-project/signup.php?error=invalidemail");
        exit();
    }
    if (invalidPwd($pwd) !== false) {
        header("Location: /school-project/signup.php?error=invalidpassword");
        exit();
    }
    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header("Location: /school-project/signup.php?error=passworddontmatch");
        exit();
    }
    if (emailExist($conn, $email) !== false) {
        header("Location: /school-project/signup.php?error=emailtaken");
        exit();
    }

    createUser($conn, $name, $email, $pwd);

}
else{
    header("Location: /school-project/signup.php");
    exit();
}