<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="Welcome-css.css">
</head>
<body>
    <header>
        <a href="#" class="logo">
            <img src="Images/Logo3.png" alt="Travel Logo">
        </a>
        
        
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icon">&#9776;</label>
        
        <ul class="navbar">
        <?php if (isset($_SESSION['user_id'])): ?>
    <li><a href="Profile.php">Profile</a></li>
<?php else: ?>
    <li><a href="Login.php">Log In</a></li>
<?php endif; ?>
<li><a href="Home.php">Home</a></li>
 

    </header>
    
<!-- Home -->
<section class="home" id="home">
    <div class="home-text">
        <h1>Discover the world,<br>your way</h1>
        <p>Escape. Explore. Experience</p>
        <a href="Login.php" class="home-btn">Get started</a>
    </div>
</section>
</body>
</html>