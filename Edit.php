<?php

$userId = $_GET['id'];

include_once 'UserRepository.php';

$userRepository = new UserRepository();

$user  = $userRepository->getUserById($userId);

if (isset($_POST['editBtn'])) {
    $id = $user['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $userRepository->updateUser($id, $name, $lastname, $email, $username, $password, $role);

    header("Location: Dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="Edit-css.css">
</head>
<body>

<header>
        <a href="#" class="logo">
            <img src="Images/Logo3.png" alt="Travel Logo">
        </a>
        
        
        <input type="checkbox" id="menu-toggle">
        <label for="menu-toggle" class="menu-icon">&#9776;</label>
        
        <ul class="navbar">
            <li><a href="Home.php">Home</a></li>
            <li><a href="ContactUs.php">Contact Us</a></li>
            <li><a href="Profile.php">Profile</a></li>
        </ul>
    </header>
    <br> <br> <br>
    <h1 class="center-text">Edit User Information</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?=$user['id']?>">
        <input type="text" name="name" value="<?=$user['name']?>" placeholder="Enter new name">
        <input type="text" name="lastname" value="<?=$user['lastname']?>" placeholder="Enter new lastname">
        <input type="email" name="email" value="<?=$user['email']?>" placeholder="Enter new email">
        <input type="text" name="username" value="<?=$user['username']?>" placeholder="Enter new username">
        <input type="password" name="password" placeholder="Enter new password" placeholder="Enter new role">
        <input type="text" name="role" value="<?=$user['role']?>">

        <input type="submit" name="editBtn" value="Save Changes">
    </form>
    <form action="Dashboard.php" method="get">
        <button class="sign-out-button" onclick="window.location.href='Dashboard.php'">Return to Dashboard</button>
    </form>
    <br>
    
     <!-- Footer -->

     <div class="footer1">
        <div class="container_footer">
            <div class="row">
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li> <a href="#">About us</a></li>
                        <li> <a href="#">Our services</a></li>
                        <li> <a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Get help</h4>
                    <ul>
                        <li> <a href="#">FAQ</a></li>
                        <li> <a href="#">Troubleshooting</a></li>
                        <li> <a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <ul>
                    <h4>Explore</h4>
                    <li> <a href="#">Destinations</a></li>
                    <li> <a href="#">Travel Guides</a></li>
                    <li> <a href="#">Tours</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-link">
                        <a href="#"> <img src="Images/facebook.logo.webp"></a>
                        <a href="#"> <img src="Images/instagram-logo.webp"></a>
                        <a href="#"> <img src="Images/twitter-logo.png"></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>