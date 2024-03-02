<?php
session_start();
?>
<div class="nav-wrapper">
      <a href="index.php" class="logo"
        ><img src="image/logo.png" alt="ccrc school's logo"
      /></a>
      <header>
        <ul class="navlist">
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Admission</a></li>
          <li><a href="#">Academics</a></li>
          <li><a href="#">News</a></li>
          <li><a href="#">Facilities</a></li>
          <li><a href="#">Clubs</a></li>
        </ul>
        <?php
        if(isset($_SESSION["id"])){
          echo "<a href='profile.php'><button class='signin profile'><i class='fa-solid fa-user'></i> Profile</button></a>";
        }else{
          echo'
          <a href="login.php"><button class="signin remove-button-for-login-page"><i class="fa-solid fa-user"></i> login</button></a>
          ';
        }
        ?>
      </header>
    </div>