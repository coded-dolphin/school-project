<?php

function emptyInputSignup($name, $email, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($email) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emptyInputLogin($email, $pwd) {
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function invalidPwd($pwd) {
    $result;
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $pwd);
    $lowercase = preg_match('@[a-z]@', $pwd);
    $number    = preg_match('@[0-9]@', $pwd);
    $specialChars = preg_match('@[^\w]@', $pwd);
    if (!$uppercase || !$lowercase || !$number || !$specialChars) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function emailExist($conn, $email) {
    $sql = "SELECT * FROM users WHERE email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: /school-project/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $pwd) {
    $sql = "INSERT INTO users (name, email, pwd) VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: /school-project/signup.php?error=stmtfailed");
        exit();
    }

    $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $pwdHash);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: /school-project/login.php?error=none");
    exit();

}

function loginUser($conn, $email, $pwd){
    $emailExist = emailExist($conn, $email);

    if ($emailExist === false) {
        header("Location: /school-project/login.php?error=emaildoesnotexist");
        exit();    
    }

    $hashedPwd = $emailExist["pwd"];
    $checkPwd = password_verify($pwd, $hashedPwd);

    if ($checkPwd === false)
    {
        header("Location: /school-project/login.php?error=invalidpwd");
        exit();    
    }
    elseif($checkPwd === true){
        session_start();
        $_SESSION["id"] = $emailExist["id"]; 
        $_SESSION["email"] = $emailExist["email"];
        $_SESSION["name"] = $emailExist["name"];

        header("Location: /school-project/index.php");
        exit();    
    }
}