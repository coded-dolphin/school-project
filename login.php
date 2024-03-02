
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
            <h2>Log in</h2>
            <form action="./include/login_inc.php" method="post">
            <div class="error">
                    <?php
                    if(isset($_GET['error'])){
                        if($_GET['error'] === "emptyinput"){
                            echo "<p>All the field must be filled</p>";
                        }
                        elseif($_GET['error'] === "emaildoesnotexist"){
                            echo "<p>Email is not registered</p>";
                        }
                        elseif($_GET['error'] === "invalidpwd"){
                            echo "<p>password does not match</p>";
                        }
                        elseif($_GET['error'] === "none"){
                            echo "<p class='sucess'>You are registered, you can now login</p>";
                        }
                    }
                    ?>
                </div>

                <div class="field">
                    <input type="email" name="email" placeholder="">
                    <label for="email">Email</label>
                </div>

                <div class="field">
                    <input type="password" name="pwd" placeholder="">
                    <label for="pasword">Password</label>
                </div>
                <button type="submit" class="signUp" name="submit">Login</button>
                <p>Not registered? <a href="signup.php" class="redirect">register</a></p>
            </form>
        </div>
        <div class="right"></div>
    </div>
</body>
</html>
