<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <script
src="https://kit.fontawesome.com/a77e4ada88.js"
crossorigin="anonymous"
></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <?php
    include_once 'nav.php';
    ?>

    <div class="profile-container">
        <div class="left">
            <div class="top">
                <img src="./image/index.jpeg" alt="rando">
                
                </div>
                <div class="middle">
                <h2>
    <?php
    if (isset($_SESSION['id'])) {
        echo $_SESSION['name'];
    }
    ?></h2>
                </div>

            <div class="bottom">
            <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus minus error rem odit similique eveniet sint adipisci nostrum. Nam et optio suscipit, illum harum ducimus vitae asperiores earum hic, provident reiciendis eaque dolorum vel! Eum, iusto perferendis tempore dolorum vel dolor debitis sint eligendi adipisci ipsam perspiciatis dignissimos voluptas doloremque rem error nesciunt doloribus expedita voluptatem quod labore, velit nam?
            </p>
</div>
      <div class="logout">      
            <a href="./include/logout_inc.php">logout <i class="fa-solid fa-right-from-bracket"></i></a>

            </div>
        </div>
        <div class="right">
            <h1>Student profile.</h1>
        </div>
    </div>

    
    


    
</body>
</html>
