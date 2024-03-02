<!DOCTYPE html>
<html lang="en">
<head>
<script
src="https://kit.fontawesome.com/a77e4ada88.js"
crossorigin="anonymous"
></script>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="css/signup.css" />
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Signup - CCRC | Capital College and Research Center</title>
</head>
<body>
<?php
include_once 'nav.php'
?>

    <button class="back"><i class="fa-solid fa-arrow-left"></i></button>
    <div class="signup_container">
        <div class="left">
            <!-- <h2>Login In to the <span>CCRC</span> terminal</h2> -->
            <h2>register</h2>
            <form action="./include/signup_inc.php" method="post">
                <div class="error">
                    <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] === "emptyinput"){
                            echo "<p>All the field must be filled</p>";
                        }
                        elseif($_GET['error'] === "invalidemail"){
                            echo "<p>Please use a valid email</p>";
                        }
                        elseif($_GET['error'] === "invalidpassword"){
                            echo "<p>Please use a password containing at least <br>- one capital letter<br>- one number<br>- one special character</p>";
                        }
                        elseif($_GET['error'] === "passworddontmatch"){
                            echo "<p>The password must be same</p>";
                        }
                        elseif($_GET['error'] === "emailtaken"){
                            echo "<p>The email is already registered</p>";
                        }
                        elseif($_GET['error'] === "stmtfailed"){
                            echo "<p>Something went wrong, please try again</p>";
                        }
                    }
                    ?>
                </div>
                <div class="field">
                    <input type="text" name="name" placeholder="">
                    <label for="name">Name</label>
                </div>
                <div class="field">
                    <input type="email" name="email" placeholder="">
                    <label for="email">Email</label>
                </div>
                <div class="field">
                    <input type="password" name="pwd" placeholder="">
                    <label for="pasword">Password</label>
                </div>
                <div class="field">
                    <input type="password" name="pwdRepeat" placeholder="">
                    <label for="pasword">Confirm password</label>
                </div>
                <button type="submit" class="signUp" name="submit">register</button>
                <p>Already registered? <a href="login.php" class="redirect">login</a></p>
            </form>
        </div>
        <div class="right"></div>
    </div>
</body>
</html>
