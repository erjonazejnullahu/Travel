<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="ContactUs-css.css">
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
            <li><a href="AboutUs.html">About Us</a></li>
            <li><a href="Profile.html">Profile</a></li>
            
        </ul>
    </header>
    <br>
    <div class="container">
        <div class="contact-box">
            <div class="left"></div>
            <div class="right">
                <h2>Contact Us</h2>
                <form method="POST" action="">
                <input type="text" class="field" name="name" placeholder="Your name">
                <input type="email" class="field" name="email" placeholder="Your email">
                <textarea class="field area" name="message" placeholder="Message"></textarea>
                <button class="btn" name="submit">Send</button>
                </form>
            </div>  
        </div>
    </div>

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
<?php
include_once 'UserRepository.php';

     // Check if form is submitted

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $message = isset($_POST['message']) ? $_POST['message'] : null;

    if ($name && $email && $message) {
        $userR = new UserRepository();
        $userR->messageFromContactUs($name, $email, $message);
        echo "<script>alert('Your message has been sent successfully!');</script>";
    } else {
        echo "<script>alert('Please fill in all fields before submitting.');</script>";
    }
}
?>
</html>